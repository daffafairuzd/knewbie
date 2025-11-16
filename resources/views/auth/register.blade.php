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
                            <h1 class="font-bold text-2xl md:text-3xl text-center mb-8 text-gray-900">Upgrade Your Skills</h1>
                            
                            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-5" enctype="multipart/form-data">
                                @csrf

                                <!-- Add Photo Section -->
                                <label class="relative flex items-center gap-3">
                                    <button id="upload-photo" type="button"
                                        class="relative w-[90px] h-[90px] flex rounded-full overflow-hidden border border-obito-grey focus:ring-obito-green transition-all duration-300">
                                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 font-semibold text-sm">
                                            Add <br>Photo
                                        </span>
                                        <img id="photo-preview" src="" class="w-full h-full object-cover hidden" alt="photo">
                                    </button>
                                    <button id="delete-photo" type="button"
                                        class="rounded-full w-fit py-[6px] px-[10px] bg-obito-light-red font-bold text-xs text-obito-red hidden">DELETE
                                        PHOTO</button>
                                    <input id="hidden-input" name="photo" type="file" accept="image/*"
                                        class="absolute -z-10 opacity-0">
                                </label>
                                <x-input-error :messages="$errors->get('photo')" class="mt-2" />

                                <!-- Complete Name -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Complete Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your Complete Name" required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Occupation -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Occupation</label>
                                    <input type="text" name="occupation" value="{{ old('occupation') }}"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your Occupation" required>
                                    <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Email Address</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your valid email address" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Password</label>
                                    <input type="password" name="password" 
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Type your Password" required>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="flex flex-col gap-2">
                                    <label class="text-sm font-semibold text-gray-700">Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                           class="w-full py-3 px-5 rounded-xl border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none text-sm" 
                                           placeholder="Confirm your Password" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <button type="submit"
                                        class="w-full mt-4 rounded-xl py-3.5 px-6 bg-blue-600 text-white font-semibold hover:bg-blue-700 hover:shadow-xl transition transform hover:-translate-y-0.5">
                                    Create My Account
                                </button>
                            </form>

                            <!-- Footer -->
                            <p class="text-center text-sm text-gray-600 mt-6">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Sign In</a>
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
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const uploadButton = document.getElementById('upload-photo');
                const hiddenInput = document.getElementById('hidden-input');
                const photoPreview = document.getElementById('photo-preview');
                const deleteButton = document.getElementById('delete-photo');
                const uploadText = document.getElementById('upload-text');

                // 1. Logika Klik Tombol ke Input File
                uploadButton.addEventListener('click', () => {
                    // Memicu klik pada input file tersembunyi
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
                            uploadText.classList.add('hidden'); // Sembunyikan teks "Add Photo"
                            deleteButton.classList.remove('hidden'); // Tampilkan tombol delete
                        };

                        reader.readAsDataURL(file);
                    }
                });
                
                // 3. Logika Hapus Foto (Reset Input dan Preview)
                deleteButton.addEventListener('click', () => {
                    // Reset nilai input file (penting agar tidak terkirim)
                    hiddenInput.value = ''; 
                    
                    // Sembunyikan preview dan tampilkan teks
                    photoPreview.src = '';
                    photoPreview.classList.add('hidden');
                    uploadText.classList.remove('hidden');
                    deleteButton.classList.add('hidden');
                });
            });
        </script>
    </body>
</html>
