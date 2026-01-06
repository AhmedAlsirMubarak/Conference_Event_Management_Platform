<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="icon" type="image/webp" href="{{ asset('storage/uploads/nav-img/scw-logo.webp') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden">
    <!-- Include Navigation -->
    @include('partials.navigation')




    <!-- Desktop Hero Section (lg and above) -->
    <section class="hidden lg:block">
        <div class="relative w-full h-[633px]">
            {{-- Background Image --}}
            <img src="{{ asset('storage/uploads/mix/home-dark-bg.webp') }}"
                class="w-full h-full object-cover object-center" alt="Saudi Climate Week 2026 Hero Image" />

            {{-- Content Wrapper (centered) --}}
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                {{-- Main Headline --}}
                <div class="flex flex-col items-center text-center">
                    <h1 class="text-[80px] font-bold text-white leading-[95px] max-w-[1134x]">
                        {{ __('hero.headline') }}
                    </h1>
                </div>

                {{-- Subtitle --}}
                <div class="flex flex-col items-center text-center mt-4">
                    <p class="text-2xl font-medium text-white leading-10 max-w-[871px]">
                        {{ __('hero.subtitle') }}
                    </p>
                </div>

                {{-- Location & Date Section --}}
                <div class="flex items-end gap-8 mt-16">
                    {{-- Location --}}
                    <div class="flex flex-col items-center text-center">
                        <span class="text-4xl font-bold text-white leading-tight">
                            {{ __('hero.location_city') }}
                        </span>
                        <span class="text-2xl font-medium text-white leading-snug">
                            {{ __('hero.location_country') }}
                        </span>
                    </div>

                    {{-- Divider Line --}}
                    <div class="w-px h-20 bg-[#E6813E]/50"></div>

                    {{-- Date --}}
                    <div class="flex flex-col items-center text-center">
                        <span class="text-4xl font-bold text-white leading-tight">
                            {{ __('hero.date') }}
                        </span>
                        <span class="text-2xl font-medium text-white leading-snug">
                            {{ __('hero.date_month') }}
                        </span>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center gap-4 mt-12">
                    <a href="#speakers" class="px-8 py-3 bg-[#7D876B] hover:bg-[#6d765b] text-white font-semibold rounded-lg transition-colors duration-300">
                        {{ __('hero.button_speakers') ?? 'Speakers' }}
                    </a>
                    <a href="#exhibitors" class="px-8 py-3 bg-[#E6813E] hover:bg-[#d96e2f] text-white font-semibold rounded-lg transition-colors duration-300">
                        {{ __('hero.button_exhibitors') ?? 'Exhibitors' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile & Tablet Hero Section (below lg) -->
    <section class="lg:hidden">
        <div class="relative w-full h-[350px] md:h-[550px] flex flex-col items-center justify-center pt-30pb-10">
            {{-- Background Image --}}
            <img src="{{ asset('storage/uploads/mix/home-dark-bg.webp') }}"
                class="absolute inset-0 w-full h-full object-cover object-center"
                alt="Saudi Climate Week 2026 Hero Image" />

            {{-- Overlay gradient for mobile readability --}}
            <div class="absolute inset-0 bg-linear-to-t from-black/40 via-transparent to-transparent"></div>

            {{-- Content Wrapper (centered) --}}
            <div class="relative z-10 w-full h-full flex flex-col items-center justify-center px-4 md:px-8">

                {{-- Main Headline --}}
                <div class="flex flex-col items-center text-center mb-3 md:mb-4">
                    <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight max-w-xs md:max-w-2xl">
                        {{ __('hero.headline') }}
                    </h1>
                </div>

                {{-- Subtitle --}}
                <div class="flex flex-col items-center text-center mb-6 md:mb-8">
                    <p
                        class="text-[10px] md:text-base font-medium text-white leading-relaxed md:leading-7 max-w-[260px] md:max-w-xl">
                        {{ __('hero.subtitle') }}
                    </p>
                </div>

                {{-- Location & Date Section (centered, stacked) --}}
                <div class="flex flex-col items-center text-center gap-3 md:gap-4">
                    {{-- Location --}}
                    <div class="flex flex-col items-center gap-0.5">
                        <span class="text-lg md:text-2xl font-bold text-white leading-tight">
                            {{ __('hero.location_city') }}
                        </span>
                        <span class="text-xs md:text-sm font-medium text-white/80 leading-snug">
                            {{ __('hero.location_country') }}
                        </span>
                    </div>

                    {{-- Divider Line --}}
                    <div class="w-12 h-px bg-[#E6813E]/30"></div>

                    {{-- Date --}}
                    <div class="flex flex-col items-center gap-0.5">
                        <span class="text-lg md:text-2xl font-bold text-white leading-tight">
                            {{ __('hero.date') }}
                        </span>
                        <span class="text-xs md:text-sm font-medium text-white/80 leading-snug">
                            {{ __('hero.date_month') }}
                        </span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Event Info Section - Desktop (lg and above) -->
    <section class="hidden lg:block relative z-10">
        <div class="w-full max-w-[1168px] h-[498px] bg-gray-900 rounded-[20px] mx-auto mt-20 mb-0 overflow-hidden  ">

            <div class="flex flex-row h-full ">

                {{-- Left Container - Content --}}
                <div
                    class="w-1/2 pt-20 pb-12 {{ app()->getLocale() === 'ar' ? 'pl-12 pr-20 text-right' : 'pl-20 pr-12 text-left' }} flex flex-col justify-center">

                    {{-- Small Label --}}
                    <span class="text-[#E6813E] text-base font-semibold mb-2">
                        {{ __('hero.event_label') }}
                    </span>

                    {{-- Main Title --}}
                    <h2 class="text-4xl font-bold text-white mb-4">
                        {{ __('hero.event_title') }}
                    </h2>

                    {{-- Description --}}
                    <p class="text-gray-300 text-base mb-2 leading-relaxed">
                        {{ __('hero.event_desc_1') }}
                    </p>

                    <p class="text-gray-300 text-base mb-6 leading-relaxed">
                        {{ __('hero.event_desc_2') }}
                    </p>

                    {{-- Pillars Section --}}
                    <div class="mb-4">
                        <div class="flex items-center gap-2 mb-4">
                            <div>
                                <img src="{{ asset('storage/uploads/mix/Radar-animation.gif') }}" class="h-[45px] w-[45px]"
                                    alt="Pillars Icon" />
                            </div>
                            <h3 class="text-xl font-bold text-white">
                                {{ __('hero.event_pillars') }}
                            </h3>
                        </div>

                        {{-- Pillars List --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex items-center gap-2">
                                <span class="text-[#E6813E] text-lg flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-sm">
                                    {{ __('hero.pillar_1') }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-[#E6813E] text-lg flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-sm">
                                    {{ __('hero.pillar_2') }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-[#E6813E] text-lg flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-sm">
                                    {{ __('hero.pillar_3') }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2 ">
                                <span class="text-[#E6813E] text-lg flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-sm">
                                    {{ __('hero.pillar_4') }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right Container - Image --}}
                <div class="w-1/2 flex items-center justify-center p-12">
                    <div class="w-full h-full rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/uploads/mix/hero-info.webp') }}" alt="Event Team" class="w-full h-full object-cover">
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Event Info Section - Mobile & Tablet (below lg) -->
    <section class="lg:hidden">
        <div
            class="w-[370px] max-w-full  bg-gray-900 mx-auto mt-12 md:mt-20 mb-12 md:mb-20 overflow-hidden rounded-[20px] pl-5 pr-5">

            <div class="flex flex-col">

                {{-- Top Container - Image --}}
                <div class="w-full h-64 md:h-80 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('storage/uploads/mix/hero-info.webp') }}" alt="Event Team" class="max-w-[250px] h-full object-cover">
                </div>

                {{-- Bottom Container - Content --}}
                <div class="w-full flex flex-col items-center justify-start p-6 md:p-8 text-center">

                    {{-- Small Label --}}
                    <span class="text-[#E6813E] text-sm md:text-base font-semibold mb-2">
                        {{ __('hero.event_label') }}
                    </span>

                    {{-- Main Title --}}
                    <h2 class="text-xl md:text-2xl font-bold text-white mb-3">
                        {{ __('hero.event_title') }}
                    </h2>

                    {{-- Description --}}
                    <p class="text-gray-300 text-xs md:text-sm mb-2 leading-relaxed line-clamp-3">
                        {{ __('hero.event_desc_1') }}
                    </p>

                    <p class="text-gray-300 text-xs md:text-sm mb-4 leading-relaxed line-clamp-3">
                        {{ __('hero.event_desc_2') }}
                    </p>

                    {{-- Pillars Section --}}
                    <div class="mb-4 w-full">
                        <div class="flex items-center gap-2 mb-3 justify-center">
                            <div>
                                <img src="{{ asset('storage/uploads/mix/Radar-animation.gif') }}" class="h-8 w-8 md:h-10 md:w-10"
                                    alt="Pillars Icon" />
                            </div>
                            <h3 class="text-sm md:text-base font-bold text-white">
                                {{ __('hero.event_pillars') }}
                            </h3>
                        </div>

                        {{-- Pillars List --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 max-w-sm mx-auto">
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-[#E6813E] text-base flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-xs md:text-sm">
                                    {{ __('hero.pillar_1') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-[#E6813E] text-base flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-xs md:text-sm">
                                    {{ __('hero.pillar_2') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-[#E6813E] text-base flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-xs md:text-sm">
                                    {{ __('hero.pillar_3') }}
                                </span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <span class="text-[#E6813E] text-base flex-shrink-0">✓</span>
                                <span class="text-gray-300 text-xs md:text-sm">
                                    {{ __('hero.pillar_4') }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- Event state Section - Desktop (lg and above) -->
    <section class="hidden lg:block bg-[#121D24] text-white mt-[-15%] pt-[250px]  relative">
        <div class="mx-auto max-w-6xl px-4 py-10 sm:py-12">
            <!-- Title -->
            <h3 class="text-center text-2xl font-bold tracking-wide">
                {{ __('hero.event_state_title') }}
            </h3>

            <!-- Stats row -->
            <div class="mt-10 grid grid-cols-2 gap-y-10 text-center sm:grid-cols-3 lg:grid-cols-6">
                <div>
                    <div class="text-2xl font-bold counter" data-target="200">0</div>
                    <div class="mt-2 text-[20px] text-white/70">{{ __('hero.stat_speakers') }}</div>
                </div>

                <div>
                    <div class="text-2xl font-bold counter" data-target="1700">0</div>
                    <div class="mt-2 text-[20px] text-white/70">{{ __('hero.stat_participants') }}</div>
                </div>

                <div>
                    <div class="text-2xl font-bold counter" data-target="8000">0</div>
                    <div class="mt-2 text-[20px] text-white/70">{{ __('hero.stat_visitors') }}</div>
                </div>

                <div>
                    <div class="text-2xl font-bold counter" data-target="45">0</div>
                    <div class="mt-2 text-[20px] text-white/70">{{ __('hero.stat_exhibitors') }}</div>
                </div>

                <div>
                    <div class="text-2xl font-bold counter" data-target="40">0</div>
                    <div class="mt-2 text-[20px] text-white/70">{{ __('hero.stat_countries') }}</div>
                </div>

                <div>
                    <div class="text-2xl font-bold counter-4m" data-target="4">0</div>
                    <div class="mt-2 text-[20px] text-white/70">{{ __('hero.stat_media_impact') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event state Section - Mobile & Tablet (below lg) -->
    <section class="lg:hidden bg-[#121D24] text-white mt-8 md:mt-12 relative">
        <div class="mx-auto max-w-6xl px-4 py-8 md:py-12">
            <!-- Title -->
            <h3 class="text-center text-xl md:text-2xl font-bold  tracking-wide mb-8">
                {{ __('hero.event_state_title') }}
            </h3>

            <!-- Stats Grid - 2 columns on mobile, 3 on tablet -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold counter" data-target="200">0</div>
                    <div class="mt-2 text-sm md:text-base text-white/70">{{ __('hero.stat_speakers') }}</div>
                </div>

                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold counter" data-target="1700">0</div>
                    <div class="mt-2 text-sm md:text-base text-white/70">{{ __('hero.stat_participants') }}</div>
                </div>

                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold counter" data-target="8000">0</div>
                    <div class="mt-2 text-sm md:text-base text-white/70">{{ __('hero.stat_visitors') }}</div>
                </div>

                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold counter" data-target="45">0</div>
                    <div class="mt-2 text-sm md:text-base text-white/70">{{ __('hero.stat_exhibitors') }}</div>
                </div>

                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold counter" data-target="40">0</div>
                    <div class="mt-2 text-sm md:text-base text-white/70">{{ __('hero.stat_countries') }}</div>
                </div>

                <div class="text-center">
                    <div class="text-2xl md:text-3xl font-bold counter-4m" data-target="4">0</div>
                    <div class="mt-2 text-xs md:text-sm text-white/70">{{ __('hero.stat_media_impact') }}</div>
                </div>
            </div>
        </div>
    </section>


    <!-- Speaker Apply Now Banner -->
    <section>
        <div class="w-full h-12 md:h-14 bg-[#3C94C5] flex items-center justify-center">
            <div class="flex items-center h-full max-w-6xl mx-auto px-4 gap-3 md:gap-4 w-full justify-center">
                {{-- Arrow Direction Based on Language --}}
                <div class="flex flex-shrink-0 {{ app()->getLocale() === 'ar' ? 'order-last' : 'order-first' }}">
                    <img src="{{ asset('storage/uploads/mix/' . (app()->getLocale() === 'ar' ? 'Left-arrow.svg' : 'right-arrow.svg')) }}"
                        alt="Arrow" class="w-6 h-4 md:w-7">
                </div>
                {{-- Banner Text --}}
                <div class="flex items-center justify-center">
                    <span class="text-white text-sm md:text-xl font-bold leading-6 md:leading-8">
                        {{ __('hero.speaker_banner') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Event About Section -->
    <section class=" py-12 md:py-16">
        <div class="mx-auto max-w-6xl px-4">
            <!-- Heading -->
            <div class="text-center pb-6">
                <p class="text-xl font-bold text-orange-500">
                    {{ __('hero.about_label') }}
                </p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-slate-900">
                    {{ __('hero.about_title') }}
                </h2>
                <p class="mt-3 text-[15px] sm:text-base text-slate-500">
                    {{ __('hero.about_subtitle') }}
                </p>
            </div>


            <!-- Cards -->
            <div class="grid grid-cols-1 gap-4 sm:gap-6 p-2 sm:p-3 sm:grid-cols-2 lg:grid-cols-4 justify-items-center">

                <!-- Card 1 -->
                <div class="w-full max-w-sm rounded-[28px] border border-[#CBD5E1] bg-white p-4">
                    <!-- Top inset colored header (rounded top only) -->
                    <div class="flex h-[110px] items-center justify-center overflow-hidden bg-[#7D876B]
                        rounded-t-[20px] rounded-b-none">
                        <img src="{{ asset('storage/uploads/mix/city-energy.gif') }}" alt="Innovation" class="h-[93px] w-[166px]" />
                    </div>

                    <!-- Body -->
                    <div class="px-4 py-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        <h3 class="text-[18px] sm:text-[20px] font-bold text-slate-900">
                            {{ __('hero.card_1_title') }}
                        </h3>
                        <p class="mt-3 text-[14px] sm:text-[15px] leading-6 text-slate-500">
                            {{ __('hero.card_1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="w-full max-w-sm rounded-[28px] border border-[#CBD5E1] bg-white p-4">
                    <div class="flex h-[110px] items-center justify-center overflow-hidden bg-[#E7B954]
                        rounded-t-[20px] rounded-b-none">
                        <img src="{{ asset('storage/uploads/mix/city-planning.gif') }}" alt="Adaptation" class="h-[95px] w-[169px]" />
                    </div>

                    <div class="px-4 py-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        <h3 class="text-[18px] sm:text-[20px] font-bold text-slate-900">
                            {{ __('hero.card_2_title') }}
                        </h3>
                        <p class="mt-3 text-[14px] sm:text-[15px] leading-6 text-slate-500">
                            {{ __('hero.card_2_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="w-full max-w-sm rounded-[28px] border border-[#CBD5E1] bg-white p-4">
                    <div class="flex h-[110px] items-center justify-center overflow-hidden bg-[#3C94C5]
                        rounded-t-[20px] rounded-b-none">
                        <img src="{{ asset('storage/uploads/mix/Recycling.gif') }}" alt="Circular Economy" class="h-[88px] w-[156px]" />
                    </div>

                    <div class="px-4 py-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        <h3 class="text-[18px] sm:text-[20px] font-bold text-slate-900">
                            {{ __('hero.card_3_title') }}
                        </h3>
                        <p class="mt-3 text-[14px] sm:text-[15px] leading-6 text-slate-500">
                            {{ __('hero.card_3_desc') }}
                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="w-full max-w-sm rounded-[28px] border border-[#CBD5E1] bg-white p-4">
                    <div class="flex h-[110px] items-center justify-center overflow-hidden bg-[#E68238]
                        rounded-t-[20px] rounded-b-none">
                        <img src="{{ asset('storage/uploads/mix/Investment-icon.gif') }}" alt="Climate Finance" class="h-[98px] w-[98px]" />
                    </div>

                    <div class="px-4 py-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                        <h3 class="text-[18px] sm:text-[20px] font-bold text-slate-900">
                            {{ __('hero.card_4_title') }}
                        </h3>
                        <p class="mt-3 text-[14px] sm:text-[15px] leading-6 text-slate-500">
                            {{ __('hero.card_4_desc') }}
                        </p>
                    </div>
                </div>

            </div>


        </div>
    </section>

    <!-- Event Attendee Section - Desktop (lg and above) -->

    <section class="hidden lg:block pb-20"> ">
        <div class="mx-auto max-w-6xl px-2">

            <!-- Heading -->
            <div class="text-center">
                <p class="text-xl font-bold text-orange-500">
                    {{ __('hero.attendee_title_label') }}
                </p>
                <h2 class="mt-2 text-3xl sm:text-3xl font-bold text-[#121D24]">
                    {{ __('hero.attendee_title') }}
                </h2>
                <p class="mt-3 mx-auto max-w-2xl text-sm sm:text-base text-slate-500">
                    {{ __('hero.attendee_subtitle') }}
                </p>
            </div>

            <!-- Layout -->
            <div class="mt-10 grid grid-cols-1 gap-6 lg:grid-cols-12 lg:items-start">

                <!-- RIGHT COLUMN -->
                <div class="grid gap-6 lg:col-span-4 justify-items-center lg:justify-items-start">
                    <!-- Flat card -->
                    <div
                        class="flex items-center gap-4 bg-white px-6 py-4
                    border border-slate-50 w-full max-w-[352px] h-[108px]
                    shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">
                        <img src="{{ asset('storage/uploads/mix/book.svg') }}" class="w-[49px] h-[45px]" alt="">
                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-xl font-semibold text-[#121D24]">
                                {{ __('hero.attendee_research_institutions') }}
                            </p>
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_universities') }}</p>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-4 bg-white px-6 py-4
                    border border-slate-50 w-full max-w-[352px] h-[108px]
                    shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">

                        <img src="{{ asset('storage/uploads/mix/world.svg') }}" class="w-[49px] h-[49px]" alt="">

                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-[19px] font-semibold text-[#121D24]">
                                {{ __('hero.attendee_international_orgs') }}
                            </p>
                            <p class="text-[19px] font-semibold text-[#121D24]">{{ __('hero.attendee_ngos') }}</p>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-4 bg-white px-6 py-4
                    border border-slate-50 w-full max-w-[352px] h-[108px]
                    shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">

                        <img src="{{ asset('storage/uploads/mix/chart.svg') }}" class="w-[49px] h-[49px]" alt="">

                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_investors_banks') }}
                            </p>
                            <p class="text-xl font-semibold text-[#121D24]">
                                {{ __('hero.attendee_financial_institutions') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CENTER COLUMN -->
                <div class="lg:col-span-4">
                    <!-- Image -->
                    <div class="mx-auto max-w-[320px] overflow-hidden rounded-2xl border border-slate-200">
                        <img src="{{ asset('storage/uploads/mix/attendee-section.webp') }}" alt="Attendees"
                            class="h-[402px] w-[374px] object-cover" />
                    </div>

                    <!-- Bottom centered flat card -->
                    <div class="mx-auto mt-6 max-w-[360px]">
                        <div
                            class="flex items-center gap-4 bg-white px-6 py-4
                      border border-slate-50 w-full max-w-[352px] h-[108px]
                      shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">

                            <img src="{{ asset('storage/uploads/mix/newspaper.svg') }}" class="w-[49px] h-[49px]" alt="">

                            <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_media_outlets') }}
                                </p>
                                <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_news_agencies') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- LEFT COLUMN -->
                <div class="grid gap-6 lg:col-span-4 justify-items-center lg:justify-items-start">
                    <div
                        class="flex items-center gap-4 bg-white px-6 py-4
                    border border-slate-50 w-full max-w-[352px] h-[108px]
                    shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">

                        <img src="{{ asset('storage/uploads/mix/building.svg') }}" class="w-[49px] h-[49px]" alt="">

                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_gov_agencies') }}</p>
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_regulatory_bodies') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-4 bg-white px-6 py-4
                    border border-slate-50 w-full max-w-[352px] h-[108px]
                    shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">

                        <img src="{{ asset('storage/uploads/mix/industry.svg') }}" class="w-[49px] h-[49px]" alt="">

                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-xl font-semibold text-[#121D24]">
                                {{ __('hero.attendee_national_authorities') }}
                            </p>
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_energy_climate') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-center gap-4 bg-white px-6 py-4
                    border border-slate-50 w-full max-w-[352px] h-[108px]
                    shadow-[0_6px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 rounded-lg cursor-pointer">

                        <img src="{{ asset('storage/uploads/mix/rocket.svg') }}" class="w-[49px] h-[49px]" alt="">

                        <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_tech_providers') }}
                            </p>
                            <p class="text-xl font-semibold text-[#121D24]">{{ __('hero.attendee_startups') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Event Attendee Section - Mobile & Tablet (below lg) -->
    <section class="lg:hidden bg-white ">
        <div class="mx-auto max-w-6xl px-4 pb-3">

            <!-- Heading -->
            <div class="text-center mb-8">
                <p class="text-lg sm:text-xl font-bold text-orange-500">
                    {{ __('hero.attendee_title_label') }}
                </p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-[#121D24]">
                    {{ __('hero.attendee_title') }}
                </h2>
                <p class="mt-3 mx-auto max-w-2xl text-xs sm:text-sm text-slate-500">
                    {{ __('hero.attendee_subtitle') }}
                </p>
            </div>

            <!-- Cards Grid - Responsive Layout -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                <!-- Card 1 -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/book.svg') }}" class="w-[40px] sm:w-[49px] h-[40px] sm:h-[45px] flex-shrink-0"
                        alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_research_institutions') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_universities') }}
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/world.svg') }}" class="w-[40px] sm:w-[49px] h-[40px] sm:h-[49px] flex-shrink-0"
                        alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_international_orgs') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">{{ __('hero.attendee_ngos') }}</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/chart.svg') }}" class="w-[40px] sm:w-[49px] h-[40px] sm:h-[49px] flex-shrink-0"
                        alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_investors_banks') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_financial_institutions') }}
                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/building.svg') }}" class="w-[40px] sm:w-[49px] h-[40px] sm:h-[49px] flex-shrink-0"
                        alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_gov_agencies') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_regulatory_bodies') }}
                        </p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/industry.svg') }}" class="w-[40px] sm:w-[49px] h-[40px] sm:h-[49px] flex-shrink-0"
                        alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_national_authorities') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_energy_climate') }}
                        </p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/rocket.svg') }}" class="w-[40px] sm:w-[49px] h-[40px] sm:h-[49px] flex-shrink-0"
                        alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_tech_providers') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">{{ __('hero.attendee_startups') }}
                        </p>
                    </div>
                </div>

                <!-- Card 7 - Media (Centered) -->
                <div
                    class="flex flex-col items-center justify-center gap-3 bg-white px-4 sm:px-6 py-4
                border border-slate-50 min-h-[100px]
                shadow-[0_6px_24px_rgba(0,0,0,0.06)] rounded-lg sm:col-span-2 transition-all duration-300 hover:shadow-[0_12px_32px_rgba(0,0,0,0.12)] hover:scale-105 cursor-pointer">
                    <img src="{{ asset('storage/uploads/mix/newspaper.svg') }}"
                        class="w-[40px] sm:w-[49px] h-[40px] sm:h-[49px] flex-shrink-0" alt="">
                    <div class="text-center">
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_media_outlets') }}
                        </p>
                        <p class="text-sm sm:text-base font-semibold text-[#121D24]">
                            {{ __('hero.attendee_news_agencies') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event program Section - Desktop (lg and above) -->
    <section class="hidden lg:block relative bg-slate-950 py-14 sm:py-20 text-white overflow-hidden"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Soft background glows -->
        <div
            class="pointer-events-none absolute -start-40 -top-40 h-[420px] w-[420px] rounded-full bg-white/10 blur-[120px]">
        </div>
        <div
            class="pointer-events-none absolute -end-40 -bottom-40 h-[420px] w-[420px] rounded-full bg-white/10 blur-[120px]">
        </div>

        <div class="relative mx-auto max-w-6xl px-4">

            <!-- Heading -->
            <div class="text-center">
                <p class="text-xl font-bold text-orange-500">
                    {{ __('hero.program_label') }}
                </p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-bold">
                    {{ __('hero.program_title') }}
                </h2>
                <p class="mt-3 text-sm sm:text-base text-white/70">
                    {{ __('hero.program_subtitle') }}
                </p>
            </div>

            <!-- Cards -->
            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                <!-- CARD 1 -->
                <div class="relative overflow-hidden rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <!-- FULL TOP BACKGROUND IMAGE -->
                    <div class="relative h-36">
                        <img src="{{ asset('storage/uploads/mix/back-icon.webp') }}" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>

                        <!-- ICON -->
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/police.svg') }}" alt="" class="h-10 w-10" />
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold leading-8">
                            {{ __('hero.program_card_1_title') }}
                        </h3>
                        <p class="mt-4 text-sm leading-7 text-white/70">
                            {{ __('hero.program_card_1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="relative overflow-hidden rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <div class="relative h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/graduation-cap.svg') }}" alt="" class="h-10 w-10" />
                        </div>
                    </div>

                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold leading-8">
                            {{ __('hero.program_card_2_title') }}
                        </h3>
                        <p class="mt-4 text-sm leading-7 text-white/70">
                            {{ __('hero.program_card_2_desc') }}
                        </p>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="relative overflow-hidden rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <div class="relative h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/bubble.svg') }}" alt="" class="h-10 w-10" />
                        </div>
                    </div>

                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold leading-8">
                            {{ __('hero.program_card_3_title') }}
                        </h3>
                        <p class="mt-4 text-sm leading-7 text-white/70">
                            {{ __('hero.program_card_3_desc') }}
                        </p>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="relative overflow-hidden rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <div class="relative h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/discussion.svg') }}" alt="" class="h-10 w-10" />
                        </div>
                    </div>

                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold leading-8">
                            {{ __('hero.program_card_4_title') }}
                        </h3>
                        <p class="mt-4 text-sm leading-7 text-white/70">
                            {{ __('hero.program_card_4_desc') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Event program Section - Mobile & Tablet (below lg) -->
    <section class="lg:hidden relative bg-slate-950 py-8 md:py-12 text-white overflow-hidden"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

        <!-- Soft background glows -->
        <div
            class="pointer-events-none absolute -start-20 -top-20 h-[300px] w-[300px] md:h-[420px] md:w-[420px] rounded-full bg-white/10 blur-[100px] md:blur-[120px]">
        </div>
        <div
            class="pointer-events-none absolute -end-20 -bottom-20 h-[300px] w-[300px] md:h-[420px] md:w-[420px] rounded-full bg-white/10 blur-[100px] md:blur-[120px]">
        </div>

        <div class="relative mx-auto max-w-6xl px-4">

            <!-- Heading -->
            <div class="text-center mb-8">
                <p class="text-xs md:text-sm font-bold text-orange-500">
                    {{ __('hero.program_label') }}
                </p>
                <h2 class="mt-2 text-xl md:text-2xl font-bold">
                    {{ __('hero.program_title') }}
                </h2>
                <p class="mt-2 md:mt-3 text-xs md:text-sm text-white/70">
                    {{ __('hero.program_subtitle') }}
                </p>
            </div>

            <!-- Cards Grid - 1 column on mobile, 2 on tablet -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

                <!-- CARD 1 -->
                <div class="relative overflow-hidden rounded-lg md:rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <!-- FULL TOP BACKGROUND IMAGE -->
                    <div class="relative h-28 md:h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>

                        <!-- ICON -->
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/police.svg') }}" alt="" class="h-8 md:h-10 w-8 md:w-10" />
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-4 md:p-6 text-center">
                        <h3 class="text-base md:text-lg font-bold leading-6 md:leading-8">
                            {{ __('hero.program_card_1_title') }}
                        </h3>
                        <p class="mt-3 md:mt-4 text-xs md:text-sm leading-5 md:leading-7 text-white/70">
                            {{ __('hero.program_card_1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="relative overflow-hidden rounded-lg md:rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <div class="relative h-28 md:h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/graduation-cap.svg') }}" alt="" class="h-8 md:h-10 w-8 md:w-10" />
                        </div>
                    </div>

                    <div class="p-4 md:p-6 text-center">
                        <h3 class="text-base md:text-lg font-bold leading-6 md:leading-8">
                            {{ __('hero.program_card_2_title') }}
                        </h3>
                        <p class="mt-3 md:mt-4 text-xs md:text-sm leading-5 md:leading-7 text-white/70">
                            {{ __('hero.program_card_2_desc') }}
                        </p>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="relative overflow-hidden rounded-lg md:rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <div class="relative h-28 md:h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/bubble.svg') }}" alt="" class="h-8 md:h-10 w-8 md:w-10" />
                        </div>
                    </div>

                    <div class="p-4 md:p-6 text-center">
                        <h3 class="text-base md:text-lg font-bold leading-6 md:leading-8">
                            {{ __('hero.program_card_3_title') }}
                        </h3>
                        <p class="mt-3 md:mt-4 text-xs md:text-sm leading-5 md:leading-7 text-white/70">
                            {{ __('hero.program_card_3_desc') }}
                        </p>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="relative overflow-hidden rounded-lg md:rounded-2xl bg-white/[0.06]
                  ring-1 ring-white/10
                  shadow-[0_22px_55px_rgba(0,0,0,0.45)]">

                    <div class="relative h-28 md:h-36">
                        <img src="{{ asset('mix/back-icon.webp" alt=""
                            class="absolute inset-0 h-full w-full object-cover" />
                        <div class="absolute inset-0"></div>
                        <div class="relative z-10 flex h-full items-center justify-center">
                            <img src="{{ asset('storage/uploads/mix/discussion.svg') }}" alt="" class="h-8 md:h-10 w-8 md:w-10" />
                        </div>
                    </div>

                    <div class="p-4 md:p-6 text-center">
                        <h3 class="text-base md:text-lg font-bold leading-6 md:leading-8">
                            {{ __('hero.program_card_4_title') }}
                        </h3>
                        <p class="mt-3 md:mt-4 text-xs md:text-sm leading-5 md:leading-7 text-white/70">
                            {{ __('hero.program_card_4_desc') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Event sponsors Section - Desktop (lg and above) -->
    <section class="hidden lg:block bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-6xl px-4">
            <!-- Heading -->
            <div class="text-center mb-4">
                <p class="text-xl font-bold text-orange-500 animate-fade-in">
                    {{ __('hero.sponsors_label') }}
                </p>
                <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-slate-900 animate-fade-in-up">
                    {{ __('hero.sponsors_title') }}
                </h2>
                <p class="mt-3 mx-auto max-w-2xl text-sm sm:text-base text-slate-500 animate-fade-in-up">
                    {{ __('hero.sponsors_subtitle') }}
                </p>
            </div>

            <!-- Carousel -->
            <div data-carousel="sponsors-desktop" class="mt-10">
                <!-- Track viewport -->
                <div class="overflow-hidden rounded-lg">
                    <!-- Track -->
                    <div class="carousel-track flex gap-5 transition-transform duration-500 ease-out"
                        style="will-change: transform;">
                        <!-- Items rendered by JavaScript -->
                    </div>
                </div>

                <!-- Dots (dashes) -->
                <div class="carousel-dots mt-8 flex items-center justify-center gap-3">
                    <!-- Dots rendered by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.7s ease-in-out;
        }

        /* Carousel Item Effects */
        .carousel-track>div {
            transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
        }

        .carousel-track>div:hover {
            transform: scale(1.05);
            filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.15));
        }

        .carousel-track>div img {
            transition: filter 0.3s ease-in-out;
        }

        .carousel-track>div:hover img {
            filter: brightness(1.1);
        }

        /* Dots Effects */
        .carousel-dots button {
            transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
            position: relative;
        }

        .carousel-dots button:not(.active) {
            background-color: #cbd5e1;
            opacity: 0.6;
        }

        .carousel-dots button:not(.active):hover {
            opacity: 0.8;
            transform: scale(1.2);
        }

        .carousel-dots button.active {
            background: linear-gradient(135deg, #E6813E 0%, #d96e2f 100%);
            box-shadow: 0 4px 12px rgba(230, 129, 62, 0.4);
            transform: scale(1.1);
        }

        .carousel-dots button.active::after {
            content: '';
            position: absolute;
            top: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 12px;
            height: 2px;
            background: #E6813E;
            border-radius: 2px;
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>

    <!-- Event sponsors Section - Mobile & Tablet (below lg) -->
    <section class="lg:hidden bg-white py-8 sm:py-12">
        <div class="mx-auto max-w-6xl px-4">
            <!-- Heading -->
            <div class="text-center mb-4">
                <p class="text-sm font-bold text-orange-500 animate-fade-in">
                    {{ __('hero.sponsors_label') }}
                </p>
                <h2 class="mt-2 text-xl sm:text-2xl font-bold text-slate-900 animate-fade-in-up">
                    {{ __('hero.sponsors_title') }}
                </h2>
                <p class="mt-3 mx-auto max-w-2xl text-xs sm:text-sm text-slate-500 animate-fade-in-up">
                    {{ __('hero.sponsors_subtitle') }}
                </p>
            </div>

            <!-- Carousel -->
            <div data-carousel="sponsors-mobile" class="mt-8">
                <!-- Track viewport -->
                <div class="overflow-hidden rounded-lg">
                    <!-- Track -->
                    <div class="carousel-track flex gap-3 sm:gap-4 transition-transform duration-500 ease-out"
                        style="will-change: transform;">
                        <!-- Items rendered by JavaScript -->
                    </div>
                </div>

                <!-- Dots (dashes) -->
                <div class="carousel-dots mt-6 flex items-center justify-center gap-2">
                    <!-- Dots rendered by JavaScript -->
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')
</body>

</html>
