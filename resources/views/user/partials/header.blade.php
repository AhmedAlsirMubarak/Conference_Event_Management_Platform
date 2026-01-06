<header class="bg-white border-b border-gray-200">
    <div class="px-3 sm:px-6 py-3 sm:py-4 flex items-center justify-between">
        <!-- Mobile Menu Button + Title -->
        <div class="flex items-center gap-3">
            <!-- Hamburger Menu - Mobile Only -->
            <button id="mobile-menu-btn" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors"
                aria-label="Toggle menu">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Title -->
            <div class="min-w-0">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-900 truncate">@yield('header-title', 'Dashboard')
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-1 hidden sm:block">
                    @yield('header-subtitle', 'Welcome back')</p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex items-center gap-2 sm:gap-4">
            <!-- Search (optional) - Hidden on mobile -->
            <div class="hidden lg:block relative">
                <form action="{{ route('user.search') }}" method="GET" class="flex items-center">
                    <input type="text" name="q" placeholder="Search all..." value="{{ request('q', '') }}"
                        class="pl-4 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <button type="submit"
                        class="ml-2 px-3 py-2 bg-green-500 text-white rounded-lg text-sm hover:bg-green-600 transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- Notification Bell -->
            @include('components.notification-bell', ['notificationRole' => 'user'])

            <!-- User Menu -->
            <div class="flex items-center gap-2 sm:gap-4 pl-2 sm:pl-4 border-l border-gray-200">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-medium text-gray-900">{{ Auth::user()?->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500">User</p>
                </div>
                <div
                    class="w-9 sm:w-10 h-9 sm:h-10 bg-linear-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    {{ strtoupper(substr(Auth::user()?->name ?? 'U', 0, 1)) }}
                </div>
            </div>
        </div>
    </div>
</header>