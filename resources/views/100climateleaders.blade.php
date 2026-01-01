<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('100climateleaders.page_title') }}</title>
    <meta name="description" content="{{ __('100climateleaders.meta_description') }}">
    <meta name="keywords"
        content="climate leaders, climate action, sustainability, recognition program, environmental innovation">
    <meta name="author" content="Saudi Climate Week">
    <meta name="robots" content="index, follow">

    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#E68238">
    <meta name="apple-mobile-web-app-title" content="{{ __('100climateleaders.page_title') }}">

    <link rel="icon" type="image/webp" href="/storage/nav-img/scw-logo.webp">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Smooth scroll behavior -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <!-- Scroll anchor handler -->
    <script>
        // Simple scroll to nomination form
        function scrollToForm(event) {
            if (event.target.getAttribute('href') === '#nominationForm') {
                event.preventDefault();

                // Find all elements with id nominationForm and pick the visible one
                const forms = document.querySelectorAll('[id="nominationForm"]');
                let visibleForm = null;

                forms.forEach(form => {
                    const style = window.getComputedStyle(form);
                    if (style.display !== 'none') {
                        visibleForm = form;
                    }
                });

                if (visibleForm) {
                    visibleForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    // Add extra scroll adjustment for sticky nav
                    setTimeout(() => {
                        window.scrollBy(0, -80);
                    }, 500);
                }
            }
        }

        // Attach to all nomination buttons after page loads
        window.addEventListener('load', function () {
            document.querySelectorAll('a[href="#nominationForm"]').forEach(link => {
                link.onclick = scrollToForm;
            });
        });
    </script>

</head>

