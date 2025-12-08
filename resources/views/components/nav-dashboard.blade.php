<nav id="nav-guest" class="flex w-full bg-white border-b border-gray-200 relative">
    <div class="flex w-full max-w-[1280px] px-4 md:px-8 lg:px-[75px] py-5 items-center mx-auto">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="flex shrink-0 z-50">
            <h1 class="font-bold text-xl md:text-2xl">Knewbie</h1>
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden lg:flex items-center gap-8 ml-12">
            <li class="hover:font-semibold transition-all duration-300 font-semibold">
                <a href="{{ url('/') }}">Overview</a>
            </li>
            <li class="hover:font-semibold transition-all duration-300">
                <a href="{{ url('/pricing') }}">Courses</a>
            </li>
        </ul>

        <!-- Desktop Right Side -->
        <div class="hidden lg:flex items-center gap-5 ml-auto">
            <a href="{{ url('/messages') }}" class="flex shrink-0">
                <img src="{{ asset('assets/images/icons/notification.svg') }}" class="flex shrink-0" alt="icon">
            </a>
            <div class="h-[50px] flex shrink-0 bg-gray-200 w-px"></div>
           <div id="userId" class="flex items-center gap-3">
                <img src="{{ asset('assets/images/photos/3rdPerson.png') }}" class="h-14" alt="">
                
                <div>
                    <h2 class="text-base font-semibold">Amelia</h2>
                    <h2 class="text-sm text-gray-600">Student</h2>
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
            <a href="{{ url('/') }}"
               class="font-semibold text-gray-900 hover:text-blue-600 py-2 border-b border-gray-100">
                Home
            </a>
            <a href="{{ url('/pricing') }}"
               class="font-medium text-gray-700 hover:text-blue-600 py-2 border-b border-gray-100">
                Pricing
            </a>
            <a href="{{ url('/features') }}"
               class="font-medium text-gray-700 hover:text-blue-600 py-2 border-b border-gray-100">
                Features
            </a>
            <a href="{{ url('/testimonials') }}"
               class="font-medium text-gray-700 hover:text-blue-600 py-2 border-b border-gray-100">
                Testimonials
            </a>

            <div class="flex flex-col gap-3 pt-4">
                <a href="{{ route('register') }}"
                   class="rounded-full border border-gray-200 py-3 px-5 bg-white hover:border-blue-600 transition-all duration-300 text-center">
                    <span class="font-semibold">Sign Up</span>
                </a>
                <a href="{{ route('login') }}"
                   class="rounded-full py-3 px-5 bg-blue-600 hover:shadow-lg transition-all duration-300 text-center">
                    <span class="font-semibold text-white">My Account</span>
                </a>
            </div>

            <a href="{{ url('/messages') }}" class="flex items-center gap-2 py-2 text-gray-700 hover:text-blue-600">
                <img src="{{ asset('assets/images/icons/device-message.svg') }}" class="w-5 h-5" alt="icon">
                <span class="font-medium">Messages</span>
            </a>
        </div>
    </div>
</nav>
