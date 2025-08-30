@props(['title' => 'CrowdFund Platform - Fund Your Dreams', 'description' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="{{ $description ?? 'Launch your innovative projects and get funded by a community of supporters. The ultimate crowdfunding platform for creators, entrepreneurs, and innovators.' }}">
    <meta name="keywords" content="crowdfunding, fundraising, projects, innovation, startup, investment, community funding">
    <meta name="author" content="CrowdFund Platform">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description ?? 'Launch your innovative projects and get funded by a community of supporters.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
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
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-neutral-900">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50 px-4 py-2 bg-primary-600 text-white rounded-lg">
        Skip to main content
    </a>

    <!-- Clean Project Navigation -->
    <x-ui.project-navbar />

    <!-- Main Content -->
    <main id="main-content" class="pt-16 lg:pt-20">
        {{ $slot }}
    </main>

    <!-- Minimal Footer for Project Pages -->
    <footer class="bg-gray-100 border-t border-gray-200">
        <div class="container-custom py-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-lg font-display font-bold text-gradient-primary">CrowdFund</span>
                </div>
                <div class="flex items-center space-x-6 text-sm text-gray-600">
                    <a href="{{ route('home') }}" class="hover:text-primary-600 transition-colors">Home</a>
                    <a href="{{ route('project.index') }}" class="hover:text-primary-600 transition-colors">Browse Projects</a>
                    <a href="#" class="hover:text-primary-600 transition-colors">Help</a>
                    <span>© {{ date('Y') }} CrowdFund Platform</span>
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