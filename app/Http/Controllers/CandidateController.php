<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCandidateRequest; // Import Form Request
use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Hiển thị form tạo ứng viên.
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Xử lý gửi form và lưu dữ liệu.
     */
    public function store(StoreCandidateRequest $request) // Laravel tự động thực hiện validation tại đây
    {
        // 1. Xử lý File Upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            // Lưu vào storage/app/public/candidates/avatar
            $avatarPath = $request->file('avatar')->store('candidates/avatar', 'public');
        }

        // Lưu CV
        // Lưu vào storage/app/public/candidates/cv
        $cvPath = $request->file('cv')->store('candidates/cv', 'public');

        // 2. Lưu Dữ liệu vào Database
        Candidate::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'bio' => $request->bio,
            // Lưu đường dẫn file
            'avatar_path' => $avatarPath, 
            'cv_path' => $cvPath,
        ]);

        // 3. Xử lý Session Flash Message
        return redirect()->route('candidates.create')
                         ->with('success', 'Hồ sơ đã được gửi thành công!');
    }
}