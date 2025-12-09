<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Course Finished - KNewbie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
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
            <div class="bg-white rounded-[30px] p-8 md:p-12 max-w-[550px] w-full shadow-2xl text-center">
                
                <div class="mb-6 flex justify-center">
                    <div class="w-20 h-20 bg-[#007BFF] rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform">
                        <i class="fa-solid fa-trophy text-white text-3xl"></i>
                    </div>
                </div>

                <h1 class="font-extrabold text-2xl md:text-[28px] text-[#1E1E1E] mb-3 leading-snug">
                    What a Day! Now <br> You're Ready to Work
                </h1>
                
                <p class="text-sm text-gray-500 mb-8 leading-relaxed px-2">
                    Anda telah menyelesaikan materi kelas dengan baik selanjutnya dapat membuat portfolio dan mengikuti magang
                </p>

                <div class="border border-gray-100 rounded-[20px] p-4 flex gap-4 text-left mb-8 items-center bg-white shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-[100px] h-[70px] shrink-0 rounded-xl overflow-hidden relative">
                        <img src="{{ asset('storage/' . $course->thumbnail) }}" 
                             onerror="this.src='https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80'" 
                             class="w-full h-full object-cover" alt="Course Thumbnail">
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-[#1E1E1E] mb-1 leading-tight line-clamp-2">
                            {{ $course->name }}
                        </h3>
                        <div class="flex flex-wrap gap-3 mt-2">
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fa-solid fa-layer-group text-[10px] text-[#C2C2C2]"></i>
                                <span class="text-[10px] font-medium">{{ $course->category->name ?? 'Category' }}</span>
                            </div>
                            <div class="flex items-center gap-1 text-gray-500">
                                <i class="fa-solid fa-circle-check text-[10px] text-[#C2C2C2]"></i>
                                <span class="text-[10px] font-medium">Finished</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <button class="flex-1 py-3.5 bg-white border border-gray-200 hover:bg-gray-50 text-[#1E1E1E] rounded-full font-bold text-sm transition-all">
                        Get My Certificate
                    </button>
                    
                    <a href="{{ route('dashboard') }}" class="flex-1 py-3.5 bg-[#007BFF] hover:bg-blue-700 text-white rounded-full font-bold text-sm transition-all shadow-[0_6px_20px_rgba(0,123,255,0.25)] flex items-center justify-center">
                        Explore Courses
                    </a>
                </div>

            </div>
        </div>
    </div>

</body>
</html>