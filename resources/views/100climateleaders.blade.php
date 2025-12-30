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

    <!-- Footer -->
    @include('partials.footer')

</body>

</html>