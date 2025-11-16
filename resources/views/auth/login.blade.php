<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>Sign Up - Knewbie</title>
        <meta name="description" content="Knewbie is an innovative online learning platform.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/logo-64.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/logo-64.png') }}">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-['Poppins'] bg-gray-50 min-h-screen">
        <!-- Navbar Simplified -->
         <x-nav-guest/>
        <!-- Main Content -->
        <main class="flex items-center justify-center py-8 md:py-12 bg-gradient-to-br from-blue-50 to-gray-100 min-h-[calc(100vh-80px)]">
            <!-- Container dengan padding SAMA seperti navbar -->
            <div class="w-full max-w-[1280px] px-4 md:px-8 lg:px-[75px]">
                
                <!-- Card Container (Gambar + Form dalam 1 Card) -->
                <div class="w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        
                        <!-- Left Side: Image -->
                        <div class="lg:w-1/2 relative bg-gradient-to-br from-blue-500 to-purple-600 min-h-[300px] lg:min-h-[600px]">
                            <img 
                                src="{{ asset('assets/images/backgrounds/banner-subscription.png') }}" 
                                class="w-full h-full object-cover opacity-90" 
                                alt="Learning banner"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>

                        <!-- Right Side: Form -->
                        <div class="lg:w-1/2 p-6 md:p-10">
                            <h1 class="font-bold text-2xl md:text-3xl text-center mb-8 text-gray-900">Welcome Back,<br> Let's Upgrade Skills</h1>
                            
                            <form href="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
                                @csrf

                                <!-- Email Address -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Email Address</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="email" 
                                            name="email"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition text-sm" 
                                            placeholder="Type your valid email address"
                                            required
                                        >
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Password</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                        </span>
                                        <input 
                                            type="password" 
                                            name="password"
                                            class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition text-sm" 
                                            placeholder="Type your Password"
                                            required
                                        >
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button 
                                    type="submit" 
                                    class="w-full mt-2 rounded-xl py-3.5 px-6 bg-blue-600 text-white font-semibold hover:bg-blue-700 hover:shadow-xl transition transform hover:-translate-y-0.5"
                                >
                                    Sign In to My Account
                                </button>
                            </form>

                            <!-- Footer -->
                            <p class="text-center text-sm text-gray-600 mt-6">
                                Already have an account? 
                                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
                
            </div>
        </main>

        <!-- JavaScript untuk Toggle Hamburger Menu -->
        <script>
            const hamburger = document.getElementById('hamburger');
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburgerLines = hamburger.querySelectorAll('span');

            hamburger.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                
                if (!mobileMenu.classList.contains('hidden')) {
                    hamburgerLines[0].classList.add('rotate-45', 'translate-y-2');
                    hamburgerLines[1].classList.add('opacity-0');
                    hamburgerLines[2].classList.add('-rotate-45', '-translate-y-2');
                } else {
                    hamburgerLines[0].classList.remove('rotate-45', 'translate-y-2');
                    hamburgerLines[1].classList.remove('opacity-0');
                    hamburgerLines[2].classList.remove('-rotate-45', '-translate-y-2');
                }
            });

            document.addEventListener('click', (e) => {
                if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        hamburgerLines[0].classList.remove('rotate-45', 'translate-y-2');
                        hamburgerLines[1].classList.remove('opacity-0');
                        hamburgerLines[2].classList.remove('-rotate-45', '-translate-y-2');
                    }
                }
            });
        </script>
    </body>
</html>