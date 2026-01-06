<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/webp" href="{{ asset('nav-img/scw-logo.webp') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body class="bg-gray-50 w-full h-full">
    <!-- Responsive Mode Indicator (Remove in production) -->



    <div class="flex flex-col md:flex-row h-screen w-screen overflow-hidden">
        <!-- Sidebar - Hidden on mobile, visible on desktop -->
        <div class="desktop-sidebar hidden md:block md:w-64">
            @include('admin.partials.sidebar')
        </div>

        <!-- Mobile Sidebar Toggle Container -->
        <div id="mobile-sidebar-container" class="fixed md:hidden inset-0 z-50 hidden">
            <!-- Overlay -->
            <div id="mobile-overlay" class="absolute inset-0 bg-black bg-opacity-50 transition-opacity duration-300">
            </div>
            <!-- Sidebar Content -->
            <div class="absolute top-0 left-0 h-full w-64 bg-white border-r border-gray-200 flex flex-col overflow-y-auto transition-transform duration-300 transform -translate-x-full"
                id="mobile-sidebar-panel">
                @include('admin.partials.sidebar')
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            @include('admin.partials.header')

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-3 sm:p-6">
                <!-- Breadcrumb -->
                @if (isset($breadcrumbs))
                    <div class="mb-6">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="flex items-center space-x-2">
                                @foreach ($breadcrumbs as $breadcrumb)
                                    @if ($loop->last)
                                        <li class="text-gray-500 text-sm">{{ $breadcrumb['name'] }}</li>
                                    @else
                                        <li>
                                            <a href="{{ $breadcrumb['url'] }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                                {{ $breadcrumb['name'] }}
                                            </a>
                                        </li>
                                        <li class="text-gray-400">/</li>
                                    @endif
                                @endforeach
                            </ol>
                        </nav>
                    </div>
                @endif

                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-green-800">Success</h3>
                            <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border border-red-200 flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h3 class="text-sm font-medium text-red-800">Error</h3>
                            <p class="text-sm text-red-700 mt-1">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-3 sm:px-6 py-4">
                <div class="text-center text-xs text-gray-600">
                    <p>© 2025 developed by <a href="https://www.linkedin.com/in/ahmed-alsir-20a3a8151/" target="_blank"
                            rel="noopener noreferrer" class="text-blue-600 hover:text-blue-700 font-medium">Ahmed Alsir
                            Mubarak</a>. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const sidebarContainer = document.getElementById('mobile-sidebar-container');
            const sidebarPanel = document.getElementById('mobile-sidebar-panel');
            const overlay = document.getElementById('mobile-overlay');

            if (!mobileMenuBtn || !sidebarContainer) {
                return;
            }

            // Toggle sidebar visibility
            mobileMenuBtn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const isHidden = sidebarContainer.classList.contains('hidden');

                if (isHidden) {
                    // Show sidebar
                    sidebarContainer.classList.remove('hidden');
                    setTimeout(() => {
                        if (sidebarPanel) {
                            sidebarPanel.classList.remove('-translate-x-full');
                        }
                    }, 10);
                } else {
                    // Hide sidebar
                    if (sidebarPanel) sidebarPanel.classList.add('-translate-x-full');
                    setTimeout(() => {
                        sidebarContainer.classList.add('hidden');
                    }, 300);
                }
            });

            // Close sidebar when clicking overlay
            if (overlay) {
                overlay.addEventListener('click', function () {
                    if (sidebarPanel) sidebarPanel.classList.add('-translate-x-full');
                    setTimeout(() => {
                        sidebarContainer.classList.add('hidden');
                    }, 300);
                });
            }

            // Close sidebar when clicking on a link
            const sidebarLinks = sidebarContainer.querySelectorAll('a');

            sidebarLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    if (sidebarPanel) sidebarPanel.classList.add('-translate-x-full');
                    setTimeout(() => {
                        sidebarContainer.classList.add('hidden');
                    }, 300);
                });
            });

            // Handle Submissions menu toggle
            const submissionsToggles = document.querySelectorAll('.submissions-toggle');
            submissionsToggles.forEach(toggle => {
                toggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    const submissionsMenu = this.closest('.submissions-menu');
                    const submissionsItems = submissionsMenu.querySelector('.submissions-items');
                    const arrow = submissionsMenu.querySelector('.submissions-arrow');

                    submissionsItems.classList.toggle('hidden');
                    arrow.classList.toggle('rotate-180');
                });
            });
        });
    </script>
</body>

</html>