<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __(key: 'speakers.hero_title') }}</title>
    <meta name="description" content="{{ __('speakers.meta_description') }}">
    <meta name="keywords" content="speakers, speakers enquiry, sustainability, recognition program, keynote sessions">
    <meta name="author" content="Saudi Climate Week">
    <meta name="robots" content="index, follow">

    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#E68238">
    <meta name="apple-mobile-web-app-title" content="{{ __('speakers.page_title') }}">

    <link rel="icon" type="image/webp" href="/images/nav-img/scw-logo.webp">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            scroll-behavior: smooth;
        }

        #speaker-enquiry-form {
            scroll-margin-top: 120px;
        }
    </style>
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


    <!-- Hero section -->

    {{-- MOBILE: Speakers Hero / Banner --}}
    <section class="lg:hidden relative w-full overflow-hidden h-[400px]">
        {{-- Background image --}}
        <div class="absolute inset-0 bg-center bg-cover"
            style="background-image: url('{{ asset('images/mix/speakers-hero.webp') }}');" aria-hidden="true"></div>

        {{-- Overlay for better text readability --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/50 to-black/60"></div>

        <div class="relative h-full flex items-center justify-center px-4">
            <div class="text-center max-w-md">
                <p class="text-sm font-semibold tracking-wide text-orange-400">
                    {{ __('speakers.hero_label') }}
                </p>

                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-white">
                    {{ __('speakers.hero_title') }}
                </h1>

                <p class="mt-4 text-sm leading-6 text-white/80">
                    {{ __('speakers.hero_description') }}
                </p>

                <div class="mt-6">
                    <a href="#speaker-enquiry-form"
                        class="inline-flex items-center justify-center rounded-lg bg-[#E68238] px-6 py-3 text-sm font-bold uppercase tracking-wide text-white shadow-lg transition hover:bg-orange-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400 focus-visible:ring-offset-2">
                        {{ __('speakers.hero_cta') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- DESKTOP & TABLET: Speakers Hero / Banner --}}
    <section class="hidden lg:block relative w-full overflow-hidden h-[320px] md:h-[400px] lg:h-[500px]">
        {{-- Background image --}}
        <div class="absolute inset-0 bg-center bg-cover"
            style="background-image: url('{{ asset('images/mix/speakers-hero.webp') }}');" aria-hidden="true"></div>

        <div class="relative mx-auto max-w-7xl px-6 pt-20 pb-2">
            <div class="flex min-h-[260px] items-center justify-center py-10 md:min-h-80 md:py-14">
                <div class="max-w-xl text-center">
                    <p class="text-[18px] font-semibold tracking-wide text-orange-400">
                        {{ __('speakers.hero_label') }}
                    </p>

                    <h1 class="mt-2 text-[80px] font-extrabold tracking-tight text-white">
                        {{ __('speakers.hero_title') }}
                    </h1>

                    <p class="mt-4 max-w-lg mx-auto text-[16px] leading-6 text-white/70 md:text-base md:leading-7">
                        {{ __('speakers.hero_description') }}
                    </p>

                    <div class="mt-6">
                        <a href="#speaker-enquiry-form"
                            class="inline-flex items-center justify-center rounded-[9px] bg-[#E68238] px-6 py-3 text-[14px] font-bold uppercase tracking-wide text-white shadow-sm transition hover:bg-orange-600 focus:outline-none focus-visible:ring-2
                             focus-visible:ring-orange-400 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                            {{ __('speakers.hero_cta') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- MOBILE: Section Two --}}
    <section class="lg:hidden bg-white py-12 px-4">
        <div class="max-w-md mx-auto text-center">
            <!-- Title -->
            <p class="text-2xl font-bold text-slate-900 leading-tight">
                {{ __('speakers.section_intro') }}
            </p>

            <!-- Badges -->
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <span
                    class="inline-flex items-center rounded-full bg-[#E68238]/35 px-4 py-2 text-lg font-semibold text-slate-900">
                    {{ __('speakers.policy') }}
                </span>
                <span
                    class="inline-flex items-center rounded-full bg-[#E68238]/35 px-4 py-2 text-lg font-semibold text-slate-900">
                    {{ __('speakers.innovation') }}
                </span>
                <span
                    class="inline-flex items-center rounded-full bg-[#E68238]/35 px-4 py-2 text-lg font-semibold text-slate-900">
                    {{ __('speakers.investment') }}
                </span>
                <span
                    class="inline-flex items-center rounded-full bg-[#E68238]/35 px-4 py-2 text-lg font-semibold text-slate-900">
                    {{ __('speakers.implementation') }}
                </span>
            </div>

            <!-- Divider -->
            <div class="my-8 border-t border-gray-200"></div>

            <!-- Take Part Section -->
            <div class="inline-block">
                <h3 class="text-2xl font-extrabold text-sky-600">
                    {{ __('speakers.take_part_title') }}
                </h3>
                <!-- wavy underline -->
                <svg class="mt-1 block h-2 w-full" viewBox="0 0 160 8" fill="none" preserveAspectRatio="none"
                    aria-hidden="true">
                    <path
                        d="M0 4 C 6 0, 12 8, 18 4 S 30 8, 36 4 S 48 8, 54 4 S 66 8, 72 4 S 84 8, 90 4 S 102 8, 108 4 S 120 8, 126 4 S 138 8, 144 4 S 156 8, 160 4"
                        stroke="currentColor" class="text-sky-600" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>

            <!-- List -->
            <ul class="mt-6 space-y-4 text-center">
                <li class="flex items-center justify-center gap-4">
                    <img src="/images/mix/keynote.svg" class="w-8 h-8" alt="">
                    <p class="text-lg font-semibold text-slate-900">{{ __('speakers.keynote_sessions') }}</p>
                </li>
                <li class="flex items-center justify-center gap-4">
                    <img src="/images/mix/discussion-group.svg" class="w-8 h-8" alt="">
                    <p class="text-lg font-semibold text-slate-900">{{ __('speakers.panels') }}</p>
                </li>
                <li class="flex items-center justify-center gap-4">
                    <img src="/images/mix/workshop.svg" class="w-8 h-8" alt="">
                    <p class="text-lg font-semibold text-slate-900">{{ __('speakers.workshops') }}</p>
                </li>
                <li class="flex items-center justify-center gap-4">
                    <img src="/images/mix/sessions.svg" class="w-8 h-8" alt="">
                    <p class="text-lg font-semibold text-slate-900">{{ __('speakers.technical_sessions') }}</p>
                </li>
            </ul>
        </div>
    </section>

    {{-- DESKTOP & TABLET: Section Two --}}
    <section class="hidden lg:block bg-white">
        <div class="mx-auto max-w-6xl px-6 py-12 pt-20">
            <div class="grid gap-7 md:grid-cols-2 md:gap-35">
                <!-- Left -->
                <div class="max-w-[480px]">
                    <p class="text-[32px] font-bold text-slate-900 leading-tight">
                        {{ __('speakers.section_intro') }}
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <span
                            class="inline-flex items-center rounded-full bg-[#E68238]/35 px-5 py-2 text-[27px] font-semibold text-slate-900">
                            {{ __('speakers.policy') }}
                        </span>
                        <span
                            class="inline-flex items-center rounded-full bg-[#E68238]/35 px-5 py-2 text-[27px] font-semibold text-slate-900">
                            {{ __('speakers.innovation') }}
                        </span>
                        <span
                            class="inline-flex items-center rounded-full bg-[#E68238]/35 px-5 py-2 text-[27px] font-semibold text-slate-900">
                            {{ __('speakers.investment') }}
                        </span>
                        <span
                            class="inline-flex items-center rounded-full bg-[#E68238]/35 px-5 py-2 text-[27px] font-semibold text-slate-900">
                            {{ __('speakers.implementation') }}
                        </span>
                    </div>
                </div>

                <!-- Right -->
                <div>
                    <div class="inline-block">
                        <h3 class="text-lg font-extrabold text-sky-600 md:text-[32px]">
                            {{ __('speakers.take_part_title') }}
                        </h3>
                        <!-- wavy underline -->
                        <svg class="mt-1 block h-2 w-full" viewBox="0 0 160 8" fill="none" preserveAspectRatio="none"
                            aria-hidden="true">
                            <path
                                d="M0 4 C 6 0, 12 8, 18 4 S 30 8, 36 4 S 48 8, 54 4 S 66 8, 72 4 S 84 8, 90 4 S 102 8, 108 4 S 120 8, 126 4 S 138 8, 144 4 S 156 8, 160 4"
                                stroke="currentColor" class="text-sky-600" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>

                    <ul class="mt-6 space-y-5">
                        <li class="flex items-start gap-4">
                            <img src="/images/mix/keynote.svg" class="w-10 h-10" alt="">
                            <p class="text-[27px] font-semibold text-slate-900">{{ __('speakers.keynote_sessions') }}
                            </p>
                        </li>
                        <li class="flex items-start gap-4">
                            <img src="/images/mix/discussion-group.svg" class="w-10 h-10" alt="">
                            <p class="text-[27px] font-semibold text-slate-900">{{ __('speakers.panels') }}</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <img src="/images/mix/workshop.svg" class="w-10 h-10" alt="">
                            <p class="text-[27px] font-semibold text-slate-900">{{ __('speakers.workshops') }}</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <img src="/images/mix/sessions.svg" class="w-10 h-10" alt="">
                            <p class="text-[27px] font-semibold leading-9 text-slate-900">
                                {{ __('speakers.technical_sessions') }}
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Form Sections Anchor Point --}}
    <div id="speaker-enquiry-form"></div>

    {{-- MOBILE: Submit Your Nomination (MATCHES FOOTER COLOR) --}}
    <section class="lg:hidden bg-[#121D24] text-white py-12 px-4">
        <div class="max-w-md mx-auto">
            {{-- Form --}}
            <div class="text-center">
                <p class="text-[11px] font-semibold tracking-wide text-orange-400">
                    {{ __('speakers.form_label') }}
                </p>

                <h1 class="mt-2 text-2xl font-extrabold tracking-tight">
                    {{ __('speakers.form_title') }}
                </h1>

                <p class="mt-3 text-sm leading-6 text-white/60">
                    {{ __('speakers.form_description') }}
                </p>
            </div>

            <form action="{{ route('create.speakersubmission') }}" method="POST" class="mt-7 space-y-4">
                @csrf

                {{-- Laravel Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50">
                        <h3 class="font-bold text-red-400 text-sm mb-2">
                            {{ __('speakers.fix_errors') }}
                        </h3>
                        <ul class="space-y-1 text-red-300 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/50">
                        <h3 class="font-bold text-green-400 text-sm">{{ session('success') }}</h3>
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50">
                        <h3 class="font-bold text-red-400 text-sm">{{ session('error') }}</h3>
                    </div>
                @endif

                {{-- Validation Errors (for JS) --}}
                <div id="mobileErrorMsg" class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50 hidden">
                    <h3 class="font-bold text-red-400 text-sm mb-2">
                        {{ __('speakers.fix_errors') }}
                    </h3>
                    <ul id="mobileErrorList" class="space-y-1 text-red-300 text-sm"></ul>
                </div>

                {{-- Success Message (for JS) --}}
                <div id="mobileSuccessMsg"
                    class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/50 hidden">
                    <h3 class="font-bold text-green-400 text-sm">{{ __('speakers.thank_you') }}
                    </h3>
                </div>

                {{-- Contact Person --}}
                <div>
                    <label
                        class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.contact_person_label') }}</label>
                    <input type="text" name="contact_person" required
                        placeholder="{{ __('speakers.contact_person_placeholder') }}"
                        class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none ring-0 transition focus:border-orange-400/50 focus:bg-white/7" />
                </div>

                {{-- Job Title --}}
                <div>
                    <label
                        class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.job_title_label') }}</label>
                    <input type="text" name="job_title" required
                        placeholder="{{ __('speakers.job_title_placeholder') }}"
                        class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                </div>

                {{-- Organization Name --}}
                <div>
                    <label
                        class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.organization_label') }}</label>
                    <input type="text" name="organization_name" required
                        placeholder="{{ __('speakers.organization_placeholder') }}"
                        class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                </div>

                {{-- Email --}}
                <div>
                    <label
                        class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.email_label') }}</label>
                    <input type="email" name="email_address" required
                        placeholder="{{ __('speakers.email_placeholder') }}"
                        class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                </div>

                {{-- Phone --}}
                <div>
                    <label
                        class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.phone_label') }}</label>
                    <input type="text" name="phone_number" required placeholder="{{ __('speakers.phone_placeholder') }}"
                        class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                </div>

                {{-- Country --}}
                <div>
                    <label class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.country') }}</label>
                    <div class="relative">
                        <select name="country" required
                            class="h-11 w-full appearance-none rounded-md border border-white/10 bg-white/5 px-4 pr-10 text-sm text-white outline-none transition focus:border-orange-400/50 focus:bg-white/7">
                            <option value="" selected disabled class="bg-slate-900">{{ __('speakers.select_country') }}
                            </option>
                            <option class="bg-slate-900" value="AF">Afghanistan</option>
                            <option class="bg-slate-900" value="AL">Albania</option>
                            <option class="bg-slate-900" value="DZ">Algeria</option>
                            <option class="bg-slate-900" value="SA">Saudi Arabia</option>
                            <option class="bg-slate-900" value="AE">United Arab Emirates</option>
                            <option class="bg-slate-900" value="GB">United Kingdom</option>
                            <option class="bg-slate-900" value="US">United States</option>
                            {{-- Add all other countries as needed --}}
                        </select>

                        {{-- chevron --}}
                        <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-white/50"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.24a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>

                {{-- Speaker Profile / Biography --}}
                <div>
                    <label
                        class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.speaker_bio_label') }}</label>
                    <textarea name="speaker_biography" required rows="4"
                        placeholder="{{ __('speakers.speaker_bio_placeholder') }}"
                        class="w-full rounded-md border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7"></textarea>
                </div>

                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit"
                        class="group inline-flex h-11 w-full items-center justify-center rounded-md bg-orange-500 px-6 text-xs font-extrabold uppercase tracking-widest text-white shadow-sm transition hover:bg-orange-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-400/70 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                        {{ __('speakers.submit_button') }} <span
                            class="ml-2 text-sm transition group-hover:translate-x-0.5">→</span>
                    </button>
                </div>
            </form>

            {{-- Image --}}
            <div class="mt-8">
                <div class="overflow-hidden rounded-2xl">
                    <img src="{{ asset('images/mix/hand-presentation.webp') }}" alt=""
                        class="w-full h-auto object-cover" />
                </div>
            </div>
        </div>
    </section>

    {{-- DESKTOP: Submit Your Nomination (MATCHES FOOTER COLOR) (lg and above) --}}

    <section class="hidden lg:block bg-[#121D24] text-white">
        <div class="mx-auto max-w-6xl px-6 py-12 lg:py-16">
            <div class="grid items-start gap-10 lg:grid-cols-2 lg:gap-14">
                {{-- Left: Form --}}
                <div>
                    <p class="text-[11px] font-semibold tracking-wide text-orange-400">
                        {{ __('speakers.form_label') }}
                    </p>

                    <h1 class="mt-2 text-3xl font-extrabold tracking-tight md:text-4xl">
                        {{ __('speakers.form_title') }}
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-6 text-white/60">
                        {{ __('speakers.form_description') }}
                    </p>

                    <form action="{{ route('create.speakersubmission') }}" method="POST" class="mt-7 space-y-4">
                        @csrf

                        {{-- Laravel Validation Errors --}}
                        @if ($errors->any())
                            <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50">
                                <h3 class="font-bold text-red-400 text-sm mb-2">
                                    {{ __('speakers.fix_errors') }}
                                </h3>
                                <ul class="space-y-1 text-red-300 text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/50">
                                <h3 class="font-bold text-green-400 text-sm">{{ session('success') }}</h3>
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if (session('error'))
                            <div class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50">
                                <h3 class="font-bold text-red-400 text-sm">{{ session('error') }}</h3>
                            </div>
                        @endif

                        {{-- Validation Errors (for JS) --}}
                        <div id="desktopErrorMsg"
                            class="mb-6 p-4 rounded-lg bg-red-500/10 border border-red-500/50 hidden">
                            <h3 class="font-bold text-red-400 text-sm mb-2">
                                {{ __('speakers.fix_errors') }}
                            </h3>
                            <ul id="desktopErrorList" class="space-y-1 text-red-300 text-sm"></ul>
                        </div>

                        {{-- Success Message (for JS) --}}
                        <div id="desktopSuccessMsg"
                            class="mb-6 p-4 rounded-lg bg-green-500/10 border border-green-500/50 hidden">
                            <h3 class="font-bold text-green-400 text-sm">{{ __('speakers.thank_you') }}
                            </h3>
                        </div>

                        {{-- Contact Person --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.contact_person_label') }}</label>
                            <input type="text" name="contact_person" required
                                placeholder="{{ __('speakers.contact_person_placeholder') }}"
                                class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none ring-0 transition focus:border-orange-400/50 focus:bg-white/7" />
                        </div>

                        {{-- Job Title --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.job_title_label') }}</label>
                            <input type="text" name="job_title" required
                                placeholder="{{ __('speakers.job_title_placeholder') }}"
                                class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                        </div>

                        {{-- Organization Name --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.organization_label') }}</label>
                            <input type="text" name="organization_name" required
                                placeholder="{{ __('speakers.organization_placeholder') }}"
                                class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                        </div>

                        {{-- Email + Phone (2 columns) --}}
                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label
                                    class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.email_label') }}</label>
                                <input type="email" name="email_address" required
                                    placeholder="{{ __('speakers.email_placeholder') }}"
                                    class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                            </div>

                            <div>
                                <label
                                    class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.phone_label') }}</label>
                                <input type="text" name="phone_number" required
                                    placeholder="{{ __('speakers.phone_placeholder') }}"
                                    class="h-11 w-full rounded-md border border-white/10 bg-white/5 px-4 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50 focus:bg-white/7" />
                            </div>
                        </div>

                        {{-- Country --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.country') }}</label>
                            <div class="relative">
                                <select name="country" required
                                    class="h-11 w-full appearance-none rounded-md border border-white/10 bg-white/5 px-4 pr-10 text-sm text-white outline-none transition focus:border-orange-400/50 focus:bg-white/7">
                                    <option value="" selected disabled class="bg-slate-900">
                                        {{ __('speakers.select_country') }}
                                    </option>
                                    <option class="bg-slate-900" value="AF">Afghanistan</option>
                                    <option class="bg-slate-900" value="AL">Albania</option>
                                    <option class="bg-slate-900" value="DZ">Algeria</option>
                                    <option class="bg-slate-900" value="AD">Andorra</option>
                                    <option class="bg-slate-900" value="AO">Angola</option>
                                    <option class="bg-slate-900" value="AG">Antigua and Barbuda</option>
                                    <option class="bg-slate-900" value="AR">Argentina</option>
                                    <option class="bg-slate-900" value="AM">Armenia</option>
                                    <option class="bg-slate-900" value="AU">Australia</option>
                                    <option class="bg-slate-900" value="AT">Austria</option>
                                    <option class="bg-slate-900" value="AZ">Azerbaijan</option>
                                    <option class="bg-slate-900" value="BS">Bahamas</option>
                                    <option class="bg-slate-900" value="BH">Bahrain</option>
                                    <option class="bg-slate-900" value="BD">Bangladesh</option>
                                    <option class="bg-slate-900" value="BB">Barbados</option>
                                    <option class="bg-slate-900" value="BY">Belarus</option>
                                    <option class="bg-slate-900" value="BE">Belgium</option>
                                    <option class="bg-slate-900" value="BZ">Belize</option>
                                    <option class="bg-slate-900" value="BJ">Benin</option>
                                    <option class="bg-slate-900" value="BT">Bhutan</option>
                                    <option class="bg-slate-900" value="BO">Bolivia</option>
                                    <option class="bg-slate-900" value="BA">Bosnia and Herzegovina</option>
                                    <option class="bg-slate-900" value="BW">Botswana</option>
                                    <option class="bg-slate-900" value="BR">Brazil</option>
                                    <option class="bg-slate-900" value="BN">Brunei</option>
                                    <option class="bg-slate-900" value="BG">Bulgaria</option>
                                    <option class="bg-slate-900" value="BF">Burkina Faso</option>
                                    <option class="bg-slate-900" value="BI">Burundi</option>
                                    <option class="bg-slate-900" value="KH">Cambodia</option>
                                    <option class="bg-slate-900" value="CM">Cameroon</option>
                                    <option class="bg-slate-900" value="CA">Canada</option>
                                    <option class="bg-slate-900" value="CV">Cape Verde</option>
                                    <option class="bg-slate-900" value="CF">Central African Republic</option>
                                    <option class="bg-slate-900" value="TD">Chad</option>
                                    <option class="bg-slate-900" value="CL">Chile</option>
                                    <option class="bg-slate-900" value="CN">China</option>
                                    <option class="bg-slate-900" value="CO">Colombia</option>
                                    <option class="bg-slate-900" value="KM">Comoros</option>
                                    <option class="bg-slate-900" value="CG">Congo</option>
                                    <option class="bg-slate-900" value="CR">Costa Rica</option>
                                    <option class="bg-slate-900" value="HR">Croatia</option>
                                    <option class="bg-slate-900" value="CU">Cuba</option>
                                    <option class="bg-slate-900" value="CY">Cyprus</option>
                                    <option class="bg-slate-900" value="CZ">Czech Republic</option>
                                    <option class="bg-slate-900" value="DK">Denmark</option>
                                    <option class="bg-slate-900" value="DJ">Djibouti</option>
                                    <option class="bg-slate-900" value="DM">Dominica</option>
                                    <option class="bg-slate-900" value="DO">Dominican Republic</option>
                                    <option class="bg-slate-900" value="EC">Ecuador</option>
                                    <option class="bg-slate-900" value="EG">Egypt</option>
                                    <option class="bg-slate-900" value="SV">El Salvador</option>
                                    <option class="bg-slate-900" value="GQ">Equatorial Guinea</option>
                                    <option class="bg-slate-900" value="ER">Eritrea</option>
                                    <option class="bg-slate-900" value="EE">Estonia</option>
                                    <option class="bg-slate-900" value="SZ">Eswatini</option>
                                    <option class="bg-slate-900" value="ET">Ethiopia</option>
                                    <option class="bg-slate-900" value="FJ">Fiji</option>
                                    <option class="bg-slate-900" value="FI">Finland</option>
                                    <option class="bg-slate-900" value="FR">France</option>
                                    <option class="bg-slate-900" value="GA">Gabon</option>
                                    <option class="bg-slate-900" value="GM">Gambia</option>
                                    <option class="bg-slate-900" value="GE">Georgia</option>
                                    <option class="bg-slate-900" value="DE">Germany</option>
                                    <option class="bg-slate-900" value="GH">Ghana</option>
                                    <option class="bg-slate-900" value="GR">Greece</option>
                                    <option class="bg-slate-900" value="GD">Grenada</option>
                                    <option class="bg-slate-900" value="GT">Guatemala</option>
                                    <option class="bg-slate-900" value="GN">Guinea</option>
                                    <option class="bg-slate-900" value="GW">Guinea-Bissau</option>
                                    <option class="bg-slate-900" value="GY">Guyana</option>
                                    <option class="bg-slate-900" value="HT">Haiti</option>
                                    <option class="bg-slate-900" value="HN">Honduras</option>
                                    <option class="bg-slate-900" value="HU">Hungary</option>
                                    <option class="bg-slate-900" value="IS">Iceland</option>
                                    <option class="bg-slate-900" value="IN">India</option>
                                    <option class="bg-slate-900" value="ID">Indonesia</option>
                                    <option class="bg-slate-900" value="IR">Iran</option>
                                    <option class="bg-slate-900" value="IQ">Iraq</option>
                                    <option class="bg-slate-900" value="IE">Ireland</option>
                                    <option class="bg-slate-900" value="IT">Italy</option>
                                    <option class="bg-slate-900" value="JM">Jamaica</option>
                                    <option class="bg-slate-900" value="JP">Japan</option>
                                    <option class="bg-slate-900" value="JO">Jordan</option>
                                    <option class="bg-slate-900" value="KZ">Kazakhstan</option>
                                    <option class="bg-slate-900" value="KE">Kenya</option>
                                    <option class="bg-slate-900" value="KI">Kiribati</option>
                                    <option class="bg-slate-900" value="XK">Kosovo</option>
                                    <option class="bg-slate-900" value="KW">Kuwait</option>
                                    <option class="bg-slate-900" value="KG">Kyrgyzstan</option>
                                    <option class="bg-slate-900" value="LA">Laos</option>
                                    <option class="bg-slate-900" value="LV">Latvia</option>
                                    <option class="bg-slate-900" value="LB">Lebanon</option>
                                    <option class="bg-slate-900" value="LS">Lesotho</option>
                                    <option class="bg-slate-900" value="LR">Liberia</option>
                                    <option class="bg-slate-900" value="LY">Libya</option>
                                    <option class="bg-slate-900" value="LI">Liechtenstein</option>
                                    <option class="bg-slate-900" value="LT">Lithuania</option>
                                    <option class="bg-slate-900" value="LU">Luxembourg</option>
                                    <option class="bg-slate-900" value="MG">Madagascar</option>
                                    <option class="bg-slate-900" value="MW">Malawi</option>
                                    <option class="bg-slate-900" value="MY">Malaysia</option>
                                    <option class="bg-slate-900" value="MV">Maldives</option>
                                    <option class="bg-slate-900" value="ML">Mali</option>
                                    <option class="bg-slate-900" value="MT">Malta</option>
                                    <option class="bg-slate-900" value="MH">Marshall Islands</option>
                                    <option class="bg-slate-900" value="MR">Mauritania</option>
                                    <option class="bg-slate-900" value="MU">Mauritius</option>
                                    <option class="bg-slate-900" value="MX">Mexico</option>
                                    <option class="bg-slate-900" value="FM">Micronesia</option>
                                    <option class="bg-slate-900" value="MD">Moldova</option>
                                    <option class="bg-slate-900" value="MC">Monaco</option>
                                    <option class="bg-slate-900" value="MN">Mongolia</option>
                                    <option class="bg-slate-900" value="ME">Montenegro</option>
                                    <option class="bg-slate-900" value="MA">Morocco</option>
                                    <option class="bg-slate-900" value="MZ">Mozambique</option>
                                    <option class="bg-slate-900" value="MM">Myanmar</option>
                                    <option class="bg-slate-900" value="NA">Namibia</option>
                                    <option class="bg-slate-900" value="NR">Nauru</option>
                                    <option class="bg-slate-900" value="NP">Nepal</option>
                                    <option class="bg-slate-900" value="NL">Netherlands</option>
                                    <option class="bg-slate-900" value="NZ">New Zealand</option>
                                    <option class="bg-slate-900" value="NI">Nicaragua</option>
                                    <option class="bg-slate-900" value="NE">Niger</option>
                                    <option class="bg-slate-900" value="NG">Nigeria</option>
                                    <option class="bg-slate-900" value="KP">North Korea</option>
                                    <option class="bg-slate-900" value="MK">North Macedonia</option>
                                    <option class="bg-slate-900" value="NO">Norway</option>
                                    <option class="bg-slate-900" value="OM">Oman</option>
                                    <option class="bg-slate-900" value="PK">Pakistan</option>
                                    <option class="bg-slate-900" value="PW">Palau</option>
                                    <option class="bg-slate-900" value="PS">Palestine</option>
                                    <option class="bg-slate-900" value="PA">Panama</option>
                                    <option class="bg-slate-900" value="PG">Papua New Guinea</option>
                                    <option class="bg-slate-900" value="PY">Paraguay</option>
                                    <option class="bg-slate-900" value="PE">Peru</option>
                                    <option class="bg-slate-900" value="PH">Philippines</option>
                                    <option class="bg-slate-900" value="PL">Poland</option>
                                    <option class="bg-slate-900" value="PT">Portugal</option>
                                    <option class="bg-slate-900" value="QA">Qatar</option>
                                    <option class="bg-slate-900" value="RO">Romania</option>
                                    <option class="bg-slate-900" value="RU">Russia</option>
                                    <option class="bg-slate-900" value="RW">Rwanda</option>
                                    <option class="bg-slate-900" value="KN">Saint Kitts and Nevis</option>
                                    <option class="bg-slate-900" value="LC">Saint Lucia</option>
                                    <option class="bg-slate-900" value="VC">Saint Vincent and the Grenadines</option>
                                    <option class="bg-slate-900" value="WS">Samoa</option>
                                    <option class="bg-slate-900" value="SM">San Marino</option>
                                    <option class="bg-slate-900" value="ST">Sao Tome and Principe</option>
                                    <option class="bg-slate-900" value="SA">Saudi Arabia</option>
                                    <option class="bg-slate-900" value="SN">Senegal</option>
                                    <option class="bg-slate-900" value="RS">Serbia</option>
                                    <option class="bg-slate-900" value="SC">Seychelles</option>
                                    <option class="bg-slate-900" value="SL">Sierra Leone</option>
                                    <option class="bg-slate-900" value="SG">Singapore</option>
                                    <option class="bg-slate-900" value="SK">Slovakia</option>
                                    <option class="bg-slate-900" value="SI">Slovenia</option>
                                    <option class="bg-slate-900" value="SB">Solomon Islands</option>
                                    <option class="bg-slate-900" value="SO">Somalia</option>
                                    <option class="bg-slate-900" value="ZA">South Africa</option>
                                    <option class="bg-slate-900" value="KR">South Korea</option>
                                    <option class="bg-slate-900" value="SS">South Sudan</option>
                                    <option class="bg-slate-900" value="ES">Spain</option>
                                    <option class="bg-slate-900" value="LK">Sri Lanka</option>
                                    <option class="bg-slate-900" value="SD">Sudan</option>
                                    <option class="bg-slate-900" value="SR">Suriname</option>
                                    <option class="bg-slate-900" value="SE">Sweden</option>
                                    <option class="bg-slate-900" value="CH">Switzerland</option>
                                    <option class="bg-slate-900" value="SY">Syria</option>
                                    <option class="bg-slate-900" value="TW">Taiwan</option>
                                    <option class="bg-slate-900" value="TJ">Tajikistan</option>
                                    <option class="bg-slate-900" value="TZ">Tanzania</option>
                                    <option class="bg-slate-900" value="TH">Thailand</option>
                                    <option class="bg-slate-900" value="TL">Timor-Leste</option>
                                    <option class="bg-slate-900" value="TG">Togo</option>
                                    <option class="bg-slate-900" value="TO">Tonga</option>
                                    <option class="bg-slate-900" value="TT">Trinidad and Tobago</option>
                                    <option class="bg-slate-900" value="TN">Tunisia</option>
                                    <option class="bg-slate-900" value="TR">Turkey</option>
                                    <option class="bg-slate-900" value="TM">Turkmenistan</option>
                                    <option class="bg-slate-900" value="TV">Tuvalu</option>
                                    <option class="bg-slate-900" value="UG">Uganda</option>
                                    <option class="bg-slate-900" value="UA">Ukraine</option>
                                    <option class="bg-slate-900" value="AE">United Arab Emirates</option>
                                    <option class="bg-slate-900" value="GB">United Kingdom</option>
                                    <option class="bg-slate-900" value="US">United States</option>
                                    <option class="bg-slate-900" value="UY">Uruguay</option>
                                    <option class="bg-slate-900" value="UZ">Uzbekistan</option>
                                    <option class="bg-slate-900" value="VU">Vanuatu</option>
                                    <option class="bg-slate-900" value="VA">Vatican City</option>
                                    <option class="bg-slate-900" value="VE">Venezuela</option>
                                    <option class="bg-slate-900" value="VN">Vietnam</option>
                                    <option class="bg-slate-900" value="YE">Yemen</option>
                                    <option class="bg-slate-900" value="ZM">Zambia</option>
                                    <option class="bg-slate-900" value="ZW">Zimbabwe</option>
                                </select>

                                {{-- chevron --}}
                                <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-white/50"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.24a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        {{-- Speaker Profile / Biography --}}
                        <div>
                            <label
                                class="mb-2 block text-xs font-semibold text-white/70">{{ __('speakers.speaker_bio_label') }}
                            </label>
                            <textarea name="speaker_biography" required rows="4"
                                placeholder="{{ __('speakers.speaker_bio_placeholder') }}" class="w-full rounded-md border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder:text-white/35 outline-none transition focus:border-orange-400/50
                                 focus:bg-white/7"></textarea>
                        </div>

                        {{-- Submit --}}
                        <div class="pt-2">
                            <button type="submit" id="btnSubmitSpeakerEnquiry"
                                class="group inline-flex h-11 w-full items-center justify-center rounded-md bg-orange-500 px-6 text-xs font-extrabold uppercase tracking-widest text-white shadow-sm transition hover:bg-orange-600 focus:outline-none focus-visible:ring-2
                                 focus-visible:ring-orange-400/70 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-950">
                                {{ __('speakers.submit_button') }} <span
                                    class="ml-2 text-sm transition group-hover:translate-x-0.5">→</span>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Right: Image --}}
                <div class="lg:pt-8">
                    <div class="relative mx-auto w-[457px] max-w-md lg:max-w-none">
                        <div class="overflow-hidden rounded-[28px]">
                            <img src="{{ asset('images/mix/hand-presentation.webp') }}" alt=""
                                class="h-[671px] w-[457px] object-cover" />

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- Footer -->
    @include('partials.footer')

</body>

</html>