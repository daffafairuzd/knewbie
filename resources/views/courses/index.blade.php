<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <title>Knewbie - Learn Anytime, Anywhere</title>
        <meta name="description" content="Knewbie is an innovative online learning platform that empowers students and professionals with high-quality, accessible courses.">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-['Poppins']">
        <x-nav-guest/>
        
        <!-- Hero Section -->
        <section id="HeroSection">
            <div class="bg-[url('{{ asset('assets/images/backgrounds/learning-finished.png') }}')] bg-cover rounded-3xl mx-4 md:mx-20 text-center">
                <h1 class="pt-24 font-semibold text-xl text-white px-4">
                    👋 Selamat datang, Amelia! <br> 
                    Semoga harimu penuh semangat belajar dan inspirasi. 🌟
                </h1>
                <form class="py-10 max-w-xl mx-auto px-4" onsubmit="event.preventDefault();">
                    <div class="flex items-center bg-white rounded-full shadow-md px-5 py-2.5 gap-3">
                        <input 
                            type="search" 
                            placeholder="Yuk, jelajahi materi seru yang kamu suka!" 
                            class="w-full text-center text-sm md:text-base text-gray-600 placeholder-gray-400 outline-none border-none bg-transparent"
                        />
                        <button type="submit" class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M16 16L20 20" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Course Catalog Section -->
        <section id="Course" class="py-10">
            <div class="mx-4 md:mx-20">
                <h1 class="font-bold text-2xl mb-6">Course Catalog</h1>
                
                <!-- Carousel Container -->
                <div class="relative overflow-hidden">
                    <div id="carousel" class="flex transition-transform duration-500 ease-in-out gap-4">
                        <!-- Card 1 -->
                        <div class="min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40">
                            <img 
                                src="{{ asset('assets/images/thumbnails/thumbnail-1.png') }}" 
                                class="w-full h-36 object-cover" 
                                alt="course"
                            >
                            <div class="p-4 h-24">
                                <h3 class="font-bold text-sm mb-2 line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>Algoritma</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>1694 Lessons</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ready to Work</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40">
                            <img 
                                src="{{ asset('assets/images/thumbnails/thumbnail-2.png') }}" 
                                class="w-full h-36 object-cover" 
                                alt="course"
                            >
                            <div class="p-4 h-24">
                                <h3 class="font-bold text-sm mb-2 line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>Algoritma</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>1694 Lessons</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ready to Work</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40">
                            <img 
                                src="{{ asset('assets/images/thumbnails/thumbnail-3.png') }}" 
                                class="w-full h-36 object-cover" 
                                alt="course"
                            >
                            <div class="p-4 h-24">
                                <h3 class="font-bold text-sm mb-2 line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>Algoritma</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>1694 Lessons</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ready to Work</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40">
                            <img 
                                src="{{ asset('assets/images/thumbnails/thumbnail-4.png') }}" 
                                class="w-full h-36 object-cover" 
                                alt="course"
                            >
                            <div class="p-4 h-24">
                                <h3 class="font-bold text-sm mb-2 line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>Algoritma</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>1694 Lessons</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ready to Work</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40">
                            <img 
                                src="{{ asset('assets/images/thumbnails/thumbnail-5.png') }}" 
                                class="w-full h-36 object-cover" 
                                alt="course"
                            >
                            <div class="p-4 h-24">
                                <h3 class="font-bold text-sm mb-2 line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>Algoritma</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>1694 Lessons</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ready to Work</span>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 -->
                        <div class="min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40">
                            <img 
                                src="{{ asset('assets/images/thumbnails/thumbnail-6.png') }}" 
                                class="w-full h-36 object-cover" 
                                alt="course"
                            >
                            <div class="p-4 h-24">
                                <h3 class="font-bold text-sm mb-2 line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                    <span>Algoritma</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    <span>1694 Lessons</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-gray-600">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ready to Work</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Navigation Arrows -->
                    <button 
                        id="prev" 
                        class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition"
                    >
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button 
                        id="next" 
                        class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-3 rounded-full shadow-lg transition"
                    >
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>

                <!-- Dots Indicator -->
                <div class="flex justify-center gap-2 mt-6" id="dots"></div>
            </div>
        </section>

        <!-- JavaScript Carousel -->
        <script>
            const carousel = document.getElementById('carousel');
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');
            const dotsContainer = document.getElementById('dots');
            
            const cards = carousel.children;
            const totalCards = cards.length;
            let currentIndex = 0;
            let autoSlideInterval;

            // Calculate visible cards based on screen width
            function getVisibleCards() {
                if (window.innerWidth >= 1024) return 4; // Desktop: 4 cards
                if (window.innerWidth >= 768) return 3;  // Tablet: 3 cards
                return 1; // Mobile: 1 card
            }

            // Calculate card width including gap
            function getCardWidth() {
                return cards[0].offsetWidth + 24; // 24px = gap-6
            }

            // Update carousel position
            function updateCarousel() {
                const cardWidth = getCardWidth();
                const offset = -currentIndex * cardWidth;
                carousel.style.transform = `translateX(${offset}px)`;
                updateDots();
            }

            // Create dots
            function createDots() {
                dotsContainer.innerHTML = '';
                const maxIndex = Math.max(0, totalCards - getVisibleCards());
                for (let i = 0; i <= maxIndex; i++) {
                    const dot = document.createElement('button');
                    dot.className = 'w-2 h-2 rounded-full transition-all duration-300';
                    dot.onclick = () => {
                        currentIndex = i;
                        updateCarousel();
                        resetAutoSlide();
                    };
                    dotsContainer.appendChild(dot);
                }
                updateDots();
            }

            // Update dots active state
            function updateDots() {
                const dots = dotsContainer.children;
                for (let i = 0; i < dots.length; i++) {
                    if (i === currentIndex) {
                        dots[i].className = 'w-8 h-2 rounded-full bg-blue-600 transition-all duration-300';
                    } else {
                        dots[i].className = 'w-2 h-2 rounded-full bg-gray-300 transition-all duration-300';
                    }
                }
            }

            // Next slide
            function nextSlide() {
                const maxIndex = Math.max(0, totalCards - getVisibleCards());
                currentIndex = (currentIndex + 1) % (maxIndex + 1);
                updateCarousel();
            }

            // Previous slide
            function prevSlide() {
                const maxIndex = Math.max(0, totalCards - getVisibleCards());
                currentIndex = (currentIndex - 1 + maxIndex + 1) % (maxIndex + 1);
                updateCarousel();
            }

            // Auto slide every 5 seconds
            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000); // Slide every 5 seconds
            }

            // Reset auto slide timer
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }

            // Event listeners
            nextBtn.addEventListener('click', () => {
                nextSlide();
                resetAutoSlide();
            });

            prevBtn.addEventListener('click', () => {
                prevSlide();
                resetAutoSlide();
            });

            // Initialize
            createDots();
            updateCarousel();
            startAutoSlide();

            // Handle window resize
            window.addEventListener('resize', () => {
                createDots();
                updateCarousel();
            });

            // Pause auto-slide on hover
            carousel.parentElement.addEventListener('mouseenter', () => {
                clearInterval(autoSlideInterval);
            });

            carousel.parentElement.addEventListener('mouseleave', () => {
                startAutoSlide();
            });
        </script>

    </body>
</html>