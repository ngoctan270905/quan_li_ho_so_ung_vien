<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest;
use App\Models\Candidate;
use App\Mail\CandidateSubmitted; // Import Mailable Class
use Illuminate\Support\Facades\Mail; // Import Mail Facade
use Illuminate\Support\Facades\Storage; // Import Storage Facade để xử lý file
use Illuminate\Support\Str; // Import Str để tạo tên file ngẫu nhiên
use Illuminate\Support\Facades\Log;


class CandidateController extends Controller
{

     /**
     * Hiển thị danh sách ứng viên (CandidateController@index)
     */
    public function index()
    {
        // Lấy danh sách ứng viên, sắp xếp theo thời gian tạo mới nhất, và phân trang
        $candidates = Candidate::latest()->paginate(10); 
        
        // Trả về view 'candidates.index' và truyền dữ liệu
        return view('candidates.index', compact('candidates'));
    }


    /**
     * Hiển thị form đăng ký hồ sơ mới.
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Xử lý lưu hồ sơ ứng viên và gửi email thông báo.
     */
    public function store(StoreCandidateRequest $request)
    {
        // Lấy dữ liệu đã được validate
        $data = $request->validated();
        $data['avatar_path'] = null;
        $data['cv_path'] = null;
        
        // 1. Xử lý File Uploads
        
        // Xử lý Avatar (Tùy chọn)
        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            // Tạo tên file ngẫu nhiên: 'avatar_' + timestamp + hash.extension
            $avatarName = 'avatar_' . time() . '_' . Str::random(10) . '.' . $avatarFile->getClientOriginalExtension();
            // Lưu file vào storage/app/public/avatars và lấy đường dẫn
            $data['avatar_path'] = $avatarFile->storeAs('avatars', $avatarName, 'public');
        }

        // Xử lý CV (Bắt buộc)
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            // Tạo tên file ngẫu nhiên: 'cv_' + timestamp + hash.pdf
            $cvName = 'cv_' . time() . '_' . Str::random(10) . '.pdf';
            // Lưu file vào storage/app/public/cvs và lấy đường dẫn
            $data['cv_path'] = $cvFile->storeAs('cvs', $cvName, 'public');
        }

        try {
            // 2. Lưu hồ sơ vào Database
            $candidate = Candidate::create($data);

            // 3. Gửi Email thông báo nội bộ
            // Địa chỉ 'tuyendung@congty.com' là email nhận thông báo của công ty
            Mail::to('tannnph49720@gmail.com') 
                // Sử dụng cấu hình SMTP trong file .env để gửi
                ->send(new CandidateSubmitted($candidate)); 

            // 4. Trả về thành công
            return redirect()
                ->route('candidates.create')
                ->with('success', 'Bạn đã nộp hồ sơ thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.');

        } catch (\Exception $e) {
            // Log lỗi (rất quan trọng cho việc debug)
            Log::error('Lỗi khi lưu ứng viên hoặc gửi email: ' . $e->getMessage());
            
            // Xóa các file đã upload nếu quá trình lưu DB/Gửi mail gặp lỗi
            if (isset($data['avatar_path']) && $data['avatar_path']) {
                Storage::disk('public')->delete($data['avatar_path']);
            }
            if (isset($data['cv_path']) && $data['cv_path']) {
                Storage::disk('public')->delete($data['cv_path']);
            }

            // Trả lại form với thông báo lỗi
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Đã xảy ra lỗi hệ thống khi nộp hồ sơ. Vui lòng thử lại sau.');
        }
    }
}
