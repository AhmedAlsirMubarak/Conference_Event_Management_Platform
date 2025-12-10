<header class="bg-white border-b border-gray-200">
    <div class="px-6 py-4 flex items-center justify-between">
        <!-- Title -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900">@yield('header-title', 'Dashboard')</h2>
            <p class="text-sm text-gray-500 mt-1">@yield('header-subtitle', 'Welcome back')</p>
        </div>

        <!-- Right Section -->
        <div class="flex items-center gap-4">
            <!-- Search (optional) -->
            <div class="hidden sm:block relative">
                <form action="{{ route('admin.search') }}" method="GET" class="flex items-center">
                    <input type="text" name="q" placeholder="Search all..." value="{{ request('q', '') }}"
                        class="pl-4 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit"
                        class="ml-2 px-3 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- User Menu -->
            <div class="flex items-center gap-4 pl-4 border-l border-gray-200">
                <div class="text-right">
                    <p class="text-sm font-medium text-gray-900">Admin</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
                <div
                    class="w-10 h-10 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                    A
                </div>
            </div>
        </div>
    </div>
</header>