<body class="overflow-x-hidden" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <!-- Include Navigation -->
    @include('partials.navigation')



    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="fixed top-20 right-4 md:right-8 z-50 max-w-md animate-fade-in">
            <div
                class="bg-green-500 border border-green-600 text-white px-6 py-4 rounded-lg shadow-lg flex items-start gap-3">
                <svg class="w-6 h-6 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <div class="flex-1">
                    <h3 class="font-semibold">{{ __('Success') }}</h3>
                    <p class="text-sm text-green-50 mt-1">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="text-green-100 hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.3s ease-in-out;
            }
        </style>

        <script>
            // Auto-dismiss alert after 5 seconds
            setTimeout(() => {
                const alert = document.querySelector('.animate-fade-in');
                if (alert) {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.3s ease-out';
                    setTimeout(() => alert.parentElement.remove(), 300);
                }
            }, 5000);
        </script>
    @endif

    <!-- ==================== DESKTOP HERO SECTION (lg and above) ==================== -->
    <section class="hidden lg:block relative w-full overflow-hidden h-[600px] pt-[110px]">
        <!-- Background image -->
        <div class="absolute inset-0 bg-cover bg-center" aria-hidden="true">
            <img src="/storage/mix/100-hero.webp" alt="100 Climate Leaders">
        </div>

        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black/10" aria-hidden="true"></div>

        <!-- Soft bottom fade -->
        <div class="absolute inset-x-0 bottom-0 h-28 bg-linear-to-t from-black/1 to-transparent" aria-hidden="true">
        </div>

        <!-- LEFT title panel -->
        <div class="absolute {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}-0 top-38 h-[223px] w-[58%]
           {{ app()->getLocale() === 'ar' ? 'bg-linear-to-l' : 'bg-linear-to-r' }} from-[#7D876B]/90 via-[#7D876B]/50 to-transparent"
            aria-hidden="true"></div>

        <!-- Content wrapper -->
        <div class="relative mx-auto max-w-6xl px-6 py-10">
            <!-- Top row: 100 + titles -->
            <div class="flex items-center {{ app()->getLocale() === 'ar' ? 'right' : 'left' }} gap-10">
                <div class="shrink-0 text-white text-[152.86px] font-bold leading-none tracking-tight">
                    {{ __('100climateleaders.hero_number') }}
                </div>

                <div class="pt-1">
                    <div class="text-white font-bold leading-tight text-[60px]">
                        {{ __('100climateleaders.hero_title') }}<br />
                        {{ __('100climateleaders.hero_title_2') }}
                    </div>
                    <div class="text-orange-400 font-medium leading-none text-[60px] -mt-1">
                        {{ __('100climateleaders.hero_subtitle') }}
                    </div>
                </div>
            </div>

            <!-- Bottom row: button + paragraph -->
            <div class="mt-10 flex items-center {{ app()->getLocale() === 'ar' ? 'right' : 'left' }} gap-10">
                <a href="#nominationForm" class="inline-flex items-center justify-center rounded-md bg-[#E68238] px-6 py-3
                   text-[14px] font-semibold uppercase tracking-wide text-white shadow-sm
                   hover:bg-orange-600 active:bg-orange-700 transition">
                    {{ __('100climateleaders.hero_button') }}
                </a>

                <p class="text-white/70 text-[16px] leading-relaxed max-w-sm w-[356px] pl-10">
                    {{ __('100climateleaders.hero_description') }}
                </p>
            </div>
        </div>
    </section>

    <!-- ==================== MOBILE & TABLET HERO SECTION (below lg) ==================== -->
    <section class="lg:hidden relative w-full overflow-hidden pt-10 pb-10">
        <!-- Background image -->
        <div class="absolute inset-0 bg-cover bg-center" aria-hidden="true">
            <img src="/storage/mix/100-hero.webp" alt="100 Climate Leaders" class="w-full h-full object-cover">
        </div>

        <!-- Dark overlay for readability -->
        <div class="absolute inset-0 bg-black/20" aria-hidden="true"></div>

        <!-- Soft bottom fade -->
        <div class="absolute inset-x-0 bottom-0 h-16 md:h-24 bg-linear-to-t from-black/40 to-transparent"
            aria-hidden="true"></div>

        <!-- Content wrapper -->
        <div class="relative mx-auto max-w-full px-4 md:px-8 py-8 md:py-12">
            <!-- Main content centered -->
            <div class="flex flex-col items-center text-center gap-6 md:gap-8">

                <!-- Large number -->
                <div class="text-white text-6xl md:text-7xl font-bold leading-none">
                    {{ __('100climateleaders.hero_number') }}
                </div>

                <!-- Titles -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight mb-1">
                        {{ __('100climateleaders.hero_title') }}<br />
                        {{ __('100climateleaders.hero_title_2') }}
                    </h1>
                    <h2 class="text-2xl md:text-3xl font-bold text-orange-400">
                        {{ __('100climateleaders.hero_subtitle') }}
                    </h2>
                </div>

                <!-- Description -->
                <p class="text-white/80 text-sm md:text-base leading-relaxed max-w-xs md:max-w-md">
                    {{ __('100climateleaders.hero_description') }}
                </p>

                <!-- Button -->
                <a href="#nominationForm" class="inline-flex items-center justify-center rounded-lg bg-[#E68238] px-6 py-3
                   text-sm md:text-base font-semibold uppercase tracking-wide text-white shadow-md
                   hover:bg-orange-600 active:bg-orange-700 transition">
                    {{ __('100climateleaders.hero_button') }}
                </a>
            </div>
        </div>
    </section>


    <!-- ==================== DESKTOP: Why This Recognition Matters (lg and above) ==================== -->
    <section class="hidden lg:block relative overflow-hidden bg-[#0B141B]"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- subtle background glow/gradient -->
        <div class="absolute inset-0 bg-linear-to-b from-[#0F1C26] via-[#0B141B] to-[#0B141B]" aria-hidden="true">
        </div>
        <div class="absolute -top-40 left-1/2 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-white/5 blur-3xl"
            aria-hidden="true"></div>

        <div class="relative mx-auto max-w-6xl px-6 py-20">
            <!-- Header -->
            <div class="text-center">
                <div class="text-[11px] font-semibold tracking-[0.22em] text-[#E68238] uppercase">
                    {{ __('100climateleaders.recognition_label') }}
                </div>

                <h2 class="mt-3 text-4xl font-bold text-white">
                    {{ __('100climateleaders.recognition_title') }}
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-white/60">
                    {{ __('100climateleaders.recognition_description') }}
                </p>
            </div>

            <!-- Cards -->
            <div class="mt-16 grid gap-10 grid-cols-3">
                <!-- Item 1 -->
                <div class="relative px-0">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-500/70 text-orange-400">
                        <!-- icon -->
                        <img src="/storage/mix/earth-1.svg" alt="Saudi Climate Week" class="h-[70px] w-[70px]">
                    </div>

                    <h3
                        class="mt-8 text-[24px] font-semibold text-white {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        {!! __('100climateleaders.recognition_item_1_title') !!}
                    </h3>

                    <p
                        class="mt-4 max-w-xs text-[15px] leading-relaxed text-white/60 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        {!! __('100climateleaders.recognition_item_1_desc') !!}
                    </p>

                    <!-- Divider line (between columns) -->
                    <div class="absolute -right-5 top-4 h-56 w-px bg-white/10"></div>
                </div>

                <!-- Item 2 -->
                <div class="relative px-0 pl-6">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-500/70 text-orange-400">
                        <!-- icon -->
                        <img src="/storage/mix/chat.svg" alt="Saudi Climate Week" class="h-[70px] w-[70px]">
                    </div>

                    <h3
                        class="mt-8 text-[24px] font-semibold text-white {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        {!! __('100climateleaders.recognition_item_2_title') !!}
                    </h3>

                    <p
                        class="mt-4 max-w-xs text-[15px] leading-relaxed text-white/60 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        {!! __('100climateleaders.recognition_item_2_desc') !!}
                    </p>

                    <!-- Divider line (between columns) -->
                    <div class="absolute -right-5 top-4 h-56 w-px bg-white/10"></div>
                </div>

                <!-- Item 3 -->
                <div class="px-0 pl-6">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-500/70 text-orange-400">
                        <!-- icon -->
                        <img src="/storage/mix/earth.svg" alt="Saudi Climate Week" class="h-[70px] w-[70px]">

                    </div>

                    <h3
                        class="mt-8 text-[24px] font-semibold text-white {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        {!! __('100climateleaders.recognition_item_3_title') !!}
                    </h3>

                    <p
                        class="mt-4 max-w-xs text-[15px] leading-relaxed text-white/60 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        {!! __('100climateleaders.recognition_item_3_desc') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== MOBILE & TABLET: Why This Recognition Matters (below lg) ==================== -->
    <section class="lg:hidden relative overflow-hidden bg-[#0B141B]"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <!-- subtle background glow/gradient -->
        <div class="absolute inset-0 bg-linear-to-b from-[#0F1C26] via-[#0B141B] to-[#0B141B]" aria-hidden="true">
        </div>
        <div class="absolute -top-40 left-1/2 h-[520px] w-[520px] -translate-x-1/2 rounded-full bg-white/5 blur-3xl"
            aria-hidden="true"></div>

        <div class="relative mx-auto max-w-full px-4 md:px-8 py-12 md:py-16">
            <!-- Header -->
            <div class="text-center">
                <div class="text-[10px] md:text-[11px] font-semibold tracking-[0.22em] text-[#E68238] uppercase">
                    {{ __('100climateleaders.recognition_label') }}
                </div>

                <h2 class="mt-2 md:mt-3 text-2xl md:text-3xl font-bold text-white leading-tight">
                    {{ __('100climateleaders.recognition_title') }}
                </h2>

                <p class="mx-auto mt-3 md:mt-4 max-w-lg text-xs md:text-sm leading-relaxed text-white/60 px-2">
                    {{ __('100climateleaders.recognition_description') }}
                </p>
            </div>

            <!-- Cards - Centered Stack -->
            <div class="mt-10 md:mt-14 flex flex-col items-center gap-12 md:gap-14">
                <!-- Item 1 -->
                <div class="w-full max-w-sm px-4">
                    <div class="flex justify-center mb-6">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-500/70 text-orange-400">
                            <!-- icon -->
                            <img src="/storage/mix/earth-1.svg" alt="Saudi Climate Week" class="h-[70px] w-[70px]">
                        </div>
                    </div>

                    <h3 class="text-lg md:text-xl font-semibold text-white text-center">
                        {!! __('100climateleaders.recognition_item_1_title') !!}
                    </h3>

                    <p class="mt-3 md:mt-4 text-[13px] md:text-[14px] leading-relaxed text-white/60 text-center">
                        {!! __('100climateleaders.recognition_item_1_desc') !!}
                    </p>
                </div>

                <!-- Item 2 -->
                <div class="w-full max-w-sm px-4">
                    <div class="flex justify-center mb-6">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-500/70 text-orange-400">
                            <!-- icon -->
                            <img src="/storage/mix/chat.svg" alt="Saudi Climate Week" class="h-[70px] w-[70px]">
                        </div>
                    </div>

                    <h3 class="text-lg md:text-xl font-semibold text-white text-center">
                        {!! __('100climateleaders.recognition_item_2_title') !!}
                    </h3>

                    <p class="mt-3 md:mt-4 text-[13px] md:text-[14px] leading-relaxed text-white/60 text-center">
                        {!! __('100climateleaders.recognition_item_2_desc') !!}
                    </p>
                </div>

                <!-- Item 3 -->
                <div class="w-full max-w-sm px-4">
                    <div class="flex justify-center mb-6">
                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-full border border-orange-500/70 text-orange-400">
                            <!-- icon -->
                            <img src="/storage/mix/earth.svg" alt="Saudi Climate Week" class="h-[70px] w-[70px]">
                        </div>
                    </div>

                    <h3 class="text-lg md:text-xl font-semibold text-white text-center">
                        {!! __('100climateleaders.recognition_item_3_title') !!}
                    </h3>

                    <p class="mt-3 md:mt-4 text-[13px] md:text-[14px] leading-relaxed text-white/60 text-center">
                        {!! __('100climateleaders.recognition_item_3_desc') !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== DESKTOP: Eligibility Criteria (lg and above) ==================== -->
    <section class="hidden lg:block relative overflow-hidden bg-white">
        <!-- Bottom olive field -->
        <div class="absolute inset-x-0 bottom-0 h-[48%] " aria-hidden="true">
            <img src="/storage/mix/Eligibility Criteria-bg.webp" alt="" class="w-full h-full object-cover">
        </div>


        <div class="relative mx-auto max-w-6xl px-6 py-16">
            <div class="grid items-start gap-12 lg:grid-cols-12">
                <!-- LEFT TEXT -->
                <div class="lg:col-span-4">
                    <div class="text-[15px] font-semibold  text-[#E68238]">
                        {{ __('100climateleaders.eligibility_label') }}
                    </div>

                    <h2 class="mt-3 text-[32px] font-extrabold tracking-tight text-slate-900">
                        {{ __('100climateleaders.eligibility_title') }}
                    </h2>

                    <p class="mt-3 text-[15px] text-[#5F5F5F]">
                        {{ __('100climateleaders.eligibility_subtitle') }}
                    </p>

                    <a href="#nominationForm" class="mt-8 inline-flex items-center justify-center rounded-lg bg-[#E68238] px-7 py-3
                 text-xs font-bold uppercase tracking-wide text-white shadow-sm
                 hover:bg-orange-600 active:bg-orange-700 transition">
                        {{ __('100climateleaders.eligibility_button') }}
                    </a>

                    <!-- Card 1 (large, directly under button) -->
                    <div class="mt-14">

                        <article class="relative overflow-hidden rounded-2xl">
                            <div class="relative rounded-2xl p-10 h-[420px] w-[270px] bg-cover "
                                style="background-image: url('/storage/mix/leading-bg.webp')">
                                <!-- Icon -->
                                <div class="text-white/90">
                                    <img src="/storage/mix/earth-3.webp" alt="">
                                </div>

                                <h3 class="mt-8 text-[24px] font-bold leading-snug text-white w-[184px]">
                                    {!! __('100climateleaders.eligibility_card_1_title') !!}
                                </h3>

                                <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                <p class="mt-7 text-sm leading-relaxed text-white/70 max-w-md">
                                    {{ __('100climateleaders.eligibility_card_1_desc') }}
                                </p>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- RIGHT CARDS (3 across) -->
                <div class="lg:col-span-8  ">
                    <div class="grid gap-20 md:grid-cols-3  ">
                        <!-- Card 2  -->
                        <article
                            class="relative overflow-hidden rounded-2xl w-[270px] pt-[180px] {{ app()->getLocale() === 'ar' ? 'mr-[-90px]' : 'ml-[-90px]' }}">
                            <div class="relative rounded-2xl p-10 h-[420px]  bg-cover bg-center"
                                style="background-image: url('/storage/mix/proven-impact-bg.webp')">

                                <div class="relative h-[270px]">
                                    <!-- Icon -->
                                    <div class="text-white/90">
                                        <img src="/storage/mix/green-energy.webp" alt="">
                                    </div>

                                    <h3 class="mt-8 text-xl font-bold leading-snug text-white">
                                        {!! __('100climateleaders.eligibility_card_2_title') !!}
                                    </h3>

                                    <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                    <p class="mt-7 text-sm leading-relaxed text-white/70">
                                        {{ __('100climateleaders.eligibility_card_2_desc') }}
                                    </p>
                                </div>
                        </article>

                        <!-- Card 3  -->
                        <article
                            class="relative overflow-hidden rounded-2xl w-[270px] pt-32 {{ app()->getLocale() === 'ar' ? 'mr-[-60px]' : 'ml-[-60px]' }}">
                            <div class="relative rounded-2xl p-10 h-[420px]  bg-cover bg-center"
                                style="background-image: url('/storage/mix/across-bg.webp')">

                                <div class="relative h-[270px]">
                                    <!-- Icon -->
                                    <div class="text-white/90">
                                        <img src="/storage/mix/earth-4.webp" alt="">
                                    </div>

                                    <h3 class="mt-8 text-xl font-bold leading-snug text-white">
                                        {!! __('100climateleaders.eligibility_card_3_title') !!}
                                    </h3>

                                    <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                    <p class="mt-7 text-sm leading-relaxed text-white/70">
                                        {{ __('100climateleaders.eligibility_card_3_desc') }}
                                    </p>
                                </div>
                        </article>

                        <!-- Card 4  -->
                        <article
                            class="relative overflow-hidden rounded-2xl w-[270px] pt-[70px] {{ app()->getLocale() === 'ar' ? 'mr-[-30px]' : 'ml-[-30px]' }}">
                            <div class="relative rounded-2xl p-10 h-[420px]  bg-cover bg-center"
                                style="background-image: url('/storage/mix/commitment-bg.webp')">

                                <div class="relative h-[270px]">
                                    <!-- Icon -->
                                    <div class="text-white/90">
                                        <img src="/storage/mix/recycle.webp" alt="">
                                    </div>

                                    <h3 class="mt-8 text-xl font-bold leading-snug text-white">
                                        {!! __('100climateleaders.eligibility_card_4_title') !!}
                                    </h3>

                                    <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                    <p class="mt-7 text-sm leading-relaxed text-white/70">
                                        {{ __('100climateleaders.eligibility_card_4_desc') }}
                                    </p>
                                </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== MOBILE & TABLET: Eligibility Criteria (below lg) ==================== -->
    <section class="lg:hidden relative overflow-hidden bg-white">
        <!-- Bottom olive field -->
        <div class="hidden absolute inset-x-0 bottom-0 h-[48%] " aria-hidden="true">
            <img src="/storage/mix/Eligibility Criteria-bg.webp" alt="" class="w-full h-full object-cover">
        </div>

        <div class="relative mx-auto max-w-full px-4 md:px-8 py-12 md:py-16">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <div class="text-[15px] font-semibold text-[#E68238]">
                    {{ __('100climateleaders.eligibility_label') }}
                </div>

                <h2 class="mt-2 md:mt-3 text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
                    {{ __('100climateleaders.eligibility_title') }}
                </h2>

                <p class="mt-3 text-[14px] md:text-[15px] text-[#5F5F5F] max-w-md mx-auto">
                    {{ __('100climateleaders.eligibility_subtitle') }}
                </p>

                <a href="#nominationForm" class="mt-6 inline-flex items-center justify-center rounded-lg bg-[#E68238] px-7 py-3
                 text-xs font-bold uppercase tracking-wide text-white shadow-sm
                 hover:bg-orange-600 active:bg-orange-700 transition">
                    {{ __('100climateleaders.eligibility_button') }}
                </a>
            </div>

            <!-- Cards - Centered Stack -->
            <div class="flex flex-col items-center gap-12 md:gap-14">
                <!-- Card 1 -->
                <div class="w-full max-w-xs">
                    <article class="relative overflow-hidden rounded-2xl">
                        <div class="relative rounded-2xl p-8 h- md:h-[420px] w-full bg-cover"
                            style="background-image: url('/storage/mix/leading-bg.webp')">
                            <!-- Icon -->
                            <div class="text-white/90 h-12 w-12">
                                <img src="/storage/mix/earth-3.webp" alt="">
                            </div>

                            <h3 class="mt-6 md:mt-8 text-lg md:text-xl font-bold leading-snug text-white">
                                {!! __('100climateleaders.eligibility_card_1_title') !!}
                            </h3>

                            <div class="mt-4 md:mt-6 h-px w-[100px] md:w-[169px] bg-white/20"></div>

                            <p class="mt-4 md:mt-7 text-xs md:text-sm leading-relaxed text-white/70">
                                {{ __('100climateleaders.eligibility_card_1_desc') }}
                            </p>
                        </div>
                    </article>
                </div>

                <!-- Card 2 -->
                <div class="w-full max-w-xs">
                    <article class="relative overflow-hidden rounded-2xl">
                        <div class="relative rounded-2xl p-8 h-[320px] md:h-[420px] w-full bg-cover bg-center"
                            style="background-image: url('/storage/mix/proven-impact-bg.webp')">

                            <div class="relative">
                                <!-- Icon -->
                                <div class="text-white/90 h-12 w-12">
                                    <img src="/storage/mix/green-energy.webp" alt="">
                                </div>

                                <h3 class="mt-6 md:mt-8 text-lg md:text-xl font-bold leading-snug text-white">
                                    {!! __('100climateleaders.eligibility_card_2_title') !!}
                                </h3>

                                <div class="mt-4 md:mt-6 h-px w-[100px] md:w-[169px] bg-white/20"></div>

                                <p class="mt-4 md:mt-7 text-xs md:text-sm leading-relaxed text-white/70">
                                    {{ __('100climateleaders.eligibility_card_2_desc') }}
                                </p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Card 3 -->
                <div class="w-full max-w-xs">
                    <article class="relative overflow-hidden rounded-2xl">
                        <div class="relative rounded-2xl p-8 h-[320px] md:h-[420px] w-full bg-cover bg-center"
                            style="background-image: url('/storage/mix/across-bg.webp')">

                            <div class="relative">
                                <!-- Icon -->
                                <div class="text-white/90 h-12 w-12">
                                    <img src="/storage/mix/earth-4.webp" alt="">
                                </div>

                                <h3 class="mt-6 md:mt-8 text-lg md:text-xl font-bold leading-snug text-white">
                                    {!! __('100climateleaders.eligibility_card_3_title') !!}
                                </h3>

                                <div class="mt-4 md:mt-6 h-px w-[100px] md:w-[169px] bg-white/20"></div>

                                <p class="mt-4 md:mt-7 text-xs md:text-sm leading-relaxed text-white/70">
                                    {{ __('100climateleaders.eligibility_card_3_desc') }}
                                </p>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Card 4 -->
                <div class="w-full max-w-xs">
                    <article class="relative overflow-hidden rounded-2xl">
                        <div class="relative rounded-2xl p-8 h-[320px] md:h-[420px] w-full bg-cover bg-center"
                            style="background-image: url('/storage/mix/commitment-bg.webp')">

                            <div class="relative">
                                <!-- Icon -->
                                <div class="text-white/90 h-12 w-12">
                                    <img src="/storage/mix/recycle.webp" alt="">
                                </div>

                                <h3 class="mt-6 md:mt-8 text-lg md:text-xl font-bold leading-snug text-white">
                                    {!! __('100climateleaders.eligibility_card_4_title') !!}
                                </h3>

                                <div class="mt-4 md:mt-6 h-px w-[100px] md:w-[169px] bg-white/20"></div>

                                <p class="mt-4 md:mt-7 text-xs md:text-sm leading-relaxed text-white/70">
                                    {{ __('100climateleaders.eligibility_card_4_desc') }}
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>

    </section>

    <!--==================== DESKTOP: Selection Process (lg and above)-->
    <section class="hidden lg:block bg-white" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="mx-auto max-w-6xl px-6 py-20">
            <!-- Header -->
            <div class="text-center">
                <div class="text-[15px] font-semibold  text-[#E68238]">
                    {{ __('100climateleaders.selection_framework') }}
                </div>

                <h2 class="mt-3 text-[32px] font-extrabold  text-slate-900 sm:text-4xl">
                    {{ __('100climateleaders.selection_process') }}
                </h2>

                <p class="mx-auto mt-3 max-w-2xl text-sm leading-relaxed text-slate-500">
                    {{ __('100climateleaders.selection_description') }}
                </p>
            </div>

            <!-- Steps -->
            <div class="mt-14 grid items-start gap-10 md:grid-cols-4">
                <!-- Step 1 -->
                <div class="text-center">
                    <!-- icon circle -->
                    <div class="relative mx-auto h-20 w-20">
                        <img src="/storage/mix/open-self.webp" alt="Saudi Climate Week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-6 text-[24px] font-semibold text-slate-900">
                        {!! __('100climateleaders.selection_step_1_title') !!}
                    </h3>

                    <p class="mx-auto mt-3 max-w-56 text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_1_desc') }}
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="relative mx-auto h-20 w-20">
                        <img src="/storage/mix/independent.webp" alt="saudi climate week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-6 text-[24px] font-semibold text-slate-900">
                        {!! __('100climateleaders.selection_step_2_title') !!}
                    </h3>

                    <p class="mx-auto mt-3 max-w-56 text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_2_desc') }}
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="relative mx-auto h-20 w-20">
                        <img src="/storage/mix/multi.webp" alt="saudi climate week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-6 text-[24px] font-semibold text-slate-900">
                        {!! __('100climateleaders.selection_step_3_title') !!}
                    </h3>

                    <p class="mx-auto mt-3 max-w-56 text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_3_desc') }}
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="relative mx-auto h-20 w-20">
                        <img src="/storage/mix/final.webp" alt="saudi climate week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-6 text-[24px] font-semibold text-slate-900">
                        {{ __('100climateleaders.selection_step_4_title') }}
                    </h3>

                    <p class="mx-auto mt-3 max-w-56 text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_4_desc') }}
                    </p>
                </div>
            </div>

            <!-- Curved arrows between steps (desktop only) -->
            <div class="pointer-events-none relative hidden md:block">
                <!-- position overlay row aligned to circles -->
                <div class="absolute left-0 right-0 top-[-210px] mx-auto max-w-6xl">
                    <div class="grid grid-cols-4">
                        <!-- Arrow 1 -->
                        <div class="relative">
                            <img src="/storage/mix/arrow.webp" alt="Arrow"
                                class="absolute {{ app()->getLocale() === 'ar' ? 'left-[-34px] scale-x-[-1]' : 'right-[-34px]' }} h-9 w-[88px]">
                        </div>
                        <!-- Arrow 2 -->
                        <div class="relative">

                            <img src="/storage/mix/arrow.webp" alt="Arrow"
                                class="absolute {{ app()->getLocale() === 'ar' ? 'left-[-34px] scale-x-[-1]' : 'right-[-34px]' }} h-9 w-[88px]">
                        </div>
                        <!-- Arrow 3 -->
                        <div class="relative">
                            <img src="/storage/mix/arrow.webp" alt="Arrow"
                                class="absolute {{ app()->getLocale() === 'ar' ? 'left-[-34px] scale-x-[-1]' : 'right-[-34px]' }} h-9 w-[88px]">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== MOBILE & TABLET: Selection Process (below lg) ==================== -->
    <section class="lg:hidden bg-white" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="mx-auto max-w-full px-4 md:px-8 py-12 md:py-20">
            <!-- Header -->
            <div class="text-center">
                <div class="text-[15px] font-semibold text-[#E68238]">
                    {{ __('100climateleaders.selection_framework') }}
                </div>

                <h2 class="mt-2 md:mt-3 text-2xl md:text-3xl font-extrabold text-slate-900">
                    {{ __('100climateleaders.selection_process') }}
                </h2>

                <p class="mx-auto mt-3 text-xs md:text-sm leading-relaxed text-slate-500 max-w-lg">
                    {{ __('100climateleaders.selection_description') }}
                </p>
            </div>

            <!-- Steps - Centered Stack -->
            <div class="mt-10 md:mt-14 flex flex-col items-center gap-10 md:gap-12">
                <!-- Step 1 -->
                <div class="w-full max-w-xs text-center">
                    <!-- icon circle -->
                    <div class="relative mx-auto h-16 md:h-20 w-16 md:w-20">
                        <img src="/storage/mix/open-self.webp" alt="Saudi Climate Week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-4 md:mt-6 text-lg md:text-[24px] font-semibold text-slate-900">
                        {!! __('100climateleaders.selection_step_1_title') !!}
                    </h3>

                    <p class="mx-auto mt-2 md:mt-3 text-xs md:text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_1_desc') }}
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="w-full max-w-xs text-center">
                    <div class="relative mx-auto h-16 md:h-20 w-16 md:w-20">
                        <img src="/storage/mix/independent.webp" alt="saudi climate week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-4 md:mt-6 text-lg md:text-[24px] font-semibold text-slate-900">
                        {!! __('100climateleaders.selection_step_2_title') !!}
                    </h3>

                    <p class="mx-auto mt-2 md:mt-3 text-xs md:text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_2_desc') }}
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="w-full max-w-xs text-center">
                    <div class="relative mx-auto h-16 md:h-20 w-16 md:w-20">
                        <img src="/storage/mix/multi.webp" alt="saudi climate week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-4 md:mt-6 text-lg md:text-[24px] font-semibold text-slate-900">
                        {!! __('100climateleaders.selection_step_3_title') !!}
                    </h3>

                    <p class="mx-auto mt-2 md:mt-3 text-xs md:text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_3_desc') }}
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="w-full max-w-xs text-center">
                    <div class="relative mx-auto h-16 md:h-20 w-16 md:w-20">
                        <img src="/storage/mix/final.webp" alt="saudi climate week" class="max-w-full h-auto">
                    </div>

                    <h3 class="mt-4 md:mt-6 text-lg md:text-[24px] font-semibold text-slate-900">
                        {{ __('100climateleaders.selection_step_4_title') }}
                    </h3>

                    <p class="mx-auto mt-2 md:mt-3 text-xs md:text-sm leading-relaxed text-slate-500">
                        {{ __('100climateleaders.selection_step_4_desc') }}
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- MOBILE & TABLET: Submit Your Nomination --}}
    <section id="nominationForm" class="lg:hidden relative overflow-hidden bg-gray-900 pt-[100px]">
        {{-- Right background image --}}
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image:url('{{ asset('storage/mix/submit-nomination.webp') }}');" aria-hidden="true"></div>

        {{-- Global overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-gray-900/20 transition" aria-hidden="true"></div>

        {{-- Subtle warm glow --}}
        <div class="absolute -right-40 top-0 h-[420px] w-[420px]
           rounded-full bg-[#F08C3A]/20 blur-3xl" aria-hidden="true"></div>

        {{-- Left readability fade --}}
        <div class="absolute inset-0 bg-gradient-to-r
           from-gray-900/95 via-gray-900/40 to-transparent" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-full px-4 md:px-8 py-12 md:py-16">
            <div class="flex flex-col items-center">
                {{-- FORM --}}
                <div class="w-full max-w-md">
                    <div class="text-center">
                        <div class="text-[15px] font-semibold text-orange-400">
                            {{ __('100climateleaders.nomination_label') }}
                        </div>

                        <h2 class="mt-2 text-2xl md:text-3xl font-extrabold tracking-tight text-white">
                            {{ __('100climateleaders.nomination_title') }}
                        </h2>

                        <p class="mt-2 text-xs md:text-sm leading-relaxed text-white/55 mx-auto max-w-sm">
                            {{ __('100climateleaders.nomination_description') }}
                        </p>
                    </div>

                    <form id="nominationFormMobile" method="POST" action="{{ route('climate-leaders.store') }}"
                        class="mt-7 space-y-4">
                        @csrf

                        {{-- Validation Errors --}}
                        <div id="mobileErrorMsg"
                            class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50 hidden">
                            <h3 class="font-bold text-red-400 text-sm mb-2">{{ __('Please fix the following errors:') }}
                            </h3>
                            <ul id="mobileErrorList" class="space-y-1 text-red-300 text-sm"></ul>
                        </div>

                        {{-- Success Message --}}
                        <div id="mobileSuccessMsg"
                            class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/50 hidden">
                            <h3 class="font-bold text-green-400 text-sm">{{ __('Thank you for your submission!') }}</h3>
                        </div>

                        {{-- Full Name --}}
                        <div>
                            <label
                                class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_full_name') }}</label>
                            <input name="fullname" value="{{ old('fullname') }}" required
                                placeholder="{{ __('100climateleaders.nomination_full_name_placeholder') }}" class="mt-2 w-full rounded-md border border-white/10 bg-white/5
                       px-4 py-2.5 text-sm text-white placeholder:text-white/30
                       outline-none focus:border-orange-400/60
                       focus:ring-2 focus:ring-orange-400/20" />
                        </div>

                        {{-- Countries --}}
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label
                                    class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_nationality') }}</label>
                                <select name="Country_of_Nationality" required class="mt-2 w-full rounded-md border border-gray-600 bg-gray-800
                                    px-4 py-2.5 text-sm text-white outline-none
                                     focus:border-orange-400/60 focus:ring-2 focus:ring-orange-400/20">
                                    <option disabled selected>{{ __('100climateleaders.nomination_select_country') }}
                                    </option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                    <option>Andorra</option>
                                    <option>Angola</option>
                                    <option>Argentina</option>
                                    <option>Armenia</option>
                                    <option>Australia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Bahamas</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Barbados</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bhutan</option>
                                    <option>Bolivia</option>
                                    <option>Bosnia and Herzegovina</option>
                                    <option>Botswana</option>
                                    <option>Brazil</option>
                                    <option>Brunei</option>
                                    <option>Bulgaria</option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi</option>
                                    <option>Cambodia</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                    <option>Cape Verde</option>
                                    <option>Central African Republic</option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>Colombia</option>
                                    <option>Comoros</option>
                                    <option>Congo</option>
                                    <option>Costa Rica</option>
                                    <option>Croatia</option>
                                    <option>Cuba</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Djibouti</option>
                                    <option>Dominica</option>
                                    <option>Dominican Republic</option>
                                    <option>Ecuador</option>
                                    <option>Egypt</option>
                                    <option>El Salvador</option>
                                    <option>Equatorial Guinea</option>
                                    <option>Eritrea</option>
                                    <option>Estonia</option>
                                    <option>Eswatini</option>
                                    <option>Ethiopia</option>
                                    <option>Fiji</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Ghana</option>
                                    <option>Greece</option>
                                    <option>Grenada</option>
                                    <option>Guatemala</option>
                                    <option>Guinea</option>
                                    <option>Guinea-Bissau</option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Honduras</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Ireland</option>
                                    <option>Italy</option>
                                    <option>Jamaica</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Kenya</option>
                                    <option>Kiribati</option>
                                    <option>Kosovo</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Laos</option>
                                    <option>Latvia</option>
                                    <option>Lebanon</option>
                                    <option>Lesotho</option>
                                    <option>Liberia</option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Madagascar</option>
                                    <option>Malawi</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands</option>
                                    <option>Mauritania</option>
                                    <option>Mauritius</option>
                                    <option>Mexico</option>
                                    <option>Micronesia</option>
                                    <option>Moldova</option>
                                    <option>Monaco</option>
                                    <option>Mongolia</option>
                                    <option>Montenegro</option>
                                    <option>Morocco</option>
                                    <option>Mozambique</option>
                                    <option>Myanmar</option>
                                    <option>Namibia</option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands</option>
                                    <option>New Zealand</option>
                                    <option>Nicaragua</option>
                                    <option>Niger</option>
                                    <option>Nigeria</option>
                                    <option>North Korea</option>
                                    <option>North Macedonia</option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>Palau</option>
                                    <option>Palestine</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea</option>
                                    <option>Paraguay</option>
                                    <option>Peru</option>
                                    <option>Philippines</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Qatar</option>
                                    <option>Romania</option>
                                    <option>Russia</option>
                                    <option>Rwanda</option>
                                    <option>Saint Kitts and Nevis</option>
                                    <option>Saint Lucia</option>
                                    <option>Saint Vincent and the Grenadines</option>
                                    <option>Samoa</option>
                                    <option>San Marino</option>
                                    <option>Sao Tome and Principe</option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal</option>
                                    <option>Serbia</option>
                                    <option>Seychelles</option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore</option>
                                    <option>Slovakia</option>
                                    <option>Slovenia</option>
                                    <option>Solomon Islands</option>
                                    <option>Somalia</option>
                                    <option>South Africa</option>
                                    <option>South Korea</option>
                                    <option>South Sudan</option>
                                    <option>Spain</option>
                                    <option>Sri Lanka</option>
                                    <option>Sudan</option>
                                    <option>Suriname</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikistan</option>
                                    <option>Tanzania</option>
                                    <option>Thailand</option>
                                    <option>Timor-Leste</option>
                                    <option>Togo</option>
                                    <option>Tonga</option>
                                    <option>Trinidad and Tobago</option>
                                    <option>Tunisia</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>Tuvalu</option>
                                    <option>Uganda</option>
                                    <option>Ukraine</option>
                                    <option>United Arab Emirates</option>
                                    <option>United Kingdom</option>
                                    <option>United States</option>
                                    <option>Uruguay</option>
                                    <option>Uzbekistan</option>
                                    <option>Vanuatu</option>
                                    <option>Vatican City</option>
                                    <option>Venezuela</option>
                                    <option>Vietnam</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe</option>
                                </select>
                            </div>

                            <div>
                                <label
                                    class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_residence') }}</label>
                                <select name="Country_of_Residence" required class="mt-2 w-full rounded-md border border-gray-600 bg-gray-800
                                  px-4 py-2.5 text-sm text-white outline-none
                                     focus:border-orange-400/60 focus:ring-2 focus:ring-orange-400/20">
                                    <option disabled selected>{{ __('100climateleaders.nomination_select_country') }}
                                    </option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                    <option>Andorra</option>
                                    <option>Angola</option>
                                    <option>Argentina</option>
                                    <option>Armenia</option>
                                    <option>Australia</option>
                                    <option>Austria</option>
                                    <option>Azerbaijan</option>
                                    <option>Bahamas</option>
                                    <option>Bahrain</option>
                                    <option>Bangladesh</option>
                                    <option>Barbados</option>
                                    <option>Belarus</option>
                                    <option>Belgium</option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bhutan</option>
                                    <option>Bolivia</option>
                                    <option>Bosnia and Herzegovina</option>
                                    <option>Botswana</option>
                                    <option>Brazil</option>
                                    <option>Brunei</option>
                                    <option>Bulgaria</option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi</option>
                                    <option>Cambodia</option>
                                    <option>Cameroon</option>
                                    <option>Canada</option>
                                    <option>Cape Verde</option>
                                    <option>Central African Republic</option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>Colombia</option>
                                    <option>Comoros</option>
                                    <option>Congo</option>
                                    <option>Costa Rica</option>
                                    <option>Croatia</option>
                                    <option>Cuba</option>
                                    <option>Cyprus</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark</option>
                                    <option>Djibouti</option>
                                    <option>Dominica</option>
                                    <option>Dominican Republic</option>
                                    <option>Ecuador</option>
                                    <option>Egypt</option>
                                    <option>El Salvador</option>
                                    <option>Equatorial Guinea</option>
                                    <option>Eritrea</option>
                                    <option>Estonia</option>
                                    <option>Eswatini</option>
                                    <option>Ethiopia</option>
                                    <option>Fiji</option>
                                    <option>Finland</option>
                                    <option>France</option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia</option>
                                    <option>Germany</option>
                                    <option>Ghana</option>
                                    <option>Greece</option>
                                    <option>Grenada</option>
                                    <option>Guatemala</option>
                                    <option>Guinea</option>
                                    <option>Guinea-Bissau</option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Honduras</option>
                                    <option>Hungary</option>
                                    <option>Iceland</option>
                                    <option>India</option>
                                    <option>Indonesia</option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Ireland</option>
                                    <option>Italy</option>
                                    <option>Jamaica</option>
                                    <option>Japan</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan</option>
                                    <option>Kenya</option>
                                    <option>Kiribati</option>
                                    <option>Kosovo</option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan</option>
                                    <option>Laos</option>
                                    <option>Latvia</option>
                                    <option>Lebanon</option>
                                    <option>Lesotho</option>
                                    <option>Liberia</option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania</option>
                                    <option>Luxembourg</option>
                                    <option>Madagascar</option>
                                    <option>Malawi</option>
                                    <option>Malaysia</option>
                                    <option>Maldives</option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands</option>
                                    <option>Mauritania</option>
                                    <option>Mauritius</option>
                                    <option>Mexico</option>
                                    <option>Micronesia</option>
                                    <option>Moldova</option>
                                    <option>Monaco</option>
                                    <option>Mongolia</option>
                                    <option>Montenegro</option>
                                    <option>Morocco</option>
                                    <option>Mozambique</option>
                                    <option>Myanmar</option>
                                    <option>Namibia</option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands</option>
                                    <option>New Zealand</option>
                                    <option>Nicaragua</option>
                                    <option>Niger</option>
                                    <option>Nigeria</option>
                                    <option>North Korea</option>
                                    <option>North Macedonia</option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan</option>
                                    <option>Palau</option>
                                    <option>Palestine</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea</option>
                                    <option>Paraguay</option>
                                    <option>Peru</option>
                                    <option>Philippines</option>
                                    <option>Poland</option>
                                    <option>Portugal</option>
                                    <option>Qatar</option>
                                    <option>Romania</option>
                                    <option>Russia</option>
                                    <option>Rwanda</option>
                                    <option>Saint Kitts and Nevis</option>
                                    <option>Saint Lucia</option>
                                    <option>Saint Vincent and the Grenadines</option>
                                    <option>Samoa</option>
                                    <option>San Marino</option>
                                    <option>Sao Tome and Principe</option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal</option>
                                    <option>Serbia</option>
                                    <option>Seychelles</option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore</option>
                                    <option>Slovakia</option>
                                    <option>Slovenia</option>
                                    <option>Solomon Islands</option>
                                    <option>Somalia</option>
                                    <option>South Africa</option>
                                    <option>South Korea</option>
                                    <option>South Sudan</option>
                                    <option>Spain</option>
                                    <option>Sri Lanka</option>
                                    <option>Sudan</option>
                                    <option>Suriname</option>
                                    <option>Sweden</option>
                                    <option>Switzerland</option>
                                    <option>Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikistan</option>
                                    <option>Tanzania</option>
                                    <option>Thailand</option>
                                    <option>Timor-Leste</option>
                                    <option>Togo</option>
                                    <option>Tonga</option>
                                    <option>Trinidad and Tobago</option>
                                    <option>Tunisia</option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan</option>
                                    <option>Tuvalu</option>
                                    <option>Uganda</option>
                                    <option>Ukraine</option>
                                    <option>United Arab Emirates</option>
                                    <option>United Kingdom</option>
                                    <option>United States</option>
                                    <option>Uruguay</option>
                                    <option>Uzbekistan</option>
                                    <option>Vanuatu</option>
                                    <option>Vatican City</option>
                                    <option>Venezuela</option>
                                    <option>Vietnam</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe</option>
                                </select>
                            </div>
                        </div>

                        {{-- Organization --}}
                        <div>
                            <label
                                class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_organization') }}</label>
                            <input name="organization" required
                                placeholder="{{ __('100climateleaders.nomination_organization_placeholder') }}" class="mt-2 w-full rounded-md border border-white/10 bg-white/5
                       px-4 py-2.5 text-sm text-white placeholder:text-white/30" />
                        </div>

                        {{-- Bio --}}
                        <div>
                            <label
                                class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_bio') }}</label>
                            <textarea name="bio" rows="4" required
                                placeholder="{{ __('100climateleaders.nomination_bio_placeholder') }}" class="mt-2 w-full resize-none rounded-md border border-white/10 bg-white/5
                       px-4 py-2.5 text-sm text-white placeholder:text-white/30"></textarea>
                        </div>

                        {{-- Email + Phone --}}
                        <div class="grid gap-4 sm:grid-cols-2">
                            <input name="email" placeholder="{{ __('100climateleaders.nomination_email_placeholder') }}"
                                required
                                class="rounded-md border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white" />
                            <div class="flex gap-2">
                                <select name="country_code" required class="w-24 rounded-md border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white outline-none
                                     focus:border-orange-400/60 focus:ring-2 focus:ring-orange-400/20">
                                    <option value="" disabled selected>Code</option>
                                    <option value="+93">🇦🇫 +93</option>
                                    <option value="+355">🇦🇱 +355</option>
                                    <option value="+213">🇩🇿 +213</option>
                                    <option value="+1-684">🇦🇸 +1-684</option>
                                    <option value="+376">🇦🇩 +376</option>
                                    <option value="+244">🇦🇴 +244</option>
                                    <option value="+1-268">🇦🇬 +1-268</option>
                                    <option value="+54">🇦🇷 +54</option>
                                    <option value="+374">🇦🇲 +374</option>
                                    <option value="+297">🇦🇼 +297</option>
                                    <option value="+61">🇦🇺 +61</option>
                                    <option value="+43">🇦🇹 +43</option>
                                    <option value="+994">🇦🇿 +994</option>
                                    <option value="+1-242">🇧🇸 +1-242</option>
                                    <option value="+973">🇧🇭 +973</option>
                                    <option value="+880">🇧🇩 +880</option>
                                    <option value="+1-246">🇧🇧 +1-246</option>
                                    <option value="+375">🇧🇾 +375</option>
                                    <option value="+32">🇧🇪 +32</option>
                                    <option value="+501">🇧🇿 +501</option>
                                    <option value="+229">🇧🇯 +229</option>
                                    <option value="+1-441">🇧🇲 +1-441</option>
                                    <option value="+975">🇧🇹 +975</option>
                                    <option value="+591">🇧🇴 +591</option>
                                    <option value="+387">🇧🇦 +387</option>
                                    <option value="+267">🇧🇼 +267</option>
                                    <option value="+55">🇧🇷 +55</option>
                                    <option value="+246">🇬🇧 +246</option>
                                    <option value="+673">🇧🇳 +673</option>
                                    <option value="+359">🇧🇬 +359</option>
                                    <option value="+226">🇧🇫 +226</option>
                                    <option value="+257">🇧🇮 +257</option>
                                    <option value="+855">🇰🇭 +855</option>
                                    <option value="+237">🇨🇲 +237</option>
                                    <option value="+1">🇨🇦 +1</option>
                                    <option value="+238">🇨🇻 +238</option>
                                    <option value="+1-345">🇰🇾 +1-345</option>
                                    <option value="+236">🇨🇫 +236</option>
                                    <option value="+235">🇹🇩 +235</option>
                                    <option value="+56">🇨🇱 +56</option>
                                    <option value="+86">🇨🇳 +86</option>
                                    <option value="+57">🇨🇴 +57</option>
                                    <option value="+269">🇰🇲 +269</option>
                                    <option value="+242">🇨🇬 +242</option>
                                    <option value="+506">🇨🇷 +506</option>
                                    <option value="+385">🇭🇷 +385</option>
                                    <option value="+53">🇨🇺 +53</option>
                                    <option value="+357">🇨🇾 +357</option>
                                    <option value="+420">🇨🇿 +420</option>
                                    <option value="+45">🇩🇰 +45</option>
                                    <option value="+246">🇩🇬 +246</option>
                                    <option value="+1-767">🇩🇲 +1-767</option>
                                    <option value="+1-809">🇩🇴 +1-809</option>
                                    <option value="+593">🇪🇨 +593</option>
                                    <option value="+20">🇪🇬 +20</option>
                                    <option value="+503">🇸🇻 +503</option>
                                    <option value="+240">🇬🇶 +240</option>
                                    <option value="+291">🇪🇷 +291</option>
                                    <option value="+372">🇪🇪 +372</option>
                                    <option value="+251">🇪🇹 +251</option>
                                    <option value="+298">🇫🇴 +298</option>
                                    <option value="+679">🇫🇯 +679</option>
                                    <option value="+358">🇫🇮 +358</option>
                                    <option value="+33">🇫🇷 +33</option>
                                    <option value="+241">🇬🇦 +241</option>
                                    <option value="+220">🇬🇲 +220</option>
                                    <option value="+995">🇬🇪 +995</option>
                                    <option value="+49">🇩🇪 +49</option>
                                    <option value="+233">🇬🇭 +233</option>
                                    <option value="+350">🇬🇮 +350</option>
                                    <option value="+30">🇬🇷 +30</option>
                                    <option value="+299">🇬🇱 +299</option>
                                    <option value="+1-473">🇬🇩 +1-473</option>
                                    <option value="+1-671">🇬🇺 +1-671</option>
                                    <option value="+502">🇬🇹 +502</option>
                                    <option value="+224">🇬🇳 +224</option>
                                    <option value="+245">🇬🇼 +245</option>
                                    <option value="+592">🇬🇾 +592</option>
                                    <option value="+509">🇭🇹 +509</option>
                                    <option value="+504">🇭🇳 +504</option>
                                    <option value="+852">🇭🇰 +852</option>
                                    <option value="+36">🇭🇺 +36</option>
                                    <option value="+354">🇮🇸 +354</option>
                                    <option value="+91">🇮🇳 +91</option>
                                    <option value="+62">🇮🇩 +62</option>
                                    <option value="+98">🇮🇷 +98</option>
                                    <option value="+964">🇮🇶 +964</option>
                                    <option value="+353">🇮🇪 +353</option>
                                    <option value="+972">🇮🇱 +972</option>
                                    <option value="+39">🇮🇹 +39</option>
                                    <option value="+1-876">🇯🇲 +1-876</option>
                                    <option value="+81">🇯🇵 +81</option>
                                    <option value="+962">🇯🇴 +962</option>
                                    <option value="+7">🇰🇿 +7</option>
                                    <option value="+254">🇰🇪 +254</option>
                                    <option value="+686">🇰🇮 +686</option>
                                    <option value="+82">🇰🇷 +82</option>
                                    <option value="+965">🇰🇼 +965</option>
                                    <option value="+996">🇰🇬 +996</option>
                                    <option value="+856">🇱🇦 +856</option>
                                    <option value="+371">🇱🇻 +371</option>
                                    <option value="+961">🇱🇧 +961</option>
                                    <option value="+266">🇱🇸 +266</option>
                                    <option value="+231">🇱🇷 +231</option>
                                    <option value="+218">🇱🇾 +218</option>
                                    <option value="+423">🇱🇮 +423</option>
                                    <option value="+370">🇱🇹 +370</option>
                                    <option value="+352">🇱🇺 +352</option>
                                    <option value="+853">🇲🇴 +853</option>
                                    <option value="+389">🇲🇰 +389</option>
                                    <option value="+261">🇲🇬 +261</option>
                                    <option value="+265">🇲🇼 +265</option>
                                    <option value="+60">🇲🇾 +60</option>
                                    <option value="+960">🇲🇻 +960</option>
                                    <option value="+223">🇲🇱 +223</option>
                                    <option value="+356">🇲🇹 +356</option>
                                    <option value="+692">🇲🇭 +692</option>
                                    <option value="+222">🇲🇷 +222</option>
                                    <option value="+230">🇲🇺 +230</option>
                                    <option value="+52">🇲🇽 +52</option>
                                    <option value="+691">🇫🇲 +691</option>
                                    <option value="+373">🇲🇩 +373</option>
                                    <option value="+377">🇲🇨 +377</option>
                                    <option value="+976">🇲🇳 +976</option>
                                    <option value="+382">🇲🇪 +382</option>
                                    <option value="+212">🇲🇦 +212</option>
                                    <option value="+258">🇲🇿 +258</option>
                                    <option value="+95">🇲🇲 +95</option>
                                    <option value="+264">🇳🇦 +264</option>
                                    <option value="+674">🇳🇷 +674</option>
                                    <option value="+977">🇳🇵 +977</option>
                                    <option value="+31">🇳🇱 +31</option>
                                    <option value="+64">🇳🇿 +64</option>
                                    <option value="+505">🇳🇮 +505</option>
                                    <option value="+227">🇳🇪 +227</option>
                                    <option value="+234">🇳🇬 +234</option>
                                    <option value="+47">🇳🇴 +47</option>
                                    <option value="+968">🇴🇲 +968</option>
                                    <option value="+92">🇵🇰 +92</option>
                                    <option value="+680">🇵🇼 +680</option>
                                    <option value="+507">🇵🇦 +507</option>
                                    <option value="+675">🇵🇬 +675</option>
                                    <option value="+595">🇵🇾 +595</option>
                                    <option value="+51">🇵🇪 +51</option>
                                    <option value="+63">🇵🇭 +63</option>
                                    <option value="+48">🇵🇱 +48</option>
                                    <option value="+351">🇵🇹 +351</option>
                                    <option value="+974">🇶🇦 +974</option>
                                    <option value="+40">🇷🇴 +40</option>
                                    <option value="+7">🇷🇺 +7</option>
                                    <option value="+250">🇷🇼 +250</option>
                                    <option value="+1-869">🇰🇳 +1-869</option>
                                    <option value="+1-758">🇱🇨 +1-758</option>
                                    <option value="+1-784">🇻🇨 +1-784</option>
                                    <option value="+685">🇼🇸 +685</option>
                                    <option value="+378">🇸🇲 +378</option>
                                    <option value="+239">🇸🇹 +239</option>
                                    <option value="+966">🇸🇦 +966</option>
                                    <option value="+221">🇸🇳 +221</option>
                                    <option value="+381">🇷🇸 +381</option>
                                    <option value="+248">🇸🇨 +248</option>
                                    <option value="+232">🇸🇱 +232</option>
                                    <option value="+65">🇸🇬 +65</option>
                                    <option value="+421">🇸🇰 +421</option>
                                    <option value="+386">🇸🇮 +386</option>
                                    <option value="+677">🇸🇧 +677</option>
                                    <option value="+252">🇸🇴 +252</option>
                                    <option value="+27">🇿🇦 +27</option>
                                    <option value="+34">🇪🇸 +34</option>
                                    <option value="+94">🇱🇰 +94</option>
                                    <option value="+249">🇸🇩 +249</option>
                                    <option value="+597">🇸🇷 +597</option>
                                    <option value="+46">🇸🇪 +46</option>
                                    <option value="+41">🇨🇭 +41</option>
                                    <option value="+963">🇸🇾 +963</option>
                                    <option value="+886">🇹🇼 +886</option>
                                    <option value="+992">🇹🇯 +992</option>
                                    <option value="+255">🇹🇿 +255</option>
                                    <option value="+66">🇹🇭 +66</option>
                                    <option value="+670">🇹🇱 +670</option>
                                    <option value="+228">🇹🇬 +228</option>
                                    <option value="+676">🇹🇴 +676</option>
                                    <option value="+1-868">🇹🇹 +1-868</option>
                                    <option value="+216">🇹🇳 +216</option>
                                    <option value="+90">🇹🇷 +90</option>
                                    <option value="+993">🇹🇲 +993</option>
                                    <option value="+1-649">🇹🇨 +1-649</option>
                                    <option value="+688">🇹🇻 +688</option>
                                    <option value="+256">🇺🇬 +256</option>
                                    <option value="+380">🇺🇦 +380</option>
                                    <option value="+971">🇦🇪 +971</option>
                                    <option value="+44">🇬🇧 +44</option>
                                    <option value="+1">🇺🇸 +1</option>
                                    <option value="+598">🇺🇾 +598</option>
                                    <option value="+998">🇺🇿 +998</option>
                                    <option value="+678">🇻🇺 +678</option>
                                    <option value="+58">🇻🇪 +58</option>
                                    <option value="+84">🇻🇳 +84</option>
                                    <option value="+1-340">🇻🇮 +1-340</option>
                                    <option value="+967">🇾🇪 +967</option>
                                    <option value="+260">🇿🇲 +260</option>
                                    <option value="+263">🇿🇼 +263</option>
                                </select>
                                <input name="phone"
                                    placeholder="{{ __('100climateleaders.nomination_phone_placeholder') }}" required
                                    class="flex-1 rounded-md border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white"
                                    dir="ltr" />
                            </div>
                        </div>

                        {{-- LinkedIn --}}
                        <input name="linkedin_profile"
                            placeholder="{{ __('100climateleaders.nomination_linkedin_placeholder') }}"
                            class="w-full rounded-md border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white" />

                        {{-- Submit --}}
                        <button id="mobileSubmitBtn" type="button" class="mt-3 inline-flex w-full items-center justify-center gap-2
                 rounded-md bg-[#E68238] px-6 py-3
                 text-[11px] font-bold uppercase tracking-wide text-white
                 hover:bg-orange-600 transition">
                            {{ __('100climateleaders.nomination_submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- DESKTOP: Submit Your Nomination (MATCHES FOOTER COLOR) (lg and above) --}}
    <section id="nominationForm" class="hidden lg:block relative overflow-hidden bg-gray-900 pt-[100px]">
        {{-- Right background image --}}
        <div class="absolute inset-0 bg-cover bg-right"
            style="background-image:url('{{ asset('storage/mix/submit-nomination.webp') }}');" aria-hidden="true"></div>

        {{-- Global overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-gray-900/20 transition" aria-hidden="true"></div>

        {{-- Subtle warm glow (top-right like design) --}}
        <div class="absolute -right-40 top-0 h-[520px] w-[520px]
           rounded-full bg-[#F08C3A]/20 blur-3xl" aria-hidden="true"></div>

        {{-- Left readability fade --}}
        <div class="absolute inset-0 bg-gradient-to-r
           from-gray-900/95 via-gray-900/40 to-transparent" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-6xl px-6 py-16">
            <div class="grid gap-12 lg:grid-cols-12">
                {{-- LEFT: FORM --}}
                <div class="lg:col-span-6">
                    <div class="max-w-lg">
                        <div class="text-[15px] font-semibold  text-orange-400">
                            {{ __('100climateleaders.nomination_label') }}
                        </div>

                        <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-white">
                            {{ __('100climateleaders.nomination_title') }}
                        </h2>

                        <p class="mt-2 text-xs leading-relaxed text-white/55">
                            {{ __('100climateleaders.nomination_description') }}
                        </p>

                        <form id="nominationFormDesktop" method="POST" action="{{ route('climate-leaders.store') }}"
                            class="mt-7 space-y-4 w-[670px] ">
                            @csrf

                            {{-- Validation Errors --}}
                            <div id="desktopErrorMsg"
                                class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50 hidden">
                                <h3 class="font-bold text-red-400 text-sm mb-2">
                                    {{ __('Please fix the following errors:') }}
                                </h3>
                                <ul id="desktopErrorList" class="space-y-1 text-red-300 text-sm"></ul>
                            </div>

                            {{-- Success Message --}}
                            <div id="desktopSuccessMsg"
                                class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/50 hidden">
                                <h3 class="font-bold text-green-400 text-sm">{{ __('Thank you for your submission!') }}
                                </h3>
                            </div>

                            {{-- Full Name --}}
                            <div>
                                <label
                                    class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_full_name') }}</label>
                                <input name="fullname" value="{{ old('fullname') }}" required
                                    placeholder="{{ __('100climateleaders.nomination_full_name_placeholder') }}" class="mt-2 w-full rounded-md border border-white/10 bg-white/5
                       px-4 py-2.5 text-sm text-white placeholder:text-white/30
                       outline-none focus:border-orange-400/60
                       focus:ring-2 focus:ring-orange-400/20" />
                            </div>

                            {{-- Countries --}}
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label
                                        class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_nationality') }}</label>
                                    <select name="Country_of_Nationality" required class="mt-2 w-full rounded-md border border-gray-600 bg-gray-800
                                        px-4 py-2.5 text-sm text-white outline-none
                                         focus:border-orange-400/60 focus:ring-2 focus:ring-orange-400/20">
                                        <option disabled selected>
                                            {{ __('100climateleaders.nomination_select_country') }}
                                        </option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                        <option>Andorra</option>
                                        <option>Angola</option>
                                        <option>Argentina</option>
                                        <option>Armenia</option>
                                        <option>Australia</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                        <option>Belarus</option>
                                        <option>Belgium</option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bhutan</option>
                                        <option>Bolivia</option>
                                        <option>Bosnia and Herzegovina</option>
                                        <option>Botswana</option>
                                        <option>Brazil</option>
                                        <option>Brunei</option>
                                        <option>Bulgaria</option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi</option>
                                        <option>Cambodia</option>
                                        <option>Cameroon</option>
                                        <option>Canada</option>
                                        <option>Cape Verde</option>
                                        <option>Central African Republic</option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>Colombia</option>
                                        <option>Comoros</option>
                                        <option>Congo</option>
                                        <option>Costa Rica</option>
                                        <option>Croatia</option>
                                        <option>Cuba</option>
                                        <option>Cyprus</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark</option>
                                        <option>Djibouti</option>
                                        <option>Dominica</option>
                                        <option>Dominican Republic</option>
                                        <option>Ecuador</option>
                                        <option>Egypt</option>
                                        <option>El Salvador</option>
                                        <option>Equatorial Guinea</option>
                                        <option>Eritrea</option>
                                        <option>Estonia</option>
                                        <option>Eswatini</option>
                                        <option>Ethiopia</option>
                                        <option>Fiji</option>
                                        <option>Finland</option>
                                        <option>France</option>
                                        <option>Gabon</option>
                                        <option>Gambia</option>
                                        <option>Georgia</option>
                                        <option>Germany</option>
                                        <option>Ghana</option>
                                        <option>Greece</option>
                                        <option>Grenada</option>
                                        <option>Guatemala</option>
                                        <option>Guinea</option>
                                        <option>Guinea-Bissau</option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Honduras</option>
                                        <option>Hungary</option>
                                        <option>Iceland</option>
                                        <option>India</option>
                                        <option>Indonesia</option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland</option>
                                        <option>Italy</option>
                                        <option>Jamaica</option>
                                        <option>Japan</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan</option>
                                        <option>Kenya</option>
                                        <option>Kiribati</option>
                                        <option>Kosovo</option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan</option>
                                        <option>Laos</option>
                                        <option>Latvia</option>
                                        <option>Lebanon</option>
                                        <option>Lesotho</option>
                                        <option>Liberia</option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania</option>
                                        <option>Luxembourg</option>
                                        <option>Madagascar</option>
                                        <option>Malawi</option>
                                        <option>Malaysia</option>
                                        <option>Maldives</option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands</option>
                                        <option>Mauritania</option>
                                        <option>Mauritius</option>
                                        <option>Mexico</option>
                                        <option>Micronesia</option>
                                        <option>Moldova</option>
                                        <option>Monaco</option>
                                        <option>Mongolia</option>
                                        <option>Montenegro</option>
                                        <option>Morocco</option>
                                        <option>Mozambique</option>
                                        <option>Myanmar</option>
                                        <option>Namibia</option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands</option>
                                        <option>New Zealand</option>
                                        <option>Nicaragua</option>
                                        <option>Niger</option>
                                        <option>Nigeria</option>
                                        <option>North Korea</option>
                                        <option>North Macedonia</option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan</option>
                                        <option>Palau</option>
                                        <option>Palestine</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea</option>
                                        <option>Paraguay</option>
                                        <option>Peru</option>
                                        <option>Philippines</option>
                                        <option>Poland</option>
                                        <option>Portugal</option>
                                        <option>Qatar</option>
                                        <option>Romania</option>
                                        <option>Russia</option>
                                        <option>Rwanda</option>
                                        <option>Saint Kitts and Nevis</option>
                                        <option>Saint Lucia</option>
                                        <option>Saint Vincent and the Grenadines</option>
                                        <option>Samoa</option>
                                        <option>San Marino</option>
                                        <option>Sao Tome and Principe</option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal</option>
                                        <option>Serbia</option>
                                        <option>Seychelles</option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore</option>
                                        <option>Slovakia</option>
                                        <option>Slovenia</option>
                                        <option>Solomon Islands</option>
                                        <option>Somalia</option>
                                        <option>South Africa</option>
                                        <option>South Korea</option>
                                        <option>South Sudan</option>
                                        <option>Spain</option>
                                        <option>Sri Lanka</option>
                                        <option>Sudan</option>
                                        <option>Suriname</option>
                                        <option>Sweden</option>
                                        <option>Switzerland</option>
                                        <option>Syria</option>
                                        <option>Taiwan</option>
                                        <option>Tajikistan</option>
                                        <option>Tanzania</option>
                                        <option>Thailand</option>
                                        <option>Timor-Leste</option>
                                        <option>Togo</option>
                                        <option>Tonga</option>
                                        <option>Trinidad and Tobago</option>
                                        <option>Tunisia</option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan</option>
                                        <option>Tuvalu</option>
                                        <option>Uganda</option>
                                        <option>Ukraine</option>
                                        <option>United Arab Emirates</option>
                                        <option>United Kingdom</option>
                                        <option>United States</option>
                                        <option>Uruguay</option>
                                        <option>Uzbekistan</option>
                                        <option>Vanuatu</option>
                                        <option>Vatican City</option>
                                        <option>Venezuela</option>
                                        <option>Vietnam</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe</option>
                                    </select>
                                </div>

                                <div>
                                    <label
                                        class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_residence') }}</label>
                                    <select name="Country_of_Residence" required class="mt-2 w-full rounded-md border border-gray-600 bg-gray-800
                                      px-4 py-2.5 text-sm text-white outline-none
                                         focus:border-orange-400/60 focus:ring-2 focus:ring-orange-400/20">
                                        <option disabled selected>
                                            {{ __('100climateleaders.nomination_select_country') }}
                                        </option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                        <option>Andorra</option>
                                        <option>Angola</option>
                                        <option>Argentina</option>
                                        <option>Armenia</option>
                                        <option>Australia</option>
                                        <option>Austria</option>
                                        <option>Azerbaijan</option>
                                        <option>Bahamas</option>
                                        <option>Bahrain</option>
                                        <option>Bangladesh</option>
                                        <option>Barbados</option>
                                        <option>Belarus</option>
                                        <option>Belgium</option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bhutan</option>
                                        <option>Bolivia</option>
                                        <option>Bosnia and Herzegovina</option>
                                        <option>Botswana</option>
                                        <option>Brazil</option>
                                        <option>Brunei</option>
                                        <option>Bulgaria</option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi</option>
                                        <option>Cambodia</option>
                                        <option>Cameroon</option>
                                        <option>Canada</option>
                                        <option>Cape Verde</option>
                                        <option>Central African Republic</option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>Colombia</option>
                                        <option>Comoros</option>
                                        <option>Congo</option>
                                        <option>Costa Rica</option>
                                        <option>Croatia</option>
                                        <option>Cuba</option>
                                        <option>Cyprus</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark</option>
                                        <option>Djibouti</option>
                                        <option>Dominica</option>
                                        <option>Dominican Republic</option>
                                        <option>Ecuador</option>
                                        <option>Egypt</option>
                                        <option>El Salvador</option>
                                        <option>Equatorial Guinea</option>
                                        <option>Eritrea</option>
                                        <option>Estonia</option>
                                        <option>Eswatini</option>
                                        <option>Ethiopia</option>
                                        <option>Fiji</option>
                                        <option>Finland</option>
                                        <option>France</option>
                                        <option>Gabon</option>
                                        <option>Gambia</option>
                                        <option>Georgia</option>
                                        <option>Germany</option>
                                        <option>Ghana</option>
                                        <option>Greece</option>
                                        <option>Grenada</option>
                                        <option>Guatemala</option>
                                        <option>Guinea</option>
                                        <option>Guinea-Bissau</option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Honduras</option>
                                        <option>Hungary</option>
                                        <option>Iceland</option>
                                        <option>India</option>
                                        <option>Indonesia</option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland</option>
                                        <option>Italy</option>
                                        <option>Jamaica</option>
                                        <option>Japan</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan</option>
                                        <option>Kenya</option>
                                        <option>Kiribati</option>
                                        <option>Kosovo</option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan</option>
                                        <option>Laos</option>
                                        <option>Latvia</option>
                                        <option>Lebanon</option>
                                        <option>Lesotho</option>
                                        <option>Liberia</option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania</option>
                                        <option>Luxembourg</option>
                                        <option>Madagascar</option>
                                        <option>Malawi</option>
                                        <option>Malaysia</option>
                                        <option>Maldives</option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands</option>
                                        <option>Mauritania</option>
                                        <option>Mauritius</option>
                                        <option>Mexico</option>
                                        <option>Micronesia</option>
                                        <option>Moldova</option>
                                        <option>Monaco</option>
                                        <option>Mongolia</option>
                                        <option>Montenegro</option>
                                        <option>Morocco</option>
                                        <option>Mozambique</option>
                                        <option>Myanmar</option>
                                        <option>Namibia</option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands</option>
                                        <option>New Zealand</option>
                                        <option>Nicaragua</option>
                                        <option>Niger</option>
                                        <option>Nigeria</option>
                                        <option>North Korea</option>
                                        <option>North Macedonia</option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan</option>
                                        <option>Palau</option>
                                        <option>Palestine</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea</option>
                                        <option>Paraguay</option>
                                        <option>Peru</option>
                                        <option>Philippines</option>
                                        <option>Poland</option>
                                        <option>Portugal</option>
                                        <option>Qatar</option>
                                        <option>Romania</option>
                                        <option>Russia</option>
                                        <option>Rwanda</option>
                                        <option>Saint Kitts and Nevis</option>
                                        <option>Saint Lucia</option>
                                        <option>Saint Vincent and the Grenadines</option>
                                        <option>Samoa</option>
                                        <option>San Marino</option>
                                        <option>Sao Tome and Principe</option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal</option>
                                        <option>Serbia</option>
                                        <option>Seychelles</option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore</option>
                                        <option>Slovakia</option>
                                        <option>Slovenia</option>
                                        <option>Solomon Islands</option>
                                        <option>Somalia</option>
                                        <option>South Africa</option>
                                        <option>South Korea</option>
                                        <option>South Sudan</option>
                                        <option>Spain</option>
                                        <option>Sri Lanka</option>
                                        <option>Sudan</option>
                                        <option>Suriname</option>
                                        <option>Sweden</option>
                                        <option>Switzerland</option>
                                        <option>Syria</option>
                                        <option>Taiwan</option>
                                        <option>Tajikistan</option>
                                        <option>Tanzania</option>
                                        <option>Thailand</option>
                                        <option>Timor-Leste</option>
                                        <option>Togo</option>
                                        <option>Tonga</option>
                                        <option>Trinidad and Tobago</option>
                                        <option>Tunisia</option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan</option>
                                        <option>Tuvalu</option>
                                        <option>Uganda</option>
                                        <option>Ukraine</option>
                                        <option>United Arab Emirates</option>
                                        <option>United Kingdom</option>
                                        <option>United States</option>
                                        <option>Uruguay</option>
                                        <option>Uzbekistan</option>
                                        <option>Vanuatu</option>
                                        <option>Vatican City</option>
                                        <option>Venezuela</option>
                                        <option>Vietnam</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Organization --}}
                            <div>
                                <label
                                    class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_organization') }}</label>
                                <input name="organization" required
                                    placeholder="{{ __('100climateleaders.nomination_organization_placeholder') }}"
                                    class="mt-2 w-full rounded-md border border-white/10 bg-white/5
                       px-4 py-2.5 text-sm text-white placeholder:text-white/30" />
                            </div>

                            {{-- Bio --}}
                            <div>
                                <label
                                    class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_bio') }}</label>
                                <textarea name="bio" rows="4" required
                                    placeholder="{{ __('100climateleaders.nomination_bio_placeholder') }}" class="mt-2 w-full resize-none rounded-md border border-white/10 bg-white/5
                       px-4 py-2.5 text-sm text-white placeholder:text-white/30"></textarea>
                            </div>

                            {{-- Email + Phone --}}
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div>
                                    <label
                                        class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_email') }}</label>
                                    <input name="email" required
                                        placeholder="{{ __('100climateleaders.nomination_email_placeholder') }}"
                                        class="mt-2 w-full rounded-md border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white" />
                                </div>
                                <div>
                                    <label
                                        class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_phone') }}</label>
                                    <div class="mt-2 flex gap-2">
                                        <select name="country_code" required class="w-24 rounded-md border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white outline-none
                                         focus:border-orange-400/60 focus:ring-2 focus:ring-orange-400/20">
                                            <option value="" disabled selected>Code</option>
                                            <option value="+93">🇦🇫 +93</option>
                                            <option value="+355">🇦🇱 +355</option>
                                            <option value="+213">🇩🇿 +213</option>
                                            <option value="+1-684">🇦🇸 +1-684</option>
                                            <option value="+376">🇦🇩 +376</option>
                                            <option value="+244">🇦🇴 +244</option>
                                            <option value="+1-268">🇦🇬 +1-268</option>
                                            <option value="+54">🇦🇷 +54</option>
                                            <option value="+374">🇦🇲 +374</option>
                                            <option value="+297">🇦🇼 +297</option>
                                            <option value="+61">🇦🇺 +61</option>
                                            <option value="+43">🇦🇹 +43</option>
                                            <option value="+994">🇦🇿 +994</option>
                                            <option value="+1-242">🇧🇸 +1-242</option>
                                            <option value="+973">🇧🇭 +973</option>
                                            <option value="+880">🇧🇩 +880</option>
                                            <option value="+1-246">🇧🇧 +1-246</option>
                                            <option value="+375">🇧🇾 +375</option>
                                            <option value="+32">🇧🇪 +32</option>
                                            <option value="+501">🇧🇿 +501</option>
                                            <option value="+229">🇧🇯 +229</option>
                                            <option value="+1-441">🇧🇲 +1-441</option>
                                            <option value="+975">🇧🇹 +975</option>
                                            <option value="+591">🇧🇴 +591</option>
                                            <option value="+387">🇧🇦 +387</option>
                                            <option value="+267">🇧🇼 +267</option>
                                            <option value="+55">🇧🇷 +55</option>
                                            <option value="+246">🇬🇧 +246</option>
                                            <option value="+673">🇧🇳 +673</option>
                                            <option value="+359">🇧🇬 +359</option>
                                            <option value="+226">🇧🇫 +226</option>
                                            <option value="+257">🇧🇮 +257</option>
                                            <option value="+855">🇰🇭 +855</option>
                                            <option value="+237">🇨🇲 +237</option>
                                            <option value="+1">🇨🇦 +1</option>
                                            <option value="+238">🇨🇻 +238</option>
                                            <option value="+1-345">🇰🇾 +1-345</option>
                                            <option value="+236">🇨🇫 +236</option>
                                            <option value="+235">🇹🇩 +235</option>
                                            <option value="+56">🇨🇱 +56</option>
                                            <option value="+86">🇨🇳 +86</option>
                                            <option value="+57">🇨🇴 +57</option>
                                            <option value="+269">🇰🇲 +269</option>
                                            <option value="+242">🇨🇬 +242</option>
                                            <option value="+506">🇨🇷 +506</option>
                                            <option value="+385">🇭🇷 +385</option>
                                            <option value="+53">🇨🇺 +53</option>
                                            <option value="+357">🇨🇾 +357</option>
                                            <option value="+420">🇨🇿 +420</option>
                                            <option value="+45">🇩🇰 +45</option>
                                            <option value="+246">🇩🇬 +246</option>
                                            <option value="+1-767">🇩🇲 +1-767</option>
                                            <option value="+1-809">🇩🇴 +1-809</option>
                                            <option value="+593">🇪🇨 +593</option>
                                            <option value="+20">🇪🇬 +20</option>
                                            <option value="+503">🇸🇻 +503</option>
                                            <option value="+240">🇬🇶 +240</option>
                                            <option value="+291">🇪🇷 +291</option>
                                            <option value="+372">🇪🇪 +372</option>
                                            <option value="+251">🇪🇹 +251</option>
                                            <option value="+298">🇫🇴 +298</option>
                                            <option value="+679">🇫🇯 +679</option>
                                            <option value="+358">🇫🇮 +358</option>
                                            <option value="+33">🇫🇷 +33</option>
                                            <option value="+241">🇬🇦 +241</option>
                                            <option value="+220">🇬🇲 +220</option>
                                            <option value="+995">🇬🇪 +995</option>
                                            <option value="+49">🇩🇪 +49</option>
                                            <option value="+233">🇬🇭 +233</option>
                                            <option value="+350">🇬🇮 +350</option>
                                            <option value="+30">🇬🇷 +30</option>
                                            <option value="+299">🇬🇱 +299</option>
                                            <option value="+1-473">🇬🇩 +1-473</option>
                                            <option value="+1-671">🇬🇺 +1-671</option>
                                            <option value="+502">🇬🇹 +502</option>
                                            <option value="+224">🇬🇳 +224</option>
                                            <option value="+245">🇬🇼 +245</option>
                                            <option value="+592">🇬🇾 +592</option>
                                            <option value="+509">🇭🇹 +509</option>
                                            <option value="+504">🇭🇳 +504</option>
                                            <option value="+852">🇭🇰 +852</option>
                                            <option value="+36">🇭🇺 +36</option>
                                            <option value="+354">🇮🇸 +354</option>
                                            <option value="+91">🇮🇳 +91</option>
                                            <option value="+62">🇮🇩 +62</option>
                                            <option value="+98">🇮🇷 +98</option>
                                            <option value="+964">🇮🇶 +964</option>
                                            <option value="+353">🇮🇪 +353</option>
                                            <option value="+972">🇮🇱 +972</option>
                                            <option value="+39">🇮🇹 +39</option>
                                            <option value="+1-876">🇯🇲 +1-876</option>
                                            <option value="+81">🇯🇵 +81</option>
                                            <option value="+962">🇯🇴 +962</option>
                                            <option value="+7">🇰🇿 +7</option>
                                            <option value="+254">🇰🇪 +254</option>
                                            <option value="+686">🇰🇮 +686</option>
                                            <option value="+82">🇰🇷 +82</option>
                                            <option value="+965">🇰🇼 +965</option>
                                            <option value="+996">🇰🇬 +996</option>
                                            <option value="+856">🇱🇦 +856</option>
                                            <option value="+371">🇱🇻 +371</option>
                                            <option value="+961">🇱🇧 +961</option>
                                            <option value="+266">🇱🇸 +266</option>
                                            <option value="+231">🇱🇷 +231</option>
                                            <option value="+218">🇱🇾 +218</option>
                                            <option value="+423">🇱🇮 +423</option>
                                            <option value="+370">🇱🇹 +370</option>
                                            <option value="+352">🇱🇺 +352</option>
                                            <option value="+853">🇲🇴 +853</option>
                                            <option value="+389">🇲🇰 +389</option>
                                            <option value="+261">🇲🇬 +261</option>
                                            <option value="+265">🇲🇼 +265</option>
                                            <option value="+60">🇲🇾 +60</option>
                                            <option value="+960">🇲🇻 +960</option>
                                            <option value="+223">🇲🇱 +223</option>
                                            <option value="+356">🇲🇹 +356</option>
                                            <option value="+692">🇲🇭 +692</option>
                                            <option value="+222">🇲🇷 +222</option>
                                            <option value="+230">🇲🇺 +230</option>
                                            <option value="+52">🇲🇽 +52</option>
                                            <option value="+691">🇫🇲 +691</option>
                                            <option value="+373">🇲🇩 +373</option>
                                            <option value="+377">🇲🇨 +377</option>
                                            <option value="+976">🇲🇳 +976</option>
                                            <option value="+382">🇲🇪 +382</option>
                                            <option value="+212">🇲🇦 +212</option>
                                            <option value="+258">🇲🇿 +258</option>
                                            <option value="+95">🇲🇲 +95</option>
                                            <option value="+264">🇳🇦 +264</option>
                                            <option value="+674">🇳🇷 +674</option>
                                            <option value="+977">🇳🇵 +977</option>
                                            <option value="+31">🇳🇱 +31</option>
                                            <option value="+64">🇳🇿 +64</option>
                                            <option value="+505">🇳🇮 +505</option>
                                            <option value="+227">🇳🇪 +227</option>
                                            <option value="+234">🇳🇬 +234</option>
                                            <option value="+47">🇳🇴 +47</option>
                                            <option value="+968">🇴🇲 +968</option>
                                            <option value="+92">🇵🇰 +92</option>
                                            <option value="+680">🇵🇼 +680</option>
                                            <option value="+507">🇵🇦 +507</option>
                                            <option value="+675">🇵🇬 +675</option>
                                            <option value="+595">🇵🇾 +595</option>
                                            <option value="+51">🇵🇪 +51</option>
                                            <option value="+63">🇵🇭 +63</option>
                                            <option value="+48">🇵🇱 +48</option>
                                            <option value="+351">🇵🇹 +351</option>
                                            <option value="+974">🇶🇦 +974</option>
                                            <option value="+40">🇷🇴 +40</option>
                                            <option value="+7">🇷🇺 +7</option>
                                            <option value="+250">🇷🇼 +250</option>
                                            <option value="+1-869">🇰🇳 +1-869</option>
                                            <option value="+1-758">🇱🇨 +1-758</option>
                                            <option value="+1-784">🇻🇨 +1-784</option>
                                            <option value="+685">🇼🇸 +685</option>
                                            <option value="+378">🇸🇲 +378</option>
                                            <option value="+239">🇸🇹 +239</option>
                                            <option value="+966">🇸🇦 +966</option>
                                            <option value="+221">🇸🇳 +221</option>
                                            <option value="+381">🇷🇸 +381</option>
                                            <option value="+248">🇸🇨 +248</option>
                                            <option value="+232">🇸🇱 +232</option>
                                            <option value="+65">🇸🇬 +65</option>
                                            <option value="+421">🇸🇰 +421</option>
                                            <option value="+386">🇸🇮 +386</option>
                                            <option value="+677">🇸🇧 +677</option>
                                            <option value="+252">🇸🇴 +252</option>
                                            <option value="+27">🇿🇦 +27</option>
                                            <option value="+34">🇪🇸 +34</option>
                                            <option value="+94">🇱🇰 +94</option>
                                            <option value="+249">🇸🇩 +249</option>
                                            <option value="+597">🇸🇷 +597</option>
                                            <option value="+46">🇸🇪 +46</option>
                                            <option value="+41">🇨🇭 +41</option>
                                            <option value="+963">🇸🇾 +963</option>
                                            <option value="+886">🇹🇼 +886</option>
                                            <option value="+992">🇹🇯 +992</option>
                                            <option value="+255">🇹🇿 +255</option>
                                            <option value="+66">🇹🇭 +66</option>
                                            <option value="+670">🇹🇱 +670</option>
                                            <option value="+228">🇹🇬 +228</option>
                                            <option value="+676">🇹🇴 +676</option>
                                            <option value="+1-868">🇹🇹 +1-868</option>
                                            <option value="+216">🇹🇳 +216</option>
                                            <option value="+90">🇹🇷 +90</option>
                                            <option value="+993">🇹🇲 +993</option>
                                            <option value="+1-649">🇹🇨 +1-649</option>
                                            <option value="+688">🇹🇻 +688</option>
                                            <option value="+256">🇺🇬 +256</option>
                                            <option value="+380">🇺🇦 +380</option>
                                            <option value="+971">🇦🇪 +971</option>
                                            <option value="+44">🇬🇧 +44</option>
                                            <option value="+1">🇺🇸 +1</option>
                                            <option value="+598">🇺🇾 +598</option>
                                            <option value="+998">🇺🇿 +998</option>
                                            <option value="+678">🇻🇺 +678</option>
                                            <option value="+58">🇻🇪 +58</option>
                                            <option value="+84">🇻🇳 +84</option>
                                            <option value="+1-340">🇻🇮 +1-340</option>
                                            <option value="+967">🇾🇪 +967</option>
                                            <option value="+260">🇿🇲 +260</option>
                                            <option value="+263">🇿🇼 +263</option>
                                        </select>
                                        <input name="phone" required
                                            placeholder="{{ __('100climateleaders.nomination_phone_placeholder') }}"
                                            class="flex-1 rounded-md border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white"
                                            dir="ltr" />
                                    </div>
                                </div>
                            </div>

                            {{-- LinkedIn --}}
                            <div>
                                <label
                                    class="block text-[10px] font-semibold text-white/70">{{ __('100climateleaders.nomination_linkedin') }}</label>
                                <input name="linkedin_profile"
                                    placeholder="{{ __('100climateleaders.nomination_linkedin_placeholder') }}"
                                    class="mt-2 w-full rounded-md border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white" />
                            </div>

                            {{-- Submit --}}
                            <button id="desktopSubmitBtn" type="button" class="mt-3 inline-flex w-full items-center justify-center gap-2
                     rounded-md bg-[#E68238] px-6 py-3
                     text-[11px] font-bold uppercase tracking-wide text-white
                     hover:bg-orange-600 transition">
                                {{ __('100climateleaders.nomination_submit') }}
                            </button>
                        </form>
                    </div>
                </div>

                {{-- RIGHT spacer (image lives in background) --}}
                <div class="hidden lg:col-span-6 lg:block"></div>
            </div>
        </div>
    </section>



    <!-- Footer -->
    @include('partials.footer')

    <script type="text/javascript">
        // Handle both mobile and desktop nomination forms
        const forms = ['nominationFormMobile', 'nominationFormDesktop'];
        const formIds = {
            'nominationFormMobile': { submitBtn: 'mobileSubmitBtn', errorMsg: 'mobileErrorMsg', errorList: 'mobileErrorList', successMsg: 'mobileSuccessMsg' },
            'nominationFormDesktop': { submitBtn: 'desktopSubmitBtn', errorMsg: 'desktopErrorMsg', errorList: 'desktopErrorList', successMsg: 'desktopSuccessMsg' }
        };

        forms.forEach(formId => {
            const form = document.getElementById(formId);
            const config = formIds[formId];
            const submitBtn = document.getElementById(config.submitBtn);

            if (form && submitBtn) {
                submitBtn.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Reset messages
                    document.getElementById(config.errorMsg).classList.add('hidden');
                    document.getElementById(config.successMsg).classList.add('hidden');

                    // Collect form data
                    const formData = new FormData(form);
                    const data = {
                        fullname: formData.get('fullname'),
                        Country_of_Nationality: formData.get('Country_of_Nationality'),
                        Country_of_Residence: formData.get('Country_of_Residence'),
                        organization: formData.get('organization'),
                        bio: formData.get('bio'),
                        email: formData.get('email'),
                        country_code: formData.get('country_code'),
                        phone: formData.get('phone'),
                        linkedin_profile: formData.get('linkedin_profile') || null,
                        _token: formData.get('_token')
                    };

                    // VALIDATE REQUIRED FIELDS CLIENT-SIDE
                    const requiredFields = {
                        'fullname': 'Full Name',
                        'Country_of_Nationality': 'Country of Nationality',
                        'Country_of_Residence': 'Country of Residence',
                        'organization': 'Organization',
                        'bio': 'Biography',
                        'email': 'Email',
                        'country_code': 'Country Code',
                        'phone': 'Phone Number'
                    };
                    const errors = {};

                    Object.keys(requiredFields).forEach(field => {
                        if (!data[field] || data[field].trim() === '') {
                            errors[field] = [requiredFields[field] + ' is required.'];
                        }
                    });

                    // If there are validation errors, display them
                    if (Object.keys(errors).length > 0) {
                        const errorList = document.getElementById(config.errorList);
                        errorList.innerHTML = '';
                        Object.keys(errors).forEach(field => {
                            const errorMessages = errors[field];
                            errorMessages.forEach(error => {
                                const li = document.createElement('li');
                                li.textContent = '• ' + error;
                                errorList.appendChild(li);
                            });
                        });
                        document.getElementById(config.errorMsg).classList.remove('hidden');
                        document.getElementById(config.errorMsg).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        return; // Don't submit
                    }

                    // Send to server
                    fetch('/climate-leaders', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': data._token
                        },
                        body: JSON.stringify(data)
                    })
                        .then(response => {
                            if (response.status === 201 || response.status === 200) {
                                // Success
                                form.reset();
                                document.getElementById(config.successMsg).classList.remove('hidden');
                                // Optionally scroll to success message
                                document.getElementById(config.successMsg).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                return Promise.resolve(null);
                            } else if (response.status === 422) {
                                // Validation errors
                                return response.json().then(data => {
                                    if (data && data.errors) {
                                        const errorList = document.getElementById(config.errorList);
                                        errorList.innerHTML = '';
                                        Object.keys(data.errors).forEach(field => {
                                            const errors = data.errors[field];
                                            errors.forEach(error => {
                                                const li = document.createElement('li');
                                                li.textContent = '• ' + error;
                                                errorList.appendChild(li);
                                            });
                                        });
                                        document.getElementById(config.errorMsg).classList.remove('hidden');
                                        document.getElementById(config.errorMsg).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                                    }
                                    return null;
                                });
                            } else if (response.status === 302) {
                                return Promise.resolve(null);
                            } else {
                                throw new Error(`Server returned status ${response.status}`);
                            }
                        })
                        .catch(err => {
                            console.error('Error:', err);
                            const errorList = document.getElementById(config.errorList);
                            errorList.innerHTML = '<li>• An error occurred while submitting the form. Please try again.</li>';
                            document.getElementById(config.errorMsg).classList.remove('hidden');
                        });
                });
            }
        });
    </script>

</body>

</html>