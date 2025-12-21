<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>Knewbie - Pricing</title>
        <meta name="description" content="Pilih paket langganan Knewbie yang cocok untuk kebutuhan belajar kamu.">

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/logo-64.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/logo-64.png') }}">

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Knewbie - Pricing">
        <meta property="og:description" content="Pilih paket langganan Knewbie yang cocok untuk kebutuhan belajar kamu.">
        <meta property="og:image" content="{{ asset('assets/images/logos/logo-64-big.png') }}">
        <meta property="og:url" content="{{ url('/pricing') }}">
        <meta property="og:type" content="website">

        
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- OWL CAROUSEL CSS -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

        <style>
            body {
                background-color: #F4F7FF;
            }

            
            .pricing-carousel-wrapper {
                position: relative;
                overflow-x: hidden;  
                overflow-y: visible;
                padding-inline: 0;
            }

            
            .pricing-carousel .owl-stage-outer {
                overflow: hidden !important;   
                padding-top: 36px;             
                padding-bottom: 18px;
                box-sizing: border-box;
            }

            
            .pricing-carousel .owl-item {
                padding: 12px 38px !important; 
            }


            .pricing-carousel .owl-nav {
                position: absolute;
                color: #0073FF;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                pointer-events: none;
            }

           .pricing-carousel .owl-nav button {
                width: 46px;
                height: 46px;
                border-radius: 50%;
                background: #ffffff;
                border: 1px solid rgba(0,0,0,0.08);      
                box-shadow: 0 4px 14px rgba(0,0,0,0.10); 
                color: #1D5BFF;                          
                font-size: 22px;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: auto;
                transition: all 0.2s ease;
            }

            .pricing-carousel .owl-nav button:hover {
                background: #F0F4FF;                     
                border-color: rgba(0,0,0,0.12);
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.12); 
            }


            @media (max-width: 768px) {
                .pricing-carousel .owl-nav {
                    position: static;
                    margin-top: 16px;
                    justify-content: center;
                    gap: 16px;
                }
            }

            /* CARD DEFAULT & ACTIVE (HIGHLIGHT) */
            .pricing-item {
                transition: all 0.25s ease;
                border-radius: 26px;
                width: 280px;      
                max-width: 280px;
                margin: 0;         
                box-sizing: border-box;
            }


            @media (min-width: 1024px) {
                .pricing-item {
                    max-width: 290px;
                }
            }

            .pricing-item--active {
                border: 4px solid #2563EB;
                box-shadow: 0 18px 40px rgba(15, 23, 42, 0.15);
                transform: translateY(-24px);
                background-color: #ffffff;
                position: relative;        
                z-index: 50; 
            }

            .pricing-item--active h2 {
                color: #2563EB;
            }
            .pricing-item--active a {
                background-color: #0073FF;
            }
        </style>
    </head>
    <body class="font-['Poppins']">
        @auth
            <x-nav-dashboard/>
        @else
            <x-nav-guest/>
        @endauth

        <main class="py-10 md:py-16 min-h-screen">
            <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-0">

                <section>
                    <div
                        class="relative rounded-[32px] overflow-hidden h-[260px] md:h-[320px] lg:h-[380px] bg-cover bg-center"
                        style="--bg-image: url('{{ asset('assets/images/backgrounds/learning-finished.png') }}'); background-image: var(--bg-image);"
                    >

                        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-black/10"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <h1 class="text-white font-extrabold text-2xl md:text-3xl lg:text-[32px] text-center">
                                Pricing For Everyone
                            </h1>
                        </div>
                    </div>

                    {{-- Carousel wrapper --}}
                    <div class="pricing-carousel-wrapper mt-[-90px] md:mt-[-110px] lg:mt-[-130px]">
                        <div class="pricing-carousel owl-carousel">
                            @foreach($pricing_packages as $package)
                            <div class="item">
                                <div class="pricing-item bg-white shadow-xl px-5 py-7 flex flex-col justify-between min-h-[260px]">
                                    <div class="space-y-3">
                                        <div>
                                            <h2 class="font-bold text-xl md:text-2xl">{{$package -> name}}</h2>
                                            <p class="text-xs md:text-sm text-gray-400">{{$package->duration}} months duration</p>
                                        </div>
                                        <p class="font-extrabold text-2xl md:text-[26px] leading-tight">
                                            Rp. {{number_format($package->price, 0, '','.')}}
                                        </p>

                                        <div class="mt-3">
                                            <p class="font-semibold text-sm md:text-base mb-2">Benefit</p>
                                            <ul class="space-y-1.5 text-sm text-gray-600">
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-500 mt-0.5">✔</span>
                                                    <span>Akses semua kelas</span>
                                                </li>
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-500 mt-0.5">✔</span>
                                                    <span>Paket Pembelajaran</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if ($user && $user->hasActiveSubscription())
                                        <a class="mt-24 w-full h-[50px] rounded-full text-white font-semibold text-sm md:text-base transition {{ $user && $user->hasActiveSubscription() ? 'bg-gray-500' : 'bg-blue-600 hover:bg-blue-700' }} flex items-center justify-center">
                                            You've Subscribed
                                        </a>
                                    @else
                                        @if (!$user)
                                            <a
                                                href="{{ route('login') }}"
                                                class="mt-24 w-full h-[50px] rounded-full bg-gray-500 text-white font-semibold text-sm md:text-base hover:shadow-lg hover:bg-blue-700 transition flex items-center justify-center"
                                                type="button">
                                                GET NOW
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('front.checkout', $package) }}"
                                                class="mt-24 w-full h-[50px] rounded-full bg-gray-500 text-white font-semibold text-sm md:text-base hover:shadow-lg hover:bg-blue-700 transition flex items-center justify-center"
                                                type="button">
                                                GET NOW
                                            </a>
                                        @endif
                                    @endif

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>

            </div>
        </main>
        <footer class="bg-[#0E1E46] text-white mt-20">
            <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-0 py-10">

                <div class="flex flex-col md:flex-row items-start justify-between gap-8">

                    {{-- Left --}}
                    <div class="space-y-3 max-w-sm">
                        <h3 class="text-2xl font-bold">KNewbie</h3>
                        <p class="text-sm leading-relaxed text-white/80">
                            Platform pembelajaran interaktif untuk membantu kamu menjadi expert dari basic.
                        </p>
                    </div>
                </div>

                <div class="border-t border-white/10 mt-10 pt-6 text-center text-xs text-white/60">
                    © {{ date('Y') }} KNewbie — All rights reserved.
                </div>

            </div>
        </footer>


        <!-- jQuery & OWL CAROUSEL JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <script>
            $(document).ready(function () {
                var $carousel = $('.pricing-carousel');

                function setActiveItem(event) {
                    if (!event.item) return;
                    var idx = event.item.index;
                    var $items = $(event.target).find('.owl-item');

                    $items.find('.pricing-item').removeClass('pricing-item--active');
                    $items.eq(idx).find('.pricing-item').addClass('pricing-item--active');
                }

                $carousel.on('initialized.owl.carousel changed.owl.carousel', setActiveItem);

                $carousel.owlCarousel({
                    loop: true,
                    margin: 0,    
                    dots: false,
                    nav: true,
                    navText: ['&#10094;', '&#10095;'],
                    center: true,
                    stagePadding: 50,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1024: {
                            items: 3
                        }
                    }
                });
            });
        </script>

        <!-- Script toggle hamburger nav (sama seperti halaman lain) -->
        <script>
            const hamburger = document.getElementById('hamburger');
            const mobileMenu = document.getElementById('mobile-menu');

            if (hamburger && mobileMenu) {
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
            }
        </script>
    </body>
</html>
