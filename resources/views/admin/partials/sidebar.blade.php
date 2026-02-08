<aside class="w-64 bg-white border-r border-gray-200 flex flex-col h-full">
    <!-- Logo Section -->
    <div class="p-4 sm:p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-linear-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-white font-bold text-lg">S</span>
            </div>
            <div class="min-w-0">
                <h1 class="text-lg font-bold text-gray-900 truncate">SCW</h1>
                <p class="text-xs text-gray-500">Admin</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-3 sm:px-4 py-4 sm:py-6 space-y-1 sm:space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('dashboard')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5m0 16H9m0 0L5 12" />
            </svg>
            <span class="truncate">Dashboard</span>
        </a>

        <!-- Submissions Parent -->
        <div class="submissions-menu">
            <!-- Submissions Toggle Button -->
            <button type="button"
                class="submissions-toggle w-full flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('getAllContacts', 'getcontactById', 'editContact', 'updateContact', 'climate-leaders.*')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="truncate flex-1">Submissions</span>
                <svg class="submissions-arrow w-4 h-4 flex-shrink-0 transition-transform @if (request()->routeIs('getAllContacts', 'getcontactById', 'editContact', 'updateContact', 'climate-leaders.*')) rotate-180 @endif"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </button>

            <!-- Submissions Sub-items -->
            <div
                class="submissions-items @if (!request()->routeIs('getAllContacts', 'getcontactById', 'editContact', 'updateContact', 'climate-leaders.*')) hidden @endif ml-4 mt-1 space-y-1">
                <!-- Contacts -->
                <a href="{{ route('getAllContacts') }}"
                    class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('getAllContacts', 'getcontactById', 'editContact', 'updateContact')) bg-blue-100 text-blue-600 @else text-gray-600 hover:bg-gray-50 @endif">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
                    </svg>
                    <span class="truncate">Contacts</span>
                </a>

                <!-- Climate Leaders -->
                <a href="{{ route('climate-leaders.index') }}"
                    class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('climate-leaders.*')) bg-blue-100 text-blue-600 @else text-gray-600 hover:bg-gray-50 @endif">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="truncate">Climate Leaders</span>
                </a>

                <!-- Speakers Submissions -->
                <a href="{{ route('speaker-submissions.index') }}"
                    class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('speaker-submissions.*')) bg-blue-100 text-blue-600 @else text-gray-600 hover:bg-gray-50 @endif">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <span class="truncate">Speakers Submissions</span>
                </a>

                <!-- Exhibit Submissions  -->
                <a href="{{ route('exhibit-submissions.index') }}"
                    class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('admin.exhibit-submissions.index', 'admin.exhibit-submissions.show')) bg-green-100 text-green-600 @else text-gray-600 hover:bg-gray-50 @endif">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="truncate">Exhibit Submissions</span>
                </a>

                <!-- Sponsor Submissions  -->
                <a href="{{ route('sponsor-submissions.index') }}"
                    class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('sponsor-submissions.*')) bg-purple-100 text-purple-600 @else text-gray-600 hover:bg-gray-50 @endif">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="truncate">Sponsor Submissions</span>
                </a>

            </div>
        </div>

        <!-- Sponsors -->
        <a href="{{ route('sponsors.index') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('sponsors.index', 'sponsors.create', 'sponsors.show', 'sponsors.edit')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <span class="truncate">Sponsors</span>
        </a>

        <!-- Exhibitors -->
        <a href="{{ route('exhibitors.index') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('exhibitors.index', 'exhibitors.create', 'exhibitors.show', 'exhibitors.edit')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
            </svg>
            <span class="truncate">Exhibitors</span>
        </a>

        <!-- Strategic Committee -->
        <a href="{{ route('strategic_committees.index') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('strategic_committees.index', 'strategic_committees.create', 'strategic_committees.show', 'strategic_committees.edit')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span class="truncate">Strategic Committee</span>
        </a>

        <!-- Technical Committee -->
        <a href="{{ route('technical_committees.index') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('technical_committees.index', 'technical_committees.create', 'technical_committees.show', 'technical_committees.edit')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
            <span class="truncate">Technical Committee</span>
        </a>

        <!-- Strategic Speakers -->
        <a href="{{ route('strategic_speakers.index') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('strategic_speakers.index', 'strategic_speakers.create', 'strategic_speakers.show', 'strategic_speakers.edit')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="truncate">Strategic Speakers</span>
        </a>

        <!-- Technical Speakers -->
        <a href="{{ route('technical_speakers.index') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('technical_speakers.index', 'technical_speakers.create', 'technical_speakers.show', 'technical_speakers.edit')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 3h6v6m0-6L9 15M3 3h6v6M3 3L15 15" />
            </svg>
            <span class="truncate">Technical Speakers</span>
        </a>

        <!-- Sessions Management -->
        <a href="{{ route('sessions.my') }}"
            class="flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg font-medium text-sm sm:text-base transition-colors @if (request()->routeIs('sessions.*')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="truncate">Sessions</span>
        </a>
    </nav>

    <!-- Footer Section -->
    <div class="p-3 sm:p-4 border-t border-gray-200">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium text-sm sm:text-base transition-colors">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="truncate">Logout</span>
            </button>
        </form>
    </div>
</aside>