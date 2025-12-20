<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>Sign In - Knewbie</title>
        <meta name="description" content="Knewbie is an innovative online learning platform.">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-['Poppins'] bg-gray-50 min-h-screen">
        <x-nav-guest/>
        <main class="flex items-center justify-center py-8 md:py-12 bg-gradient-to-br from-blue-50 to-gray-100 min-h-[calc(100vh-80px)]">
            <div class="w-full max-w-[1280px] px-4 md:px-8 lg:px-[75px]">
                
                <div class="w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        
                        <div class="lg:w-1/2 relative bg-gradient-to-br from-blue-500 to-purple-600 min-h-[300px] lg:min-h-[600px]">
                            <img 
                                src="{{ asset('assets/images/backgrounds/banner-subscription.png') }}" 
                                class="w-full h-full object-cover opacity-90" 
                                alt="Learning banner"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        </div>

                        <div class="lg:w-1/2 p-6 md:p-10">
                            <h1 class="font-bold text-2xl md:text-3xl text-center mb-8 text-gray-900">Welcome Back,<br> Let's Upgrade Skills</h1>
                            
                            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-5">
                                @csrf

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
                                            id="password"
                                            class="w-full pl-12 pr-12 py-3.5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition text-sm" 
                                            placeholder="Type your Password"
                                            required
                                        >

                                        <button type="button" onclick="togglePassword()" 
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors">
                                            <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                            </svg>
                                        </button>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-4">
                                    <a
                                        href="{{ route('password.request') }}"
                                        class="text-xs md:text-sm text-blue-600 hover:text-blue-700 font-semibold"
                                    >
                                        Forgot your password?
                                    </a>
                                </div>


                                <button 
                                    type="submit" 
                                    class="w-full mt-2 rounded-xl py-3.5 px-6 bg-blue-600 text-white font-semibold hover:bg-blue-700 hover:shadow-xl transition transform hover:-translate-y-0.5"
                                >
                                    Sign In to My Account
                                </button>
                            </form>

                            <p class="text-center text-sm text-gray-600 mt-6">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Sign Up</a>
                            </p>
                        </div>

                    </div>
                </div>
                
            </div>
        </main>

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

        <script>
            function togglePassword() {
                const input = document.getElementById('password');
                const iconOpen = document.getElementById('eye-open');
                const iconClosed = document.getElementById('eye-closed');

                if (input.type === "password") {
                    input.type = "text";
                    iconOpen.classList.add('hidden');
                    iconClosed.classList.remove('hidden');
                } else {
                    input.type = "password";
                    iconOpen.classList.remove('hidden');
                    iconClosed.classList.add('hidden');
                }
            }
        </script>
    </body>
</html>