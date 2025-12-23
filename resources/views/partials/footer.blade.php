<div class="w-full h-auto lg:h-[705px] relative bg-gray-900 overflow-hidden"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="hidden lg:block w-full h-[705px] left-0 top-0 absolute bg-gray-900"></div>

    <!-- Right Section: Logo, Event Info, About (Desktop Only) -->
    <div class="hidden lg:block w-72 left-[1074px] top-[102px] absolute inline-flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-2.5"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div
            class="self-stretch flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-8">
            <div
                class="self-stretch w-32 h-18 justify-center {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }}">
                <img class="w-[100px] h-[69px]" src="/storage/footer-img/scw-logo.webp" alt="SCW Logo" />
            </div>

            <div class="self-stretch flex flex-col justify-start items-center gap-2.5">
                <div
                    class="self-stretch h-20 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-zinc-400 text-xs font-normal font-['DIN_Next_LT_Arabic'] leading-6">
                    {{ __('footer.about_description') }}
                </div>
                <div class="self-stretch inline-flex justify-end items-center gap-6">
                    <!-- Date -->
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 relative flex-shrink-0 flex items-center justify-center">
                            <img src="/storage/footer-img/calendar 1.svg" alt="Date"
                                class="w-full h-full object-contain">
                        </div>
                        <div
                            class="w-24 h-16 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center">
                            <span class="text-white text-base font-bold font-['Montserrat'] leading-6" dir="ltr">06 -
                                10<br /></span>
                            <span class="text-white text-xs font-normal font-['Montserrat'] leading-6">
                                {{ __('footer.date_month_year') }}
                            </span>
                        </div>
                    </div>
                    <!-- Location -->
                    <div class="flex items-center gap-3">
                        <div class="w-5 h-5 relative flex-shrink-0 flex items-center justify-center">
                            <img src="/storage/footer-img/map.svg" alt="Location" class="w-full h-full object-contain">
                        </div>
                        <div
                            class="w-25 h-16 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center">
                            <span class="text-white text-base font-bold font-['DIN_Next_LT_Arabic'] leading-6">
                                {{ __('footer.location_city') }}<br />
                            </span>
                            <span class="text-white text-xs font-normal font-['DIN_Next_LT_Arabic'] leading-6">
                                {{ __('footer.location_country') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links (الوصول السريع) (Desktop Only) -->
    <div
        class="hidden lg:block w-32 left-[835px] top-[102px] absolute inline-flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-6 pb-12">
        <div
            class="self-stretch h-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-base font-normal leading-6 pb-12">
            {{ __('footer.quick_links') }}
        </div>
        <div class="self-stretch flex flex-col justify-start items-start gap-2.5">
            <a href="#"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.about') }}
            </a>
            <a href="#"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.schedule') }}
            </a>
            <a href="#"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.speakers') }}
            </a>
            <a href="#"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.contact') }}
            </a>
        </div>
    </div>


    <!-- Contact Us Section (Desktop Only) -->
    <div
        class="hidden lg:inline-flex w-56 left-[358px] top-[102px] absolute flex-col justify-center {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-6 pb-12">
        <div
            class="self-stretch h-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-base font-bold font-['DIN_Next_LT_Arabic'] leading-6">
            {{ __('footer.contact_title') }}
        </div>
        <div
            class="self-stretch flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-5">
            <div
                class="self-stretch flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-2.5">
                <div
                    class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-zinc-400 text-sm font-normal font-['DIN_Next_LT_Arabic'] leading-6">
                    {{ __('footer.sales_team') }}
                </div>
                <a href="mailto:info@saudiclimateweek.com"
                    class="self-stretch opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal font-['Montserrat'] leading-6 hover:opacity-100 transition">
                    info@saudiclimateweek.com
                </a>
                <a href="tel:+966xxxxxxxxx"
                    class="self-stretch opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal font-['Montserrat'] leading-6 hover:opacity-100 transition"
                    dir="ltr">
                    +966 xxxxxxxxx
                </a>
            </div>
        </div>
    </div>

    <!-- Divider Line 1 (Desktop Only) -->
    <div
        class="hidden lg:block w-[1171px] h-0 left-[171px] top-[379px] absolute outline outline-1 outline-offset-[-0.50px] outline-white/5">
    </div>

    <!-- Divider Line 2 (Desktop Only) -->
    <div
        class="hidden lg:block w-[1512px] h-0 left-0 top-[572px] absolute outline outline-1 outline-offset-[-0.50px] outline-white/5">
    </div>

    <!-- Footer Bottom Right: Links (Desktop Only) -->
    <div
        class="hidden lg:block w-60 h-5 left-[1095px] top-[627px] absolute opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-xs font-normal leading-6">
        {{ __('footer.privacy_policy') }} | {{ __('footer.terms') }}
    </div>

    <!-- Footer Bottom Left: Copyright (Desktop Only) -->
    <div
        class="hidden lg:block w-72 h-7 left-[171px] top-[622px] absolute opacity-80 justify-center text-white text-xs font-normal leading-6">
        {{ __('footer.copyright') }}
    </div>

    <!-- Get Involved (شارك معنا) (Desktop Only) -->
    <div
        class="hidden lg:block w-32 left-[649px] top-[102px] absolute inline-flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-6 pb-12">
        <div
            class="self-stretch h-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-base font-normal leading-6 pb-12">
            {{ __('footer.get_involved') }}
        </div>
        <div class="self-stretch flex flex-col justify-start items-start gap-2.5">
            <a href="/register"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.register') }}
            </a>
            <a href="/exhibitors"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.exhibitors') }}
            </a>
            <a href="/partner"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.partnership') }}
            </a>
            <a href="/media"
                class="self-stretch h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} justify-center text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                {{ __('footer.media_center') }}
            </a>
        </div>
    </div>

    <!-- Social Media Icons (Desktop Only) -->
    <div class="hidden lg:inline-flex w-40 h-8 {{ app()->getLocale() === 'ar' ? 'left-[426px]' : 'left-[358px]' }} top-72 absolute gap-6"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <a href="#" class="w-6 h-6 relative hover:opacity-70 transition" title="Twitter">
            <img src="/storage/footer-img/x.svg" alt="Twitter" class="w-full h-full">
        </a>
        <a href="https://www.instagram.com/saudiclimateweek?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
            class="w-6 h-6 relative hover:opacity-70 transition" title="Instagram" target="_blank"
            rel="noopener noreferrer">
            <img src="/storage/footer-img/insta.svg" alt="Instagram" class="w-full h-full">
        </a>
        <a href="#" class="w-6 h-6 relative hover:opacity-70 transition" title="Facebook">
            <img src="/storage/footer-img/facebook.svg" alt="Facebook" class="w-full h-full">
        </a>

    </div>

    <!-- Partners Section Label (Desktop Only) -->
    <div
        class="hidden lg:block w-44 h-7 left-1/2 -translate-x-1/2 top-[406px] absolute text-center justify-center text-white text-xs font-normal leading-6">
        {{ __('footer.organizers') }}
    </div>

    <!-- Partners (Desktop Only) -->
    <div class="hidden lg:flex left-[386px] top-[460px] absolute justify-center items-center gap-11"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="flex justify-start items-center gap-8">
            <img class="w-20 h-10" src="/storage/footer-img/birba-logo-white.webp" alt="Partner 2" />
            <div class="w-60 h-14 opacity-80 justify-center text-white text-xs font-normal leading-6">
                {{ __('footer.partner_2_desc') }}
            </div>
        </div>

        <div class="w-px h-10 bg-zinc-600"></div>
        <div class="flex justify-start items-center gap-7">
            <img class="w-20 h-10" src="/storage/footer-img/ecocode-logo.webp" alt="Partner 1" />
            <div class="w-52 h-14 opacity-80  justify-center text-white text-xs font-normal leading-6">
                {{ __('footer.partner_1_desc') }}
            </div>

        </div>

    </div>

    <!-- Mobile Footer (Responsive) -->
    <div class="lg:hidden bg-gray-900 text-white py-6 px-4" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
        <div class="max-w-full mx-auto space-y-5">
            <!-- Mobile Logo and Description -->
            <div class="space-y-2 text-center">
                <img src="/storage/footer-img/scw-logo.webp" alt="SCW Logo" class="w-12 h-auto mx-auto">
                <p class="text-xs text-gray-400 leading-tight">
                    {{ __('footer.about_description') }}
                </p>
            </div>

            <!-- Event Info: Date and Location -->
            <div class="flex flex-col gap-3 text-center">
                <div>
                    <p class="text-xs font-bold text-gray-300 mb-1">
                        {{ __('footer.date_label') }}
                    </p>
                    <p class="text-xs text-white">06 - 10</p>
                    <p class="text-xs text-white">{{ __('footer.date_month_year') }}</p>
                </div>
                <div>
                    <p class="text-xs font-bold text-gray-300 mb-1">
                        {{ __('footer.location_label') }}
                    </p>
                    <p class="text-xs text-white">{{ __('footer.location_city') }}</p>
                    <p class="text-xs text-white">{{ __('footer.location_country') }}</p>
                </div>
            </div>

            <!-- Quick Links Section -->
            <div class="text-center">
                <h4 class="text-xs font-bold text-white mb-2">{{ __('footer.quick_links') }}</h4>
                <ul class="space-y-1">
                    <li><a href="/about"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.about') }}</a></li>
                    <li><a href="/schedule"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.schedule') }}</a>
                    </li>
                    <li><a href="/speakers"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.speakers') }}</a>
                    </li>
                    <li><a href="/contact"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.contact') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Get Involved Section -->
            <div class="text-center">
                <h4 class="text-xs font-bold text-white mb-2">{{ __('footer.get_involved') }}</h4>
                <ul class="space-y-1">
                    <li><a href="/register"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.register') }}</a>
                    </li>
                    <li><a href="/exhibitors"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.exhibitors') }}</a>
                    </li>
                    <li><a href="/partner"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.partnership') }}</a>
                    </li>
                    <li><a href="/media"
                            class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.media_center') }}</a>
                    </li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div class="text-center">
                <h4 class="text-xs font-bold text-white mb-2">{{ __('footer.contact_title') }}</h4>
                <ul class="space-y-1">
                    <li>
                        <p class="text-xs text-gray-400">{{ __('footer.sales_team') }}</p>
                    </li>
                    <li><a href="mailto:info@saudiclimateweek.com"
                            class="text-xs text-gray-400 hover:text-white transition break-all">info@saudiclimateweek.com</a>
                    </li>
                    <li><a href="tel:+966xxxxxxxxx" class="text-xs text-gray-400 hover:text-white transition"
                            dir="ltr">+966 xxxxxxxxx</a></li>
                </ul>
            </div>

            <!-- Organizers Section (Mobile) -->
            <div class="text-center pt-4">
                <h4 class="text-xs font-bold text-white mb-4">{{ __('footer.organizers') }}</h4>
                <div class="space-y-4">
                    <div class="space-y-2">
                        <img class="w-16 h-auto mx-auto" src="/storage/footer-img/birba-logo-white.webp" alt="Birba" />
                        <p class="text-xs text-gray-400">
                            {{ __('footer.partner_2_desc') }}
                        </p>
                    </div>
                    <div class="w-px h-4 bg-zinc-600 mx-auto"></div>
                    <div class="space-y-2">
                        <img class="w-16 h-auto mx-auto" src="/storage/footer-img/ecocode-logo.webp" alt="Ecocode" />
                        <p class="text-xs text-gray-400">
                            {{ __('footer.partner_1_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Social Media Icons (Mobile) -->
            <div class="pt-4 border-t border-gray-800">
                <div class="flex justify-center  gap-6">
                    <a href="#" class="w-6 h-6 text-white hover:text-blue-400 transition" title="Twitter">
                        <img src="/storage/footer-img/x.svg" alt="Twitter">
                    </a>
                    <a href="https://www.instagram.com/saudiclimateweek?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        class="w-6 h-6 text-white hover:text-blue-400 transition" title="Instagram" target="_blank"
                        rel="noopener noreferrer">
                        <img src="/storage/footer-img/insta.svg" alt="Instagram">
                    </a>
                    <a href="#" class="w-6 h-6 text-white hover:text-blue-400 transition" title="Facebook">
                        <img src="/storage/footer-img/facebook.svg" alt="Facebook">
                    </a>

                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="space-y-2 text-center pt-4 border-t border-gray-800">
                <p class="text-xs text-gray-400">
                    {{ __('footer.copyright') }}
                </p>
                <div class="flex justify-center gap-2 text-xs text-gray-400">
                    <a href="#" class="hover:text-white transition">{{ __('footer.privacy_policy') }}</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white transition">{{ __('footer.terms') }}</a>
                </div>
            </div>
        </div>
    </div>