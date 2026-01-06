<div class="w-full h-auto bg-gray-900 overflow-hidden" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <!-- Desktop Footer -->
    <div class="hidden lg:block bg-gray-900 text-white py-5 pt-15">
        <!-- Main Content -->
        <div class="mx-auto max-w-6xl px-8">
            <div class="grid grid-cols-5 gap-8 mb-12">
                <!-- Left Column: Contact Us -->
                <div
                    class="flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-6">
                    <div
                        class="h-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-base font-bold leading-6">
                        {{ __('footer.contact_title') }}
                    </div>
                    <div
                        class="flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-5">
                        <div
                            class="flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-2.5">
                            <div
                                class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-zinc-400 text-sm font-normal leading-6">
                                {{ __('footer.sales_team') }}
                            </div>
                            <a href="mailto:info@saudiclimateweek.com" target="_blank" rel="noopener noreferrer"
                                class="opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition break-all">
                                info@saudiclimateweek.com
                            </a>
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 relative shrink-0 flex items-center justify-center">
                                    <img src="{{ asset('storage/uploads/footer-img/call.svg') }}" alt="Phone"
                                        class="w-full h-full object-contain">
                                </div>
                                <a href="tel:+966559509832" target="_blank" rel="noopener noreferrer"
                                    class="opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition"
                                    dir="ltr">
                                    +966 55 950 9832
                                </a>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 relative shrink-0 flex items-center justify-center">
                                    <img src="{{ asset('storage/uploads/footer-img/whatsapp.svg') }}" alt="whatsapp"
                                        class="w-full h-full object-contain">
                                </div>
                                <a href="https://wa.me/966510831535" target="_blank" rel="noopener noreferrer"
                                    class="opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition"
                                    dir="ltr">
                                    +966 51 083 1535
                                </a>
                            </div>

                            <!-- Social Media Icons -->
                            <div class="flex gap-4 mt-4">
                                <a href="https://twitter.com/WeekSaudi87319" target="_blank" rel="noopener noreferrer"
                                    class="w-5 h-5 hover:opacity-70 transition" title="Twitter">
                                    <img src="{{ asset('storage/uploads/footer-img/x.svg') }}" alt="Twitter"
                                        class="w-full h-full">
                                </a>
                                <a href="https://www.instagram.com/saudiclimateweek?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                    class="w-5 h-5 hover:opacity-70 transition" title="Instagram" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="{{ asset('storage/uploads/footer-img/insta.svg') }}" alt="Instagram"
                                        class="w-full h-full">
                                </a>
                                <a href="#" class="w-5 h-5 hover:opacity-70 transition" title="Facebook">
                                    <img src="{{ asset('storage/uploads/footer-img/facebook.svg') }}" alt="Facebook"
                                        class="w-full h-full">
                                </a>
                                <a href="https://www.linkedin.com/company/saudi-climate-week/" target="_blank"
                                    rel="noopener noreferrer" class="w-5 h-5 hover:opacity-70 transition"
                                    title="LinkedIn">
                                    <img src="{{ asset('storage/uploads/footer-img/linkedin.svg') }}" alt="LinkedIn"
                                        class="w-full h-full">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Middle-Left Column: Get Involved -->
                <div
                    class="flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-6">
                    <div
                        class="h-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-base font-normal leading-6">
                        {{ __('footer.get_involved') }}
                    </div>
                    <div class="flex flex-col justify-start items-start gap-2.5">
                        <a href="/register"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.register') }}
                        </a>
                        <a href="/exhibitors"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.exhibitors') }}
                        </a>
                        <a href="/partner"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.partnership') }}
                        </a>
                        <a href="/media"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.media_center') }}
                        </a>
                    </div>
                </div>

                <!-- Middle-Right Column: Quick Links -->
                <div
                    class="flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-6">
                    <div
                        class="h-6 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-base font-normal leading-6">
                        {{ __('footer.quick_links') }}
                    </div>
                    <div class="flex flex-col justify-start items-start gap-2.5">
                        <a href="#"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.about') }}
                        </a>
                        <a href="#"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.schedule') }}
                        </a>
                        <a href="#"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.speakers') }}
                        </a>
                        <a href="/100climateleaders"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.climate_leaders') }}
                        </a>
                        <a href="#"
                            class="h-6 opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-white text-sm font-normal leading-6 hover:opacity-100 transition">
                            {{ __('footer.contact') }}
                        </a>
                    </div>
                </div>

                <!-- Right Column: Logo and Event Info -->
                <div
                    class="col-span-2 flex flex-col justify-start {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }} gap-8">
                    <div
                        class="w-32 h-18 justify-center {{ app()->getLocale() === 'ar' ? 'items-end' : 'items-start' }}">
                        <a href="/home">
                            <img class="w-[100px] h-[69px]" src="{{ asset('storage/uploads/footer-img/scw-logo.webp') }}"
                                alt="SCW Logo" />
                        </a>
                    </div>

                    <div class="flex flex-col justify-start items-center gap-2.5">
                        <div
                            class="opacity-80 {{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }} text-zinc-400 text-xs font-normal leading-6 w-[289px]">
                            {{ __('footer.about_description') }}
                        </div>
                        <div class=" inline-flex justify-end items-center gap-6">
                            <!-- Date -->
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 relative shrink-0 flex items-center justify-center">
                                    <img src="{{ asset('storage/uploads/footer-img/calendar 1.svg') }}" alt="Date"
                                        class="w-full h-full object-contain">
                                </div>
                                <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                    <span class="text-white text-base font-bold leading-6" dir="ltr">06 -
                                        10<br /></span>
                                    <span class="text-white text-xs font-normal leading-6">
                                        {{ __('footer.date_month_year') }}
                                    </span>
                                </div>
                            </div>
                            <!-- Location -->
                            <div class="flex items-center gap-3">
                                <div class="w-5 h-5 relative shrink-0 flex items-center justify-center">
                                    <img src="{{ asset('storage/uploads/footer-img/map.svg') }}" alt="Location"
                                        class="w-full h-full object-contain">
                                </div>
                                <div class="{{ app()->getLocale() === 'ar' ? 'text-right' : 'text-left' }}">
                                    <span class="text-white text-base font-bold leading-6">
                                        {{ __('footer.location_city') }}<br />
                                    </span>
                                    <span class="text-white text-xs font-normal leading-6">
                                        {{ __('footer.location_country') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-white/10 my-6"></div>

            <!-- Organizers Section -->
            <div>
                <h3 class="text-center text-white text-xs font-normal mb-6">{{ __('footer.organizers') }}</h3>
                <div class="flex justify-center items-center gap-11"
                    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                    <div class="flex flex-col justify-start items-center gap-2">
                        <a href="https://ecocode.sa/en/" target="_blank" rel="noopener noreferrer">
                            <img class="w-20 h-10" src="{{ asset('storage/uploads/footer-img/ecocode-logo.webp') }}"
                                alt="Partner 1" />
                        </a>
                        <a href="https://ecocode.sa/en/" target="_blank" rel="noopener noreferrer"
                            class="text-xs text-zinc-400 hover:text-white transition">
                            www.ecocode.sa
                        </a>
                        <div class="w-52 opacity-80 text-white text-xs font-normal leading-6 hidden">
                            {{ __('footer.partner_1_desc') }}
                        </div>
                    </div>

                    <div class="w-px h-10 bg-zinc-600"></div>

                    <div class="flex flex-col justify-start items-center gap-2">
                        <a href="https://www.birba.om" target="_blank" rel="noopener noreferrer">
                            <img class="w-20 h-10" src="{{ asset('storage/uploads/footer-img/birba-logo-white.webp') }}"
                                alt="Partner 2" />
                        </a>
                        <a href="https://www.birba.om" target="_blank" rel="noopener noreferrer"
                            class="text-xs text-zinc-400 hover:text-white transition">
                            www.birba.om
                        </a>
                        <div class="w-60 opacity-80 text-white text-xs font-normal leading-6 hidden">
                            {{ __('footer.partner_2_desc') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="hidden lg:block border-t border-white/10 mt-8">
        <div class="mx-auto max-w-6xl px-8 py-6 flex justify-between items-center">
            <div class="text-gray-400 text-xs font-normal">
                {{ __('footer.copyright') }}
            </div>
            <div class="text-gray-400 text-xs font-normal">
                <a href="#" class="hover:text-white transition">{{ __('footer.privacy_policy') }}</a> | <a href="#"
                    class="hover:text-white transition">{{ __('footer.terms') }}</a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Footer (Responsive) -->
<div class="lg:hidden bg-gray-900 text-white py-6 px-4" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="max-w-full mx-auto space-y-5">
        <!-- Mobile Logo and Description -->
        <div class="space-y-2 text-center">
            <a href="/home">
                <img src="{{ asset('storage/uploads/footer-img/scw-logo.webp') }}" alt="SCW Logo"
                    class="w-12 h-auto mx-auto pb-2">
            </a>
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
                <p class="text-xs text-white font-bold" dir="ltr">06 - 10</p>
                <p class="text-xs text-white">{{ __('footer.date_month_year') }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-300 mb-1">
                    {{ __('footer.location_label') }}
                </p>
                <p class="text-xs text-white font-bold">{{ __('footer.location_city') }}</p>
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
                <li><a href="/100climateleaders"
                        class="text-xs text-gray-400 hover:text-white transition">{{ __('footer.climate_leaders') }}</a>
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
            <div class="space-y-2">
                <p class="text-xs text-gray-400">{{ __('footer.sales_team') }}</p>
                <a href="mailto:info@saudiclimateweek.com" target="_blank" rel="noopener noreferrer"
                    class="text-xs text-gray-400 hover:text-white transition break-all block">
                    info@saudiclimateweek.com
                </a>
                <div class="flex items-center justify-center gap-2">
                    <img src="{{ asset('storage/uploads/footer-img/call.svg') }}" alt="Phone" class="w-4 h-4">
                    <a href="tel:+966559509832" target="_blank" rel="noopener noreferrer"
                        class="text-xs text-gray-400 hover:text-white transition" dir="ltr">
                        +966 55 950 9832
                    </a>
                </div>
                <div class="flex items-center justify-center gap-2">
                    <img src="{{ asset('storage/uploads/footer-img/whatsapp.svg') }}" alt="WhatsApp" class="w-4 h-4">
                    <a href="https://wa.me/966510831535" target="_blank" rel="noopener noreferrer"
                        class="text-xs text-gray-400 hover:text-white transition" dir="ltr">
                        +966 51 083 1535
                    </a>
                </div>

                <!-- Social Media Icons (Mobile) -->
                <div class="flex justify-center gap-4 pt-3">
                    <a href="https://twitter.com/WeekSaudi87319" target="_blank" rel="noopener noreferrer"
                        class="w-5 h-5 hover:opacity-70 transition" title="Twitter">
                        <img src="{{ asset('storage/uploads/footer-img/x.svg') }}" alt="Twitter" class="w-full h-full">
                    </a>
                    <a href="https://www.instagram.com/saudiclimateweek?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                        class="w-5 h-5 hover:opacity-70 transition" title="Instagram" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('storage/uploads/footer-img/insta.svg') }}" alt="Instagram" class="w-full h-full">
                    </a>
                    <a href="#" class="w-5 h-5 hover:opacity-70 transition" title="Facebook">
                        <img src="{{ asset('storage/uploads/footer-img/facebook.svg') }}" alt="Facebook" class="w-full h-full">
                    </a>
                    <a href="https://www.linkedin.com/company/saudiclimate-week/" target="_blank"
                        rel="noopener noreferrer" class="w-5 h-5 hover:opacity-70 transition" title="LinkedIn">
                        <img src="{{ asset('storage/uploads/footer-img/linkedin.svg') }}" alt="LinkedIn" class="w-full h-full">
                    </a>
                </div>
            </div>
        </div>

        <!-- Organizers Section (Mobile) -->
        <div class="text-center py-2 border-t border-gray-800">
            <h4 class="text-xs font-bold text-white mb-2">{{ __('footer.organizers') }}</h4>
            <div class="flex justify-center items-center gap-3">
                <div class="flex flex-col items-center gap-1">
                    <a href="https://ecocode.sa/en/" target="_blank" rel="noopener noreferrer">
                        <img class="w-14 h-auto" src="{{ asset('storage/uploads/footer-img/ecocode-logo.webp') }}"
                            alt="Ecocode" />
                    </a>
                    <a href="https://ecocode.sa/en/" target="_blank" rel="noopener noreferrer"
                        class="text-xs text-zinc-400 hover:text-white transition">
                        www.ecocode.sa
                    </a>
                    <p class="text-xs text-gray-400" hidden>
                        {{ __('footer.partner_1_desc') }}
                    </p>
                </div>

                <div class="w-px h-3 bg-zinc-600"></div>

                <div class="flex flex-col items-center gap-1">
                    <a href="https://www.birba.om" target="_blank" rel="noopener noreferrer">
                        <img class="w-14 h-auto" src="{{ asset('storage/uploads/footer-img/birba-logo-white.webp') }}"
                            alt="Birba" />
                    </a>
                    <a href="https://www.birba.om" target="_blank" rel="noopener noreferrer"
                        class="text-xs text-zinc-400 hover:text-white transition">
                        www.birba.om
                    </a>
                    <p class="text-xs text-gray-400" hidden>
                        {{ __('footer.partner_2_desc') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom (Mobile) -->
        <div class="space-y-3 text-center pt-6 border-t border-gray-800">
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
