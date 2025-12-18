<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Search Results - Knewbie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-['Poppins'] bg-[#F4F7FB]">
    <x-nav-dashboard/>

    <!-- Results Section -->
    <main class="py-10 px-4 md:px-20">
        <div class="max-w-7xl mx-auto">
            
            <!-- Results Header -->
            <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="font-bold text-2xl text-[#1E1E1E] mb-2">
                        Hasil Pencarian
                    </h2>
                    <p class="text-gray-600">
                        Menampilkan 
                        <span class="font-semibold text-blue-600">{{ $courses->count() }} kursus</span> 
                        untuk pencarian 
                        <span class="font-semibold text-gray-800">"{{ $keyword }}"</span>
                    </p>
                </div>
                
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium transition">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Kembali ke Dashboard</span>
                </a>
            </div>

            @if($courses->isEmpty())
                <!-- Empty State -->
                <div class="bg-white rounded-[30px] shadow-[0_20px_50px_rgba(0,0,0,0.04)] p-12 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="w-32 h-32 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-magnifying-glass text-5xl text-gray-300"></i>
                        </div>
                        <h3 class="font-bold text-xl text-gray-800 mb-3">
                            Oops! Tidak Ada Hasil Ditemukan
                        </h3>
                        <p class="text-gray-500 mb-6 leading-relaxed">
                            Kami tidak menemukan kursus yang cocok dengan pencarian "<span class="font-semibold">{{ $keyword }}</span>". 
                            <br>Coba gunakan kata kunci lain atau jelajahi semua kursus kami.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3 justify-center">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-8 py-3 bg-blue-600 text-white rounded-full font-semibold hover:bg-blue-700 transition-all hover:shadow-lg">
                                <i class="fa-solid fa-house mr-2"></i>
                                Lihat Semua Kursus
                            </a>
                            <button onclick="document.querySelector('input[name=search]').value=''; document.querySelector('input[name=search]').focus();" class="inline-flex items-center justify-center px-8 py-3 bg-white border border-gray-200 text-gray-700 rounded-full font-semibold hover:border-gray-400 transition-all">
                                <i class="fa-solid fa-rotate-right mr-2"></i>
                                Coba Lagi
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <!-- Course Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($courses as $course)
                        <a href="{{ route('dashboard.course.details', $course->slug) }}" 
                           class="group bg-white rounded-[20px] shadow-md hover:shadow-xl overflow-hidden transition-all duration-300 hover:-translate-y-1">
                            
                            <!-- Thumbnail -->
                            <div class="relative overflow-hidden h-48">
                                <img
                                    src="{{ asset('storage/' . $course->thumbnail) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                    alt="{{ $course->name }}"
                                >
                            </div>

                            <!-- Content -->
                            <div class="p-5">
                                <!-- Title -->
                                <h3 class="font-bold text-base text-[#1E1E1E] mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors leading-snug">
                                    {{ $course->name }}
                                </h3>

                                <!-- Description -->
                                <p class="text-sm text-gray-500 line-clamp-2 mb-4 leading-relaxed">
                                    {{ $course->about }}
                                </p>

                                <!-- Footer Info -->
                                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                    <div class="flex items-center gap-2 text-gray-400">
                                        <i class="fa-solid fa-book text-xs"></i>
                                        <span class="text-xs font-medium">{{ $course->courseSections->count() }} Sections</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-blue-600 group-hover:gap-2 transition-all">
                                        <span class="text-xs font-semibold">Lihat Detail</span>
                                        <i class="fa-solid fa-arrow-right text-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Show More Info if many results -->
                @if($courses->count() >= 8)
                    <div class="mt-10 text-center">
                        <div class="inline-block bg-white rounded-full px-6 py-3 shadow-md">
                            <p class="text-sm text-gray-600">
                                <i class="fa-solid fa-circle-check text-green-500 mr-2"></i>
                                Menampilkan semua <span class="font-bold text-gray-800">{{ $courses->count() }}</span> hasil pencarian
                            </p>
                        </div>
                    </div>
                @endif
            @endif

        </div>
    </main>

    <!-- Quick Tips Section (Optional) -->
    @if($courses->isEmpty())
    <section class="py-10 px-4 md:px-6 bg-white">
        <div class="max-w-4xl mx-auto">
            <h3 class="font-bold text-xl text-center mb-8">💡 Tips Pencarian</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-spell-check text-blue-600"></i>
                    </div>
                    <h4 class="font-semibold text-sm mb-2">Periksa Ejaan</h4>
                    <p class="text-xs text-gray-500">Pastikan kata kunci yang kamu gunakan sudah benar</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-lightbulb text-green-600"></i>
                    </div>
                    <h4 class="font-semibold text-sm mb-2">Gunakan Kata Kunci Umum</h4>
                    <p class="text-xs text-gray-500">Coba kata kunci yang lebih luas seperti "web" atau "design"</p>
                </div>
                <div class="text-center p-6">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-list text-purple-600"></i>
                    </div>
                    <h4 class="font-semibold text-sm mb-2">Jelajahi Kategori</h4>
                    <p class="text-xs text-gray-500">Lihat semua kursus berdasarkan kategori di dashboard</p>
                </div>
            </div>
        </div>
    </section>
    @endif

</body>
</html>