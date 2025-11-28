<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Saudi Climate Week 2026 - Driving Regional Climate Action & Clean Energy Innovation">
    <link rel="icon" type="image/x-icon" href="/images/scw-logo.webp">
    <link rel="apple-touch-icon" href="/images/scw-logo.webp">
    @vite('resources/css/app.css')

    <title>Saudi Climate Week 2026</title>
</head>

<body class="bg-black" Desktop View (1512px and above) -->
    <div class="hidden xl:block w-[1512px] h-28 relative">
        <div class="w-[1512px] h-28 left-0 top-0 absolute bg-zinc-900"></div>
        <div class="w-44 h-7 left-[317px] top-[31px] absolute justify-center"><span
                class="text-white text-2xl font-bold font-['Montserrat'] leading-7">24 - 27 </span><span
                class="text-white text-base font-medium font-['Montserrat'] leading-7">May, 2026</span></div>
        <div
            class="w-64 h-5 left-[317px] top-[67px] absolute justify-center text-white text-base font-medium font-['Montserrat'] leading-5">
            Riyadh, Saudi Arabia</div>
        <div class="left-[1115px] top-[23px] absolute inline-flex flex-col justify-start items-start gap-[5px]">
            <div
                class="self-stretch h-4 justify-center text-white text-xs font-normal font-['Montserrat'] uppercase leading-10">
                Organized by:</div>
            <div class="inline-flex justify-start pt-3 gap-1 ">
                <div class="w-24 inline-flex flex-col justify-start items-start">
                    <img class="self-stretch h-12" src="/images/ecocode-logo.webp" />
                </div>
                <div class="w-9 h-0 origin-top-left rotate-90 outline-1 outline-white">
                </div>
                <div class="w-20 inline-flex flex-col justify-start items-start">
                    <img class="self-stretch h-12" src="/images/birba-logo-white.webp" />
                </div>
            </div>
        </div>
        <div
            class="w-[511px] h-40 left-[171px] top-[383px] absolute justify-start text-white text-7xl font-bold font-['Montserrat']">
            Saudi Climate Week 2026</div>
        <img class="w-24 h-16 left-[171px] top-[23px] absolute" src="/images/scw-logo.webp" />
    </div>

    <!-- Mobile & Tablet View (Below 1280px) -->
    <div class="xl:hidden w-full bg-zinc-900 py-6 sm:py-8 md:py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <!-- Top Section: Logo and Date/Location -->
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-6 mb-6 sm:mb-8">
                <!-- Logo -->
                <div class="shrink-0">
                    <img class="h-12 sm:h-14 md:h-16 w-auto" src="/images/scw-logo.webp" alt="SCW Logo" />
                </div>

                <!-- Date and Location -->
                <div class="flex flex-col gap-1">
                    <div class="flex flex-wrap gap-2 items-center">
                        <span class="text-lg sm:text-2xl font-bold font-['Montserrat'] text-white">24 - 27</span>
                        <span class="text-sm sm:text-base font-medium font-['Montserrat'] text-white">May, 2026</span>
                    </div>
                    <div class="text-sm sm:text-base font-medium font-['Montserrat'] text-white">
                        Riyadh, Saudi Arabia
                    </div>
                </div>

                <!-- Organized By -->
                <div class="flex flex-col gap-2 w-full sm:w-auto">
                    <div class="text-xs font-normal font-['Montserrat'] uppercase text-white tracking-wide">
                        Organized by:
                    </div>
                    <div class="flex justify-start items-center gap-2 sm:gap-3">
                        <div class="h-10 sm:h-12 shrink-0">
                            <img class="h-full w-auto object-contain" src="/images/ecocode-logo.webp"
                                alt="Ecocode Logo" />
                        </div>
                        <div class="h-10 sm:h-12 w-0.5 bg-white opacity-30"></div>
                        <div class="h-10 sm:h-12 shrink-0">
                            <img class="h-full w-auto object-contain" src="/images/birba-logo-white.webp"
                                alt="Birba Logo" />
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Desktop View (1512px and above) - Hero Section -->
    <div class="hidden xl:block w-[1512px] h-[714px] relative">
        <img class="w-[1512px] h-[714px] left-0 top-0 absolute object-cover" src="/images/bg-scw.webp" />
        <div
            class="w-[1512px] h-[714px] left-0 top-0 absolute bg-gradient-to-b from-black via-transparent to-black opacity-60">
        </div>
        <div class="flex">
            <div>
                <div class="w-2xl h-16 left-[171px] top-[80px] absolute">
                    <img src="/images/section.webp" />
                </div>
            </div>
            <div
                class="w-[529px] h-50 left-[171px] top-[300px] right-[100px] absolute justify-start text-white text-[80px] font-bold font-['montserrat'] leading-[85px]">
                Saudi Climate <br> Week 2026
            </div>
            <div
                class="w-[529px] h-40 left-[171px] top-[480px] right-[100px] absolute justify-start text-white text-[26px] font-semibold font-['montserrat'] leading-[40px] ">
                Driving Regional Climate Action & Clean Energy Innovation
            </div>




            <div class="w-[541px] h-[529px] relative ml-auto mr-[171px] mt-[67px] mb-[118px]">
                <div class="w-[541px] h-[529px] left-0 top-0 absolute bg-zinc-900 rounded-3xl border-2 border-blue-500">
                </div>


                <!-- error if found -->
                @if ($errors->any())
                    <div class="absolute top-4 right-4 z-10 w-[320px] sm:w-[380px] md:w-[420px] animate-in fade-in slide-in-from-top-2 duration-300"
                        role="alert">
                        <div
                            class="bg-red-50 border-l-4 border-red-500 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                            <div class="flex gap-4 p-4">
                                <div class="shrink-0 flex items-start justify-center pt-0.5">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-red-900 text-sm mb-2">Validation Error</h3>
                                    <ul class="space-y-1 text-red-800 text-xs">
                                        @foreach ($errors->all() as $error)
                                            <li class="flex gap-2">
                                                <span class="text-red-500 shrink-0">•</span>
                                                <span>{{ $error }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button onclick="this.closest('[role=alert]').parentElement.style.display='none'"
                                    class="shrink-0 text-red-600 hover:text-red-800 hover:bg-red-100 rounded p-1 transition-colors"
                                    aria-label="Close">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- success message if found -->
                @if (session('success'))
                    <div class="absolute top-4 right-4 z-10 w-[320px] sm:w-[380px] md:w-[420px] animate-in fade-in slide-in-from-top-2 duration-300"
                        role="status">
                        <div
                            class="bg-green-50 border-l-4 border-green-500 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                            <div class="flex gap-4 p-4">
                                <div class="shrink-0 flex items-start justify-center pt-0.5">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-green-900 text-sm mb-1">Success</h3>
                                    <p class="text-green-800 text-xs leading-relaxed">{{ session('success') }}</p>
                                </div>
                                <button onclick="this.closest('[role=status]').parentElement.style.display='none'"
                                    class="shrink-0 text-green-600 hover:text-green-800 hover:bg-green-100 rounded p-1 transition-colors"
                                    aria-label="Close">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif


                <!-- Forum -->
                <form method="POST" action="{{ route('create') }}"
                    class="left-[43px] top-[162px] absolute bg-zinc-900 inline-flex flex-col justify-center items-center gap-9 p-5 rounded-lg">
                    @csrf
                    <div class="flex flex-col justify-center items-center gap-7 w-full">
                        <div class="flex flex-col justify-start items-start gap-5 w-full">
                            <!-- Row 1: Full Name & Designation -->
                            <div class="flex flex-col justify-center items-center gap-1.5 w-full">
                                <div class="inline-flex justify-start items-start gap-7 w-full">
                                    <div class="inline-flex flex-col justify-start items-start gap-1.5 flex-1">
                                        <label
                                            class="justify-start text-white text-sm font-medium font-['Montserrat'] leading-5">
                                            Full Name</label>
                                        <input type="text" name="name" required minlength="2" maxlength="100"
                                            class="w-full pl-3 pr-4 py-2 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-sm font-['Montserrat'] placeholder-slate-400 focus:outline-blue-500 focus:bg-white/10 @error('name') outline-2 outline-red-500 @enderror"
                                            placeholder="Enter Full Name" />
                                        @error('name')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="inline-flex flex-col justify-start items-start gap-1.5 flex-1">
                                        <label
                                            class="justify-start text-white text-sm font-medium font-['Montserrat'] leading-5">
                                            Designation</label>
                                        <input type="text" name="designation"
                                            class="w-full pl-3 pr-4 py-2 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-sm font-['Montserrat'] placeholder-slate-400 focus:outline-blue-500 focus:bg-white/10"
                                            placeholder="Designation" />
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2: Company & Website -->
                            <div class="inline-flex justify-start items-start gap-7 w-full">
                                <div class="inline-flex flex-col justify-start items-start gap-1.5 flex-1">
                                    <label
                                        class="justify-start text-white text-sm font-medium font-['Montserrat'] leading-5">
                                        Company</label>
                                    <input type="text" name="company"
                                        class="w-full pl-3 pr-4 py-2 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-sm font-['Montserrat'] placeholder-slate-400 focus:outline-blue-500 focus:bg-white/10"
                                        placeholder="Enter Company Name" />
                                </div>
                                <div class="inline-flex flex-col justify-start items-start gap-1.5 flex-1">
                                    <label
                                        class="justify-start text-white text-sm font-medium font-['Montserrat'] leading-5">
                                        Website</label>
                                    <input type="url" name="website"
                                        class="w-full pl-3 pr-4 py-2 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-sm font-['Montserrat'] placeholder-slate-400 focus:outline-blue-500 focus:bg-white/10"
                                        placeholder="https://example.com" />
                                </div>
                            </div>

                            <!-- Row 3: Email & Phone -->
                            <div class="inline-flex justify-start items-start gap-7 w-full">
                                <div class="inline-flex flex-col justify-start items-start gap-1.5 flex-1">
                                    <label
                                        class="justify-start text-white text-sm font-medium font-['Montserrat'] leading-5">
                                        Email</label>
                                    <input type="email" name="email" required class="w-full pl-3 pr-4 py-2 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-sm font-['Montserrat'] placeholder-slate-400 focus:outline-blue-500 focus:bg-white/10 
                                        @error('email') outline-2 outline-red-500 @enderror"
                                        placeholder="m@example.com" />
                                    @error('email')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                                </div>
                                <div class="inline-flex flex-col justify-start items-start gap-1.5 flex-1">
                                    <label
                                        class="justify-start text-white text-sm font-medium font-['Montserrat'] leading-5">
                                        Phone</label>
                                    <div class="flex justify-start items-center gap-2 w-full">
                                        <input type="tel" name="phone" required
                                            pattern="(\+\d{1,3})?[\s]?[\d\s\-]{8,15}"
                                            class="flex-1 pl-3 pr-4 py-2 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-sm font-['Montserrat'] placeholder-slate-400 focus:outline-blue-500 focus:bg-white/10 @error('phone') outline-2 outline-red-500 @enderror"
                                            placeholder="+968 95123456" />
                                    </div>
                                    @error('phone')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" data-state="Default" data-type="default"
                            class="self-stretch px-4 py-2 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 rounded-md inline-flex justify-center items-center gap-2.5 transition-colors">
                            <div class="justify-start text-white text-sm font-bold font-['Inter'] leading-6">Submit
                            </div>
                        </button>
                    </div>
                </form>
                <di
                    class="w-96 left-[46px] top-[54px] absolute bg-zinc-900 inline-flex flex-col justify-start items-center gap-2">
                    <div
                        class="self-stretch text-center justify-start text-white text-3xl font-extrabold font-['Montserrat'] leading-8">
                        Stay Updated</div>
                    <div
                        class="self-stretch text-center justify-start text-gray-300 text-sm font-normal font-['Montserrat'] leading-7">
                        Fill the form and we will contact you asa soon as possible</div>
            </div>
        </div>
    </div>
    </div>

    <!-- Mobile & Tablet View (Below 1280px) - Hero Section -->
    <div class="xl:hidden w-full  relative flex flex-col">
        <img class="w-full h-64 sm:h-96 md:h-[500px] object-cover" src="/images/bg-scw.webp" />
        <div class="absolute inset-0 bg-linear-to-b from-black via-black/50 to-black opacity-70"></div>

        <!-- Content Overlay -->
        <div class="absolute inset-0 flex flex-col  px-4 sm:px-6 md:px-8 py-12 sm:py-16 ">
            <!-- Section Icon -->
            <div class="mb-4 sm:mb-6">
                <img src="/images/section.webp" class="h-14 sm:h-8 md:h-10 w-auto" alt="Section Icon" />
            </div>

            <!-- Main Title -->
            <h1
                class="text-2xl sm:text-3xl md:text-5xl font-bold font-['montserrat'] text-white leading-tight mb-3 sm:mb-4 md:mb-6 text-center">
                Saudi Climate<br />Week 2026
            </h1>

            <!-- Subtitle -->
            <p
                class="w-50 text-sm sm:text-base md:text-lg text-gray-100 font-['montserrat'] leading-relaxed mb-6 sm:mb-10 max-w-sm sm:max-w-md text-center mx-auto">
                Driving Regional Climate Action & Clean Energy Innovation
            </p>
        </div>

        <!-- Form Section -->
        <div class="w-full bg-zinc-900 px-3 sm:px-6 md:px-8 py-6 sm:py-10 md:py-12  relative">
            <!-- Error/Success Messages for Mobile -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-red-50 border-l-4 border-red-500 flex items-start gap-3 animate-in fade-in slide-in-from-top-2 duration-300"
                    role="alert">
                    <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-red-900 mb-2">Validation Error</h3>
                        <ul class="space-y-1 text-red-800 text-xs">
                            @foreach ($errors->all() as $error)
                                <li class="flex gap-2">
                                    <span class="text-red-500 shrink-0">•</span>
                                    <span>{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <button onclick="this.closest('[role=alert]').style.display='none'"
                        class="shrink-0 text-red-600 hover:text-red-800 transition-colors" aria-label="Close">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-50 border-l-4 border-green-500 flex items-start gap-3 animate-in fade-in slide-in-from-top-2 duration-300"
                    role="status">
                    <svg class="w-5 h-5 text-green-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-green-900 mb-1">Success</h3>
                        <p class="text-green-800 text-xs leading-relaxed">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.closest('[role=status]').style.display='none'"
                        class="shrink-0 text-green-600 hover:text-green-800 transition-colors" aria-label="Close">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            <div class="max-w-xl sm:max-w-2xl mx-auto">
                <!-- Form Header -->
                <div class="text-center mb-6 sm:mb-8">
                    <h2
                        class="text-xl sm:text-2xl md:text-3xl font-extrabold font-['Montserrat'] text-white mb-1 sm:mb-2">
                        Stay Updated
                    </h2>
                    <p class="text-gray-300 text-xs sm:text-sm md:text-base font-['Montserrat']">
                        Fill the form and we will contact you as soon as possible
                    </p>
                </div>

                <!-- Form -->
                <form method="POST" action="{{ route('create') }}" class="space-y-4 sm:space-y-5">
                    @csrf
                    <!-- Row 1: Full Name & Designation -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div class="flex flex-col gap-1">
                            <label class="text-white text-xs sm:text-sm font-medium font-['Montserrat']">Full
                                Name</label>
                            <input type="text" name="name" required minlength="2" maxlength="100"
                                placeholder="Enter Full Name"
                                class="w-full px-3 py-2 sm:py-2.5 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-xs sm:text-sm font-['Montserrat'] placeholder-slate-500 focus:outline-blue-500 focus:bg-white/10 transition-all @error('name') outline-2 outline-red-500 @enderror" />
                            @error('name')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex flex-col gap-1">
                            <label
                                class="text-white text-xs sm:text-sm font-medium font-['Montserrat']">Designation</label>
                            <input type="text" name="designation" maxlength="100" placeholder="Enter Designation"
                                class="w-full px-3 py-2 sm:py-2.5 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-xs sm:text-sm font-['Montserrat'] placeholder-slate-500 focus:outline-blue-500 focus:bg-white/10 transition-all" />
                        </div>
                    </div>

                    <!-- Row 2: Company & Website -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div class="flex flex-col gap-1">
                            <label class="text-white text-xs sm:text-sm font-medium font-['Montserrat']">Company</label>
                            <input type="text" name="company" maxlength="100" placeholder="Enter Company Name"
                                class="w-full px-3 py-2 sm:py-2.5 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-xs sm:text-sm font-['Montserrat'] placeholder-slate-500 focus:outline-blue-500 focus:bg-white/10 transition-all" />
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-white text-xs sm:text-sm font-medium font-['Montserrat']">Website</label>
                            <input type="url" name="website" maxlength="255" placeholder="https://example.com"
                                class="w-full px-3 py-2 sm:py-2.5 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-xs sm:text-sm font-['Montserrat'] placeholder-slate-500 focus:outline-blue-500 focus:bg-white/10 transition-all @error('website') outline-2 outline-red-500 @enderror" />
                            @error('website')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Row 3: Email & Phone -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <div class="flex flex-col gap-1">
                            <label class="text-white text-xs sm:text-sm font-medium font-['Montserrat']">Email</label>
                            <input type="email" name="email" required placeholder="m@example.com"
                                class="w-full px-3 py-2 sm:py-2.5 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-xs sm:text-sm font-['Montserrat'] placeholder-slate-500 focus:outline-blue-500 focus:bg-white/10 transition-all @error('email') outline-2 outline-red-500 @enderror" />
                            @error('email')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>

                        <div class="flex flex-col gap-1">
                            <label class="text-white text-xs sm:text-sm font-medium font-['Montserrat']">Phone</label>
                            <div class="flex gap-2">
                                <input type="tel" name="phone" required pattern="(\+\d{1,3})?[\s]?[\d\s\-]{8,15}"
                                    placeholder="+968 95123456"
                                    class="flex-1 px-3 py-2 sm:py-2.5 bg-white/5 rounded-md outline-1 outline-slate-300/30 text-slate-300 text-xs sm:text-sm font-['Montserrat'] placeholder-slate-500 focus:outline-blue-500 focus:bg-white/10 transition-all @error('phone') outline-2 outline-red-500 @enderror" />
                            </div>
                            @error('phone')<span class="text-red-400 text-xs">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full px-4 py-2.5 sm:py-3 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 rounded-md inline-flex justify-center items-center gap-2.5 transition-colors font-bold text-white text-sm sm:text-base font-['Inter'] mt-2">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer section -->
    <div class="w-full bg-zinc-900 py-8 sm:py-10 px-4 sm:px-6 ">
        <div
            class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6 sm:gap-8">
            <!-- Left: Contact Section -->
            <div class="flex items-start sm:items-center gap-4">
                <img class="w-12 h-12 sm:w-14 sm:h-14 shrink-0" src="/images/contact.webp" alt="Contact" />
                <div class="flex flex-col gap-2">
                    <div class="text-white text-xs font-normal font-['Montserrat'] uppercase tracking-wide">
                        Contact us
                    </div>
                    <div class="text-blue-500 font-['Montserrat'] hover:text-blue-400 transition-colors">
                        <a href="mailto:Sales@birba.om">Sales@birba.om</a>
                    </div>
                </div>
            </div>

            <!-- Right: Copyright -->
            <div
                class="text-white text-xs sm:text-sm font-medium font-['Montserrat'] leading-6 text-left sm:text-right">
                © Copyright 2025 . All rights reserved Birba.
            </div>
        </div>
    </div>



</body>

</html>