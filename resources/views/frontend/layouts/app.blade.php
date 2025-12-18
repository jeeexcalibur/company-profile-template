<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $settings->description ?? 'Company Profile' }}">
    <title>@yield('title', $settings->company_name ?? config('app.name'))</title>

    @if($settings->favicon_url ?? false)
        <link rel="icon" href="{{ $settings->favicon_url }}" type="image/x-icon">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col overflow-x-hidden" style="background-color: #0f0f23;">
    <!-- Navigation -->
    <nav class="glass-dark fixed top-0 left-0 right-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 min-w-0 flex-shrink">
                    @if($settings->logo_url ?? false)
                        <img src="{{ $settings->logo_url }}" alt="{{ $settings->company_name }}"
                            class="h-8 sm:h-10 flex-shrink-0">
                    @else
                        <div
                            class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl gradient-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    @endif
                    <span
                        class="text-white font-bold text-lg sm:text-xl truncate">{{ $settings->company_name ?? 'Company' }}</span>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}"
                        class="text-white/80 hover:text-white transition-colors {{ request()->routeIs('home') ? 'text-white font-medium' : '' }}">Home</a>
                    <a href="{{ route('about') }}"
                        class="text-white/80 hover:text-white transition-colors {{ request()->routeIs('about') ? 'text-white font-medium' : '' }}">About</a>
                    <a href="{{ route('services') }}"
                        class="text-white/80 hover:text-white transition-colors {{ request()->routeIs('services') ? 'text-white font-medium' : '' }}">Services</a>
                    <a href="{{ route('team') }}"
                        class="text-white/80 hover:text-white transition-colors {{ request()->routeIs('team') ? 'text-white font-medium' : '' }}">Team</a>
                    <a href="{{ route('portfolio') }}"
                        class="text-white/80 hover:text-white transition-colors {{ request()->routeIs('portfolio') ? 'text-white font-medium' : '' }}">Portfolio</a>
                    <a href="{{ route('contact') }}"
                        class="px-5 py-2.5 rounded-xl gradient-primary text-white font-medium hover:shadow-lg hover:shadow-primary-500/30 transition-all">Contact
                        Us</a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden p-2 text-white flex-shrink-0">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="open" x-transition class="md:hidden pb-4">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('home') }}"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 transition-colors">Home</a>
                    <a href="{{ route('about') }}"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 transition-colors">About</a>
                    <a href="{{ route('services') }}"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 transition-colors">Services</a>
                    <a href="{{ route('team') }}"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 transition-colors">Team</a>
                    <a href="{{ route('portfolio') }}"
                        class="px-4 py-2 rounded-lg text-white/80 hover:text-white hover:bg-white/5 transition-colors">Portfolio</a>
                    <a href="{{ route('contact') }}"
                        class="px-4 py-2 rounded-lg gradient-primary text-white text-center mt-2">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 pt-16 sm:pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        @if($settings->logo_url ?? false)
                            <img src="{{ $settings->logo_url }}" alt="{{ $settings->company_name }}" class="h-8">
                        @endif
                        <span class="text-white font-bold text-xl">{{ $settings->company_name ?? 'Company' }}</span>
                    </div>
                    <p class="text-white/60 mb-6 max-w-md">{{ $settings->description ?? '' }}</p>

                    <!-- Social Links -->
                    <div class="flex items-center gap-4">
                        @if($settings->facebook ?? false)
                            <a href="{{ $settings->facebook }}" target="_blank"
                                class="w-10 h-10 rounded-lg bg-white/5 hover:bg-white/10 flex items-center justify-center text-white/60 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                        @endif
                        @if($settings->twitter ?? false)
                            <a href="{{ $settings->twitter }}" target="_blank"
                                class="w-10 h-10 rounded-lg bg-white/5 hover:bg-white/10 flex items-center justify-center text-white/60 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                                </svg>
                            </a>
                        @endif
                        @if($settings->instagram ?? false)
                            <a href="{{ $settings->instagram }}" target="_blank"
                                class="w-10 h-10 rounded-lg bg-white/5 hover:bg-white/10 flex items-center justify-center text-white/60 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                                </svg>
                            </a>
                        @endif
                        @if($settings->linkedin ?? false)
                            <a href="{{ $settings->linkedin }}" target="_blank"
                                class="w-10 h-10 rounded-lg bg-white/5 hover:bg-white/10 flex items-center justify-center text-white/60 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}"
                                class="text-white/60 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}"
                                class="text-white/60 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="{{ route('services') }}"
                                class="text-white/60 hover:text-white transition-colors">Services</a></li>
                        <li><a href="{{ route('portfolio') }}"
                                class="text-white/60 hover:text-white transition-colors">Portfolio</a></li>
                        <li><a href="{{ route('contact') }}"
                                class="text-white/60 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Contact</h3>
                    <ul class="space-y-3 text-white/60">
                        @if($settings->email ?? false)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $settings->email }}"
                                    class="hover:text-white transition-colors">{{ $settings->email }}</a>
                            </li>
                        @endif
                        @if($settings->phone ?? false)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $settings->phone }}</span>
                            </li>
                        @endif
                        @if($settings->address ?? false)
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-primary-400 mt-0.5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $settings->address }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-white/10 mt-12 pt-8 text-center text-white/40 text-sm">
                © {{ date('Y') }} {{ $settings->company_name ?? 'Company' }}. All rights reserved.
            </div>
        </div>
    </footer>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</body>

</html>