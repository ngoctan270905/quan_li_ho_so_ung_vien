<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Ứng Viên</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

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

<body class="min-h-screen py-12 relative">
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

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold text-white flex items-center">
                <i class="fas fa-users text-indigo-300 w-10 h-10 mr-3"></i>
                Quản Lý Ứng Viên
            </h1>
            <p class="text-gray-300 mt-2">
                Tổng cộng {{ $candidates->total() }} hồ sơ đã được nộp.
            </p>
        </header>

        <!-- Bảng Danh Sách -->
        <div class="bg-white/10 backdrop-blur-lg shadow-2xl rounded-2xl overflow-hidden border border-white/20">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-white/20">
                    <thead class="bg-white/20">
                        <tr>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-user-friends mr-2 text-blue-300"></i>Ứng Viên
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider hidden sm:table-cell">
                                <i class="fas fa-align-left mr-2 text-green-300"></i>Mô Tả Ngắn
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-center text-sm font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-briefcase mr-2 text-purple-300"></i>Hồ Sơ
                            </th>
                            <th scope="col"
                                class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-calendar mr-2 text-indigo-300"></i>Ngày Nộp
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        @forelse ($candidates as $candidate)
                            <tr class="hover:bg-white/20 transition-all duration-300 ease-in-out">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <!-- Avatar Display -->
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($candidate->avatar_path)
                                                <!-- Hiển thị Avatar nếu có -->
                                                <img class="h-10 w-10 rounded-full object-cover ring-2 ring-white/30"
                                                    src="{{ asset('storage/' . $candidate->avatar_path) }}"
                                                    alt="{{ $candidate->name }}"
                                                    onerror="this.onerror=null; this.src='https://placehold.co/40x40/E0E7FF/4F46E5?text={{ strtoupper(substr($candidate->name, 0, 1)) }}';">
                                            @else
                                                <!-- Placeholder Avatar nếu không có ảnh -->
                                                <div
                                                    class="h-10 w-10 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-sm ring-2 ring-white/30">
                                                    <i class="fas fa-user text-indigo-300"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-white">{{ $candidate->name }}</div>
                                            <div class="text-sm text-gray-300">{{ $candidate->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-300 hidden sm:table-cell max-w-xs truncate">
                                    {{ Str::limit($candidate->bio ?? 'Không có', 50, '...') }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-semibold">
                                    <!-- Link tải CV -->
                                    <a href="{{ asset('storage/' . $candidate->cv_path) }}" target="_blank"
                                        class="text-gray-300 hover:text-gray-300 transition-all duration-300 flex items-center justify-center">
                                        <i class="fas fa-file-pdf text-red-400 mr-1"></i>
                                        Tải CV
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                    {{ $candidate->created_at->format('d/m/Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 whitespace-nowrap text-center text-gray-400">
                                    <i class="fas fa-inbox text-4xl mb-4 opacity-50"></i>
                                    Chưa có hồ sơ ứng viên nào được nộp.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Phân Trang -->
            <div class="p-6 bg-white/5">
                <div class="flex justify-center">
                    {{ $candidates->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
