<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Saudi Climate Week 2026 - Driving Regional Climate Action & Clean Energy Innovation in Riyadh, May 24-27, 2026">
    <meta name="keywords" content="Saudi Climate Week, SCW 2026, Climate Action, Clean Energy, Sustainability">
    <link rel="icon" type="image/webp" href="/storage/nav-img/scw-logo.webp">
    @vite('resources/css/app.css')
    <title>Saudi Climate Week 2026 - Climate Action & Clean Energy</title>
</head>

<body class="bg-black">

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-zinc-900 border-b border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <div class="flex items-center">
                    <img class="h-10 sm:h-12 w-auto" src="/storage/nav-img/scw-logo.webp" alt="SCW Logo">
                </div>
                <div class="hidden sm:flex items-center gap-4">
                    <span class="text-white text-sm font-medium">May 24-27, 2026 • Riyadh</span>
                    <a href="#contact"
                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm font-medium transition-colors">
                        Get Involved
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="/storage/mix/hero-homeeng.webp" alt="Saudi Climate Week">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <!-- Left Content -->
                <div class="flex flex-col gap-6 sm:gap-8">
                    <div>
                        <img src="/storage/mix/back-icon.webp" alt="Section Icon"
                            class="h-8 sm:h-10 w-auto mb-4 sm:mb-6">
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                        Saudi Climate <span class="text-blue-500">Week 2026</span>
                    </h1>
                    <p class="text-lg sm:text-xl text-gray-100 leading-relaxed max-w-lg">
                        Driving Regional Climate Action & Clean Energy Innovation
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#contact"
                            class="px-6 sm:px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors text-center">
                            Join the Movement
                        </a>
                        <a href="#about"
                            class="px-6 sm:px-8 py-3 border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white font-semibold rounded-lg transition-colors text-center">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Event Details Card -->
                <div class="bg-zinc-900/80 backdrop-blur border border-zinc-800 rounded-2xl p-6 sm:p-8">
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-lg">Event Dates</h3>
                                <p class="text-gray-300 text-sm">May 24-27, 2026</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-lg">Location</h3>
                                <p class="text-gray-300 text-sm">Riyadh, Saudi Arabia</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold text-lg">Focus Areas</h3>
                                <p class="text-gray-300 text-sm">Climate Action & Clean Energy Innovation</p>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-zinc-700">
                            <p class="text-gray-400 text-sm mb-4">Organized by:</p>
                            <div class="flex items-center gap-4">
                                <img src="/storage/footer-img/ecocode-logo.webp" alt="Ecocode" class="h-8 w-auto">
                                <div class="w-px h-8 bg-zinc-700"></div>
                                <img src="/storage/footer-img/birba-logo-white.webp" alt="Birba" class="h-8 w-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 sm:py-24 bg-zinc-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">About the Event</h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Saudi Climate Week 2026 brings together global leaders, innovators, and stakeholders to drive
                    regional climate action and advance clean energy solutions.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <div
                    class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 sm:p-8 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Innovation</h3>
                    <p class="text-gray-300">Cutting-edge clean energy technologies and sustainable solutions</p>
                </div>

                <div
                    class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 sm:p-8 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Collaboration</h3>
                    <p class="text-gray-300">Connect with regional and global climate leaders and innovators</p>
                </div>

                <div
                    class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 sm:p-8 hover:border-blue-500 transition-colors">
                    <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Sustainability</h3>
                    <p class="text-gray-300">Advancing climate action and sustainable development goals</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact/Registration Section -->
    <section id="contact" class="py-16 sm:py-24 bg-black">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">Get Involved</h2>
                <p class="text-lg text-gray-300">
                    Join us in driving climate action. Fill out the form below to stay updated and connect with us.
                </p>
            </div>

            <!-- Contact Form -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-6 sm:p-10">
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 border-l-4 border-red-500">
                        <h3 class="font-bold text-red-900 text-sm mb-2">Please fix the following errors:</h3>
                        <ul class="space-y-1 text-red-800 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border-l-4 border-green-500">
                        <h3 class="font-bold text-green-900 text-sm mb-1">Success!</h3>
                        <p class="text-green-800 text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('create') }}" class="space-y-6">
                    @csrf

                    <!-- Row 1: Full Name & Designation -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-white text-sm font-semibold mb-2">Full Name *</label>
                            <input type="text" name="name" required minlength="2" maxlength="100" placeholder="John Doe"
                                class="w-full px-4 py-2.5 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-colors @error('name') border-red-500 @enderror">
                            @error('name')<span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block text-white text-sm font-semibold mb-2">Designation</label>
                            <input type="text" name="designation" maxlength="100" placeholder="CEO, Manager, etc."
                                class="w-full px-4 py-2.5 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-colors">
                        </div>
                    </div>

                    <!-- Row 2: Company & Website -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-white text-sm font-semibold mb-2">Company</label>
                            <input type="text" name="company" maxlength="100" placeholder="Your Company Name"
                                class="w-full px-4 py-2.5 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-colors">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-semibold mb-2">Website</label>
                            <input type="url" name="website" maxlength="255" placeholder="https://example.com"
                                class="w-full px-4 py-2.5 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-colors @error('website') border-red-500 @enderror">
                            @error('website')<span
                            class="text-red-400 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Row 3: Email & Phone -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-white text-sm font-semibold mb-2">Email *</label>
                            <input type="email" name="email" required placeholder="you@example.com"
                                class="w-full px-4 py-2.5 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-colors @error('email') border-red-500 @enderror">
                            @error('email')<span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>
                        <div>
                            <label class="block text-white text-sm font-semibold mb-2">Phone *</label>
                            <input type="tel" name="phone" required pattern="(\+\d{1,3})?[\s]?[\d\s\-]{8,15}"
                                placeholder="+968 95123456"
                                class="w-full px-4 py-2.5 bg-zinc-800 border border-zinc-700 rounded-lg text-white placeholder-gray-400 focus:border-blue-500 focus:outline-none transition-colors @error('phone') border-red-500 @enderror">
                            @error('phone')<span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-6 py-3 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 text-white font-semibold rounded-lg transition-colors">
                        Send Information
                    </button>
                    <p class="text-center text-gray-400 text-xs">* Required fields</p>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-zinc-900 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 sm:gap-8">
                <!-- Contact -->
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-semibold">Contact Us</p>
                        <a href="mailto:Sales@brba.om"
                            class="text-blue-400 hover:text-blue-300 text-sm transition-colors">Sales@brba.om</a>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="text-gray-400 text-sm">
                    © 2025 Saudi Climate Week. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

</body>

</html>