<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title>Course Details - KNewbie</title>
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            /* Style khusus untuk animasi accordion */
            .accordion-content {
                transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
                max-height: 0;
                opacity: 0;
                overflow: hidden;
            }
            .accordion-content.active {
                max-height: 500px;
                opacity: 1;
            }
            .chevron {
                transition: transform 0.3s ease;
            }
            .chevron.rotate {
                transform: rotate(180deg);
            }
        </style>
    </head>
    <body class="font-['Poppins'] bg-[#F4F7FB] text-[#1E1E1E]">
        
       <x-nav-dashboard/>

        <main class="py-10 px-4 md:px-6">
            <div class="max-w-[1100px] mx-auto bg-white rounded-[30px] p-6 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.04)]">
                
                <section class="flex flex-col lg:flex-row gap-8 lg:gap-12 mb-12">
                    <div class="w-full lg:w-[420px] h-[280px] md:h-[300px] shrink-0 rounded-[20px] overflow-hidden relative group">
                        <img src="{{ asset('storage/' .  $course->thumbnail) }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" alt="Course Thumbnail">
                    </div>
                    <div class="flex flex-col justify-center w-full">
                        <h1 class="font-bold text-2xl md:text-[32px] leading-[1.3] mb-6 text-[#1E1E1E]">
                            {{ $course->name }}
                        </h1>
                        <div class="flex flex-wrap gap-4 md:gap-8 mb-4">
                            @foreach($course->benefits as $benefit)
                                <div class="flex items-center gap-2 text-gray-600">
                                    <i class="fa-solid fa-circle-check text-gray-400"></i>
                                    <span class="text-sm font-medium">{{ $benefit->name }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            
                            <a href="{{ route('dashboard.course.join_success', $course->slug) }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#007BFF] hover:bg-blue-700 text-white rounded-full font-semibold transition-all hover:shadow-[0_10px_20px_rgba(0,123,255,0.3)]">
                                Start Learning Now
                            </a>

                            
                            <button class="inline-flex items-center justify-center px-8 py-3.5 bg-white border border-gray-200 hover:border-gray-400 text-[#1E1E1E] rounded-full font-semibold transition-all">
                                Add to Bookmark
                            </button>
                        </div>
                    </div>
                </section>

                <hr class="border-gray-100 mb-10">

                <section class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    
                    <div class="lg:col-span-5 flex flex-col gap-6">
                        <h3 class="font-bold text-lg">Course Instructors</h3>

                        @forelse ($course->courseMentors as $courseMentor)
                            @php
                                $mentor = $courseMentor->mentor;
                            @endphp

                            <div class="border border-[#F1F1F1] rounded-[20px] p-4 flex gap-4 bg-white">
                                <div class="w-[60px] h-[60px] shrink-0 rounded-full overflow-hidden">
                                    <img
                                        src="@if ($mentor && $mentor->photo)
                                                {{ asset('storage/' . $mentor->photo) }}
                                            @else
                                                {{ asset('assets/images/instructors/default.png') }}
                                            @endif"
                                        onerror="this.src='https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80'"
                                        class="w-full h-full object-cover"
                                    >
                                </div>
                                <div class="flex flex-col gap-1 w-full">
                                    <div class="flex justify-between items-center">
                                        <span class="font-bold text-sm">
                                            {{ $mentor?->name ?? 'Unknown Mentor' }}
                                        </span>
                                        <div class="flex items-center gap-1 text-[#FF9F43]">
                                            <i class="fa-solid fa-star text-[10px]"></i>
                                            <span class="font-bold text-xs">5.0</span>
                                        </div>
                                    </div>

                                    <span class="text-xs text-gray-400">
                                        {{ $mentor?->occupation ?? 'Mentor' }}
                                    </span>

                                    {{-- ABOUT dari course_mentors --}}
                                    <p class="text-xs text-gray-500 leading-relaxed mt-1 line-clamp-2">
                                        {{ $courseMentor->about ?? 'Mentor ini belum memiliki deskripsi.' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-400 italic">Belum ada mentor untuk kursus ini.</p>
                        @endforelse
                    </div>

                    <div class="lg:col-span-7">
                        <h3 class="font-bold text-lg mb-6">Upgrade Your Skills</h3>
                        
                        <div class="flex gap-3 mb-6">
                            <button onclick="switchTab('about')" id="tab-about" class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all border bg-white border-gray-200 text-gray-500 hover:bg-gray-50">
                                About
                            </button>
                            <button onclick="switchTab('lessons')" id="tab-lessons" class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all border border-transparent bg-[#007BFF] text-white shadow-lg shadow-blue-500/30">
                                Lessons
                            </button>
                        </div>

                        <div id="content-about" class="hidden text-gray-500 text-sm leading-[1.8] text-justify space-y-4">
                            {{$course->about}}
                        </div>

                        <div id="content-lessons" class="space-y-4">
                            @foreach ($course->courseSections as $i => $section)
                                <div class="border border-gray-200 rounded-[20px] overflow-hidden bg-white">
                                    <button onclick="toggleAccordion('acc-{{ $i }}', 'icon-{{ $i }}')"
                                            class="w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 transition-colors text-left">
                                        <span class="font-bold text-[#1E1E1E]">
                                            {{ $section->name }}
                                        </span>
                                        <i id="icon-{{ $i }}" class="fa-solid fa-chevron-down text-[#1E1E1E] chevron {{ $loop->first ? 'rotate' : '' }}"></i>
                                    </button>

                                    <div id="acc-{{ $i }}" class="accordion-content {{ $loop->first ? 'active' : '' }}">
                                        <div class="px-5 pb-5 flex flex-col gap-3">
                                            @foreach ($section->sectionContents as $content)
                                                <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-[#FAFAFA] hover:bg-white hover:border-blue-300 cursor-pointer transition-all">
                                                    <div class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-lg text-gray-500">
                                                        <i class="fa-solid fa-folder text-sm"></i>
                                                    </div>
                                                    <span class="font-medium text-sm text-gray-500">
                                                        {{ $content->name }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section>
            </div>
        </main>

        <script>
            // 1. Logic untuk Hamburger Menu
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if(hamburgerBtn && mobileMenu) {
                hamburgerBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    
                    // Ganti icon bars jadi X
                    const icon = hamburgerBtn.querySelector('i');
                    if (mobileMenu.classList.contains('hidden')) {
                        icon.classList.remove('fa-xmark');
                        icon.classList.add('fa-bars');
                    } else {
                        icon.classList.remove('fa-bars');
                        icon.classList.add('fa-xmark');
                    }
                });

                // Tutup menu kalau klik di luar area
                document.addEventListener('click', (e) => {
                    if (!hamburgerBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                        const icon = hamburgerBtn.querySelector('i');
                        if(icon) {
                            icon.classList.remove('fa-xmark');
                            icon.classList.add('fa-bars');
                        }
                    }
                });
            }

            // 2. Logic untuk Tab Switching
            function switchTab(tabName) {
                const tabAboutBtn = document.getElementById('tab-about');
                const tabLessonsBtn = document.getElementById('tab-lessons');
                const contentAbout = document.getElementById('content-about');
                const contentLessons = document.getElementById('content-lessons');

                const activeClasses = ['bg-[#007BFF]', 'text-white', 'shadow-lg', 'shadow-blue-500/30', 'border-transparent'];
                const inactiveClasses = ['bg-white', 'text-gray-500', 'border-gray-200', 'hover:bg-gray-50'];

                if (tabName === 'about') {
                    tabAboutBtn.classList.add(...activeClasses);
                    tabAboutBtn.classList.remove(...inactiveClasses);
                    tabLessonsBtn.classList.remove(...activeClasses);
                    tabLessonsBtn.classList.add(...inactiveClasses);
                    contentAbout.classList.remove('hidden');
                    contentLessons.classList.add('hidden');
                } else {
                    tabLessonsBtn.classList.add(...activeClasses);
                    tabLessonsBtn.classList.remove(...inactiveClasses);
                    tabAboutBtn.classList.remove(...activeClasses);
                    tabAboutBtn.classList.add(...inactiveClasses);
                    contentLessons.classList.remove('hidden');
                    contentAbout.classList.add('hidden');
                }
            }

            // 3. Logic untuk Accordion
            function toggleAccordion(contentId, iconId) {
                const content = document.getElementById(contentId);
                const icon = document.getElementById(iconId);

                if (content.classList.contains('active')) {
                    content.classList.remove('active');
                    icon.classList.remove('rotate');
                } else {
                    content.classList.add('active');
                    icon.classList.add('rotate');
                }
            }
        </script>
    </body>
</html>