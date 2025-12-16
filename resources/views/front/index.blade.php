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
        <x-nav-guest/>
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
                            <a href="{{ route('login') }}" class="flex items-center justify-center rounded-full h-[55px] md:h-[67px] py-4 md:py-5 px-6 md:px-[30px] bg-blue-600 hover:shadow-lg transition-all duration-300">
                                <span class="text-white font-semibold text-base md:text-lg">Get Started</span>
                            </a>
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