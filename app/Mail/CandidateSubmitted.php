<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Candidate;

class CandidateSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Thuộc tính để lưu trữ đối tượng Ứng viên (Candidate)
     * @var Candidate
     */
    public $candidate;

    /**
     * Tạo một instance message mới.
     * @param Candidate $candidate
     */
    public function __construct(Candidate $candidate)
    {
        // Gán đối tượng Candidate vào thuộc tính để có thể dùng trong view
        $this->candidate = $candidate;
    }

    /**
     * Lấy envelope message.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // Gửi email từ địa chỉ được cấu hình trong .env (MAIL_FROM_ADDRESS)
            // Tiêu đề email
            subject: 'Ứng viên mới đã gửi hồ sơ: ' . $this->candidate->name,
        );
    }

    /**
     * Lấy định nghĩa nội dung message.
     */
    public function content(): Content
    {
        return new Content(
            // View Blade template cho email (resources/views/emails/candidate-submitted.blade.php)
            view: 'emails.candidate-submitted',
        );
    }

    /**
     * Lấy mảng các attachment cho message. (Nếu cần đính kèm CV)
     */
    public function attachments(): array
    {
        // Ví dụ: Đính kèm file CV đã upload vào email thông báo.
        // Cần đảm bảo file đã được lưu vào storage/app/public/cvs/
        // và đường dẫn 'cv_path' đã được lưu đúng cách.

        // Giả định $this->candidate->cv_path lưu đường dẫn tương đối (ví dụ: 'cvs/abc.pdf')
        $filePath = storage_path('app/public/' . $this->candidate->cv_path);

        // Kiểm tra xem file có tồn tại không trước khi đính kèm
        if (file_exists($filePath)) {
            return [
                // Gán tên file đính kèm là "CV_[Tên Ứng viên].pdf"
                \Illuminate\Mail\Mailables\Attachment::fromPath($filePath)
                    ->as('CV_' . \Illuminate\Support\Str::slug($this->candidate->name) . '.pdf')
                    ->withMime('application/pdf'),
            ];
        }

        return [];
    }
}
