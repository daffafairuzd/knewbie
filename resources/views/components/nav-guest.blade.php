<nav id="nav-guest" class="flex w-full bg-white border-b border-gray-200 relative">
    <div class="flex w-full max-w-[1280px] px-4 md:px-8 lg:px-[75px] py-5 items-center mx-auto">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex shrink-0 z-50">
            <h1 class="font-bold text-xl md:text-2xl">Knewbie</h1>
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex items-center gap-8 ml-12">
            <li>
                <a href="{{ url('/') }}" 
                   class="hover:font-semibold transition-all duration-300 {{ request()->is('/') ? 'font-bold text-blue-600' : 'font-medium text-gray-700' }}">
                    Home
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
            <div class="flex items-center gap-3">
                <a href="{{ route('register') }}"
                   class="rounded-full border border-gray-200 py-3 px-5 bg-white hover:border-blue-600 transition-all duration-300 {{ request()->routeIs('register') ? 'border-blue-600 bg-blue-50' : '' }}">
                    <span class="font-semibold {{ request()->routeIs('register') ? 'text-blue-600' : 'text-gray-700' }}">Sign Up</span>
                </a>
                <a href="{{ route('login') }}"
                   class="rounded-full py-3 px-5 hover:shadow-lg transition-all duration-300 {{ request()->routeIs('login') ? 'bg-blue-700' : 'bg-blue-600' }}">
                    <span class="font-semibold text-white">My Account</span>
                </a>
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
            <a href="{{ url('/') }}"
               class="py-2 border-b border-gray-100 transition-colors {{ request()->is('/') ? 'font-bold text-blue-600' : 'font-medium text-gray-700 hover:text-blue-600' }}">
                Home
            </a>
            <a href="{{ url('/pricing') }}"
               class="py-2 border-b border-gray-100 transition-colors {{ request()->is('pricing') ? 'font-bold text-blue-600' : 'font-medium text-gray-700 hover:text-blue-600' }}">
                Pricing
            </a>
            <div class="flex flex-col gap-3 pt-4">
                <a href="{{ route('register') }}"
                   class="rounded-full border py-3 px-5 bg-white hover:border-blue-600 transition-all duration-300 text-center {{ request()->routeIs('register') ? 'border-blue-600 bg-blue-50 text-blue-600 font-bold' : 'border-gray-200 font-semibold text-gray-700' }}">
                    <span>Sign Up</span>
                </a>
                <a href="{{ route('login') }}"
                   class="rounded-full py-3 px-5 hover:shadow-lg transition-all duration-300 text-center {{ request()->routeIs('login') ? 'bg-blue-700' : 'bg-blue-600' }}">
                    <span class="font-semibold text-white">My Account</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
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