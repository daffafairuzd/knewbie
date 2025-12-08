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
        <x-nav-dashboard/>
        
        <section id="HeroSection">
            <div class="bg-[url('{{ asset('assets/images/backgrounds/learning-finished.png') }}')] bg-cover rounded-3xl mx-4 md:mx-20 text-center">
                <h1 class="pt-24 font-semibold text-xl text-white px-4">
                    👋 Selamat datang, {{ Auth::user()->name }} !  <br> 
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

        <section id="Course" class="py-10">
            <div class="mx-4 md:mx-20">
                <h1 class="font-bold text-2xl mb-6">Course Catalog</h1>

                @foreach ($coursesByCategory as $categoryName => $courses)
                    <div class="relative overflow-hidden mb-6">
                        <h2 class="font-semibold text-lg mb-3 px-1">{{ $categoryName }}</h2>
                        <div id="carousel-{{ Str::slug($categoryName) }}" class="flex transition-transform duration-500 ease-in-out gap-4 overflow-x-auto pb-4 hide-scroll">

                            @foreach ($courses as $course)
                                <a href="{{ route('dashboard.course.details', $course->slug) }}" 
                                   class="block min-w-[calc(25%-12px)] flex-shrink-0 bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition h-72 w-40 cursor-pointer">
                                    
                                    <img
                                        src="{{ asset('storage/' . $course->thumbnail) }}"
                                        class="w-full h-36 object-cover"
                                        alt="{{ $course->name }}"
                                    >
                                    <div class="p-4 h-24">
                                        <h3 class="font-bold text-sm mb-2 line-clamp-2 text-gray-900">
                                            {{ $course->name }}
                                        </h3>

                                        <div class="flex items-center gap-2 text-xs text-gray-600 mb-1.5">
                                            <span class="line-clamp-1">
                                                {{ $course->about }}
                                            </span>
                                        </div>

                                        <div class="flex items-center gap-2 text-xs text-gray-600">
                                            <span>{{ $course->is_popular ? 'Populer' : 'Kursus' }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <script>
            const carousel = document.getElementById('carousel'); 
            // Catatan: Script ini mungkin perlu penyesuaian jika ingin berjalan di banyak kategori sekaligus,
            // namun sesuai permintaan saya biarkan sama seperti kode asli Anda.
            
            const prevBtn = document.getElementById('prev');
            const nextBtn = document.getElementById('next');
            const dotsContainer = document.getElementById('dots');
            
            if (carousel) { // Pengecekan agar tidak error jika elemen tidak ditemukan
                const cards = carousel.children;
                const totalCards = cards.length;
                let currentIndex = 0;
                let autoSlideInterval;

                function getVisibleCards() {
                    if (window.innerWidth >= 1024) return 4;
                    if (window.innerWidth >= 768) return 3;
                    return 1;
                }

                function getCardWidth() {
                    return cards[0].offsetWidth + 16; 
                }

                function updateCarousel() {
                    const cardWidth = getCardWidth();
                    const offset = -currentIndex * cardWidth;
                    carousel.style.transform = `translateX(${offset}px)`;
                    updateDots();
                }

                function createDots() {
                    if(!dotsContainer) return;
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

                function updateDots() {
                    if(!dotsContainer) return;
                    const dots = dotsContainer.children;
                    for (let i = 0; i < dots.length; i++) {
                        if (i === currentIndex) {
                            dots[i].className = 'w-8 h-2 rounded-full bg-blue-600 transition-all duration-300';
                        } else {
                            dots[i].className = 'w-2 h-2 rounded-full bg-gray-300 transition-all duration-300';
                        }
                    }
                }

                function nextSlide() {
                    const maxIndex = Math.max(0, totalCards - getVisibleCards());
                    currentIndex = (currentIndex + 1) % (maxIndex + 1);
                    updateCarousel();
                }

                function prevSlide() {
                    const maxIndex = Math.max(0, totalCards - getVisibleCards());
                    currentIndex = (currentIndex - 1 + maxIndex + 1) % (maxIndex + 1);
                    updateCarousel();
                }

                function startAutoSlide() {
                    autoSlideInterval = setInterval(nextSlide, 5000);
                }

                function resetAutoSlide() {
                    clearInterval(autoSlideInterval);
                    startAutoSlide();
                }

                if(nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        nextSlide();
                        resetAutoSlide();
                    });
                }

                if(prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        prevSlide();
                        resetAutoSlide();
                    });
                }

                createDots();
                updateCarousel();
                startAutoSlide();

                window.addEventListener('resize', () => {
                    createDots();
                    updateCarousel();
                });

                carousel.parentElement.addEventListener('mouseenter', () => {
                    clearInterval(autoSlideInterval);
                });

                carousel.parentElement.addEventListener('mouseleave', () => {
                    startAutoSlide();
                });
            }
        </script>

    </body>
</html>