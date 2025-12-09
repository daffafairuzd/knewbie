<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Learning Room - KNewbie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(0, 0, 0, 0.1); border-radius: 10px; }
        .sidebar-menu::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.3); }
    </style>
</head>
<body class="font-['Poppins'] bg-white text-[#1E1E1E]">

    <aside class="fixed top-0 left-0 w-[300px] lg:w-[320px] h-full bg-[#007BFF] text-white flex flex-col z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0" id="sidebar">
        
        <div class="p-6 pb-4 border-b border-white/20 shrink-0">
            <h1 class="font-bold text-xl mb-1">Course Menu</h1>
            <p class="text-[11px] text-blue-100 font-light leading-snug line-clamp-2">
                {{ $course->name }}
            </p>
            <div class="mt-4 w-10 h-0.5 bg-white/50 mx-auto rounded-full"></div>
        </div>

        <div class="flex-1 overflow-y-auto sidebar-menu py-2">
            
            @foreach($course->courseSections as $section)
            <div class="group border-b border-white/10 last:border-b-0">
                
                <button onclick="toggleMenu('menu-{{ $section->id }}', 'arrow-{{ $section->id }}')" 
                        class="w-full flex justify-between items-center px-6 py-4 hover:bg-white/10 transition-colors text-left font-semibold text-sm focus:outline-none 
                        {{ $currentSection->id == $section->id ? 'bg-[#0069d9]' : '' }}">
                    
                    <span>{{ $section->name }}</span>
                    <i id="arrow-{{ $section->id }}" 
                       class="fa-solid fa-chevron-down text-xs transition-transform duration-300 {{ $currentSection->id == $section->id ? 'rotate-180' : '' }}">
                    </i>
                </button>

                <div id="menu-{{ $section->id }}" class="{{ $currentSection->id == $section->id ? '' : 'hidden' }} bg-[#0065d1] px-6 pb-4 pt-2 space-y-2">
                    
                    @foreach($section->sectionContents as $content)
                        @php
                            $isActive = $currentContent->id == $content->id;
                        @endphp
                        
                        <a href="{{ route('dashboard.course.learning', [
                                'course' => $course->slug, 
                                'courseSection' => $section->id, 
                                'sectionContent' => $content->id
                            ]) }}" 
                           class="block w-full text-left px-4 py-2.5 rounded-full text-xs font-medium transition-all
                           {{ $isActive 
                                ? 'bg-white text-[#007BFF] font-bold shadow-md transform scale-[1.02]' 
                                : 'border border-white/30 text-white hover:bg-white/10' }}">
                            {{ $content->name }}
                        </a>
                    @endforeach

                </div>
            </div>
            @endforeach

        </div>

        <div class="p-6 bg-[#007BFF] border-t border-white/20 shadow-[0_-4px_20px_rgba(0,0,0,0.1)] shrink-0 space-y-3 z-20">
            <a href="{{ route('dashboard.course.learning.finished', $course->slug) }}" 
               class="block w-full py-3 bg-white text-[#007BFF] text-center rounded-full font-bold text-sm hover:bg-blue-50 transition-colors shadow-sm">
                Finish Learning
            </a>
            
            <a href="{{ route('dashboard.course.details', $course->slug) }}" 
               class="block w-full py-3 border border-white text-white text-center rounded-full font-bold text-sm hover:bg-white/10 transition-colors">
                Back to Details
            </a>
        </div>
    </aside>

    <main class="lg:ml-[320px] ml-0 min-h-screen bg-white flex flex-col transition-all duration-300">
        
        <x-nav-dashboard/>

        <div class="flex-1 p-6 md:p-10">
            <div class="max-w-4xl mx-auto pb-20">
                
                <div class="w-full aspect-video rounded-[20px] overflow-hidden mb-8 shadow-sm relative group">
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" 
                         onerror="this.src='https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80'" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" 
                         alt="{{ $course->name }}">
                </div>

                <div class="flex items-start gap-3 mb-6">
                    <span class="text-2xl pt-1">🧠</span>
                    <div>
                        <h2 class="font-bold text-xl md:text-2xl text-[#1E1E1E] leading-tight mb-2">
                            {{ $currentContent->name }}
                        </h2>
                        <div class="flex gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1"><i class="fa-regular fa-clock"></i> 12 Mins</span>
                            <span class="flex items-center gap-1"><i class="fa-solid fa-video"></i> Video Lesson</span>
                        </div>
                    </div>
                </div>

                <div class="text-[#1E1E1E] space-y-6 leading-relaxed text-sm md:text-[15px] border-t border-gray-100 pt-6 prose max-w-none">
                    {!! $currentContent->content ?? '<p class="text-gray-500 italic">Belum ada deskripsi materi.</p>' !!}
                </div>
                
                @php
                    // 1. Mengumpulkan semua materi dari semua section menjadi satu list urut
                    $allContents = $course->courseSections->flatMap(function ($section) {
                        return $section->sectionContents->map(function ($content) use ($section) {
                            $content->section_id = $section->id; // Simpan section_id agar bisa dipakai di route
                            return $content;
                        });
                    });

                    // 2. Cari index materi yang sedang dibuka saat ini
                    $currentIndex = $allContents->search(function ($item) use ($currentContent) {
                        return $item->id === $currentContent->id;
                    });

                    // 3. Tentukan materi sebelum dan sesudahnya
                    $prevContent = $allContents->get($currentIndex - 1);
                    $nextContent = $allContents->get($currentIndex + 1);
                @endphp

                <div class="flex justify-between mt-10 pt-6 border-t border-gray-100">
                    
                    @if($prevContent)
                        <a href="{{ route('dashboard.course.learning', [
                                'course' => $course->slug, 
                                'courseSection' => $prevContent->section_id, 
                                'sectionContent' => $prevContent->id
                            ]) }}" 
                           class="px-5 py-2 rounded-full border border-gray-200 text-gray-500 text-sm font-medium hover:bg-gray-50 transition-colors">
                            &larr; Previous Lesson
                        </a>
                    @else
                        <button disabled class="px-5 py-2 rounded-full border border-gray-100 text-gray-300 text-sm font-medium cursor-not-allowed">
                            &larr; Previous Lesson
                        </button>
                    @endif

                    @if($nextContent)
                        <a href="{{ route('dashboard.course.learning', [
                                'course' => $course->slug, 
                                'courseSection' => $nextContent->section_id, 
                                'sectionContent' => $nextContent->id
                            ]) }}" 
                           class="px-5 py-2 rounded-full bg-[#007BFF] text-white text-sm font-medium hover:bg-blue-600 transition-colors">
                            Next Lesson &rarr;
                        </a>
                    @else
                        <a href="{{ route('dashboard.course.learning.finished', $course->slug) }}" 
                           class="px-5 py-2 rounded-full bg-[#007BFF] text-white text-sm font-medium hover:bg-blue-600 transition-colors">
                            Finish Course &rarr;
                        </a>
                    @endif

                </div>
                </div>
        </div>
    </main>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden glass-effect"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebar-toggle');
        const overlay = document.getElementById('sidebar-overlay');

        // Logic Toggle Sidebar (Mobile)
        function toggleSidebar() {
            if (window.innerWidth < 1024) {
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        }

        if(toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
        if(overlay) overlay.addEventListener('click', toggleSidebar);

        // Responsive Fix
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Dropdown Menu Logic
        function toggleMenu(menuId, arrowId) {
            const menu = document.getElementById(menuId);
            const arrow = document.getElementById(arrowId);
            
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden'); 
                arrow.classList.add('rotate-180'); 
            } else {
                menu.classList.add('hidden'); 
                arrow.classList.remove('rotate-180'); 
            }
        }
    </script>
</body>
</html>