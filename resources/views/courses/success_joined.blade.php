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

    <nav class="w-full bg-white border-b border-gray-100 relative z-50">
        <div class="max-w-[1280px] mx-auto px-6 py-5 flex justify-between items-center">
            
            <div class="flex items-center gap-[50px]">
                <a href="{{ url('/') }}" class="font-extrabold text-2xl tracking-tighter">KNewbie</a>
                <div class="hidden md:flex gap-8">
                    <a href="#" class="font-bold text-[#1E1E1E]">Overview</a>
                    <a href="#" class="font-medium text-gray-500 hover:text-[#1E1E1E] transition-all">Courses</a>
                </div>
            </div>

            <div class="flex items-center gap-4 md:gap-6">
                 
                 <button id="hamburger-btn" class="md:hidden text-gray-500 text-2xl focus:outline-none">
                    <i class="fa-solid fa-bars"></i>
                 </button>

                 <button class="hidden md:flex text-gray-500 text-xl"><i class="fa-solid fa-border-all"></i></button>
                 
                 <button class="relative text-gray-500 text-xl mr-2">
                     <i class="fa-regular fa-bell"></i>
                     <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white translate-x-1/2 -translate-y-1/4"></span>
                 </button>
                 
                 <div class="flex items-center gap-3">
                     <div class="w-10 h-10 rounded-full overflow-hidden border border-gray-200">
                         <img src="{{ asset('assets/images/photos/user-amelia.png') }}" onerror="this.src='https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80'" class="w-full h-full object-cover" alt="Amelia">
                     </div>
                     <div class="hidden md:block">
                         <h4 class="font-bold text-sm leading-tight">Amelia</h4>
                         <span class="text-xs text-gray-500">Student</span>
                     </div>
                 </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-100 bg-white px-6 py-4 shadow-lg absolute w-full left-0 top-full z-50">
            <div class="flex flex-col gap-4">
                <a href="#" class="font-bold text-[#1E1E1E] py-2 border-b border-gray-50">Overview</a>
                <a href="#" class="font-medium text-gray-500 hover:text-[#1E1E1E] py-2 transition-all">Courses</a>
                <a href="#" class="font-medium text-gray-500 hover:text-[#1E1E1E] py-2 md:hidden">Settings</a>
                <a href="#" class="font-medium text-red-500 hover:text-red-700 py-2 md:hidden">Logout</a>
            </div>
        </div>
    </nav>

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
                    Mari kita belajar meningkatkan skills terbaru bersama dengan mentor berpengalaman demi masa depan lebih baik
                </p>

                <div class="border border-gray-100 rounded-[20px] p-3 flex gap-4 text-left mb-8 items-center bg-white shadow-sm">
                    <div class="w-[100px] h-[70px] shrink-0 rounded-xl overflow-hidden relative">
                        <img src="{{ asset('assets/images/thumbnails/course-js.png') }}" 
                             onerror="this.src='https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80'" 
                             class="w-full h-full object-cover" alt="Course Thumbnail">
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center">
                             <div class="w-6 h-6 bg-white/30 backdrop-blur rounded-full flex items-center justify-center">
                                <i class="fa-solid fa-play text-white text-[8px]"></i>
                             </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-bold text-sm text-[#1E1E1E] mb-1 leading-tight line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                        <div class="flex flex-wrap gap-3">
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fa-solid fa-crown text-[10px] text-[#C2C2C2]"></i>
                                <span class="text-[10px] font-medium">Algoritma</span>
                            </div>
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fa-regular fa-calendar-check text-[10px] text-[#C2C2C2]"></i>
                                <span class="text-[10px] font-medium">1694 Lessons</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex gap-3 justify-center">
                    <button class="flex-1 py-3 bg-white border border-gray-200 hover:bg-gray-50 text-[#1E1E1E] rounded-full font-bold text-sm transition-all">
                        Get Guidelines
                    </button>
                    
                    <a href="{{ route('dashboard.course.learning.demo') }}" class="flex-1 py-3 bg-[#007BFF] hover:bg-blue-700 text-white rounded-full font-bold text-sm transition-all shadow-[0_6px_20px_rgba(0,123,255,0.25)] flex items-center justify-center">
                        Start Learning
                    </a>
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