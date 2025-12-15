<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/output.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <title>KNewbie - My Profile</title>
        <meta name="description" content="Halaman profil pengguna KNewbie">

        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            /* Custom Scrollbar */
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

            $isProfile      = request()->routeIs('profile.edit');
            $isSubscriptions = request()->routeIs('profile.subscriptions');
        @endphp

        {{-- SIDEBAR FIXED --}}
        <aside
            id="sidebar"
            class="fixed top-0 left-0 w-[280px] md:w-[300px] lg:w-[320px] h-full bg-[#007BFF] text-white flex flex-col z-50
                   transition-transform duration-300 -translate-x-full lg:translate-x-0"
        >
            {{-- Header sidebar --}}
            <div class="p-6 pb-4 border-b border-white/20 shrink-0">
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

            {{-- Menu sidebar --}}
            <div class="flex-1 overflow-y-auto sidebar-menu py-4">
                <nav class="px-4 space-y-3 text-sm font-semibold">
                    {{-- Profile --}}
                    <a
                        href="{{ route('profile.edit') }}"
                        class="block w-full px-4 py-2.5 rounded-full text-left transition-all
                        {{ $isProfile
                            ? 'bg-white text-[#007BFF] font-bold shadow-md transform scale-[1.02]'
                            : 'border border-white/40 text-white hover:bg-white/10' }}"
                    >
                        Profile
                    </a>

                    {{-- Subscription History --}}
                    <a
                        href="{{ route('profile.subscriptions') }}"
                        class="block w-full px-4 py-2.5 rounded-full text-left transition-all
                        {{ $isSubscriptions
                            ? 'bg-white text-[#007BFF] font-bold shadow-md transform scale-[1.02]'
                            : 'border border-white/40 text-white hover:bg-white/10' }}"
                    >
                        Subscription History
                    </a>
                </nav>
            </div>

            {{-- Footer kecil (opsional) --}}
            <div class="p-4 border-t border-white/20 text-[11px] text-blue-100 text-center">
                Logged in as <span class="font-semibold text-white">{{ $user->email }}</span>
            </div>
        </aside>

        {{-- OVERLAY UNTUK MOBILE --}}
        <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

        {{-- MAIN AREA (GESER KANAN SAAT DESKTOP) --}}
        <main class="lg:ml-[320px] ml-0 min-h-screen bg-[#F4F7FF] flex flex-col transition-all duration-300">
            <x-nav-dashboard/>

            <div class="flex-1 py-10 md:py-14">
                <div class="max-w-6xl mx-auto px-4 md:px-6 lg:px-0">

                    {{-- KARTU RINGKASAN PROFILE --}}
                    <section class="bg-white rounded-[32px] shadow-xl px-6 md:px-10 lg:px-12 py-8 md:py-10">
                        <h1 class="text-xl md:text-2xl font-extrabold text-[#0073FF] text-center mb-8">
                            My Profile
                        </h1>

                        <div class="space-y-6">

                            {{-- ROW: Foto Profil --}}
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs md:text-sm font-semibold text-gray-500">Foto Profil</p>
                                    <div class="flex items-center gap-3 mt-2">
                                        <div class="w-11 h-11 rounded-full overflow-hidden">
                                            <img
                                                src="{{ $photoUrl }}"
                                                alt="Foto profil"
                                                class="w-full h-full object-cover"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="text-sm font-semibold text-[#0073FF]"
                                    onclick="openEditSection('edit-photo')"
                                >
                                    Edit
                                </button>
                            </div>

                            <hr class="border-gray-100">

                            {{-- ROW: Complete Name --}}
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs md:text-sm font-semibold text-gray-500">Complete Name</p>
                                    <div class="flex items-center gap-3 mt-2 text-sm text-gray-800">
                                        <span class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-300 text-xs">
                                            👤
                                        </span>
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="text-sm font-semibold text-[#0073FF]"
                                    onclick="openEditSection('edit-name')"
                                >
                                    Edit
                                </button>
                            </div>

                            <hr class="border-gray-100">

                            {{-- ROW: Occupation --}}
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs md:text-sm font-semibold text-gray-500">Occupation</p>
                                    <div class="flex items-center gap-3 mt-2 text-sm text-gray-800">
                                        <span class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-300 text-xs">
                                            💼
                                        </span>
                                        <span>{{ $user->occupation ?? 'Student' }}</span>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="text-sm font-semibold text-[#0073FF]"
                                    onclick="openEditSection('edit-occupation')"
                                >
                                    Edit
                                </button>
                            </div>

                            <hr class="border-gray-100">

                            {{-- ROW: Email --}}
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs md:text-sm font-semibold text-gray-500">Email Address</p>
                                    <div class="flex items-center gap-3 mt-2 text-sm text-gray-800">
                                        <span class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-300 text-xs">
                                            ✉️
                                        </span>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="text-sm font-semibold text-[#0073FF]"
                                    onclick="openEditSection('edit-email')"
                                >
                                    Edit
                                </button>
                            </div>

                            <hr class="border-gray-100">

                            {{-- ROW: Password --}}
                            <div class="flex items-center justify-between gap-4">
                                <div>
                                    <p class="text-xs md:text-sm font-semibold text-gray-500">Password</p>
                                    <div class="flex items-center gap-3 mt-2 text-sm text-gray-800">
                                        <span class="flex items-center justify-center w-7 h-7 rounded-full border border-gray-300 text-xs">
                                            🔒
                                        </span>
                                        <span>********</span>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    class="text-sm font-semibold text-[#0073FF]"
                                    onclick="openEditSection('edit-password')"
                                >
                                    Edit
                                </button>
                            </div>

                        </div>
                    </section>

                    {{-- FORM-FORM EDIT (PAKAI PARTIAL) --}}
                    <div class="mt-10 space-y-10">
                        {{-- Edit photo --}}
                        <section id="edit-photo" class="edit-section hidden bg-white rounded-2xl shadow px-6 py-6">
                            @include('profile.partials.update-photo-form')
                        </section>

                        {{-- Edit name --}}
                        <section id="edit-name" class="edit-section hidden bg-white rounded-2xl shadow px-6 py-6">
                            @include('profile.partials.update-name-form')
                        </section>

                        {{-- Edit occupation --}}
                        <section id="edit-occupation" class="edit-section hidden bg-white rounded-2xl shadow px-6 py-6">
                            @include('profile.partials.update-occupation-form')
                        </section>

                        {{-- Edit email --}}
                        <section id="edit-email" class="edit-section hidden bg-white rounded-2xl shadow px-6 py-6">
                            @include('profile.partials.update-email-form')
                        </section>

                        {{-- Edit password --}}
                        <section id="edit-password" class="edit-section hidden bg-white rounded-2xl shadow px-6 py-6">
                            @include('profile.partials.update-password-form')
                        </section>

                        {{-- Delete account (opsional) --}}
                        <section id="delete-account" class="edit-section hidden bg-white rounded-2xl shadow px-6 py-6">
                            @include('profile.partials.delete-user-form')
                        </section>
                    </div>

                </div>
            </div>
        </main>

        <script>
            // Toggle sidebar (mobile)
            const sidebar  = document.getElementById('sidebar');
            const overlay  = document.getElementById('sidebar-overlay');
            const toggleBtn = document.getElementById('sidebar-toggle'); // kalau ada di nav

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

            if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
            if (overlay)   overlay.addEventListener('click', toggleSidebar);

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('hidden');
                } else {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            // Toggle section edit
            function openEditSection(id) {
                document.querySelectorAll('.edit-section').forEach(el => el.classList.add('hidden'));
                const target = document.getElementById(id);
                if (target) {
                    target.classList.remove('hidden');
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        </script>
    </body>
</html>
