<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'CrowdFund Platform - Fund Your Dreams' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="{{ $description ?? 'Launch your innovative projects and get funded by a community of supporters. The ultimate crowdfunding platform for creators, entrepreneurs, and innovators.' }}">
    <meta name="keywords" content="crowdfunding, fundraising, projects, innovation, startup, investment, community funding">
    <meta name="author" content="CrowdFund Platform">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $title ?? 'CrowdFund Platform - Fund Your Dreams' }}">
    <meta property="og:description" content="{{ $description ?? 'Launch your innovative projects and get funded by a community of supporters.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'CrowdFund Platform - Fund Your Dreams' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Launch your innovative projects and get funded by a community of supporters.' }}">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    
    <!-- Styles -->
    @vite('resources/css/app.css')
    
    <!-- Additional styles -->
    <style>
        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Loading animation */
        .loading-spinner {
            border: 3px solid #f3f4f6;
            border-top: 3px solid #3b82f6;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Navbar scroll effect */
        .navbar-scrolled {
            @apply bg-white/95 backdrop-blur-sm shadow-soft border-b border-neutral-200/50;
        }

        /* Hero background pattern */
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(249, 115, 22, 0.1) 0%, transparent 50%);
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-neutral-900">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50 px-4 py-2 bg-primary-600 text-white rounded-lg">
        Skip to main content
    </a>

    <!-- Navigation -->
    <x-ui.navbar transparent="true" />

    <!-- Main Content -->
    <main id="main-content" class="pt-16 lg:pt-20">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-dark text-white">
        <div class="container-custom section-padding">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="text-lg font-display font-bold">CrowdFund</span>
                    </div>
                    <p class="text-neutral-300 text-sm leading-relaxed">
                        Empowering creators and innovators to bring their ideas to life through community-driven funding.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M20 10C20 4.477 15.523 0 10 0S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                            </svg>
                        </a>
                        <a href="#" class="text-neutral-400 hover:text-white transition-colors duration-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Platform Links -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Platform</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">How it Works</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Browse Projects</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Start a Project</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Success Stories</a></li>
                    </ul>
                </div>

                <!-- Support Links -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Support</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Help Center</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Community Guidelines</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Safety & Security</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold">Legal</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Terms of Service</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">Cookie Policy</a></li>
                        <li><a href="#" class="text-neutral-300 hover:text-white transition-colors duration-200">GDPR</a></li>
                    </ul>
                </div>
            </div>

            <hr class="my-12 border-neutral-700">

            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-neutral-400 text-sm">
                    © {{ date('Y') }} CrowdFund Platform. All rights reserved.
                </p>
                <div class="flex items-center space-x-6 text-sm">
                    <span class="text-neutral-400">Made with</span>
                    <span class="text-red-500">♥</span>
                    <span class="text-neutral-400">for creators worldwide</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @stack('scripts')

    <!-- Loading Indicator -->
    <div id="loading-indicator" class="fixed inset-0 z-50 flex items-center justify-center bg-white/90 backdrop-blur-sm hidden">
        <div class="loading-spinner"></div>
    </div>
</body>
</html>