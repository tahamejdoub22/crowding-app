<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'CrowdFund Platform - Fund Your Dreams' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="{{ $description ?? 'Join CrowdFund Platform - The ultimate crowdfunding platform for creators, entrepreneurs, and innovators.' }}">
    <meta name="keywords" content="crowdfunding, fundraising, projects, innovation, startup, investment, community funding">
    <meta name="author" content="CrowdFund Platform">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Styles -->
    @vite('resources/css/app.css')
    
    <!-- Additional styles for auth pages -->
    <style>
        .auth-gradient {
            background: #000000;
            background: linear-gradient(135deg, 
                #f97316 0%, 
                #ea580c 15%, 
                #c2410c 30%, 
                #9a3412 45%, 
                #7c2d12 60%, 
                #451a03 80%, 
                #000000 100%
            );
            min-height: 100vh;
        }

        .auth-pattern {
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(249, 115, 22, 0.3) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(234, 88, 12, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 40% 60%, rgba(194, 65, 12, 0.15) 0%, transparent 30%);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(249, 115, 22, 0.2), rgba(234, 88, 12, 0.25));
            animation: float 8s ease-in-out infinite;
            filter: blur(1px);
        }

        .floating-shape:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 8%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 65%;
            right: 12%;
            animation-delay: 3s;
        }

        .floating-shape:nth-child(3) {
            width: 140px;
            height: 140px;
            bottom: 15%;
            left: 15%;
            animation-delay: 6s;
        }

        .floating-shape:nth-child(4) {
            width: 60px;
            height: 60px;
            top: 35%;
            right: 25%;
            animation-delay: 1.5s;
        }

        .floating-shape:nth-child(5) {
            width: 100px;
            height: 100px;
            top: 75%;
            left: 75%;
            animation-delay: 4.5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(10deg); }
            66% { transform: translateY(20px) rotate(-10deg); }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.1),
                0 4px 16px rgba(249, 115, 22, 0.1);
        }

        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(249, 115, 22, 0.1), 0 0 20px rgba(249, 115, 22, 0.2);
        }

        .brand-logo {
            filter: drop-shadow(0 4px 20px rgba(249, 115, 22, 0.3));
        }
    </style>
    
    @stack('styles')
</head>
<body class="h-full font-sans antialiased text-accent-900">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50 px-4 py-2 bg-primary-600 text-white rounded-lg">
        Skip to main content
    </a>

    <!-- Auth Content -->
    <main id="main-content" class="min-h-screen auth-gradient auth-pattern relative overflow-hidden">
        <!-- Floating Shapes Background -->
        <div class="floating-shapes">
            <div class="floating-shape"></div>
            <div class="floating-shape"></div>
            <div class="floating-shape"></div>
            <div class="floating-shape"></div>
            <div class="floating-shape"></div>
        </div>

        <!-- Logo in top-left corner -->
        <div class="absolute top-6 left-6 z-20">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="relative brand-logo">
                    <div class="w-12 h-12 bg-white/90 backdrop-blur-md rounded-2xl flex items-center justify-center border border-orange-200 group-hover:bg-white transition-all duration-300">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-display font-bold text-black">CrowdFund</span>
                    <span class="text-xs text-green-700 font-medium tracking-wide">FUND YOUR DREAMS</span>
                </div>
            </a>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 flex min-h-screen">
            <!-- Left side - Branding -->
            <div class="hidden lg:flex lg:w-1/2 items-center justify-center p-12 relative">
                <div class="max-w-lg space-y-10 relative z-10">
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <div class="inline-flex items-center px-4 py-2 bg-white/90 backdrop-blur-md rounded-full border border-orange-200">
                                <span class="text-sm font-medium text-orange-700">🚀 Join 25,000+ Creators</span>
                            </div>
                            <h1 class="text-5xl lg:text-6xl font-display font-bold leading-tight text-black">
                                Transform Ideas into
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 via-orange-500 to-green-600">Reality</span>
                            </h1>
                        </div>
                        <p class="text-xl text-black leading-relaxed">
                            Join thousands of creators and backers who are making dreams come true through community-powered funding.
                        </p>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6">
                        <div class="text-center bg-white/90 backdrop-blur-md rounded-2xl p-4 border border-orange-200">
                            <div class="text-3xl font-display font-bold text-orange-600">25K+</div>
                            <div class="text-black text-sm">Projects</div>
                        </div>
                        <div class="text-center bg-white/90 backdrop-blur-md rounded-2xl p-4 border border-green-200">
                            <div class="text-3xl font-display font-bold text-green-600">$150M+</div>
                            <div class="text-black text-sm">Raised</div>
                        </div>
                        <div class="text-center bg-white/90 backdrop-blur-md rounded-2xl p-4 border border-orange-200">
                            <div class="text-3xl font-display font-bold text-orange-600">98%</div>
                            <div class="text-black text-sm">Success</div>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 bg-white/90 backdrop-blur-md rounded-xl p-3 border border-orange-200">
                            <div class="w-3 h-3 bg-orange-500 rounded-full shadow-lg shadow-orange-400/50"></div>
                            <span class="text-black font-medium">Secure & Transparent</span>
                        </div>
                        <div class="flex items-center space-x-4 bg-white/90 backdrop-blur-md rounded-xl p-3 border border-green-200">
                            <div class="w-3 h-3 bg-green-500 rounded-full shadow-lg shadow-green-400/50"></div>
                            <span class="text-black font-medium">Global Community</span>
                        </div>
                        <div class="flex items-center space-x-4 bg-white/90 backdrop-blur-md rounded-xl p-3 border border-orange-200">
                            <div class="w-3 h-3 bg-orange-500 rounded-full shadow-lg shadow-orange-400/50"></div>
                            <span class="text-black font-medium">Easy to Use</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right side - Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12 relative">
                <!-- Background decoration -->
                <div class="absolute inset-0 bg-black/10 backdrop-blur-sm"></div>
                
                <div class="w-full max-w-lg relative z-10">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Bottom gradient overlay -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
    </main>

    <!-- Scripts -->
    @vite('resources/js/app.js')
    @stack('scripts')

    <!-- Loading Indicator -->
    <div id="loading-indicator" class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm hidden">
        <div class="w-8 h-8 border-2 border-primary-400 border-t-transparent rounded-full animate-spin"></div>
    </div>
</body>
</html>