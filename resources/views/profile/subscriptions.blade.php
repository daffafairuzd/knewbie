<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <title>KNewbie - My Subscription</title>
        <meta name="description" content="Riwayat subscription pengguna KNewbie">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            ::-webkit-scrollbar { width: 6px; }
            ::-webkit-scrollbar-track { background: transparent; }
            ::-webkit-scrollbar-thumb { background: rgba(0, 0, 0, 0.1); border-radius: 10px; }
            .sidebar-menu::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.3); }
        </style>
    </head>
    <body class="font-['Poppins'] bg-[#F4F7FF] text-[#1E1E1E]">

        @php
            $photoPath = $user->photo ?? null;
            $photoUrl  = $photoPath
                ? asset('storage/' . $photoPath)
                : asset('assets/images/photos/default-avatar.png');

            $isProfile       = request()->routeIs('profile.edit');
            $isSubscriptions = request()->routeIs('profile.subscriptions');
        @endphp

        {{-- 
            1. SIDEBAR FIXED (Mobile & Desktop)
            Z-Index 100 agar menutupi Navbar
        --}}
        <aside
            id="sidebar"
            class="fixed inset-y-0 left-0 z-[100] w-[280px] md:w-[300px] lg:w-[320px] bg-[#007BFF] text-white flex flex-col
                   transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-2xl lg:shadow-none"
        >
            {{-- Header Sidebar --}}
            <div class="p-6 pb-4 border-b border-white/20 shrink-0 relative">
                {{-- Tombol Close (Panah Kiri) di Mobile --}}
                <button onclick="toggleSidebar()" class="lg:hidden absolute top-4 right-4 text-white hover:bg-white/10 rounded-full w-8 h-8 flex items-center justify-center transition">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="flex flex-col items-center text-center gap-3">
                    <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-md">
                        <img src="{{ $photoUrl }}" alt="Foto profil" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <p class="font-semibold text-lg leading-tight">
                            {{ $user->name }}
                        </p>
                        <p class="text-[11px] text-blue-100 font-light">
                            {{ $user->occupation ?? 'Student' }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 w-10 h-0.5 bg-white/50 mx-auto rounded-full"></div>
            </div>

            {{-- Menu Sidebar --}}
            <div class="flex-1 overflow-y-auto sidebar-menu py-4">
                <nav class="px-4 space-y-3 text-sm font-semibold">
                    <a
                        href="{{ route('profile.edit') }}"
                        class="block w-full px-4 py-2.5 rounded-full text-left transition-all
                        {{ $isProfile
                            ? 'bg-white text-[#007BFF] font-bold shadow-md transform scale-[1.02]'
                            : 'border border-white/40 text-white hover:bg-white/10' }}"
                    >
                        <i class="fa-regular fa-user mr-2"></i> Profile
                    </a>

                    <a
                        href="{{ route('profile.subscriptions') }}"
                        class="block w-full px-4 py-2.5 rounded-full text-left transition-all
                        {{ $isSubscriptions
                            ? 'bg-white text-[#007BFF] font-bold shadow-md transform scale-[1.02]'
                            : 'border border-white/40 text-white hover:bg-white/10' }}"
                    >
                        <i class="fa-solid fa-clock-rotate-left mr-2"></i> Subscription History
                    </a>
                </nav>
            </div>

            <div class="p-4 border-t border-white/20 text-[11px] text-blue-100 text-center">
                Logged in as <span class="font-semibold text-white">{{ $user->email }}</span>
            </div>
        </aside>

        <div id="sidebar-overlay" onclick="toggleSidebar()" 
             class="fixed inset-0 bg-black/60 z-[90] hidden lg:hidden transition-opacity backdrop-blur-sm">
        </div>

        <button onclick="toggleSidebar()" 
            class="lg:hidden fixed bottom-6 right-6 z-40 w-14 h-14 bg-[#007BFF] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-blue-700 hover:scale-105 transition-all focus:outline-none focus:ring-4 focus:ring-blue-300">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>

        {{-- 
            4. MAIN CONTENT 
        --}}
        <main class="lg:ml-[320px] ml-0 min-h-screen bg-[#F4F7FF] flex flex-col transition-all duration-300">
            <x-nav-dashboard />

            <div class="flex-1 py-10 md:py-14">
                <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-0">

                    <section class="bg-white rounded-[32px] shadow-xl px-6 md:px-10 lg:px-12 py-8 md:py-10">
                        <h1 class="text-xl md:text-2xl font-extrabold text-[#0073FF] text-center mb-8">
                            My Subscription
                        </h1>

                        @if($transactions->isEmpty())
                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-gray-400">
                                    <i class="fa-solid fa-box-open text-2xl"></i>
                                </div>
                                <p class="text-gray-500 text-sm">
                                    Kamu belum punya subscription apapun.
                                </p>
                            </div>
                        @else
                            <div class="space-y-5">
                                @foreach($transactions as $transaction)
                                    @php
                                        $planName = optional($transaction->pricing)->name ?? 'Unknown Plan';

                                        $isActive = $transaction->is_paid &&
                                                    $transaction->ended_at &&
                                                    $transaction->ended_at &&
                                                    now()->between($transaction->started_at, $transaction->ended_at);

                                        $statusText  = $isActive ? 'Active' : 'Inactive';
                                        $statusColor = $isActive ? 'text-[#0073FF] bg-blue-50 border-blue-100' : 'text-red-500 bg-red-50 border-red-100';

                                        $dateLabelPrefix = $isActive ? 'active until' : 'expired on';

                                        $dateText = $transaction->ended_at
                                            ? $transaction->ended_at->translatedFormat('j F Y')
                                            : '-';
                                    @endphp

                                    <a
                                        href="{{ route('dashboard.subscription.details', $transaction->id) }}"
                                        class="block rounded-[26px] bg-white shadow-md hover:shadow-lg transition
                                               px-6 py-5 border border-gray-100 group"
                                    >
                                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                                            <div class="flex items-start gap-4">
                                                <div class="hidden md:flex w-12 h-12 rounded-full bg-blue-50 text-blue-500 items-center justify-center shrink-0">
                                                    <i class="fa-solid fa-receipt text-xl"></i>
                                                </div>
                                                <div>
                                                    <p class="font-bold text-lg text-gray-900 group-hover:text-[#007BFF] transition-colors">
                                                        {{ $planName }}
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        {{ $dateLabelPrefix }} <span class="font-medium">{{ $dateText }}</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <span class="inline-flex items-center justify-center px-4 py-1.5 rounded-full text-xs font-bold border {{ $statusColor }}">
                                                {{ $statusText }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </section>

                </div>
            </div>
        </main>

        <script>
            const sidebar  = document.getElementById('sidebar');
            const overlay  = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                if (window.innerWidth < 1024) {
                    if (sidebar.classList.contains('-translate-x-full')) {
                        // BUKA SIDEBAR
                        sidebar.classList.remove('-translate-x-full');
                        overlay.classList.remove('hidden');
                    } else {
                        // TUTUP SIDEBAR
                        sidebar.classList.add('-translate-x-full');
                        overlay.classList.add('hidden');
                    }
                }
            }

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            });
        </script>
    </body>
</html>