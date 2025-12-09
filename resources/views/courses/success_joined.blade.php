<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Welcome to Class - KNewbie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom curve shape for the bottom of the hero section */
        .curved-bottom {
            border-bottom-left-radius: 50% 20%;
            border-bottom-right-radius: 50% 20%;
        }
    </style>
</head>
<body class="font-['Poppins'] bg-[#F4F7FB] text-[#1E1E1E]">

    <x-nav-dashboard/>

    <div class="relative w-full">
        <div class="absolute top-0 left-0 w-full h-[500px] z-0 overflow-hidden">
            <div class="relative w-full h-[400px] curved-bottom overflow-hidden">
                <img src="{{ asset('assets/images/backgrounds/office-meeting.png') }}"
                    onerror="this.src='https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80'"
                    class="w-full h-full object-cover" alt="Background">
                <div class="absolute inset-0 bg-[#060818]/60"></div>
            </div>
        </div>

        <div class="relative z-10 flex justify-center pt-20 px-4 mb-20">
            <div class="bg-white rounded-[30px] p-8 md:p-10 max-w-[550px] w-full shadow-2xl text-center">
                
                <h1 class="font-extrabold text-2xl md:text-[26px] text-[#1E1E1E] mb-3 leading-snug">
                    Welcome to Class, <br> Upgrade Your New Skills
                </h1>
                
                <p class="text-sm text-gray-500 mb-8 leading-relaxed px-4">
                    Halo {{ $studentName }}, selamat bergabung di kelas
                    <span class="font-semibold">{{ $course->name }}</span>. 
                    Mari kita belajar meningkatkan skill bersama mentor berpengalaman.
                </p>
                
                <div class="border border-gray-100 rounded-[20px] p-3 flex gap-4 text-left mb-8 items-center bg-white shadow-sm">
                    <div class="w-[100px] h-[70px] shrink-0 rounded-xl overflow-hidden relative">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}"
                            onerror="this.src='https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80'"
                            class="w-full h-full object-cover" alt="Course Thumbnail">
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                            <div class="w-6 h-6 bg-white/30 backdrop-blur rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-play text-white text-[8px]"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-bold text-sm text-[#1E1E1E] mb-1 leading-tight line-clamp-2">
                            {{ $course->name }}
                        </h3>
                        <div class="flex flex-wrap gap-3">
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fa-solid fa-crown text-[10px] text-[#C2C2C2]"></i>
                                <span class="text-[10px] font-medium">
                                    {{ $course->category->name ?? 'Knewbie' }}
                                </span>
                            </div>
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fa-regular fa-calendar-check text-[10px] text-[#C2C2C2]"></i>
                                <span class="text-[10px] font-medium">
                                    {{ $course->content_count }} Lessons
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3 justify-center">
                    <button class="flex-1 py-3 bg-white border border-gray-200 hover:bg-gray-50 text-[#1E1E1E] rounded-full font-bold text-sm transition-all">
                        Get Guidelines
                    </button>

                    @if ($firstSectionId && $firstContentId)
                        <a href="{{ route('dashboard.course.learning', [$course->slug, $firstSectionId, $firstContentId]) }}"
                        class="flex-1 py-3 bg-[#007BFF] hover:bg-blue-700 text-white rounded-full font-bold text-sm transition-all shadow-[0_6px_20px_rgba(0,123,255,0.25)] flex items-center justify-center">
                            Start Learning
                        </a>
                    @else
                        <button class="flex-1 py-3 bg-gray-300 text-white rounded-full font-bold text-sm cursor-not-allowed">
                            No Content Yet
                        </button>
                    @endif
                </div>

            </div>
        </div>
    </div>



    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if(hamburgerBtn && mobileMenu) {
            hamburgerBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                
                // Toggle Icon (Bars <-> X)
                const icon = hamburgerBtn.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-xmark');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-xmark');
                }
            });

            // Tutup menu jika klik di luar area
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
    </script>

</body>
</html>