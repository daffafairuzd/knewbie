<nav id="nav-guest" class="flex w-full bg-white border-b border-gray-200 relative">
    <div class="flex w-full max-w-[1280px] px-4 md:px-8 lg:px-[75px] py-5 items-center mx-auto">
        <a href="{{ route('dashboard') }}" class="flex shrink-0 z-50">
            <h1 class="font-bold text-xl md:text-2xl">KNewbie</h1>
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex items-center gap-8 ml-12">
            <li>
                <a href="{{ route('dashboard') }}" 
                   class="hover:font-semibold transition-all duration-300 {{ request()->routeIs('dashboard') ? 'font-bold text-blue-600' : 'font-medium text-gray-700' }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('/pricing') }}" 
                   class="hover:font-semibold transition-all duration-300 {{ request()->is('pricing') ? 'font-bold text-blue-600' : 'font-medium text-gray-700' }}">
                    Pricing
                </a>
            </li>
        </ul>

        <!-- Desktop Right Side -->
        <div class="hidden lg:flex items-center gap-5 ml-auto">
            <!-- User Dropdown -->
            <div class="relative">
                <button id="userMenuButton" class="flex items-center gap-3 cursor-pointer hover:opacity-80 transition-opacity">
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="h-14 w-14 rounded-full object-cover" alt="images.png">
                    
                    <div class="text-left">
                        <h2 class="text-base font-semibold">{{ Auth::user()->name }}</h2>
                        <h2 class="text-sm text-gray-600">{{ Auth::user()->occupation }}</h2>
                    </div>
                    
                    <!-- Dropdown Arrow -->
                    <svg id="dropdownArrow" class="w-4 h-4 text-gray-600 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
                    <a href="{{ route('profile.edit') }}" 
                       class="flex items-center gap-3 px-4 py-3 transition-colors {{ request()->routeIs('profile.edit') ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="font-medium">Profile</span>
                    </a>
                    
                    <div class="border-t border-gray-100"></div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mobile: Hamburger Button -->
        <button id="hamburger" class="lg:hidden flex flex-col gap-1.5 z-50 ml-auto" aria-label="Toggle menu">
            <span class="w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out"></span>
            <span class="w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out"></span>
            <span class="w-6 h-0.5 bg-gray-800 transition-all duration-300 ease-in-out"></span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
         class="hidden lg:hidden absolute top-full left-0 w-full bg-white border-b border-gray-200 shadow-lg z-40">
        <div class="flex flex-col px-4 py-6 space-y-4">
            <a href="{{ route('dashboard') }}"
               class="py-2 border-b border-gray-100 transition-colors {{ request()->routeIs('dashboard') ? 'font-bold text-blue-600' : 'font-medium text-gray-700 hover:text-blue-600' }}">
                Dashboard
            </a>
            <a href="{{ url('/pricing') }}"
               class="py-2 border-b border-gray-100 transition-colors {{ request()->is('pricing') ? 'font-bold text-blue-600' : 'font-medium text-gray-700 hover:text-blue-600' }}">
                Pricing
            </a>
            
            <!-- Mobile User Info -->
            <div class="pt-4 border-t border-gray-200">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" class="h-12 w-12 rounded-full object-cover" alt="user">
                    <div>
                        <h3 class="font-semibold text-sm">{{ Auth::user()->name }}</h3>
                        <p class="text-xs text-gray-500">{{ Auth::user()->occupation }}</p>
                    </div>
                </div>
                
                <div class="flex flex-col gap-2">
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-2 py-2 px-3 rounded-lg transition-colors {{ request()->routeIs('profile.edit') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-sm">Profile</span>
                    </a>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-2 py-2 px-3 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            <span class="text-sm font-medium">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // User Dropdown Toggle
    const userMenuButton = document.getElementById('userMenuButton');
    const userDropdown = document.getElementById('userDropdown');
    const dropdownArrow = document.getElementById('dropdownArrow');

    if (userMenuButton && userDropdown) {
        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
            dropdownArrow.classList.toggle('rotate-180');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
            }
        });
    }

    // Hamburger Menu Toggle
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');

    if (hamburger && mobileMenu) {
        const hamburgerLines = hamburger.querySelectorAll('span');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            if (!mobileMenu.classList.contains('hidden')) {
                hamburgerLines[0].classList.add('rotate-45', 'translate-y-2');
                hamburgerLines[1].classList.add('opacity-0');
                hamburgerLines[2].classList.add('-rotate-45', '-translate-y-2');
            } else {
                hamburgerLines[0].classList.remove('rotate-45', 'translate-y-2');
                hamburgerLines[1].classList.remove('opacity-0');
                hamburgerLines[2].classList.remove('-rotate-45', '-translate-y-2');
            }
        });

        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    hamburgerLines[0].classList.remove('rotate-45', 'translate-y-2');
                    hamburgerLines[1].classList.remove('opacity-0');
                    hamburgerLines[2].classList.remove('-rotate-45', '-translate-y-2');
                }
            }
        });
    }
</script>