{{-- resources/views/auth/reset-password.blade.php --}}
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <title>Reset Password - KNewbie</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-['Poppins'] bg-gray-50 min-h-screen">
        {{-- Navbar guest (sama seperti forgot-password) --}}
        <x-nav-guest/>

        <main class="min-h-[calc(100vh-80px)] flex items-center justify-center py-8">
            <div class="w-full max-w-md px-4">
                <div class="bg-white rounded-2xl shadow-lg px-6 py-7 md:px-8 md:py-9">
                    <h1 class="text-xl md:text-2xl font-bold text-center text-gray-900 mb-2">
                        Reset Password
                    </h1>
                    <p class="text-xs md:text-sm text-gray-500 text-center mb-6">
                        Masukkan email dan password baru untuk akun kamu.
                    </p>

                    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                        @csrf

                        {{-- Wajib: token dari link email --}}
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        {{-- Email --}}
                        <div class="flex flex-col gap-1.5">
                            <label for="email" class="text-sm font-medium text-gray-700">
                                Email Address
                            </label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                                placeholder="Type your email address"
                                required
                                autocomplete="email"
                            >
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        {{-- Password baru --}}
                        <div class="flex flex-col gap-1.5">
                            <label for="password" class="text-sm font-medium text-gray-700">
                                New Password
                            </label>
                            <div class="relative">
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 pr-20 text-sm
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                                    placeholder="Type your new password"
                                    required
                                    autocomplete="new-password"
                                >
                                <button
                                    type="button"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-[11px] font-semibold text-gray-500 hover:text-gray-700"
                                    data-toggle-password="password"
                                >
                                    Show
                                </button>
                            </div>
                            <p class="text-[11px] text-gray-500 leading-relaxed">
                                Minimal <span class="font-semibold">9 karakter</span>, harus ada huruf besar,
                                huruf kecil, angka, dan symbol.
                            </p>
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        {{-- Konfirmasi password --}}
                        <div class="flex flex-col gap-1.5">
                            <label for="password_confirmation" class="text-sm font-medium text-gray-700">
                                Confirm New Password
                            </label>
                            <div class="relative">
                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-2.5 pr-20 text-sm
                                           focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none"
                                    placeholder="Confirm your new password"
                                    required
                                    autocomplete="new-password"
                                >
                                <button
                                    type="button"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-[11px] font-semibold text-gray-500 hover:text-gray-700"
                                    data-toggle-password="password_confirmation"
                                >
                                    Show
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>

                        <button
                            type="submit"
                            class="w-full mt-2 rounded-xl py-2.5 md:py-3 bg-blue-600 text-white text-sm font-semibold
                                   hover:bg-blue-700 hover:shadow-md transition"
                        >
                            Reset Password
                        </button>

                        @if (session('status'))
                            <p class="text-[11px] text-green-600 mt-3 text-center">
                                {{ session('status') }}
                            </p>
                        @endif
                    </form>
                </div>
            </div>
        </main>

        {{-- Toggle Show / Hide (teks) --}}
        <script>
            (function () {
                const buttons = document.querySelectorAll('[data-toggle-password]');

                buttons.forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const targetId = btn.getAttribute('data-toggle-password');
                        const input = document.getElementById(targetId);
                        if (!input) return;

                        const isHidden = input.type === 'password';
                        input.type = isHidden ? 'text' : 'password';
                        btn.textContent = isHidden ? 'Hide' : 'Show';
                    });
                });
            })();
        </script>
    </body>
</html>
