<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>Sign Up - Knewbie</title>
        <meta name="description" content="Knewbie is an innovative online learning platform.">

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/logo-64.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/logo-64.png') }}">

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
                            <h1 class="font-bold text-2xl md:text-3xl text-center mb-8 text-gray-900">Upgrade Your Skills</h1>
                            
                            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-5" enctype="multipart/form-data">
                                @csrf

                                <label class="relative flex items-center gap-3">
                                    <button id="upload-photo" type="button"
                                        class="relative w-[90px] h-[90px] flex rounded-full overflow-hidden border border-gray-300 focus:ring-2 focus:ring-blue-500 transition-all duration-300 bg-white items-center justify-center">
                                        
                                        <span id="placeholder-text" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 font-semibold text-sm text-center text-gray-500 pointer-events-none">
                                            Add <br>Photo
                                        </span>
                                        
                                        <img id="photo-preview" src="" class="w-full h-full object-cover hidden" alt="photo">
                                    </button>
                                    
                                    <button id="delete-photo" type="button"
                                        class="rounded-full w-fit py-[6px] px-[10px] bg-red-100 font-bold text-xs text-red-500 hidden hover:bg-red-200 transition-colors">
                                        DELETE PHOTO
                                    </button>
                                    
                                    <input id="hidden-input" name="photo" type="file" accept="image/*"
                                        class="absolute -z-10 opacity-0">
                                </label>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Complete Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your Complete Name" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Occupation</label>
                                    <input type="text" name="occupation" value="{{ old('occupation') }}"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your Occupation" required>
                                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your valid email address" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Password</label>
                                    <div class="relative">
                                        <input type="password" name="password" id="password"
                                            class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm pr-12" 
                                            placeholder="Type your Password" required>
                                        <button type="button" onclick="togglePassword('password', 'icon-password')" 
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors">
                                            <svg id="icon-password-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <svg id="icon-password-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                            </svg>
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Confirm Password</label>
                                    <div class="relative">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm pr-12" 
                                            placeholder="Confirm your Password" required>
                                        <button type="button" onclick="togglePassword('password_confirmation', 'icon-confirmation')" 
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors">
                                            <svg id="icon-confirmation-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <svg id="icon-confirmation-closed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                            </svg>
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <button type="submit"
                                        class="w-full mt-4 rounded-xl py-3.5 px-6 bg-blue-600 text-white font-semibold hover:bg-blue-700 hover:shadow-xl transition transform hover:-translate-y-0.5">
                                    Create My Account
                                </button>
                            </form>

                            <p class="text-center text-sm text-gray-600 mt-6">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Sign In</a>
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
            document.addEventListener('DOMContentLoaded', () => {
                const uploadButton = document.getElementById('upload-photo');
                const hiddenInput = document.getElementById('hidden-input');
                const photoPreview = document.getElementById('photo-preview');
                const deleteButton = document.getElementById('delete-photo');
                const placeholderText = document.getElementById('placeholder-text'); 

                // 1. Logika Klik Tombol ke Input File
                uploadButton.addEventListener('click', (e) => {
                    e.preventDefault(); 
                    hiddenInput.click(); 
                });

                // 2. Logika Pratinjau Foto (Preview)
                hiddenInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const file = this.files[0];
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            photoPreview.src = e.target.result;
                            photoPreview.classList.remove('hidden');
                            placeholderText.classList.add('hidden'); 
                            deleteButton.classList.remove('hidden'); 
                        };

                        reader.readAsDataURL(file);
                    }
                });
                
                // 3. Logika Hapus Foto
                deleteButton.addEventListener('click', (e) => {
                    e.preventDefault();
                    hiddenInput.value = ''; 
                    photoPreview.src = '';
                    photoPreview.classList.add('hidden');
                    placeholderText.classList.remove('hidden');
                    deleteButton.classList.add('hidden');
                });
            });
        </script>

        <script>
            function togglePassword(inputId, iconBaseId) {
                const input = document.getElementById(inputId);
                const iconOpen = document.getElementById(iconBaseId + '-open');
                const iconClosed = document.getElementById(iconBaseId + '-closed');

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