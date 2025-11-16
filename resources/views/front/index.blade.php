<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>Knewbie - Learn Anytime, Anywhere</title>
        <meta name="description" content="Knewbie is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/logo-64.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/logo-64.png') }}">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Knewbie - Learn Anytime, Anywhere">
        <meta property="og:description" content="Knewbie is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">
        <meta property="og:image" content="{{ asset('assets/images/logos/logo-64-big.png') }}">
        <meta property="og:url" content="{{ url('/') }}">
        <meta property="og:type" content="website">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-['Poppins']">
        <nav id="nav-guest" class="flex w-full bg-white border-b border-gray-200 relative">
            <div class="flex w-full max-w-[1280px] px-4 md:px-8 lg:px-[75px] py-5 items-center mx-auto">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex shrink-0 z-50">
                    <h1 class="font-bold text-xl md:text-2xl">Knewbie</h1>
                </a>

                <!-- Desktop Menu -->
                <ul class="hidden lg:flex items-center gap-8 ml-12">
                    <li class="hover:font-semibold transition-all duration-300 font-semibold">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="hover:font-semibold transition-all duration-300">
                        <a href="{{ url('/pricing') }}">Pricing</a>
                    </li>
                    <li class="hover:font-semibold transition-all duration-300">
                        <a href="{{ url('/features') }}">Features</a>
                    </li>
                    <li class="hover:font-semibold transition-all duration-300">
                        <a href="{{ url('/testimonials') }}">Testimonials</a>
                    </li>
                </ul>
                
                <!-- Desktop Right Side -->
                <div class="hidden lg:flex items-center gap-5 ml-auto">
                    <a href="{{ url('/messages') }}" class="flex shrink-0">
                        <img src="{{ asset('assets/images/icons/device-message.svg') }}" class="flex shrink-0" alt="icon">
                    </a>
                    <div class="h-[50px] flex shrink-0 bg-gray-200 w-px"></div>
                    
                    <div class="flex items-center gap-3">
                        <a href="{{ route('register') }}" class="rounded-full border border-gray-200 py-3 px-5 bg-white hover:border-blue-600 transition-all duration-300">
                            <span class="font-semibold">Sign Up</span>
                        </a>
                        <a href="{{ route('login') }}" class="rounded-full py-3 px-5 bg-blue-600 hover:shadow-lg transition-all duration-300">
                            <span class="font-semibold text-white">My Account</span>
                        </a>
                    </div>
                </div>

                <!-- Mobile: Hamburger Button -->
                <button id="hamburger" class="lg:hidden flex flex-col gap-1.5 z-50 ml-auto" aria-label="Toggle menu">
                    <span class="w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out"></span>
                    <span class="w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out"></span>
                    <span class="w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out"></span>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden absolute top-full left-0 w-full bg-white border-b border-gray-200 shadow-lg z-40">
                <div class="flex flex-col px-4 py-6 space-y-4">
                    <a href="{{ url('/') }}" class="font-semibold text-gray-900 hover:text-blue-600 py-2 border-b border-gray-100">
                        Home
                    </a>
                    <a href="{{ url('/pricing') }}" class="font-medium text-gray-700 hover:text-blue-600 py-2 border-b border-gray-100">
                        Pricing
                    </a>
                    <a href="{{ url('/features') }}" class="font-medium text-gray-700 hover:text-blue-600 py-2 border-b border-gray-100">
                        Features
                    </a>
                    <a href="{{ url('/testimonials') }}" class="font-medium text-gray-700 hover:text-blue-600 py-2 border-b border-gray-100">
                        Testimonials
                    </a>

                    <div class="flex flex-col gap-3 pt-4">
                        <a href="{{ route('register') }}" class="rounded-full border border-gray-200 py-3 px-5 bg-white hover:border-blue-600 transition-all duration-300 text-center">
                            <span class="font-semibold">Sign Up</span>
                        </a>
                        <a href="{{ route('login') }}" class="rounded-full py-3 px-5 bg-blue-600 hover:shadow-lg transition-all duration-300 text-center">
                            <span class="font-semibold text-white">My Account</span>
                        </a>
                    </div>

                    <a href="{{ url('/messages') }}" class="flex items-center gap-2 py-2 text-gray-700 hover:text-blue-600">
                        <img src="{{ asset('assets/images/icons/device-message.svg') }}" class="w-5 h-5" alt="icon">
                        <span class="font-medium">Messages</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex flex-1 items-center py-8 md:py-[50px]">
            <div class="w-full flex flex-col lg:flex-row gap-8 lg:gap-[77px] justify-between items-center px-4 md:px-8 lg:pl-[calc(((100%-1280px)/2)+75px)]">
                
                <!-- Text Content -->
                <div class="flex flex-col w-full lg:max-w-[500px] gap-8 md:gap-[50px]">
                    <div class="flex flex-col gap-6 md:gap-[30px]">
                        <!-- Badge -->
                        <p class="flex items-center gap-[6px] w-fit rounded-full py-2 px-3 md:px-[14px] bg-blue-100">
                            <img src="{{ asset('assets/images/icons/crown-green.svg') }}" class="flex shrink-0 w-4 md:w-5" alt="icon">
                            <span class="font-bold text-xs md:text-sm">TRUSTED BY 500 FORTUNE COMPANIES</span>
                        </p>
                        
                        <!-- Heading & Description -->
                        <div>
                            <h1 class="font-extrabold text-3xl md:text-4xl lg:text-[40px] leading-tight md:leading-[65px]">
                                Upgrade Skills, <br>Get Higher Salary
                            </h1>
                            <p class="leading-6 md:leading-7 mt-3 md:mt-[10px] text-gray-600 text-sm md:text-base">
                                Materi terbaru disusun oleh professional dan perusahaan besar agar lebih sesuai kebutuhan dan anda lorem dolorsi.
                            </p>
                        </div>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 md:gap-[18px]">
                            <a href="{{ url('/pricing') }}" class="flex items-center justify-center rounded-full h-[55px] md:h-[67px] py-4 md:py-5 px-6 md:px-[30px] bg-blue-600 hover:shadow-lg transition-all duration-300">
                                <span class="text-white font-semibold text-base md:text-lg">Get Started</span>
                            </a>
                            <a href="{{ url('/how-it-works') }}" class="flex items-center justify-center rounded-full h-[55px] md:h-[67px] border border-gray-200 py-4 md:py-5 px-6 md:px-[30px] bg-white gap-2 md:gap-[10px] hover:border-blue-600 transition-all duration-300">
                                <img src="{{ asset('assets/images/icons/play-circle-fill.svg') }}" class="size-6 md:size-8 flex shrink-0" alt="icon">
                                <span class="font-semibold text-base md:text-lg">How It Works</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Social Proof -->
                    <div class="flex items-center gap-3 md:gap-[14px]">
                        <img src="{{ asset('assets/images/photos/group.png') }}" class="flex shrink-0 h-[40px] md:h-[50px]" alt="group photo">
                        <div>
                            <div class="flex gap-1 items-center">
                                <div class="flex">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0 w-4 md:w-5" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0 w-4 md:w-5" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0 w-4 md:w-5" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0 w-4 md:w-5" alt="star">
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0 w-4 md:w-5" alt="star">
                                </div>
                                <span class="font-bold text-sm md:text-base">5.0</span>
                            </div>
                            <p class="font-bold mt-1 text-sm md:text-base">Join Millions Developer</p>
                        </div>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="flex shrink-0 w-full lg:w-[666px] h-auto lg:h-[590px] justify-center lg:justify-end">
                    <img src="{{ asset('assets/images/backgrounds/hero-image.png') }}" class="w-full h-auto max-w-md lg:max-w-none object-contain" alt="hero-image">
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