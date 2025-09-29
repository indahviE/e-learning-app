
@include('components.header')

<div class="relative w-full h-screen bg-gradient-to-br from-cyan-500 via-blue-500 to-indigo-600">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/30"></div>

    <!-- Container Form -->
    <div class="relative z-10 flex items-center justify-center w-full h-full">
        <form action="/login" method="post"
            class="w-full max-w-md p-8 bg-white rounded-xl shadow-2xl flex flex-col gap-6">
            @csrf

            <!-- Logo & Title -->
            <div class="text-center">
                <h1 class="text-3xl font-bold tracking-wide">
                    RUANG<span class="text-cyan-500">ILMU</span>
                </h1>
                <p class="text-gray-500 text-sm mt-1">Selamat datang di platform belajar mudah, nyaman, dan cepat.</p>
            </div>

            <!-- Alert -->
            @if (Session::has('ok'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-md text-sm">
                    <p class="font-semibold">Berhasil!</p>
                    <p>{{ Session::get('ok') }}</p>
                </div>
            @endif

            @if (Session::has('err'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md text-sm">
                    <p class="font-semibold">Terjadi Kesalahan!</p>
                    <p>{{ Session::get('err') }}</p>
                </div>
            @endif

            <!-- Input -->
            <div class="flex flex-col gap-4">
                <input type="text" name="email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-sm"
                    placeholder="Masukkan email Anda" required>

                <input type="password" name="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 text-sm"
                    placeholder="Masukkan password Anda" required>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-4">
                <button type="submit" name="submit"
                    class="px-5 py-3 bg-cyan-500 hover:bg-cyan-600 text-white text-sm font-semibold rounded-lg shadow-md transition duration-300">
                    Masuk
                </button>
                <a href="./register" class="text-cyan-600 hover:underline text-sm font-medium">
                    Belum punya akun?
                </a>
            </div>
        </form>
    </div>
</div>
