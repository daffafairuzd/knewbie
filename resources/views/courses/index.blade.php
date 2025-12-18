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
                
                <!-- FIXED SEARCH FORM -->
                <form action="{{ route('dashboard.search.courses') }}" method="GET" class="py-10 max-w-xl mx-auto px-4">
                    <div class="flex items-center bg-white rounded-full shadow-md px-5 py-2.5 gap-3">
                        <input 
                            type="search" 
                            name="search"
                            placeholder="Yuk, jelajahi materi seru yang kamu suka!" 
                            class="w-full text-center text-sm md:text-base text-gray-600 placeholder-gray-400 outline-none border-none bg-transparent"
                            required
                        />
                        <button type="submit" class="flex items-center justify-center hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400 hover:text-blue-600 transition-colors" viewBox="0 0 24 24" fill="none">
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

        <style>
            /* Hide scrollbar but keep functionality */
            .hide-scroll {
                scrollbar-width: none; /* Firefox */
                -ms-overflow-style: none; /* IE and Edge */
            }
            .hide-scroll::-webkit-scrollbar {
                display: none; /* Chrome, Safari, Opera */
            }
        </style>

        <script>
            // Carousel functionality for multiple categories
            document.addEventListener('DOMContentLoaded', function() {
                const carousels = document.querySelectorAll('[id^="carousel-"]');
                
                carousels.forEach(carousel => {
                    // Add smooth scroll behavior
                    carousel.style.scrollBehavior = 'smooth';
                });
            });
        </script>

    </body>
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
</html>