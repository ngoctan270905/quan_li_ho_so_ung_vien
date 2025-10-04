<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Hồ sơ Ứng viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Enhanced sparkle effect with more particles */
        @keyframes sparkle {

            0%,
            100% {
                opacity: 0;
                transform: scale(0) rotate(0deg);
            }

            50% {
                opacity: 1;
                transform: scale(1) rotate(180deg);
            }
        }

        .sparkle {
            position: fixed;
            width: 3px;
            height: 3px;
            background: linear-gradient(45deg, #fbbf24, #f59e0b);
            border-radius: 50%;
            animation: sparkle 2s infinite ease-in-out;
            z-index: -1;
        }

        /* More sparkles distributed across the screen */
        .sparkle:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .sparkle:nth-child(2) {
            top: 20%;
            right: 15%;
            animation-delay: 0.3s;
        }

        .sparkle:nth-child(3) {
            bottom: 30%;
            left: 5%;
            animation-delay: 0.6s;
        }

        .sparkle:nth-child(4) {
            bottom: 10%;
            right: 10%;
            animation-delay: 0.9s;
        }

        .sparkle:nth-child(5) {
            top: 40%;
            left: 70%;
            animation-delay: 1.2s;
        }

        .sparkle:nth-child(6) {
            top: 60%;
            right: 30%;
            animation-delay: 1.5s;
        }

        .sparkle:nth-child(7) {
            bottom: 50%;
            left: 80%;
            animation-delay: 1.8s;
        }

        .sparkle:nth-child(8) {
            top: 80%;
            left: 40%;
            animation-delay: 0.2s;
        }

        .sparkle:nth-child(9) {
            bottom: 70%;
            right: 50%;
            animation-delay: 0.5s;
        }

        .sparkle:nth-child(10) {
            top: 30%;
            left: 90%;
            animation-delay: 0.8s;
        }

        /* Floating orbs for additional depth */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.6;
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }

        .orb {
            position: fixed;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
            animation: float 4s infinite ease-in-out;
            z-index: -1;
        }

        .orb:nth-child(11) {
            top: 15%;
            left: 5%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
        }

        .orb:nth-child(12) {
            top: 50%;
            right: 10%;
            width: 40px;
            height: 40px;
            animation-delay: 1s;
        }

        .orb:nth-child(13) {
            bottom: 20%;
            left: 20%;
            width: 50px;
            height: 50px;
            animation-delay: 2s;
        }

        .orb:nth-child(14) {
            top: 70%;
            right: 40%;
            width: 30px;
            height: 30px;
            animation-delay: 3s;
        }

        /* Enhanced background with multiple layers */
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-attachment: fixed;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.4) 0%, transparent 50%),
                radial-gradient(circle at 60% 60%, rgba(255, 165, 0, 0.3) 0%, transparent 50%);
            animation: shimmer 8s ease-in-out infinite;
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%),
                linear-gradient(-45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            animation: wave 12s linear infinite;
            z-index: -1;
        }

        @keyframes shimmer {

            0%,
            100% {
                opacity: 0.6;
                transform: translateX(-30px) translateY(-30px) scale(1);
            }

            50% {
                opacity: 1;
                transform: translateX(30px) translateY(30px) scale(1.05);
            }
        }

        @keyframes wave {
            0% {
                transform: translateX(-100%) skewX(20deg);
            }

            100% {
                transform: translateX(100%) skewX(-20deg);
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 relative">
    <!-- Enhanced sparkle and orb effects -->
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="sparkle"></div>
    <div class="orb"></div>
    <div class="orb"></div>
    <div class="orb"></div>
    <div class="orb"></div>

    <div
        class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 max-w-md w-full p-8 space-y-6 form-container">
        <div class="text-center">
            <i class="fas fa-user-graduate text-6xl text-yellow-400 mb-4 animate-pulse"></i>
            <h1 class="text-3xl font-bold text-white mb-2">Đăng ký Hồ sơ Ứng viên</h1>
            <p class="text-gray-300">Tạo hồ sơ chuyên nghiệp của bạn ngay hôm nay</p>
        </div>

        {{-- Hiển thị Session Flash Message --}}
        @include('components.alert')

        {{-- Thêm enctype="multipart/form-data" để upload file --}}
        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            {{-- Yêu cầu 1: Đảm bảo có @csrf để bảo vệ CSRF --}}
            @csrf

            {{-- Họ tên (name) --}}
            <div class="space-y-2">
                <label for="name" class="text-sm font-semibold text-white flex items-center">
                    <i class="fas fa-user text-blue-300 mr-2"></i>Họ tên *
                </label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                    placeholder="Nhập họ tên đầy đủ">
                @error('name')
                    <div class="error flex items-center text-red-400 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Email (email) --}}
            <div class="space-y-2">
                <label for="email" class="text-sm font-semibold text-white flex items-center">
                    <i class="fas fa-envelope text-green-300 mr-2"></i>Email *
                </label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                    placeholder="Nhập địa chỉ email">
                @error('email')
                    <div class="error flex items-center text-red-400 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Ngày sinh (birthday) --}}
            <div class="space-y-2">
                <label for="birthday" class="text-sm font-semibold text-white flex items-center">
                    <i class="fas fa-calendar-alt text-purple-300 mr-2"></i>Ngày sinh *
                </label>
                <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}"
                    class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300">
                @error('birthday')
                    <div class="error flex items-center text-red-400 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Ảnh đại diện (avatar) --}}
            <div class="space-y-2">
                <label for="avatar" class="text-sm font-semibold text-white flex items-center">
                    <i class="fas fa-image text-pink-300 mr-2"></i>Ảnh đại diện (Max 2MB, định dạng ảnh)
                </label>
                {{-- Lưu ý: Không thể hiển thị lại old('avatar') cho input type file --}}
                <input type="file" id="avatar" name="avatar" accept="image/*"
                    class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600 transition-all duration-300">
                @error('avatar')
                    <div class="error flex items-center text-red-400 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            {{-- CV (cv) --}}
            <div class="space-y-2">
                <label for="cv" class="text-sm font-semibold text-white flex items-center">
                    <i class="fas fa-file-pdf text-red-300 mr-2"></i>CV * (Max 5MB, định dạng PDF)
                </label>
                <input type="file" id="cv" name="cv" accept="application/pdf"
                    class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-500 file:text-white hover:file:bg-red-600 transition-all duration-300">
                @error('cv')
                    <div class="error flex items-center text-red-400 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Mô tả ngắn (bio) --}}
            <div class="space-y-2">
                <label for="bio" class="text-sm font-semibold text-white flex items-center">
                    <i class="fas fa-align-left text-indigo-300 mr-2"></i>Mô tả ngắn (Bio, Max 1000 ký tự)
                </label>
                <textarea id="bio" name="bio" rows="5"
                    class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 resize-none"
                    placeholder="Giới thiệu bản thân một cách ngắn gọn...">{{ old('bio') }}</textarea>
                @error('bio')
                    <div class="error flex items-center text-red-400 text-sm">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl hover:from-blue-600 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 flex items-center justify-center">
                <i class="fas fa-paper-plane mr-2"></i>Gửi Hồ sơ
            </button>
        </form>
    </div>
</body>

</html>
