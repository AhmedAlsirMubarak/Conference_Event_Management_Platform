<aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-lg">S</span>
            </div>
            <div>
                <h1 class="text-lg font-bold text-gray-900">SCW</h1>
                <p class="text-xs text-gray-500">Admin</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('dashboard')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5m0 16H9m0 0L5 12" />
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Contacts -->
        <a href="{{ route('getAllContacts') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors @if (request()->routeIs('getAllContacts', 'getcontactById', 'editContact', 'updateContact')) bg-blue-50 text-blue-600 @else text-gray-700 hover:bg-gray-50 @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5h-4m7-12a8 8 0 100 16 8 8 0 000-16z" />
            </svg>
            <span>Contacts</span>
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