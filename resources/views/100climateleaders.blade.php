<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('100climateleaders.page_title') }}</title>
    <meta name="description" content="{{ __('100climateleaders.meta_description') }}">
    <link rel="icon" type="image/webp" href="/storage/nav-img/scw-logo.webp">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <!-- Include Navigation -->
    @include('partials.navigation')

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
                <a href="#" class="inline-flex items-center justify-center rounded-md bg-[#E68238] px-6 py-3
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
                <a href="#" class="inline-flex items-center justify-center rounded-lg bg-[#E68238] px-6 py-3
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

    <!-- Eligibility Criteria / Who Can Apply (MATCHED to latest design) -->
    <section class="relative overflow-hidden bg-white">
        <!-- Bottom olive field -->
        <div class="absolute inset-x-0 bottom-0 h-[48%] " aria-hidden="true">
            <img src="/storage/mix/Eligibility Criteria-bg.webp" alt="" class="w-full h-full object-cover">
        </div>


        <div class="relative mx-auto max-w-6xl px-6 py-16">
            <div class="grid items-start gap-12 lg:grid-cols-12">
                <!-- LEFT TEXT -->
                <div class="lg:col-span-4">
                    <div class="text-[15px] font-semibold  text-[#E68238]">
                        Eligibility Criteria
                    </div>

                    <h2 class="mt-3 text-[32px] font-extrabold tracking-tight text-slate-900">
                        Who Can Apply?
                    </h2>

                    <p class="mt-3 text-[15px] text-[#5F5F5F]">
                        You may nominate yourself if you
                    </p>

                    <a href="#" class="mt-8 inline-flex items-center justify-center rounded-lg bg-[#E68238] px-7 py-3
                 text-xs font-bold uppercase tracking-wide text-white shadow-sm
                 hover:bg-orange-600 active:bg-orange-700 transition">
                        Nominate Yourself
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
                                    Leading <br> climate Action
                                </h3>

                                <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                <p class="mt-7 text-sm leading-relaxed text-white/70 max-w-md">
                                    You are leading or playing a significant role in climate-related initiatives,
                                    projects, or policies that drive meaningful change.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- RIGHT CARDS (3 across) -->
                <div class="lg:col-span-8  ">
                    <div class="grid gap-20 md:grid-cols-3  ">
                        <!-- Card 2  -->
                        <article class="relative overflow-hidden rounded-2xl w-[270px] pt-[180px] ml-[-90px]">
                            <div class="relative rounded-2xl p-10 h-[420px]  bg-cover bg-center"
                                style="background-image: url('/storage/mix/proven-impact-bg.webp')">

                                <div class="relative h-[270px]">
                                    <!-- Icon -->
                                    <div class="text-white/90">
                                        <img src="/storage/mix/green-energy.webp" alt="">
                                    </div>

                                    <h3 class="mt-8 text-xl font-abold leading-snug text-white">
                                        Proven Impact<br />&amp; Innovation
                                    </h3>

                                    <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                    <p class="mt-7 text-sm leading-relaxed text-white/70">
                                        You have demonstrated measurable impact, innovative approaches, or leadership
                                        that
                                        delivers real climate outcomes.
                                    </p>
                                </div>
                        </article>

                        <!-- Card 3  -->
                        <article class="relative overflow-hidden rounded-2xl w-[270px] pt-32 ml-[-60px]">
                            <div class="relative rounded-2xl p-10 h-[420px]  bg-cover bg-center"
                                style="background-image: url('/storage/mix/across-bg.webp')">

                                <div class="relative h-[270px]">
                                    <!-- Icon -->
                                    <div class="text-white/90">
                                        <img src="/storage/mix/earth-4.webp" alt="">
                                    </div>

                                    <h3 class="mt-8 text-xl font-abold leading-snug text-white">
                                        Across All <br /> Sectors
                                    </h3>

                                    <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                    <p class="mt-7 text-sm leading-relaxed text-white/70">
                                        You represent the public sector, private sector, startups, academia,
                                        civil society, or community-based organizations.
                                    </p>
                                </div>
                        </article>



                        <!-- Card 4  -->
                        <article class="relative overflow-hidden rounded-2xl w-[270px] pt-[70px] ml-[-30px]">
                            <div class="relative rounded-2xl p-10 h-[420px]  bg-cover bg-center"
                                style="background-image: url('/storage/mix/commitment-bg.webp')">

                                <div class="relative h-[270px]">
                                    <!-- Icon -->
                                    <div class="text-white/90">
                                        <img src="/storage/mix/recycle.webp" alt="">
                                    </div>

                                    <h3 class="mt-8 text-xl font-abold leading-snug text-white">
                                        Commitment <br /> to Climate Resilience
                                    </h3>

                                    <div class="mt-6 h-px w-[169px] bg-white/20"></div>

                                    <p class="mt-7 text-sm leading-relaxed text-white/70">
                                        You are dedicated to advancing climate action
                                        and strengthening long-term environmental resilience.
                                    </p>
                                </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- Footer -->
    @include('partials.footer')

</body>

</html>