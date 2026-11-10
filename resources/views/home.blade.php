<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBDTV - Premium Online TV Service | 300+ TV Channels</title>
    <meta name="description" content="Watch 300+ live TV channels from Bangladesh and around the world. Sports, Movies, News, Kids and more — all in one place.">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Remix Icon & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS (Vite with CDN fallback) -->
    @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            brand: {
                                red: '#E50914',
                                lightred: '#FFE5E7',
                            }
                        },
                        fontFamily: {
                            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: #fdfdfd;
        }
    </style>
</head>
<body class="text-slate-800 antialiased overflow-x-hidden selection:bg-red-500 selection:text-white">

    <!-- NAVBAR (Solid White Background with clean border/shadow) -->
    <header class="bg-white sticky top-0 z-50 border-b border-slate-100/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">

            <!-- Left: Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center group">
                    <img src="{{ asset('assets/images/MyBDTV-Logo.png') }}" alt="StreamTV Logo" class="h-10 sm:h-11 w-auto object-contain transition-transform duration-200 group-hover:scale-105">
                </a>
            </div>

            <!-- Center: Desktop Navigation Menu -->
            <nav class="hidden lg:flex items-center space-x-1 font-semibold text-sm">
                <a href="#" class="px-3.5 py-1.5 rounded-full bg-red-100/80 text-red-600 transition-colors">Home</a>
                <a href="#features" class="px-3 py-1.5 text-slate-600 hover:text-red-600 transition-colors">Features</a>
                <a href="#channels" class="px-3 py-1.5 text-slate-600 hover:text-red-600 transition-colors">Channels</a>
                <a href="#pricing" class="px-3 py-1.5 text-slate-600 hover:text-red-600 transition-colors">Pricing</a>
                <a href="#reviews" class="px-3 py-1.5 text-slate-600 hover:text-red-600 transition-colors">Reviews</a>
                <a href="#apps" class="px-3 py-1.5 text-slate-600 hover:text-red-600 transition-colors">Apps</a>
                <a href="#contact" class="px-3 py-1.5 text-slate-600 hover:text-red-600 transition-colors">Contact</a>
            </nav>

            <!-- Right: Action Buttons -->
            <div class="flex items-center gap-3 sm:gap-4">
                @auth
                    <span class="hidden sm:inline-flex text-xs font-bold text-slate-700 bg-slate-100 px-3 py-1.5 rounded-full">
                        Hi, {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hidden sm:inline-flex px-5 py-2 text-sm font-bold text-red-600 border border-red-500 rounded-full hover:bg-red-50/70 transition-all duration-200 cursor-pointer">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex px-6 py-2 text-sm font-bold text-red-600 border border-red-500 rounded-full hover:bg-red-50/70 transition-all duration-200">
                        Sign In
                    </a>
                @endauth

                <a href="#pricing" class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 rounded-full shadow-md shadow-red-500/25 hover:shadow-lg hover:shadow-red-500/40 transition-all duration-200">
                    Get Started
                </a>

                <!-- Mobile Hamburger Toggle -->
                <button id="mobileMenuBtn" type="button" class="lg:hidden p-2 rounded-lg text-slate-700 hover:bg-slate-100 focus:outline-none" aria-label="Toggle menu">
                    <i class="ri-menu-4-line text-2xl"></i>
                </button>
            </div>

        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden lg:hidden px-4 pt-2 pb-5 bg-white border-b border-slate-100 space-y-1">
            <a href="#" class="block px-4 py-2.5 rounded-xl bg-red-50 font-bold text-red-600">Home</a>
            <a href="#features" class="block px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium">Features</a>
            <a href="#channels" class="block px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium">Channels</a>
            <a href="#pricing" class="block px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium">Pricing</a>
            <a href="#reviews" class="block px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium">Reviews</a>
            <a href="#apps" class="block px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium">Apps</a>
            <a href="#contact" class="block px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium">Contact</a>
            <div class="pt-3 border-t border-slate-100">
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-center py-2.5 text-sm font-bold text-red-600 border border-red-500 rounded-full cursor-pointer">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-center py-2.5 text-sm font-bold text-red-600 border border-red-500 rounded-full">Sign In</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- HERO SECTION WITH FULL RED WAVE GEOMETRIC BACKGROUND SHAPE -->
    <section class="relative w-full overflow-hidden bg-white">

        <!-- Full Hero Background Image (Glossy Red Wave Abstract Shape) -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            <img
                src="{{ asset('assets/images/Glossy Red Wave Abstract Background.png') }}"
                alt="Background Geometric Red Wave"
                class="w-full h-full object-cover object-right lg:object-right-top"
            />
            <!-- Left-side smooth white gradient fade to keep text ultra-crisp & high contrast -->
            <div class="absolute inset-0 bg-gradient-to-r from-white via-white/85 sm:via-white/70 to-transparent w-full lg:w-[60%]"></div>
        </div>

        <!-- Content Area -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 sm:pt-10 pb-12 sm:pb-14">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-4 items-center">

                <!-- Left Column: Copy & CTAs -->
                <div class="lg:col-span-5 text-left space-y-6 z-20">

                    <!-- Top Pill Tag -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-50 border border-red-200/80 shadow-xs">
                        <i class="ri-tv-2-line text-red-600 text-sm"></i>
                        <span class="text-xs font-bold text-red-600 tracking-wide uppercase">
                            Live TV &bull; Movies &bull; Sports &bull; News
                        </span>
                    </div>

                    <!-- Hero Main Heading -->
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.16]">
                        Watch Your <br class="hidden sm:inline">
                        Favorite TV Channels <br class="hidden sm:inline">
                        Online, <span class="relative inline-block text-red-600">
                            Anytime
                            <!-- Hand-drawn style red underline SVG -->
                            <svg class="absolute -bottom-2 left-0 w-full h-3 text-red-600 pointer-events-none" viewBox="0 0 100 12" fill="none" preserveAspectRatio="none">
                                <path d="M2,9 Q48,1 98,8" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </h1>

                    <!-- Description -->
                    <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-lg font-normal">
                        Stream 400+ live TV channels from Bangladesh and around the world, Sports, Movies, News, Kids and more — all in one place.
                    </p>

                    <!-- Call To Action Buttons -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <!-- Red Play Button -->
                        <a href="https://play.google.com/store/apps/details?id=com.ottplay.ottplay&hl=en" target="_blank" class="inline-flex items-center gap-2.5 px-6 py-3.5 text-sm font-bold text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 rounded-full shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 transition-all duration-200 group">
                            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-white/20 group-hover:scale-110 transition-transform">
                                <i class="ri-play-fill text-white text-xs ml-0.5"></i>
                            </span>
                            Start Watching Now
                        </a>

                        <!-- White Secondary Button -->
                        <a href="#pricing" class="inline-flex items-center gap-2 px-6 py-3.5 text-sm font-bold text-slate-800 bg-white hover:bg-slate-50 border border-slate-200 rounded-full shadow-xs hover:shadow-md transition-all duration-200 group">
                            View Plans
                            <i class="ri-arrow-right-line text-slate-400 group-hover:text-slate-800 group-hover:translate-x-1 transition-all"></i>
                        </a>
                    </div>

                    <!-- Highlights Counters -->
                    <div class="pt-4 grid grid-cols-3 gap-3 border-t border-slate-200/80 max-w-md">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center shrink-0">
                                <i class="ri-tv-line text-red-600 text-base"></i>
                            </div>
                            <div>
                                <div class="text-sm font-extrabold text-slate-900 leading-tight">400+</div>
                                <div class="text-[11px] font-medium text-slate-500">TV Channels</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center shrink-0">
                                <i class="ri-global-line text-red-600 text-base"></i>
                            </div>
                            <div>
                                <div class="text-sm font-extrabold text-slate-900 leading-tight">50+</div>
                                <div class="text-[11px] font-medium text-slate-500">Countries</div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center shrink-0">
                                <i class="ri-headphone-line text-red-600 text-base"></i>
                            </div>
                            <div>
                                <div class="text-sm font-extrabold text-slate-900 leading-tight">24/7</div>
                                <div class="text-[11px] font-medium text-slate-500">Live Support</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Transparent Smart TV Image positioned on top of the red geometric shape -->
                <div class="lg:col-span-7 flex justify-center lg:justify-end relative z-10">
                    <div class="relative w-full max-w-2xl sm:max-w-3xl lg:max-w-none lg:w-[155%] xl:w-[170%] 2xl:w-[180%] lg:-mr-24 xl:-mr-44 lg:-my-8 transition-all">
                        <!-- Drop Shadow below TV to blend onto background -->
                        <img
                            src="{{ asset('assets/images/MyBDTV Sports Live Smart TV.png') }}"
                            alt="MyBDTV Sports Live Smart TV"
                            class="w-full h-auto object-contain drop-shadow-[0_28px_50px_rgba(0,0,0,0.38)] hover:scale-[1.01] transition-transform duration-300"
                        />
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- BOTTOM FEATURE HIGHLIGHTS BAR -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 relative z-20">
        <div class="bg-white/95 backdrop-blur-md rounded-2xl sm:rounded-3xl border border-red-100/90 shadow-xl shadow-slate-200/50 p-5 sm:p-6 lg:p-7">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 sm:gap-4 items-center divide-y lg:divide-y-0 lg:divide-x divide-slate-100">

                <!-- Feature 1 -->
                <div class="flex items-center gap-3.5 pt-3 lg:pt-0 lg:px-3">
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center shrink-0 text-red-600">
                        <i class="ri-tv-line text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-slate-900 leading-tight">400+</div>
                        <div class="text-xs font-medium text-slate-500 mt-0.5">Live Channels</div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="flex items-center gap-3.5 pt-3 lg:pt-0 lg:px-3">
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center shrink-0 text-red-600">
                        <i class="ri-film-line text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-slate-900 leading-tight">10,000+</div>
                        <div class="text-xs font-medium text-slate-500 mt-0.5">Movies & Shows</div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="flex items-center gap-3.5 pt-3 lg:pt-0 lg:px-3">
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center shrink-0 text-red-600">
                        <i class="ri-hd-line text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-slate-900 leading-tight">HD & FHD</div>
                        <div class="text-xs font-medium text-slate-500 mt-0.5">Streaming Quality</div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="flex items-center gap-3.5 pt-3 lg:pt-0 lg:px-3">
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center shrink-0 text-red-600">
                        <i class="ri-smartphone-line text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-slate-900 leading-tight">Multi-Device</div>
                        <div class="text-xs font-medium text-slate-500 mt-0.5">TV, Mobile, Web</div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="flex items-center gap-3.5 pt-3 lg:pt-0 lg:px-3">
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center shrink-0 text-red-600">
                        <i class="ri-flashlight-line text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-sm sm:text-base font-extrabold text-slate-900 leading-tight">99.9%</div>
                        <div class="text-xs font-medium text-slate-500 mt-0.5">Server Uptime</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- WHY CHOOSE STREAMTV SECTION -->
    <section id="features" class="py-16 sm:py-20 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Why Choose <span class="text-red-600">StreamTV?</span>
                </h2>
                <p class="text-slate-500 text-sm sm:text-base mt-2 font-medium">
                    A complete entertainment solution with premium features
                </p>
            </div>

            <!-- 4 Feature Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card 1: Live TV Streaming -->
                <div class="group relative rounded-3xl p-6 sm:p-7 bg-gradient-to-b from-[#FFF5F6] via-[#FFF8F8] to-white border border-red-100/70 shadow-sm hover:shadow-xl hover:border-red-300 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">
                    <div>
                        <!-- Icon -->
                        <div class="w-12 h-12 rounded-2xl bg-white shadow-xs border border-red-100 flex items-center justify-center text-red-600 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 mb-5">
                            <i class="ri-broadcast-line text-2xl"></i>
                        </div>
                        <!-- Title -->
                        <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">
                            Live TV Streaming
                        </h3>
                        <!-- Description -->
                        <p class="text-slate-600 text-sm leading-relaxed mt-2.5">
                            Watch 400+ local and international TV channels in real time.
                        </p>
                    </div>
                    <!-- Subtle Hover Accent Line -->
                    <div class="w-8 h-1 rounded-full bg-red-600/30 group-hover:w-16 group-hover:bg-red-600 transition-all duration-300 mt-6"></div>
                </div>

                <!-- Card 2: HD & 4K Quality -->
                <div class="group relative rounded-3xl p-6 sm:p-7 bg-gradient-to-b from-[#FFF5F6] via-[#FFF8F8] to-white border border-red-100/70 shadow-sm hover:shadow-xl hover:border-red-300 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">
                    <div>
                        <!-- Icon (Badge Style HD/4K) -->
                        <div class="w-12 h-12 rounded-2xl bg-red-600 text-white font-black text-sm flex items-center justify-center shadow-md shadow-red-500/25 group-hover:scale-110 transition-transform duration-300 mb-5">
                            HD
                        </div>
                        <!-- Title -->
                        <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">
                            HD & 4K Quality
                        </h3>
                        <!-- Description -->
                        <p class="text-slate-600 text-sm leading-relaxed mt-2.5">
                            Enjoy crystal-clear streaming with HD and 4K support.
                        </p>
                    </div>
                    <div class="w-8 h-1 rounded-full bg-red-600/30 group-hover:w-16 group-hover:bg-red-600 transition-all duration-300 mt-6"></div>
                </div>

                <!-- Card 3: Watch on Any Device -->
                <div class="group relative rounded-3xl p-6 sm:p-7 bg-gradient-to-b from-[#FFF5F6] via-[#FFF8F8] to-white border border-red-100/70 shadow-sm hover:shadow-xl hover:border-red-300 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">
                    <div>
                        <!-- Icon -->
                        <div class="w-12 h-12 rounded-2xl bg-white shadow-xs border border-red-100 flex items-center justify-center text-red-600 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 mb-5">
                            <i class="ri-device-line text-2xl"></i>
                        </div>
                        <!-- Title -->
                        <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">
                            Watch on Any Device
                        </h3>
                        <!-- Description -->
                        <p class="text-slate-600 text-sm leading-relaxed mt-2.5">
                            Compatible with Android, Smart TV, TV Box, and Web Browser.
                        </p>
                    </div>
                    <div class="w-8 h-1 rounded-full bg-red-600/30 group-hover:w-16 group-hover:bg-red-600 transition-all duration-300 mt-6"></div>
                </div>

                <!-- Card 4: Regular Updates -->
                <div class="group relative rounded-3xl p-6 sm:p-7 bg-gradient-to-b from-[#FFF5F6] via-[#FFF8F8] to-white border border-red-100/70 shadow-sm hover:shadow-xl hover:border-red-300 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">
                    <div>
                        <!-- Icon -->
                        <div class="w-12 h-12 rounded-2xl bg-white shadow-xs border border-red-100 flex items-center justify-center text-red-600 group-hover:scale-110 group-hover:bg-red-600 group-hover:text-white transition-all duration-300 mb-5">
                            <i class="ri-loop-right-line text-2xl"></i>
                        </div>
                        <!-- Title -->
                        <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">
                            Regular Updates
                        </h3>
                        <!-- Description -->
                        <p class="text-slate-600 text-sm leading-relaxed mt-2.5">
                            New channels and features are added regularly for a better experience.
                        </p>
                    </div>
                    <div class="w-8 h-1 rounded-full bg-red-600/30 group-hover:w-16 group-hover:bg-red-600 transition-all duration-300 mt-6"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- SIMPLE & FLEXIBLE PRICING SECTION -->
    <section id="pricing" class="py-16 sm:py-24 bg-white relative overflow-hidden">

        <!-- Red curved accent background on sides matching first image style -->
        <div class="absolute -left-20 bottom-0 w-64 h-64 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -right-20 top-1/2 w-72 h-72 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-14 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Simple & Flexible <span class="text-red-600">Pricing</span>
                </h2>
                <p class="text-slate-500 text-sm sm:text-base mt-2 font-medium">
                    Choose the plan that suits your entertainment needs.
                </p>
            </div>

            @php
                $hasDynamicPackages = isset($packages) && $packages->isNotEmpty();
                $monthlyPkg = $hasDynamicPackages ? $packages->first() : null;
                $yearlyPkg = $hasDynamicPackages ? $packages->first() : null;
                $monthlySavingsVal = ($monthlyPkg && $yearlyPkg && isset($monthlyPkg->price_monthly) && isset($yearlyPkg->price_yearly))
                    ? ($monthlyPkg->price_monthly * 12 - $yearlyPkg->price_yearly)
                    : 276;
            @endphp

            <!-- 2 Packages Grid (Centered & Matching 1st Image Style) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-3xl mx-auto items-stretch">

                <!-- Package 1: 123 Basic Package (Monthly) -->
                <div class="group relative rounded-[28px] p-7 sm:p-9 bg-white border border-red-100/90 shadow-lg shadow-slate-100/70 hover:shadow-2xl hover:border-red-300 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">
                    <div>
                        <!-- Title with Global Icon -->
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-10 h-10 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0">
                                <i class="ri-global-line text-xl"></i>
                            </div>
                            <h3 class="text-xl font-extrabold text-slate-900">
                                {{ $monthlyPkg->name ?? '123 Basic Package' }}
                            </h3>
                        </div>

                        <!-- Price -->
                        <div class="flex items-baseline gap-1.5 mb-6">
                            <span class="text-3xl sm:text-4xl font-black text-red-600">
                                ৳ {{ isset($monthlyPkg->price_monthly) ? number_format($monthlyPkg->price_monthly, 0) : '123' }}
                            </span>
                            <span class="text-sm font-semibold text-slate-500">BDT / month</span>
                        </div>

                        <!-- Feature List -->
                        <ul class="space-y-3.5 text-sm font-medium text-slate-700">
                            @if($monthlyPkg && !empty($monthlyPkg->features))
                                @foreach($monthlyPkg->features as $feature)
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-red-600 text-base font-bold"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                                @endforeach
                            @else
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-red-600 text-base font-bold"></i>
                                    <span>Bangladeshi Live TV</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-red-600 text-base font-bold"></i>
                                    <span>Indian Live TV</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-red-600 text-base font-bold"></i>
                                    <span>Sports And Int. TV</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-8 pt-2">
                        @if($monthlyPkg && Route::has('subscribe.form'))
                            <a href="{{ route('subscribe.form', $monthlyPkg->id) }}?type=monthly" class="w-full inline-flex items-center justify-center py-3.5 px-6 rounded-full text-sm font-bold text-red-600 border-2 border-red-500/90 hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-200 shadow-xs hover:shadow-md">
                                Subscribe Now
                            </a>
                        @else
                            <a href="#subscribe" class="w-full inline-flex items-center justify-center py-3.5 px-6 rounded-full text-sm font-bold text-red-600 border-2 border-red-500/90 hover:bg-red-600 hover:text-white hover:border-red-600 transition-all duration-200 shadow-xs hover:shadow-md">
                                Subscribe Now
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Package 2: 123 Basic Package (Yearly) - Featured / Most Popular Red Card -->
                <div class="group relative rounded-[28px] p-7 sm:p-9 bg-gradient-to-br from-red-600 via-red-600 to-red-700 text-white shadow-2xl shadow-red-600/35 hover:shadow-red-600/50 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between">

                    <!-- Top Badge: Most Popular / SAVE BDT -->
                    <div class="absolute -top-3.5 right-8 px-4 py-1 rounded-full bg-amber-400 text-slate-950 text-xs font-black tracking-wider uppercase shadow-md flex items-center gap-1">
                        <i class="ri-fire-fill text-red-600"></i>
                        <span>SAVE {{ number_format($monthlySavingsVal, 0) }} BDT &bull; Most Popular</span>
                    </div>

                    <div>
                        <!-- Title with Crown Icon -->
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-10 h-10 rounded-full bg-white/20 text-white flex items-center justify-center shrink-0">
                                <i class="ri-vip-crown-2-line text-xl"></i>
                            </div>
                            <h3 class="text-xl font-extrabold text-white">
                                {{ $yearlyPkg->name ?? '123 Basic Package' }} (Yearly)
                            </h3>
                        </div>

                        <!-- Price -->
                        <div class="mb-1">
                            <div class="flex items-baseline gap-1.5">
                                <span class="text-3xl sm:text-4xl font-black text-white">
                                    ৳ {{ isset($yearlyPkg->price_yearly) ? number_format($yearlyPkg->price_yearly, 0) : '1,200' }}
                                </span>
                                <span class="text-sm font-semibold text-red-100">BDT / year</span>
                            </div>
                            <p class="text-xs font-semibold text-amber-200 mt-1">
                                Only {{ isset($yearlyPkg->price_yearly) ? number_format($yearlyPkg->price_yearly / 12, 0) : '100' }} BDT/month!
                            </p>
                        </div>

                        <!-- Feature List -->
                        <ul class="space-y-3.5 text-sm font-medium text-red-50 mt-6">
                            @if($yearlyPkg && !empty($yearlyPkg->features))
                                @foreach($yearlyPkg->features as $feature)
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-white text-base font-bold"></i>
                                    <span>{{ $feature }}</span>
                                </li>
                                @endforeach
                            @else
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-white text-base font-bold"></i>
                                    <span>Bangladeshi Live TV</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-white text-base font-bold"></i>
                                    <span>Indian Live TV</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="ri-check-line text-white text-base font-bold"></i>
                                    <span>Sports And Int. TV</span>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- CTA Button -->
                    <div class="mt-8 pt-2">
                        @if($yearlyPkg && Route::has('subscribe.form'))
                            <a href="{{ route('subscribe.form', $yearlyPkg->id) }}?type=yearly" class="w-full inline-flex items-center justify-center py-3.5 px-6 rounded-full text-sm font-black text-red-600 bg-white hover:bg-red-50 transition-all duration-200 shadow-lg shadow-black/10 hover:shadow-xl">
                                Best Value &ndash; Subscribe Now
                            </a>
                        @else
                            <a href="#subscribe" class="w-full inline-flex items-center justify-center py-3.5 px-6 rounded-full text-sm font-black text-red-600 bg-white hover:bg-red-50 transition-all duration-200 shadow-lg shadow-black/10 hover:shadow-xl">
                                Best Value &ndash; Subscribe Now
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- DOWNLOAD OUR APP SECTION (Styled with Site Red & Light Theme) -->
    <section id="apps" class="py-16 sm:py-24 bg-gradient-to-b from-white via-[#FFF8F8] to-[#FFF0F2] relative overflow-hidden">

        <!-- Subtle Red Glow Blurs -->
        <div class="absolute -right-20 top-1/3 w-80 h-80 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 bottom-10 w-80 h-80 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Outer Premium Card Container with soft red/white backdrop -->
            <div class="relative rounded-[32px] sm:rounded-[40px] bg-white border border-red-100 shadow-2xl shadow-red-500/10 p-8 sm:p-12 lg:p-16 overflow-hidden">

                <!-- Background decorative red curve / watermark -->
                <div class="absolute -right-10 -bottom-10 w-96 h-96 bg-gradient-to-br from-red-100/50 to-transparent rounded-full blur-2xl pointer-events-none"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">

                    <!-- Left Content Column -->
                    <div class="lg:col-span-7 space-y-6 text-left">

                        <!-- Mini Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-50 border border-red-200/80">
                            <i class="ri-smartphone-line text-red-600 text-sm"></i>
                            <span class="text-xs font-bold text-red-600 tracking-wide uppercase">
                                Mobile & Smart TV App
                            </span>
                        </div>

                        <!-- Heading -->
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">
                            Download Our <span class="text-red-600">App</span>
                        </h2>

                        <!-- Subtitle / Description -->
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-xl">
                            Get the Televizo app on your Android device. Easy to install, beautiful interface, and seamless streaming experience.
                        </p>

                        <!-- Feature Checklist with Brand Red Check Badges -->
                        <ul class="space-y-3.5 pt-2">
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-200">
                                    <i class="ri-check-line font-black text-sm"></i>
                                </span>
                                <span class="text-sm sm:text-[15px] font-semibold text-slate-800">Compatible with all Android devices</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-200">
                                    <i class="ri-check-line font-black text-sm"></i>
                                </span>
                                <span class="text-sm sm:text-[15px] font-semibold text-slate-800">Works on Android Smart TVs</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-200">
                                    <i class="ri-check-line font-black text-sm"></i>
                                </span>
                                <span class="text-sm sm:text-[15px] font-semibold text-slate-800">Chromecast support for bigger screens</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="w-6 h-6 rounded-full bg-red-50 text-red-600 flex items-center justify-center shrink-0 border border-red-200">
                                    <i class="ri-check-line font-black text-sm"></i>
                                </span>
                                <span class="text-sm sm:text-[15px] font-semibold text-slate-800">Regular updates with new features</span>
                            </li>
                        </ul>

                        <!-- Download Button -->
                        <div class="pt-4 flex flex-wrap items-center gap-4">
                            <a href="#download" class="inline-flex items-center gap-3 px-8 py-4 rounded-full text-sm font-extrabold text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 shadow-xl shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 transition-all duration-200 group">
                                <i class="ri-google-play-fill text-xl group-hover:scale-110 transition-transform"></i>
                                <span>Download from Google Play</span>
                            </a>
                        </div>

                    </div>

                    <!-- Right Device Mockup Column -->
                    <div class="lg:col-span-5 flex justify-center relative">

                        <div class="relative w-full max-w-md">

                            <!-- Tablet/Device Frame Border -->
                            <div class="relative mx-auto rounded-[32px] bg-slate-950 p-3 sm:p-4 shadow-2xl border-2 border-slate-800 ring-1 ring-white/10">

                                <!-- Screen Container -->
                                <div class="relative aspect-[4/3] rounded-[22px] overflow-hidden bg-slate-900 border border-slate-800">
                                    <!-- Device display background photo (smartphone / app showcase) -->
                                    <img
                                        src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=900&q=80"
                                        alt="App on Mobile Device"
                                        class="w-full h-full object-cover"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                </div>
                            </div>

                            <!-- Rating Badge Floating at Bottom Left (matching image) -->
                            <div class="absolute -bottom-5 left-4 sm:-left-4 bg-slate-950/95 backdrop-blur-md border border-red-500/40 rounded-2xl py-2.5 px-4 shadow-xl flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-amber-400 text-slate-950 font-black text-sm flex items-center justify-center shrink-0">
                                    4.8
                                </div>
                                <div>
                                    <div class="flex items-center gap-0.5 text-amber-400 text-xs">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-half-fill"></i>
                                    </div>
                                    <div class="text-[11px] font-bold text-slate-300 mt-0.5">
                                        10,000+ Reviews
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- WHAT OUR CUSTOMERS SAY (TESTIMONIALS SLIDER SECTION) -->
    <section id="reviews" class="py-16 sm:py-24 bg-white relative overflow-hidden">

        <!-- Side Background Red Wave Accents matching the image -->
        <div class="absolute -left-24 bottom-0 w-80 h-80 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -right-24 top-0 w-80 h-80 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight">
                    What Our <span class="text-red-600">Customers Say</span>
                </h2>
                <p class="text-slate-500 text-sm sm:text-base mt-2 font-medium">
                    Join thousands of satisfied users who trust StreamTV every day.
                </p>
            </div>

            <!-- Carousel Outer Wrap with Navigation Buttons -->
            <div class="relative px-2 sm:px-12">

                <!-- Left Nav Arrow Button -->
                <button
                    id="prevReviewBtn"
                    type="button"
                    aria-label="Previous review"
                    class="absolute -left-1 sm:left-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white hover:bg-red-50 border border-slate-200 hover:border-red-300 text-slate-700 hover:text-red-600 shadow-lg flex items-center justify-center transition-all duration-200 focus:outline-none hover:scale-105"
                >
                    <i class="ri-arrow-left-s-line text-2xl"></i>
                </button>

                <!-- Reviews Slider Container -->
                <div
                    id="reviewsSlider"
                    class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory scrollbar-none py-4 px-1"
                    style="scrollbar-width: none; -ms-overflow-style: none;"
                >

                    <!-- Review 1 -->
                    <div class="snap-start shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex">
                        <div class="w-full rounded-[24px] p-6 sm:p-7 bg-white border border-slate-200/90 hover:border-red-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <!-- 5 Stars -->
                                <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <!-- Quote -->
                                <p class="text-slate-700 text-sm sm:text-[15px] leading-relaxed font-normal">
                                    &ldquo;Amazing service! All my favorite Bangladeshi and international channels in one place. Very smooth and reliable.&rdquo;
                                </p>
                            </div>
                            <!-- User info -->
                            <div class="flex items-center gap-3.5 pt-6 mt-6 border-t border-slate-100">
                                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=120&h=120&q=80" alt="Rahim Ahmed" class="w-11 h-11 rounded-full object-cover ring-2 ring-red-100" />
                                <div>
                                    <h4 class="text-sm font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">Rahim Ahmed</h4>
                                    <p class="text-xs text-slate-400 font-medium">Dhaka, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="snap-start shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex">
                        <div class="w-full rounded-[24px] p-6 sm:p-7 bg-white border border-slate-200/90 hover:border-red-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p class="text-slate-700 text-sm sm:text-[15px] leading-relaxed font-normal">
                                    &ldquo;Video quality is excellent and there is no buffering. The pricing is also very reasonable. Highly recommended!&rdquo;
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-6 mt-6 border-t border-slate-100">
                                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=120&h=120&q=80" alt="Sarah Khan" class="w-11 h-11 rounded-full object-cover ring-2 ring-red-100" />
                                <div>
                                    <h4 class="text-sm font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">Sarah Khan</h4>
                                    <p class="text-xs text-slate-400 font-medium">Chattogram, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="snap-start shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex">
                        <div class="w-full rounded-[24px] p-6 sm:p-7 bg-white border border-slate-200/90 hover:border-red-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p class="text-slate-700 text-sm sm:text-[15px] leading-relaxed font-normal">
                                    &ldquo;I use StreamTV for sports and news. The channel collection is excellent and the app works perfectly on my Smart TV.&rdquo;
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-6 mt-6 border-t border-slate-100">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=120&h=120&q=80" alt="Mohammad Hasan" class="w-11 h-11 rounded-full object-cover ring-2 ring-red-100" />
                                <div>
                                    <h4 class="text-sm font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">Mohammad Hasan</h4>
                                    <p class="text-xs text-slate-400 font-medium">Sylhet, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 4 (Dummy 4) -->
                    <div class="snap-start shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex">
                        <div class="w-full rounded-[24px] p-6 sm:p-7 bg-white border border-slate-200/90 hover:border-red-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p class="text-slate-700 text-sm sm:text-[15px] leading-relaxed font-normal">
                                    &ldquo;Best streaming experience during cricket matches! Zero lag and picture-perfect HD quality. Customer support is super helpful.&rdquo;
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-6 mt-6 border-t border-slate-100">
                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=120&h=120&q=80" alt="Tanvir Chowdhury" class="w-11 h-11 rounded-full object-cover ring-2 ring-red-100" />
                                <div>
                                    <h4 class="text-sm font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">Tanvir Chowdhury</h4>
                                    <p class="text-xs text-slate-400 font-medium">Rajshahi, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 5 (Dummy 5) -->
                    <div class="snap-start shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] flex">
                        <div class="w-full rounded-[24px] p-6 sm:p-7 bg-white border border-slate-200/90 hover:border-red-300 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div>
                                <div class="flex items-center gap-1 text-amber-400 text-sm mb-4">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                </div>
                                <p class="text-slate-700 text-sm sm:text-[15px] leading-relaxed font-normal">
                                    &ldquo;My entire family loves it. The yearly plan is incredible value for money. Setup on our Android TV took less than two minutes!&rdquo;
                                </p>
                            </div>
                            <div class="flex items-center gap-3.5 pt-6 mt-6 border-t border-slate-100">
                                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=120&h=120&q=80" alt="Nusrat Jahan" class="w-11 h-11 rounded-full object-cover ring-2 ring-red-100" />
                                <div>
                                    <h4 class="text-sm font-extrabold text-slate-900 group-hover:text-red-600 transition-colors">Nusrat Jahan</h4>
                                    <p class="text-xs text-slate-400 font-medium">Khulna, Bangladesh</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Nav Arrow Button -->
                <button
                    id="nextReviewBtn"
                    type="button"
                    aria-label="Next review"
                    class="absolute -right-1 sm:right-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white hover:bg-red-50 border border-slate-200 hover:border-red-300 text-slate-700 hover:text-red-600 shadow-lg flex items-center justify-center transition-all duration-200 focus:outline-none hover:scale-105"
                >
                    <i class="ri-arrow-right-s-line text-2xl"></i>
                </button>
            </div>

            <!-- Dots Indicator matching the image -->
            <div class="flex items-center justify-center gap-2 mt-8" id="sliderDots">
                <span class="dot-indicator w-2.5 h-2.5 rounded-full bg-red-600 transition-all duration-300"></span>
                <span class="dot-indicator w-2.5 h-2.5 rounded-full bg-red-200 transition-all duration-300"></span>
                <span class="dot-indicator w-2.5 h-2.5 rounded-full bg-red-200 transition-all duration-300"></span>
            </div>

        </div>
    </section>

    <!-- GET IN TOUCH / CONTACT SECTION -->
    <section id="support" class="py-16 sm:py-20 relative overflow-hidden bg-white">

        <!-- Background Red Wave Abstract Images for Left & Right matching the banner -->
        <div class="absolute inset-0 pointer-events-none z-0 overflow-hidden">
            <!-- Left Red Wave Shape -->
            {{-- <img
                src="{{ asset('assets/images/background.png') }}"
                alt="Wave left"
                class="absolute -left-20 -bottom-10 h-full w-auto max-w-none opacity-90 scale-x-[-1] object-contain pointer-events-none" --}}
            />
            <!-- Right Red Wave Shape -->
            <img
                src="{{ asset('assets/images/background.png') }}"
                alt="Wave right"
                class="absolute -right-20 -bottom-10 h-full w-auto max-w-none opacity-90 object-contain pointer-events-none"
            />
            <!-- Center white overlay gradient to keep the content clear -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/80 to-transparent"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">

                <!-- Left Column: Contact Info -->
                <div class="lg:col-span-5 space-y-6 text-left">

                    <div>
                        <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                            Get in <span class="text-red-600">Touch</span>
                        </h2>
                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed mt-2.5 font-normal">
                            Have questions? Need support? We're here to help!<br class="hidden sm:inline">
                            Reach out to us and we'll respond as soon as possible.
                        </p>
                    </div>

                    <!-- Contact Details List with Red Circle Icons -->
                    <div class="space-y-4 pt-2">

                        <!-- Phone -->
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-full bg-red-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-red-500/25">
                                <i class="ri-phone-fill text-xl"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900 uppercase tracking-wide">Phone</div>
                                <a href="tel:+8801686476476" class="text-sm font-semibold text-slate-700 hover:text-red-600 transition-colors">
                                    +880 1686 476 476
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-full bg-red-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-red-500/25">
                                <i class="ri-mail-fill text-xl"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900 uppercase tracking-wide">Email</div>
                                <a href="mailto:support@streamtv.com" class="text-sm font-semibold text-slate-700 hover:text-red-600 transition-colors">
                                    support@streamtv.com
                                </a>
                            </div>
                        </div>

                        <!-- Support Hours -->
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-full bg-red-600 text-white flex items-center justify-center shrink-0 shadow-md shadow-red-500/25">
                                <i class="ri-time-fill text-xl"></i>
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-900 uppercase tracking-wide">Support Hours</div>
                                <div class="text-sm font-semibold text-slate-700">
                                    24/7 (Everyday)
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Right Column: Contact Form in White Rounded Card -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-[28px] p-6 sm:p-9 border border-slate-200/90 shadow-xl shadow-slate-200/50">
                        <form action="#send-message" method="POST" onsubmit="event.preventDefault();" class="space-y-4 sm:space-y-5">

                            <!-- Row 1: Name & Email -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-extrabold text-slate-800 mb-1.5">
                                        Your Name <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Enter your name"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl bg-white border border-slate-200 text-slate-800 text-sm placeholder:text-slate-400 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                                    />
                                </div>

                                <div>
                                    <label class="block text-xs font-extrabold text-slate-800 mb-1.5">
                                        Email Address <span class="text-red-600">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        placeholder="Enter your email"
                                        required
                                        class="w-full px-4 py-3 rounded-2xl bg-white border border-slate-200 text-slate-800 text-sm placeholder:text-slate-400 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all"
                                    />
                                </div>
                            </div>

                            <!-- Row 2: Subject Dropdown -->
                            <div>
                                <label class="block text-xs font-extrabold text-slate-800 mb-1.5">
                                    Subject
                                </label>
                                <div class="relative">
                                    <select class="w-full appearance-none px-4 py-3 rounded-2xl bg-white border border-slate-200 text-slate-700 text-sm focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all cursor-pointer">
                                        <option value="">Select a subject</option>
                                        <option value="subscription">Subscription & Pricing</option>
                                        <option value="technical">Technical Support / Streaming Issue</option>
                                        <option value="app">App Setup on TV / Mobile</option>
                                        <option value="other">General Inquiry</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg pointer-events-none"></i>
                                </div>
                            </div>

                            <!-- Row 3: Message -->
                            <div>
                                <label class="block text-xs font-extrabold text-slate-800 mb-1.5">
                                    Message <span class="text-red-600">*</span>
                                </label>
                                <textarea
                                    rows="4"
                                    placeholder="Write your message here..."
                                    required
                                    class="w-full px-4 py-3 rounded-2xl bg-white border border-slate-200 text-slate-800 text-sm placeholder:text-slate-400 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition-all resize-none"
                                ></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button
                                    type="submit"
                                    class="w-full py-3.5 px-6 rounded-full text-sm font-black text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 shadow-lg shadow-red-500/30 hover:shadow-red-500/50 hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2 group cursor-pointer"
                                >
                                    <i class="ri-send-plane-fill group-hover:translate-x-1 group-hover:-translate-y-0.5 transition-transform"></i>
                                    <span>Send Message</span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER SECTION (Dark Reddish Black Gradient matching the reference) -->
    <footer class="relative bg-gradient-to-b from-[#180305] via-[#120204] to-[#0A0102] text-white pt-14 pb-8 overflow-hidden border-t border-red-950/60">

        <!-- Subtle Red Ambient Glow in Footer Background -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[600px] h-32 bg-red-600/15 blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Top Footer Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-12 border-b border-white/10">

                <!-- Col 1: Brand Info (Leftmost with divider) -->
                <div class="lg:col-span-4 space-y-4 lg:pr-8 lg:border-r lg:border-white/10">
                    <a href="/" class="inline-flex items-center group">
                        <img src="{{ asset('assets/images/MyBDTV-Logo.png') }}" alt="StreamTV Logo" class="h-10 w-auto object-contain brightness-0 invert">
                    </a>

                    <p class="text-slate-300 text-xs sm:text-sm leading-relaxed max-w-sm font-normal">
                        Your all-in-one online TV platform. Watch live TV, movies, sports, news and more &mdash; anytime, anywhere.
                    </p>

                    <!-- Circular White Social Icons matching image -->
                    <div class="flex items-center gap-2.5 pt-2">
                        <a href="#" class="w-8 h-8 rounded-full bg-white hover:bg-red-600 text-slate-900 hover:text-white flex items-center justify-center transition-colors shadow-sm">
                            <i class="ri-facebook-fill text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white hover:bg-red-600 text-slate-900 hover:text-white flex items-center justify-center transition-colors shadow-sm">
                            <i class="ri-youtube-fill text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white hover:bg-red-600 text-slate-900 hover:text-white flex items-center justify-center transition-colors shadow-sm">
                            <i class="ri-twitter-x-fill text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white hover:bg-red-600 text-slate-900 hover:text-white flex items-center justify-center transition-colors shadow-sm">
                            <i class="ri-instagram-line text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-white hover:bg-red-600 text-slate-900 hover:text-white flex items-center justify-center transition-colors shadow-sm">
                            <i class="ri-telegram-fill text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="lg:col-span-2">
                    <h4 class="text-white text-sm font-bold tracking-tight mb-4">Quick Links</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-slate-300 font-normal">
                        <li><a href="#" class="hover:text-red-400 transition-colors">Home</a></li>
                        <li><a href="#features" class="hover:text-red-400 transition-colors">Features</a></li>
                        <li><a href="#channels" class="hover:text-red-400 transition-colors">Channels</a></li>
                        <li><a href="#pricing" class="hover:text-red-400 transition-colors">Pricing</a></li>
                        <li><a href="{{ Route::has('customer.login') ? route('customer.login') : '#signin' }}" class="hover:text-red-400 transition-colors">Login</a></li>
                    </ul>
                </div>

                <!-- Col 3: Support -->
                <div class="lg:col-span-2">
                    <h4 class="text-white text-sm font-bold tracking-tight mb-4">Support</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-slate-300 font-normal">
                        <li><a href="#support" class="hover:text-red-400 transition-colors">Help Center</a></li>
                        <li><a href="#support" class="hover:text-red-400 transition-colors">Contact Us</a></li>
                        <li><a href="#support" class="hover:text-red-400 transition-colors">FAQs</a></li>
                        <li><a href="#apps" class="hover:text-red-400 transition-colors">App Download</a></li>
                    </ul>
                </div>

                <!-- Col 4: Legal -->
                <div class="lg:col-span-2">
                    <h4 class="text-white text-sm font-bold tracking-tight mb-4">Legal</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm text-slate-300 font-normal">
                        <li><a href="#" class="hover:text-red-400 transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-red-400 transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-red-400 transition-colors">Refund Policy</a></li>
                    </ul>
                </div>

                <!-- Col 5: Stay Updated (Newsletter Input) -->
                <div class="lg:col-span-2 space-y-3">
                    <h4 class="text-white text-sm font-bold tracking-tight">Stay Updated</h4>
                    <p class="text-slate-300 text-xs leading-relaxed">
                        Subscribe to get latest updates, new channels and special offers.
                    </p>

                    <!-- Search/Subscribe input with Red Arrow Button inside -->
                    <form action="#subscribe" method="POST" onsubmit="event.preventDefault();" class="relative mt-2">
                        <input
                            type="email"
                            placeholder="Enter your email"
                            required
                            class="w-full bg-white text-slate-800 text-xs py-2.5 pl-3.5 pr-11 rounded-xl placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-red-500 shadow-sm"
                        />
                        <button
                            type="submit"
                            aria-label="Subscribe"
                            class="absolute right-1 top-1/2 -translate-y-1/2 w-8 h-8 rounded-lg bg-red-600 hover:bg-red-700 text-white flex items-center justify-center transition-colors shadow-xs"
                        >
                            <i class="ri-arrow-right-line text-sm"></i>
                        </button>
                    </form>
                </div>

            </div>

            <!-- Bottom Copyright & Language Row -->
            <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                <p>&copy; 2026 StreamTV. All rights reserved.</p>

                <!-- Language Selector matching image -->
                <div class="flex items-center gap-1.5 cursor-pointer text-slate-300 hover:text-white transition-colors">
                    <i class="ri-global-line text-sm"></i>
                    <span>English</span>
                    <i class="ri-arrow-down-s-line text-sm"></i>
                </div>
            </div>

        </div>
    </footer>

    <!-- Scripts for Mobile Menu & Testimonials Slider -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Testimonials Carousel Controls
        const slider = document.getElementById('reviewsSlider');
        const prevBtn = document.getElementById('prevReviewBtn');
        const nextBtn = document.getElementById('nextReviewBtn');
        const dots = document.querySelectorAll('.dot-indicator');

        if (slider && prevBtn && nextBtn) {
            const getScrollAmount = () => {
                const firstCard = slider.querySelector('.snap-start');
                return firstCard ? firstCard.offsetWidth + 24 : 320; // card width + gap
            };

            prevBtn.addEventListener('click', () => {
                slider.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
            });

            nextBtn.addEventListener('click', () => {
                slider.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            });

            // Update dots on scroll
            slider.addEventListener('scroll', () => {
                const maxScrollLeft = slider.scrollWidth - slider.clientWidth;
                if (maxScrollLeft > 0) {
                    const scrollProgress = slider.scrollLeft / maxScrollLeft;
                    const activeIndex = Math.min(Math.round(scrollProgress * (dots.length - 1)), dots.length - 1);

                    dots.forEach((dot, idx) => {
                        if (idx === activeIndex) {
                            dot.classList.remove('bg-red-200');
                            dot.classList.add('bg-red-600', 'w-5');
                        } else {
                            dot.classList.remove('bg-red-600', 'w-5');
                            dot.classList.add('bg-red-200', 'w-2.5');
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>
