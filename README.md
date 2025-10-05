# 🧾 Laravel Assignment – Form Handling, Validation & Session (Advanced)

## 🧩 Bối cảnh dự án
Bạn đang xây dựng **hệ thống quản lý hồ sơ ứng viên** cho một nền tảng tuyển dụng.  
Mỗi ứng viên có thể **đăng ký tài khoản và gửi hồ sơ** kèm **CV (PDF)**, **ảnh đại diện**, và **thông tin cá nhân** thông qua form Laravel có xử lý **Validation nâng cao**, **Custom Rule**, và **Session Flash Message**.

---

## 📝 Phần 1 – Form & CSRF Protection

### 🎯 Yêu cầu
Tạo file view:  
`resources/views/candidates/create.blade.php`  
bao gồm các trường sau:

| Trường dữ liệu | Kiểu nhập | Ghi chú |
|----------------|-----------|---------|
| Họ tên (`name`) | text | Bắt buộc |
| Email (`email`) | email | Bắt buộc, duy nhất |
| Ngày sinh (`birthday`) | date | Bắt buộc, ≥ 18 tuổi |
| Ảnh đại diện (`avatar`) | file | Tuỳ chọn, chỉ ảnh |
| CV (`cv`) | file | Bắt buộc, PDF |
| Mô tả ngắn (`bio`) | textarea | Tuỳ chọn |

### 🧰 Yêu cầu kỹ thuật
- Có `@csrf` để chống tấn công **CSRF**
- Hiển thị lại input cũ khi có lỗi với `old('...')`
- Hiển thị thông báo lỗi bằng `@error('field')`
- Giao diện form trình bày rõ ràng, dễ sử dụng

---

## ✅ Phần 2 – Validation Nâng Cao

### 🧱 Form Request
Tạo class:  
`app/Http/Requests/StoreCandidateRequest.php`

Áp dụng các rule sau:

| Trường | Rule |
|--------|------|
| name | `required|min:5` |
| email | `required|email|unique:candidates,email` |
| birthday | `required|date|before:18 years ago` |
| avatar | `nullable|image|max:2048` |
| cv | `required|file|mimetypes:application/pdf|max:5120` |
| bio | `nullable|max:1000` |

### 🧩 Custom Rule – `NoProfanity`
- Tạo custom rule `NoProfanity`
- Cấm các từ ngữ tục tĩu trong `bio` (danh sách blacklist tự định nghĩa)
- Khi phát hiện từ cấm → hiển thị lỗi:  
  `Trường bio chứa từ ngữ không phù hợp.`

---

## 📤 Phần 3 – File Upload & Storage

### 🔧 Yêu cầu kỹ thuật
- Lưu file vào thư mục: `storage/app/public/candidates/`
- Tạo symbolic link bằng:  
  ```bash
  php artisan storage:link
