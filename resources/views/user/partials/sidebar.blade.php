<aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-lg">S</span>
            </div>
            <div>
                <h1 class="text-lg font-bold text-gray-900">SCW</h1>
                <p class="text-xs text-gray-500">User</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('user.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.dashboard')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5m0 16H9m0 0L5 12" />
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Contacts -->
        <a href="{{ route('user.contacts.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.contacts.index', 'user.contacts.show')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
            </svg>
            <span>Contacts</span>
        </a>

        <!-- Sponsors -->
        <a href="{{ route('user.sponsors.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.sponsors.index', 'user.sponsors.show')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span>Sponsors</span>
        </a>

        <!-- Strategic Committee -->
        <a href="{{ route('user.strategic_committees.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.strategic_committees.index', 'user.strategic_committees.show')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Strategic Committee</span>
        </a>

        <!-- Technical Committee -->
        <a href="{{ route('user.technical_committees.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.technical_committees.index', 'user.technical_committees.show')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
            <span>Technical Committee</span>
        </a>

        <!-- Strategic Speakers -->
        <a href="{{ route('user.strategic_speakers.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.strategic_speakers.index', 'user.strategic_speakers.show')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span>Strategic Speakers</span>
        </a>

        <!-- Technical Speakers -->
        <a href="{{ route('user.technical_speakers.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.technical_speakers.index', 'user.technical_speakers.show')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 3h6v6m0-6L9 15M3 3h6v6M3 3L15 15" />
            </svg>
            <span>Technical Speakers</span>
        </a>

        <!-- Sessions -->
        <a href="{{ route('user.sessions.my') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('user.sessions.*')) bg-green-50 text-green-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>My Sessions</span>
        </a>
    </nav>

    <!-- Footer Section -->
    <div class="p-4 border-t border-gray-200">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>