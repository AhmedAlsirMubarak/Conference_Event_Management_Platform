<!-- Navigation Bar -->
<nav class="sticky top-0 z-50 bg-[#121D24] text-white shadow-lg"
    dir="<?php echo e(app()->getLocale() === 'ar' ? 'rtl' : 'ltr'); ?>">
    <style>
        .nav-link-underline::after {
            background: linear-gradient(to right, transparent 0%, #E6813E 53%, transparent 100%);
        }

        /* Active link styling */
        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(to right, transparent 0%, #E6813E 53%, transparent 100%);
        }
    </style>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top Bar: Logo and Auth Links -->
        <div class="">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/home" class="text-2xl font-bold text-white hover:text-blue-400 transition-colors">
                        <img src="/images/nav-img/scw-logo.webp" alt="SCW Logo" class="w-[97.99px] h-[69px]">
                    </a>
                </div>

                <!-- Center: Organizers (Hidden on mobile) -->
                <div class="hidden md:flex items-center gap-4">
                    <span class="text-gray-400 text-sm font-medium">
                        <?php echo e(__('navigation.organized_by')); ?>

                    </span>
                    <div class="flex items-center gap-3">
                        <a href="https://birba.om/" target="_blank">
                            <img src="/images/nav-img/birba-logo-white.webp" alt="Organizer 1" class="h-10 rounded">
                        </a>

                        <div class="w-px h-6 bg-gray-700"></div>
                        <a href="https://ecocode.sa/" target="_blank">
                            <img src="/images/nav-img/ecocode-logo.webp" alt="Organizer 2" class="h-10 rounded">
                        </a>
                    </div>
                </div>

                <!-- Right: Auth & Language Switcher -->
                <div class="flex items-center gap-1 sm:gap-3">
                    <!-- Language Switcher -->
                    <div class="flex items-center bg-gray-800 rounded-lg p-0.5 gap-1">
                        <?php if(app()->getLocale() === 'ar'): ?>
                            <button class="px-2 py-1 text-xs font-bold bg-[#3C94C5] text-white rounded transition-colors">
                                AR
                            </button>
                            <a href="<?php echo e(route('lang.switch', 'en')); ?>"
                                class="px-2 py-1 text-xs text-gray-400 hover:text-white font-medium transition-colors">
                                EN
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('lang.switch', 'ar')); ?>"
                                class="px-2 py-1 text-xs text-gray-400 hover:text-white font-medium transition-colors">
                                AR
                            </a>
                            <button class="px-2 py-1 text-xs font-bold bg-[#3C94C5] text-white rounded transition-colors">
                                EN
                            </button>
                        <?php endif; ?>
                    </div>

                    <!-- Register Button -->
                    <a href="#"
                        class="hidden sm:block px-3 py-2 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition-colors text-xs sm:text-sm">
                        <?php echo e(__('navigation.register')); ?>

                    </a>

                    <!-- Partner Button -->
                    <a href="/sponsors"
                        class="px-2 py-1 sm:px-3 sm:py-2 bg-[#3C94C5] text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors text-xs sm:text-sm">
                        <?php echo e(__('navigation.become_partner')); ?>

                    </a>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden text-gray-400 hover:text-white transition-colors" id="mobile-menu-btn">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Navigation Links -->
        <div class="hidden md:flex items-center justify-center h-16 gap-8" id="nav-menu">
            <a href="/home"
                class="text-gray-300 hover:text-white font-medium transition-all duration-300 pb-2 relative nav-link-underline hover:after:content-[''] hover:after:absolute hover:after:bottom-0 hover:after:left-0 hover:after:right-0 hover:after:h-0.5 <?php echo e(request()->is('home') || request()->is('/') ? 'nav-link-active text-white' : ''); ?>">
                <?php echo e(__('navigation.home')); ?>

            </a>

            <a href="/100climateleaders"
                class="text-gray-300 hover:text-white font-medium transition-all duration-300 pb-2 relative nav-link-underline hover:after:content-[''] hover:after:absolute hover:after:bottom-0 hover:after:left-0 hover:after:right-0 hover:after:h-0.5 <?php echo e(request()->is('100climateleaders') ? 'nav-link-active text-white' : ''); ?>">
                <?php echo e(__('navigation.100 climate leaders')); ?>

            </a>

            <a href="/speakers"
                class="text-gray-300 hover:text-white font-medium transition-all duration-300 pb-2 relative nav-link-underline hover:after:content-[''] hover:after:absolute hover:after:bottom-0 hover:after:left-0 hover:after:right-0 hover:after:h-0.5 <?php echo e(request()->is('speakers') ? 'nav-link-active text-white' : ''); ?>">
                <?php echo e(__('navigation.speakers')); ?>

            </a>

            <a href="exhibit"
                class="text-gray-300 hover:text-white font-medium transition-all duration-300 pb-2 relative nav-link-underline hover:after:content-[''] hover:after:absolute hover:after:bottom-0 hover:after:left-0 hover:after:right-0 hover:after:h-0.5 <?php echo e(request()->is('exhibitors') ? 'nav-link-active text-white' : ''); ?>">
                <?php echo e(__('navigation.exhibitors')); ?>

            </a>

            <a href="/sponsors"
                class="text-gray-300 hover:text-white font-medium transition-all duration-300 pb-2 relative nav-link-underline hover:after:content-[''] hover:after:absolute hover:after:bottom-0 hover:after:left-0 hover:after:right-0 hover:after:h-0.5 <?php echo e(request()->is('sponsors') ? 'nav-link-active text-white' : ''); ?>">
                <?php echo e(__('navigation.sponsors')); ?>

            </a>



            <a href="#"
                class="text-gray-300 hover:text-white font-medium transition-all duration-300 pb-2 relative nav-link-underline hover:after:content-[''] hover:after:absolute hover:after:bottom-0 hover:after:left-0 hover:after:right-0 hover:after:h-0.5 <?php echo e(request()->is('contact') ? 'nav-link-active text-white' : ''); ?>">
                <?php echo e(__('navigation.contact')); ?>

            </a>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="hidden md:hidden pb-4" id="mobile-nav-menu">
            <div class="flex gap-2 px-3 py-2 mb-4">
                <a href="#"
                    class="flex-1 px-3 py-2 bg-white text-gray-900 font-semibold rounded-lg hover:bg-gray-100 transition-colors text-xs text-center">
                    <?php echo e(__('navigation.register')); ?>

                </a>
                <a href="#"
                    class="flex-1 px-3 py-2 bg-[#3C94C5] text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors text-xs text-center">
                    <?php echo e(__('navigation.become_partner')); ?>

                </a>
            </div>
            <a href="/home"
                class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded transition-colors">
                <?php echo e(__('navigation.home')); ?>

            </a>

            <a href="/100climateleaders"
                class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded transition-colors">
                <?php echo e(__('navigation.100 climate leaders')); ?>

            </a>

            <a href="/speakers"
                class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded transition-colors">
                <?php echo e(__('navigation.speakers')); ?>

            </a>
            <a href="/exhibit"
                class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded transition-colors">
                <?php echo e(__('navigation.exhibitors')); ?>

            </a>
            <a href="/sponsors"
                class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded transition-colors">
                <?php echo e(__('navigation.sponsors')); ?>

            </a>


            <a href="#"
                class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded transition-colors">
                <?php echo e(__('navigation.contact')); ?>

            </a>
        </div>
    </div>
</nav>

<!-- Mobile Menu Toggle Script -->
<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function () {
        document.getElementById('mobile-nav-menu').classList.toggle('hidden');
    });
</script><?php /**PATH C:\laragon\www\SCW-app\resources\views/partials/navigation.blade.php ENDPATH**/ ?>