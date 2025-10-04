<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\NoProfanity; // Import Custom Rule
use Illuminate\Validation\Rules\Unique;

class StoreCandidateRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép thực hiện yêu cầu này không.
     */
    public function authorize(): bool
    {
        // Cho phép mọi người dùng gửi form
        return true; 
    }

    /**
     * Lấy các quy tắc validation áp dụng cho yêu cầu này.
     */
    public function rules(): array
    {
        // Tính toán ngày 18 năm trước để sử dụng cho validation
        $eighteenYearsAgo = now()->subYears(18)->format('Y-m-d');
        
        return [
            // name: required, min:5
            'name' => ['required', 'string', 'min:5'],
            
            // email: required, email, unique:candidates,email
            'email' => [
                'required', 
                'email', 
                new Unique('candidates', 'email'), 
            ],
            
            // birthday: required, date, before:18 years ago
            'birthday' => [
                'required', 
                'date', 
                'before:' . $eighteenYearsAgo
            ],
            
            // avatar: nullable, image, max:2MB (2048 KB)
            'avatar' => [
                'nullable', 
                'image', 
                'max:2048'
            ],
            
            // cv: required, file, mimetypes:application/pdf, max:5MB (5120 KB)
            'cv' => [
                'required', 
                'file', 
                'mimetypes:application/pdf', 
                'max:5120'
            ],
            
            // bio: nullable, max:1000, NoProfanity (Custom Rule)
            'bio' => [
                'nullable', 
                'string',
                'max:1000',
                new NoProfanity,
            ],
        ];
    }

    /**
     * Lấy các thông báo lỗi tùy chỉnh cho các quy tắc validation.
     */
    public function messages(): array
    {
        return [
            // Custom messages cho từng trường
            
            // Name
            'name.required' => 'Họ tên là bắt buộc.',
            'name.min' => 'Họ tên phải có tối thiểu :min ký tự.',
            
            // Email
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải đúng định dạng (vd: name@example.com).',
            'email.unique' => 'Email này đã được sử dụng để đăng ký hồ sơ.',
            
            // Birthday
            'birthday.required' => 'Ngày sinh là bắt buộc.',
            'birthday.date' => 'Ngày sinh không hợp lệ.',
            'birthday.before' => 'Ứng viên phải đủ 18 tuổi để nộp hồ sơ.',

            // Avatar
            'avatar.image' => 'Ảnh đại diện phải là tệp hình ảnh (JPG, PNG, GIF...).',
            'avatar.max' => 'Kích thước ảnh đại diện không được vượt quá 2MB.',
            
            // CV
            'cv.required' => 'CV (PDF) là bắt buộc.',
            'cv.file' => 'CV phải là một tệp.',
            'cv.mimetypes' => 'CV phải là định dạng PDF.',
            'cv.max' => 'Kích thước CV không được vượt quá 5MB.',
            
            // Bio
            'bio.max' => 'Mô tả ngắn (Bio) không được vượt quá 1000 ký tự.',
            
            // Lưu ý: Thông báo lỗi cho NoProfanity được định nghĩa trực tiếp trong Rule class.
        ];
    }
}
