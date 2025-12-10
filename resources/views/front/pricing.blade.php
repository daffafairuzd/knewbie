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

        <!-- Tailwind CDN (opsional, kalau sudah ada di output.css boleh dihapus) -->
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

            /* wrapper luar: nyembunyiin clone di kiri/kanan */
            .pricing-carousel-wrapper {
                position: relative;
                overflow: hidden;
                padding-inline: 0;
            }

            /* di dalam: shadow & card naik nggak kepotong */
            .pricing-carousel .owl-stage-outer {
                padding: 14px 0 10px;
                overflow: visible;
            }

            /* gap antar card diatur dari sini saja */
            .pricing-carousel .owl-item {
                padding: 0 8px; /* total jarak antar card = 16px */
            }

            .pricing-carousel .owl-nav {
                position: absolute;
                inset: 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                pointer-events: none;
            }

            .pricing-carousel .owl-nav button {
                width: 44px;
                height: 44px;
                border-radius: 9999px;
                background: #ffffff;
                border: none;
                box-shadow: 0 10px 25px rgba(15, 23, 42, 0.15);
                color: #2563EB;
                font-size: 22px;
                display: flex;
                align-items: center;
                justify-content: center;
                pointer-events: auto;
                transition: background 0.15s ease;
            }

            .pricing-carousel .owl-nav button:hover {
                background: #EFF6FF;
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
                max-width: 280px;
                margin-left: auto;
                margin-right: auto;
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
            }

            .pricing-item--active h2 {
                color: #2563EB;
            }
        </style>
    </head>
    <body class="font-['Poppins']">
        <x-nav-guest/>

        <main class="py-10 md:py-16 min-h-screen">
            <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-0">

                {{-- Banner / Hero Pricing --}}
                <section>
                    <div
                        class="relative rounded-[32px] overflow-hidden h-[260px] md:h-[320px] lg:h-[380px] bg-cover bg-center"
                        style="background-image: url('{{ asset('assets/images/backgrounds/learning-finished.png') }}');"
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
                            {{-- Student --}}
                            <div class="item">
                                <div class="pricing-item bg-white shadow-xl px-5 py-7 flex flex-col justify-between min-h-[260px]">
                                    <div class="space-y-3">
                                        <div>
                                            <h2 class="font-bold text-xl md:text-2xl">Student</h2>
                                            <p class="text-xs md:text-sm text-gray-400">Limited User</p>
                                        </div>
                                        <p class="font-extrabold text-2xl md:text-[26px] leading-tight">
                                            Rp. 99.000
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
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-500 mt-0.5">✔</span>
                                                    <span>Certificate</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <button
                                        class="mt-24 w-full h-[50px] rounded-full bg-blue-600 text-white font-semibold text-sm md:text-base hover:shadow-lg hover:bg-blue-700 transition"
                                        type="button"
                                    >
                                        GET NOW
                                    </button>
                                </div>
                            </div>

                            {{-- Normal --}}
                            <div class="item">
                                <div class="pricing-item bg-white shadow-xl px-5 py-7 flex flex-col justify-between min-h-[260px]">
                                    <div class="space-y-3">
                                        <div>
                                            <h2 class="font-bold text-xl md:text-2xl">Normal</h2>
                                            <p class="text-xs md:text-sm text-gray-400">Limited User</p>
                                        </div>
                                        <p class="font-extrabold text-2xl md:text-[26px] leading-tight">
                                            Rp. 149.000
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
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-500 mt-0.5">✔</span>
                                                    <span>Certificate</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <button
                                        class="mt-24 w-full h-[50px] rounded-full bg-blue-600 text-white font-semibold text-sm md:text-base hover:shadow-lg hover:bg-blue-700 transition"
                                        type="button"
                                    >
                                        GET NOW
                                    </button>
                                </div>
                            </div>

                            {{-- Sepuh --}}
                            <div class="item">
                                <div class="pricing-item bg-white shadow-xl px-5 py-7 flex flex-col justify-between min-h-[260px]">
                                    <div class="space-y-3">
                                        <div>
                                            <h2 class="font-bold text-xl md:text-2xl">Sepuh</h2>
                                            <p class="text-xs md:text-sm text-gray-400">Limited User</p>
                                        </div>
                                        <p class="font-extrabold text-2xl md:text-[26px] leading-tight">
                                            Rp. 449.000
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
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-500 mt-0.5">✔</span>
                                                    <span>Certificate</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <button
                                        class="mt-24 w-full h-[50px] rounded-full bg-blue-600 text-white font-semibold text-sm md:text-base hover:shadow-lg hover:bg-blue-700 transition"
                                        type="button"
                                    >
                                        GET NOW
                                    </button>
                                </div>
                            </div>

                            {{-- Ultimatum --}}
                            <div class="item">
                                <div class="pricing-item bg-white shadow-xl px-5 py-7 flex flex-col justify-between min-h-[260px]">
                                    <div class="space-y-3">
                                        <div>
                                            <h2 class="font-bold text-xl md:text-2xl">Ultimatum</h2>
                                            <p class="text-xs md:text-sm text-gray-400">Limited User</p>
                                        </div>
                                        <p class="font-extrabold text-2xl md:text-[26px] leading-tight">
                                            Rp. 649.000
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
                                                <li class="flex items-start gap-2">
                                                    <span class="text-green-500 mt-0.5">✔</span>
                                                    <span>Certificate</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <button
                                        class="mt-24 w-full h-[50px] rounded-full bg-blue-600 text-white font-semibold text-sm md:text-base hover:shadow-lg hover:bg-blue-700 transition"
                                        type="button"
                                    >
                                        GET NOW
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>

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
                    margin: 0,     // margin 0, gap hanya dari padding .owl-item
                    dots: false,
                    nav: true,
                    navText: ['&#10094;', '&#10095;'],
                    center: true,
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
