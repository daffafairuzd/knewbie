<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <title>Forgot Password - KNewbie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-['Poppins'] bg-gray-50 min-h-screen">
    <x-nav-guest/>

    <main class="flex items-center justify-center py-10 md:py-16">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl px-6 py-8 md:px-8 md:py-10">
            <h1 class="text-xl md:text-2xl font-bold text-center mb-2">Forgot Password</h1>
            <p class="text-xs md:text-sm text-gray-500 text-center mb-6">
                Masukkan email yang kamu gunakan untuk login. Kami akan kirim link untuk reset password.
            </p>

            @if (session('status'))
                <div class="mb-4 text-xs md:text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div class="flex flex-col gap-2">
                    <label for="email" class="text-sm font-semibold text-gray-700">Email Address</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full py-3 px-4 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm"
                        placeholder="Type your valid email address"
                    >
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <button
                    type="submit"
                    class="w-full mt-2 rounded-xl py-3.5 px-6 bg-blue-600 text-white font-semibold text-sm hover:bg-blue-700 hover:shadow-lg transition"
                >
                    Send Reset Link
                </button>
            </form>

            <p class="mt-6 text-center text-xs md:text-sm text-gray-500">
                Remember your password?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                    Back to Login
                </a>
            </p>
        </div>
    </main>
</body>
</html>
