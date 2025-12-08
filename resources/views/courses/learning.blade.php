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
        /* Custom Scrollbar untuk Sidebar & Konten */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        /* Sidebar specific scrollbar */
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="font-['Poppins'] bg-white text-[#1E1E1E]">

    <aside class="fixed top-0 left-0 w-[300px] lg:w-[320px] h-full bg-[#007BFF] text-white flex flex-col z-50 transition-transform duration-300" id="sidebar">
        
        <div class="p-6 pb-4 border-b border-white/20 shrink-0">
            <h1 class="font-bold text-xl mb-1">Course Menu</h1>
            <p class="text-[11px] text-blue-100 font-light leading-snug">Full-Stack Sr. Website JavaScript Developer 2025</p>
            <div class="mt-4 w-10 h-0.5 bg-white/50 mx-auto rounded-full"></div>
        </div>

        <div class="flex-1 overflow-y-auto sidebar-menu py-2">
            
            <div class="group">
                <button onclick="toggleMenu('menu-1', 'arrow-1')" class="w-full flex justify-between items-center px-6 py-4 hover:bg-white/10 transition-colors text-left font-semibold text-sm bg-[#0069d9]">
                    <span>Course Description</span>
                    <i id="arrow-1" class="fa-solid fa-chevron-up text-xs transition-transform duration-300"></i>
                </button>
                <div id="menu-1" class="bg-[#0065d1] px-6 pb-4 pt-2 space-y-2">
                    <a href="#" class="block w-full text-left px-4 py-2.5 bg-white text-[#007BFF] rounded-full text-xs font-bold shadow-md transform scale-[1.02] transition-all">
                        Pengantar
                    </a>
                    <a href="#" class="block w-full text-left px-4 py-2.5 border border-white/30 text-white hover:bg-white/10 rounded-full text-xs font-medium transition-colors">
                        Tujuan Pembelajaran
                    </a>
                    <a href="#" class="block w-full text-left px-4 py-2.5 border border-white/30 text-white hover:bg-white/10 rounded-full text-xs font-medium transition-colors">
                        Struktur Kursus
                    </a>
                </div>
            </div>

            <div class="group border-t border-white/10">
                <button class="w-full flex justify-between items-center px-6 py-4 hover:bg-white/10 transition-colors text-left font-semibold text-sm">
                    <span>Front-End Development</span>
                    <i class="fa-solid fa-chevron-right text-xs text-blue-200"></i>
                </button>
            </div>

            <div class="group border-t border-white/10">
                <button class="w-full flex justify-between items-center px-6 py-4 hover:bg-white/10 transition-colors text-left font-semibold text-sm">
                    <span>Back-End Development</span>
                    <i class="fa-solid fa-chevron-right text-xs text-blue-200"></i>
                </button>
            </div>
             <div class="group border-t border-white/10">
                <button class="w-full flex justify-between items-center px-6 py-4 hover:bg-white/10 transition-colors text-left font-semibold text-sm">
                    <span>DevOps & Deployment</span>
                    <i class="fa-solid fa-chevron-right text-xs text-blue-200"></i>
                </button>
            </div>
             <div class="group border-t border-white/10 border-b">
                <button class="w-full flex justify-between items-center px-6 py-4 hover:bg-white/10 transition-colors text-left font-semibold text-sm">
                    <span>Capstone Project</span>
                    <i class="fa-solid fa-chevron-right text-xs text-blue-200"></i>
                </button>
            </div>
        </div>

        <div class="p-6 bg-[#007BFF] border-t border-white/20 shadow-[0_-4px_20px_rgba(0,0,0,0.1)] shrink-0 space-y-3 z-20">
            <button class="w-full py-3 bg-white text-[#007BFF] rounded-full font-bold text-sm hover:bg-blue-50 transition-colors shadow-sm">
                Finish Learning
            </button>
            <a href="{{ route('dashboard.details.demo') }}" class="block w-full py-3 border border-white text-white text-center rounded-full font-bold text-sm hover:bg-white/10 transition-colors">
                Back to Dashboard
            </a>
        </div>
    </aside>

    <main class="lg:ml-[320px] ml-0 min-h-screen bg-white flex flex-col transition-all duration-300">
        
        <header class="w-full bg-white border-b border-gray-100 sticky top-0 z-40 px-6 md:px-10 py-4 flex justify-between items-center">
            
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="lg:hidden text-gray-500 text-xl p-2 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="font-extrabold text-2xl tracking-tighter text-[#1E1E1E]">KNewbie</a>
                
                <div class="hidden md:flex gap-6 ml-6 border-l border-gray-200 pl-6 h-6 items-center">
                    <a href="#" class="font-bold text-[#1E1E1E] text-sm">Overview</a>
                    <a href="#" class="font-medium text-gray-500 hover:text-[#1E1E1E] transition-all text-sm">Courses</a>
                </div>
            </div>

            <div class="flex items-center gap-3 md:gap-5">
                <button class="hidden md:block text-gray-400 hover:text-gray-600 text-lg"><i class="fa-regular fa-comment-dots"></i></button>
                <button class="hidden md:block text-gray-400 hover:text-gray-600 text-lg"><i class="fa-solid fa-border-all"></i></button>
                <button class="relative text-gray-400 hover:text-gray-600 text-lg mr-2">
                    <i class="fa-regular fa-bell"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full border border-white translate-x-1/2 -translate-y-1/4"></span>
                </button>
                <div class="flex items-center gap-3 pl-2 md:border-l border-gray-200">
                    <div class="w-9 h-9 rounded-full overflow-hidden border border-gray-200 shrink-0">
                        <img src="{{ asset('assets/images/photos/user-amelia.png') }}" onerror="this.src='https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80'" class="w-full h-full object-cover" alt="Amelia">
                    </div>
                    <div class="hidden md:block text-left">
                        <h4 class="font-bold text-sm leading-none text-[#1E1E1E]">Amelia</h4>
                        <span class="text-[11px] text-gray-500">Student</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 p-6 md:p-10">
            <div class="max-w-4xl mx-auto pb-20">
                
                <div class="w-full aspect-video md:h-[400px] rounded-[30px] overflow-hidden mb-8 shadow-sm group relative">
                     <img src="{{ asset('assets/images/thumbnails/learning-hero.png') }}" 
                         onerror="this.src='https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80'" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="Learning Hero">
                     <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors flex items-center justify-center">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center cursor-pointer hover:scale-110 transition-transform">
                            <i class="fa-solid fa-play text-white text-xl pl-1"></i>
                        </div>
                     </div>
                </div>

                <div class="flex items-start gap-3 mb-6">
                    <span class="text-2xl pt-1">🧠</span>
                    <div>
                        <h2 class="font-bold text-xl md:text-2xl text-[#1E1E1E] leading-tight mb-2">Full-Stack Sr. Website JavaScript Developer 2025</h2>
                        <div class="flex gap-4 text-xs text-gray-500 font-medium">
                            <span class="flex items-center gap-1"><i class="fa-regular fa-clock"></i> 12 Mins</span>
                            <span class="flex items-center gap-1"><i class="fa-solid fa-video"></i> Video Lesson</span>
                        </div>
                    </div>
                </div>

                <div class="text-[#1E1E1E] space-y-6 leading-relaxed text-sm md:text-[15px] border-t border-gray-100 pt-6">
                    
                    <div>
                        <h3 class="font-bold text-lg mb-3">1. Pengantar</h3>
                        <p class="text-gray-600 text-justify leading-7">
                            Seorang Full-Stack Senior Website JavaScript Developer adalah pengembang yang menguasai baik frontend maupun backend, menggunakan JavaScript dan ekosistemnya untuk membangun aplikasi web modern, efisien, dan skalabel. Dalam kursus ini, kita akan membedah arsitektur modern yang digunakan oleh perusahaan teknologi top dunia.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-5 rounded-2xl border border-gray-100">
                            <p class="font-bold text-[#1E1E1E] mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-server text-blue-500"></i> Backend Stack
                            </p>
                            <ol class="list-decimal list-inside text-gray-600 space-y-2 pl-1">
                                <li><strong>Node.js 22+</strong> dengan Express.js / Fastify.</li>
                                <li><strong>NestJS</strong> untuk arsitektur modular.</li>
                                <li><strong>Database:</strong> PostgreSQL, MongoDB, Prisma.</li>
                            </ol>
                        </div>

                        <div class="bg-gray-50 p-5 rounded-2xl border border-gray-100">
                            <p class="font-bold text-[#1E1E1E] mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-screwdriver-wrench text-orange-500"></i> Tools Pendukung
                            </p>
                            <ol class="list-decimal list-inside text-gray-600 space-y-2 pl-1">
                                <li><strong>Docker</strong> untuk containerization.</li>
                                <li><strong>CI/CD:</strong> GitHub Actions & Jenkins.</li>
                                <li><strong>Cloud:</strong> Vercel, AWS, Railway.</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden glass-effect"></div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebar-toggle');
        const overlay = document.getElementById('sidebar-overlay');

        // Logic Mobile Toggle
        function toggleSidebar() {
            // Jika layar kecil (Mobile)
            if (window.innerWidth < 1024) {
                if (sidebar.classList.contains('-translate-x-full')) {
                    // Buka Sidebar
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                } else {
                    // Tutup Sidebar
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            }
        }

        toggleBtn.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Responsive Check: Pastikan sidebar muncul di Desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('-translate-x-full'); // Default hidden di mobile
            }
        });

        // Init: Sembunyikan sidebar di mobile saat load pertama
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full');
        }

        // Logic Accordion Menu Sidebar
        function toggleMenu(menuId, arrowId) {
            const menu = document.getElementById(menuId);
            const arrow = document.getElementById(arrowId);
            
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                arrow.classList.add('rotate-180');
            } else {
                // menu.classList.add('hidden'); // Opsional jika ingin bisa ditutup
                // arrow.classList.remove('rotate-180');
            }
        }
    </script>
</body>
</html>