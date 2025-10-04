<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Báo Hồ Sơ Ứng Viên Mới</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div
        style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); overflow: hidden;">
        <div style="background-color: #4f46e5; color: #ffffff; padding: 20px; text-align: center;">
            <h2>HỒ SƠ ỨNG VIÊN MỚI</h2>
        </div>
        <div style="padding: 30px; line-height: 1.6; color: #333333;">
            <p>Xin chào,</p>
            <p>Hồ sơ ứng viên <strong>{{ $candidate->name }}</strong> vừa được gửi vào hệ thống của bạn.</p>

            <div style="margin-top: 20px; border-top: 1px solid #eeeeee; padding-top: 20px;">
                <p style="margin: 5px 0;"><strong
                        style="color: #4f46e5; display: inline-block; width: 100px;">Tên:</strong>
                    {{ $candidate->name }}</p>
                <p style="margin: 5px 0;"><strong
                        style="color: #4f46e5; display: inline-block; width: 100px;">Email:</strong>
                    {{ $candidate->email }}</p>
                <p style="margin: 5px 0;"><strong style="color: #4f46e5; display: inline-block; width: 100px;">Ngày
                        sinh:</strong> {{ $candidate->birthday->format('d/m/Y') }}</p>
                <p style="margin: 5px 0;"><strong style="color: #4f46e5; display: inline-block; width: 100px;">Mô tả
                        ngắn:</strong></p>
                <p style="padding-left: 10px; border-left: 3px solid #ccc; font-style: italic; margin: 5px 0;">
                    {{ $candidate->bio ?? 'Không có mô tả ngắn.' }}</p>
            </div>

            <p style="text-align: center;">
                <a href="{{ url('/candidates') }}"
                    style="display: inline-block; padding: 10px 20px; margin-top: 15px; background-color: #10b981; color: #ffffff !important; text-decoration: none; border-radius: 5px; font-weight: bold;">
                    Xem Chi Tiết Ứng Viên
                </a>
            </p>

            <p>Trân trọng,</p>
            <p>Hệ thống Tuyển dụng tự động.</p>
        </div>
        <div
            style="background-color: #f0f0f0; color: #777777; padding: 20px; text-align: center; font-size: 12px; border-top: 1px solid #e0e0e0;">
            Đây là email tự động. Vui lòng không trả lời email này.
        </div>
    </div>

</body>

</html>
