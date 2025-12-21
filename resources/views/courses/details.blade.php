<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <title>Course Details - KNewbie</title>

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/logo-64.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/images/logos/logo-64.png') }}">
        
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            
            .accordion-content {
                transition: max-height 0.4s ease-in-out, opacity 0.4s ease-in-out, padding 0.4s;
                max-height: 0;
                opacity: 0;
                overflow: hidden;
            }
        
            .accordion-content.active {
                max-height: 2000px; 
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
                            
                            {{-- LOGIC: Mengambil Materi Pertama untuk Tombol Start Learning --}}
                            @php
                                $firstSection = $course->courseSections->first();
                                $firstContent = $firstSection ? $firstSection->sectionContents->first() : null;
                            @endphp

                            @if($firstSection && $firstContent)
                                {{-- Jika materi tersedia, link langsung ke halaman learning --}}
                                <a href="{{ route('dashboard.course.learning', [
                                        'course' => $course->slug, 
                                        'courseSection' => $firstSection->id, 
                                        'sectionContent' => $firstContent->id
                                   ]) }}" 
                                   class="inline-flex items-center justify-center px-8 py-3.5 bg-[#007BFF] hover:bg-blue-700 text-white rounded-full font-semibold transition-all hover:shadow-[0_10px_20px_rgba(0,123,255,0.3)]">
                                    Start Learning Now
                                </a>
                            @else
                                {{-- Fallback jika course belum ada isinya --}}
                                <button disabled class="inline-flex items-center justify-center px-8 py-3.5 bg-gray-300 text-gray-500 cursor-not-allowed rounded-full font-semibold transition-all">
                                    Start Learning Now
                                </button>
                            @endif
                        </div>
                    </div>
                </section>

                <hr class="border-gray-100 mb-10">

                <section class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    
                    {{-- SIDEBAR MENTOR --}}
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
                                    </div>

                                    <span class="text-xs text-gray-400">
                                        {{ $mentor?->occupation ?? 'Mentor' }}
                                    </span>

                                    <p class="text-xs text-gray-500 leading-relaxed mt-1 line-clamp-2">
                                        {{ $courseMentor->about ?? 'Mentor ini belum memiliki deskripsi.' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-400 italic">Belum ada mentor untuk kursus ini.</p>
                        @endforelse
                    </div>

                    {{-- MAIN CONTENT TABS --}}
                    <div class="lg:col-span-7">
                        <h3 class="font-bold text-lg mb-6">Upgrade Your Skills</h3>
                        
                        <div class="flex gap-3 mb-6">
                            {{-- TAB BUTTON: ABOUT (Default Active) --}}
                            <button onclick="switchTab('about')" id="tab-about" 
                                class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all border border-transparent bg-[#007BFF] text-white shadow-lg shadow-blue-500/30">
                                About
                            </button>
                            
                            {{-- TAB BUTTON: LESSONS (Default Inactive) --}}
                            <button onclick="switchTab('lessons')" id="tab-lessons" 
                                class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all border bg-white border-gray-200 text-gray-500 hover:bg-gray-50">
                                Lessons
                            </button>
                        </div>

                        {{-- CONTENT: ABOUT --}}
                        <div id="content-about" class="text-gray-500 text-sm leading-[1.8] text-justify space-y-4">
                            {{$course->about}}
                        </div>

                        {{-- CONTENT: LESSONS (Default Hidden) --}}
                        <div id="content-lessons" class="space-y-4 hidden">
                            @foreach ($course->courseSections as $i => $section)
                                <div class="border border-gray-200 rounded-[20px] overflow-hidden bg-white">
                                    <button onclick="toggleAccordion('acc-{{ $i }}', 'icon-{{ $i }}')"
                                            class="w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 transition-colors text-left focus:outline-none">
                                        <span class="font-bold text-[#1E1E1E]">
                                            {{ $section->name }}
                                        </span>
                                        <i id="icon-{{ $i }}" class="fa-solid fa-chevron-down text-[#1E1E1E] chevron {{ $loop->first ? 'rotate' : '' }}"></i>
                                    </button>

                                    {{-- Accordion Body --}}
                                    <div id="acc-{{ $i }}" class="accordion-content {{ $loop->first ? 'active' : '' }}">
                                        <div class="px-5 pb-5 flex flex-col gap-3 pt-2">
                                            @foreach ($section->sectionContents as $content)
                                                <div class="flex items-center gap-3 p-3 rounded-xl border border-gray-200 bg-[#FAFAFA] hover:bg-white hover:border-blue-300 cursor-pointer transition-all group">
                                                    <div class="w-8 h-8 flex items-center justify-center bg-gray-200 rounded-lg text-gray-500 group-hover:bg-blue-100 group-hover:text-blue-500 transition-colors">
                                                        <i class="fa-solid fa-folder text-sm"></i>
                                                    </div>
                                                    <span class="font-medium text-sm text-gray-500 group-hover:text-gray-900">
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

        <script>
            // --- 1. CONFIGURATION CLASSES ---
            const activeClasses = ['bg-[#007BFF]', 'text-white', 'shadow-lg', 'shadow-blue-500/30', 'border-transparent'];
            const inactiveClasses = ['bg-white', 'text-gray-500', 'border-gray-200', 'hover:bg-gray-50'];

            // --- 2. TAB SWITCHING LOGIC ---
            function switchTab(tabName) {
                const tabAboutBtn = document.getElementById('tab-about');
                const tabLessonsBtn = document.getElementById('tab-lessons');
                const contentAbout = document.getElementById('content-about');
                const contentLessons = document.getElementById('content-lessons');

                if (!tabAboutBtn || !tabLessonsBtn || !contentAbout || !contentLessons) return;

                if (tabName === 'about') {
                    tabAboutBtn.classList.add(...activeClasses);
                    tabAboutBtn.classList.remove(...inactiveClasses);
                    tabLessonsBtn.classList.remove(...activeClasses);
                    tabLessonsBtn.classList.add(...inactiveClasses);
                    contentAbout.classList.remove('hidden');
                    contentLessons.classList.add('hidden');
                } else if (tabName === 'lessons') {
                    tabLessonsBtn.classList.add(...activeClasses);
                    tabLessonsBtn.classList.remove(...inactiveClasses);
                    tabAboutBtn.classList.remove(...activeClasses);
                    tabAboutBtn.classList.add(...inactiveClasses);
                    contentLessons.classList.remove('hidden');
                    contentAbout.classList.add('hidden');
                }
            }

            // --- 3. ACCORDION LOGIC ---
            function toggleAccordion(contentId, iconId) {
                const content = document.getElementById(contentId);
                const icon = document.getElementById(iconId);

                if (!content || !icon) return;

                if (content.classList.contains('active')) {
                    content.classList.remove('active');
                    icon.classList.remove('rotate');
                } else {
                    content.classList.add('active');
                    icon.classList.add('rotate');
                }
            }

            // --- 4. HAMBURGER MENU ---
            document.addEventListener('DOMContentLoaded', () => {
                const hamburgerBtn = document.getElementById('hamburger-btn');
                const mobileMenu = document.getElementById('mobile-menu');

                if(hamburgerBtn && mobileMenu) {
                    hamburgerBtn.addEventListener('click', () => {
                        mobileMenu.classList.toggle('hidden');
                        const icon = hamburgerBtn.querySelector('i');
                        if (mobileMenu.classList.contains('hidden')) {
                            icon.classList.remove('fa-xmark');
                            icon.classList.add('fa-bars');
                        } else {
                            icon.classList.remove('fa-bars');
                            icon.classList.add('fa-xmark');
                        }
                    });

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
            });
        </script>


    </body>
</html>