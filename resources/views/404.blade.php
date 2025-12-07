<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Page Not Found - Saudi Climate Week 2026">
    <link rel="icon" type="image/x-icon" href="/images/scw-logo.webp">
    <link rel="apple-touch-icon" href="/images/scw-logo.webp">
    @vite('resources/css/app.css')

    <title>404 - Page Not Found | Saudi Climate Week 2026</title>
</head>

<body class="bg-black">
    <!-- 404 Error Page -->
    <div class="w-full min-h-screen bg-black flex flex-col justify-center items-center px-4 py-12">
        <!-- Background gradient overlay -->
        <div class="absolute inset-0 bg-linear-to-br from-black via-black to-zinc-900 opacity-80"></div>

        <!-- Content Container -->
        <div class="relative z-10 w-full max-w-2xl text-center">
            <!-- Logo -->
            <div class="mb-8 sm:mb-12">
                <img class="h-16 sm:h-20 w-auto mx-auto" src="/images/scw-logo.webp" alt="SCW Logo" />
            </div>

            <!-- 404 Number -->
            <div class="mb-6 sm:mb-8">
                <h1
                    class="text-6xl sm:text-7xl md:text-8xl lg:text-9xl font-bold font-['Montserrat'] text-blue-500 leading-none drop-shadow-lg">
                    404
                </h1>
            </div>

            <!-- Error Message -->
            <div class="mb-6 sm:mb-8">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold font-['Montserrat'] text-white mb-4">
                    Page Not Found
                </h2>
                <p class="text-sm sm:text-base md:text-lg text-gray-300 font-['Montserrat'] leading-relaxed">
                    Sorry, the page you're looking for doesn't exist or has been moved. Please check the URL and try
                    again.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12 sm:mb-16">
                <!-- Home Button -->
                <a href="/"
                    class="w-full sm:w-auto px-6 sm:px-8 py-2.5 sm:py-3 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 rounded-md inline-flex justify-center items-center gap-2 transition-colors font-bold text-white text-sm sm:text-base font-['Inter']">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4" />
                    </svg>
                    Go Home
                </a>

                <!-- Contact Button -->
                <a href="mailto:Sales@birba.om"
                    class="w-full sm:w-auto px-6 sm:px-8 py-2.5 sm:py-3 border-2 border-blue-500 hover:bg-blue-500/10 active:bg-blue-500/20 rounded-md inline-flex justify-center items-center gap-2 transition-colors font-bold text-blue-500 text-sm sm:text-base font-['Inter']">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Contact Us
                </a>
            </div>

            <!-- Error Details -->
            <div class="bg-zinc-900/50 border border-zinc-700 rounded-lg p-6 sm:p-8 backdrop-blur-sm">
                <h3 class="text-lg sm:text-xl text-white font-bold font-['Montserrat'] mb-4">What Can You Do?</h3>
                <ul class="text-left space-y-3 text-gray-300 text-xs sm:text-sm md:text-base font-['Montserrat']">
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 10l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Return to the <a href="/" class="text-blue-400 hover:text-blue-300 underline">home
                                page</a></span>
                    </li>
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 10l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Check the URL for typos</span>
                    </li>
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-blue-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 10l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span><a href="mailto:Sales@birba.om"
                                class="text-blue-400 hover:text-blue-300 underline">Contact our support team</a> if you
                            believe this is an error</span>
                    </li>
                </ul>
            </div>

            <!-- Footer Info -->
            <div class="mt-12 pt-8 border-t border-zinc-700">
                <p class="text-gray-400 text-xs sm:text-sm font-['Montserrat']">
                    Saudi Climate Week 2026 | <a href="mailto:Sales@birba.om"
                        class="text-blue-400 hover:text-blue-300">Sales@birba.om</a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>