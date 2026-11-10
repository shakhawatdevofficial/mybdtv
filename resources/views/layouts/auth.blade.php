<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyBDTV - Authentication')</title>

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
                                darkred: '#B80610',
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
            background-color: #fafbfc;
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col justify-between selection:bg-red-500 selection:text-white relative overflow-x-hidden">

    <!-- Top Minimal Header with Logo -->
    <header class="w-full py-4 sm:py-6 px-4 sm:px-8 relative z-20">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <img src="{{ asset('assets/images/MyBDTV-Logo.png') }}" alt="MyBDTV Logo" class="h-9 sm:h-11 w-auto object-contain transition-transform duration-200 group-hover:scale-105">
            </a>

            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-slate-600 hover:text-red-600 transition-colors">
                <i class="ri-arrow-left-line"></i>
                <span>Back to Home</span>
            </a>
        </div>
    </header>

    <!-- Main Content Area with Red Wave Background Accent -->
    <main class="flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8 relative z-10">
        
        <!-- Background Red Wave Ambient Blobs -->
        <div class="absolute -left-20 top-1/4 w-80 h-80 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -right-20 bottom-10 w-80 h-80 bg-red-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-md relative z-10">
            @yield('content')
        </div>
    </main>

    <!-- Footer Copyright -->
    <footer class="py-5 text-center text-xs text-slate-400 relative z-10">
        <p>&copy; {{ date('Y') }} MyBDTV. All rights reserved.</p>
    </footer>

</body>
</html>
