<x-app-layout>
    <!-- Hero Section -->
    <section class="relative min-h-screen hero-particles overflow-hidden bg-gradient-hero" id="hero">
        <div class="absolute inset-0 hero-pattern"></div>
        
        <!-- Animated background elements -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl animate-pulse-slow"></div>
        <div class="absolute bottom-32 right-20 w-24 h-24 bg-accent-500/20 rounded-full blur-lg animate-bounce-slow"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-secondary-500/20 rounded-full blur-md animate-pulse-slow"></div>

        <div class="relative z-10 container-custom min-h-screen flex items-center">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">
                <!-- Hero Content -->
                <div class="space-y-8 text-white" data-aos="fade-up">
                    <div class="space-y-4">
                        <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium border border-white/20">
                            <span class="w-2 h-2 bg-secondary-500 rounded-full mr-3 animate-pulse"></span>
                            Join 50,000+ creators worldwide
                        </div>
                        <h1 class="text-5xl lg:text-7xl font-display font-bold leading-tight">
                            Fund Your
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-white to-primary-200 block">Dreams</span>
                            Today
                        </h1>
                        <p class="text-xl lg:text-2xl text-white/90 leading-relaxed max-w-2xl">
                            Turn your innovative ideas into reality with community-powered funding. 
                            Launch your project and connect with supporters who believe in your vision.
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="btn btn-accent btn-large group">
                            Start Your Project
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="{{ route('project.explore') }}" class="btn btn-outline text-white border-white hover:bg-white hover:text-primary-700">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Explore Projects
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8">
                        <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                            <div class="text-3xl lg:text-4xl font-display font-bold counter" data-target="{{ $stats['total_projects'] }}">0</div>
                            <div class="text-white/80 text-sm">Total Projects</div>
                        </div>
                        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                            <div class="text-3xl lg:text-4xl font-display font-bold counter" data-target="{{ round($stats['total_funded'] / 1000000, 1) }}">0</div>
                            <div class="text-white/80 text-sm">Million Raised</div>
                        </div>
                        <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                            <div class="text-3xl lg:text-4xl font-display font-bold counter" data-target="{{ $stats['success_rate'] }}">0</div>
                            <div class="text-white/80 text-sm">Success Rate</div>
                        </div>
                    </div>
                </div>

                <!-- Hero Visual -->
                <div class="relative" data-aos="fade-left" data-aos-delay="200">
                    <div class="relative z-10">
                        <!-- Main hero illustration/mockup -->
                        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-3xl p-8 shadow-2xl">
                            <div class="space-y-6">
                                <!-- Mock project card -->
                                <div class="bg-white rounded-2xl p-6 shadow-lg">
                                    <div class="flex items-center space-x-4 mb-4">
                                        <div class="w-12 h-12 bg-gradient-primary rounded-xl"></div>
                                        <div>
                                            <div class="h-4 bg-neutral-200 rounded w-32 mb-2"></div>
                                            <div class="h-3 bg-neutral-100 rounded w-24"></div>
                                        </div>
                                    </div>
                                    <div class="h-32 bg-gradient-to-br from-primary-100 to-accent-100 rounded-xl mb-4"></div>
                                    <div class="space-y-2">
                                        <div class="h-4 bg-neutral-200 rounded w-full"></div>
                                        <div class="h-4 bg-neutral-200 rounded w-3/4"></div>
                                    </div>
                                    <div class="mt-4 flex justify-between items-center">
                                        <div class="text-2xl font-bold text-primary-600">$24,580</div>
                                        <div class="text-sm text-neutral-600">of $30,000</div>
                                    </div>
                                    <div class="mt-2 w-full bg-neutral-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r from-primary-600 to-accent-600 h-2 rounded-full" style="width: 82%"></div>
                                    </div>
                                </div>

                                <!-- Supporter avatars -->
                                <div class="flex items-center space-x-4">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full border-2 border-white"></div>
                                        <div class="w-8 h-8 bg-gradient-to-br from-secondary-500 to-secondary-700 rounded-full border-2 border-white"></div>
                                        <div class="w-8 h-8 bg-gradient-to-br from-accent-500 to-accent-700 rounded-full border-2 border-white"></div>
                                        <div class="w-8 h-8 bg-neutral-400 rounded-full border-2 border-white flex items-center justify-center">
                                            <span class="text-xs text-white font-semibold">+5</span>
                                        </div>
                                    </div>
                                    <div class="text-white text-sm">327 supporters</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-accent-500/20 rounded-2xl backdrop-blur-sm animate-float"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-secondary-500/20 rounded-xl backdrop-blur-sm animate-bounce-slow"></div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#how-it-works" class="text-white/60 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- Discover Projects Section -->
    <section class="section-padding bg-gradient-to-br from-neutral-50 to-white relative overflow-hidden" id="explore-cta">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-200 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-64 h-64 bg-secondary-200 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s;"></div>
        </div>

        <div class="container-custom relative z-10">
            <!-- Header Section -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center px-4 py-2 bg-primary-50 text-primary-700 rounded-full text-sm font-medium mb-6 border border-primary-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Instant Access - No Barriers
                </div>
                
                <h2 class="text-4xl lg:text-5xl font-display font-bold text-neutral-900 mb-6 leading-tight">
                    Discover Projects
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-600 to-secondary-600 block lg:inline">
                        Without Limits
                    </span>
                </h2>
                
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto leading-relaxed mb-10">
                    Dive into a world of innovation where creativity meets opportunity. Browse thousands of groundbreaking projects 
                    from visionary creators worldwide – completely free, no registration required.
                </p>

                <!-- Enhanced CTA Section with Visual Elements -->
                <div class="relative">
                    <!-- Decorative Elements -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-96 h-96 opacity-5">
                            <svg viewBox="0 0 200 200" class="w-full h-full animate-spin-slow">
                                <circle cx="100" cy="100" r="80" stroke="currentColor" stroke-width="1" fill="none" stroke-dasharray="10,5"/>
                                <circle cx="100" cy="100" r="60" stroke="currentColor" stroke-width="1" fill="none" stroke-dasharray="5,10"/>
                                <circle cx="100" cy="100" r="40" stroke="currentColor" stroke-width="1" fill="none" stroke-dasharray="15,5"/>
                            </svg>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
                        <!-- Left Side - Illustration -->
                        <div class="relative" data-aos="fade-right">
                            <!-- Main Illustration Background -->
                            <div class="relative bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 rounded-3xl p-8 shadow-2xl">
                                <!-- Floating Project Cards Illustration -->
                                <div class="space-y-4">
                                    <!-- Card 1 -->
                                    <div class="bg-white rounded-2xl p-4 shadow-lg transform rotate-2 hover:rotate-0 transition-transform duration-300">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-800">AI Music Creator</div>
                                                <div class="text-xs text-gray-500">by Sarah Chen</div>
                                            </div>
                                        </div>
                                        <div class="h-20 bg-gradient-to-r from-blue-100 to-purple-100 rounded-lg mb-3 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                            </svg>
                                        </div>
                                        <div class="flex justify-between items-center text-xs">
                                            <span class="font-bold text-blue-600">$15,420</span>
                                            <span class="text-green-600">funded</span>
                                        </div>
                                    </div>

                                    <!-- Card 2 -->
                                    <div class="bg-white rounded-2xl p-4 shadow-lg transform -rotate-1 hover:rotate-0 transition-transform duration-300 ml-6">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-teal-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-800">Eco Garden Game</div>
                                                <div class="text-xs text-gray-500">by GreenStudio</div>
                                            </div>
                                        </div>
                                        <div class="h-20 bg-gradient-to-r from-green-100 to-teal-100 rounded-lg mb-3 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                                            </svg>
                                        </div>
                                        <div class="flex justify-between items-center text-xs">
                                            <span class="font-bold text-green-600">$8,750</span>
                                            <span class="text-orange-600">75% funded</span>
                                        </div>
                                    </div>

                                    <!-- Card 3 -->
                                    <div class="bg-white rounded-2xl p-4 shadow-lg transform rotate-1 hover:rotate-0 transition-transform duration-300 mr-4">
                                        <div class="flex items-center space-x-3 mb-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-800">Smart Art Frame</div>
                                                <div class="text-xs text-gray-500">by ArtTech Co</div>
                                            </div>
                                        </div>
                                        <div class="h-20 bg-gradient-to-r from-purple-100 to-pink-100 rounded-lg mb-3 flex items-center justify-center">
                                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="flex justify-between items-center text-xs">
                                            <span class="font-bold text-purple-600">$32,180</span>
                                            <span class="text-green-600">150% funded</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Floating Elements -->
                                <div class="absolute -top-4 -right-4 w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg animate-bounce-slow">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <div class="absolute -bottom-2 -left-2 w-8 h-8 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-full flex items-center justify-center shadow-lg animate-pulse-slow">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - CTA and Benefits -->
                        <div class="text-center lg:text-left" data-aos="fade-left">
                            <!-- Enhanced CTA Button -->
                            <div class="mb-8">
                                <a href="{{ route('project.explore') }}" class="group relative inline-block">
                                    <!-- Button Background Effects -->
                                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl blur-lg opacity-25 group-hover:opacity-40 transition duration-500 group-hover:duration-200"></div>
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-3xl opacity-50 group-hover:opacity-100 transition duration-300"></div>
                                    
                                    <!-- Button Content -->
                                    <div class="relative bg-white text-gray-900 font-bold py-6 px-10 rounded-3xl border border-gray-100 flex items-center justify-center space-x-4 shadow-xl group-hover:shadow-2xl transform group-hover:scale-105 transition-all duration-300">
                                        <!-- Icon Container -->
                                        <div class="relative">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-blue-500/25 group-hover:rotate-12 transition-all duration-300">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                                </svg>
                                            </div>
                                            <!-- Pulse Ring -->
                                            <div class="absolute inset-0 rounded-2xl border-2 border-orange-400 opacity-0 group-hover:opacity-100 group-hover:scale-125 transition-all duration-500"></div>
                                        </div>
                                        
                                        <!-- Text Content -->
                                        <div class="flex flex-col">
                                            <span class="text-xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                                                Explore All Projects
                                            </span>
                                            <span class="text-sm text-gray-500 font-normal">
                                                Discover thousands of innovations
                                            </span>
                                        </div>
                                        
                                        <!-- Arrow -->
                                        <div class="ml-4">
                                            <svg class="w-6 h-6 text-gray-400 group-hover:text-orange-500 group-hover:translate-x-2 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                            </svg>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!-- Enhanced Benefits Grid -->
                            <div class="grid grid-cols-1 gap-4">
                                <div class="flex items-center space-x-4 bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-2xl border border-green-100 group hover:shadow-lg transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-gray-900 text-lg">Instant Access</div>
                                        <div class="text-gray-600">Jump right in - no sign-up required to start exploring</div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4 bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-2xl border border-blue-100 group hover:shadow-lg transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-gray-900 text-lg">100% Free</div>
                                        <div class="text-gray-600">Browse, discover, and explore without any costs or limitations</div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4 bg-gradient-to-r from-purple-50 to-pink-50 p-4 rounded-2xl border border-purple-100 group hover:shadow-lg transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-bold text-gray-900 text-lg">Smart Discovery</div>
                                        <div class="text-gray-600">Advanced filters help you find exactly what inspires you</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Categories Section -->
            <div class="relative">
                <!-- Decorative Graphics for Categories -->
                <div class="absolute inset-0 pointer-events-none">
                    <!-- Left side graphics -->
                    <div class="absolute top-0 left-0 w-32 h-32 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full text-blue-500">
                            <polygon points="50,5 61,35 95,35 69,57 79,91 50,70 21,91 31,57 5,35 39,35" fill="currentColor"/>
                        </svg>
                    </div>
                    <!-- Right side graphics -->
                    <div class="absolute top-20 right-0 w-24 h-24 opacity-10">
                        <svg viewBox="0 0 100 100" class="w-full h-full text-purple-500">
                            <circle cx="50" cy="50" r="45" stroke="currentColor" stroke-width="8" fill="none"/>
                            <circle cx="50" cy="50" r="25" fill="currentColor"/>
                        </svg>
                    </div>
                    <!-- Center background elements -->
                    <div class="absolute top-32 left-1/2 transform -translate-x-1/2 w-40 h-40 opacity-5">
                        <svg viewBox="0 0 100 100" class="w-full h-full text-gray-400 animate-pulse-slow">
                            <rect x="10" y="10" width="30" height="30" fill="currentColor" rx="5"/>
                            <rect x="60" y="10" width="30" height="30" fill="currentColor" rx="5"/>
                            <rect x="10" y="60" width="30" height="30" fill="currentColor" rx="5"/>
                            <rect x="60" y="60" width="30" height="30" fill="currentColor" rx="5"/>
                            <circle cx="50" cy="50" r="15" fill="currentColor"/>
                        </svg>
                    </div>
                </div>

                <div class="text-center mb-12 relative z-10" data-aos="fade-up" data-aos-delay="400">
                    <!-- Enhanced Header with Icons -->
                    <div class="inline-flex items-center justify-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg animate-bounce-slow">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-display font-bold text-neutral-900">
                            Browse by Category
                        </h3>
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-red-600 rounded-2xl flex items-center justify-center ml-4 shadow-lg animate-bounce-slow" style="animation-delay: 1s;">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                    </div>

                    <p class="text-xl text-neutral-600 max-w-3xl mx-auto mb-8 leading-relaxed">
                        Jump straight to what interests you most. Each category is curated with the most innovative and exciting projects from creators worldwide.
                    </p>

                    <!-- Category Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mb-12">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-2xl border border-blue-200" data-aos="zoom-in" data-aos-delay="500">
                            <div class="text-2xl font-bold text-blue-600 mb-1">1,200+</div>
                            <div class="text-sm text-blue-700">Tech Projects</div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-2xl border border-purple-200" data-aos="zoom-in" data-aos-delay="600">
                            <div class="text-2xl font-bold text-purple-600 mb-1">850+</div>
                            <div class="text-sm text-purple-700">Design Works</div>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-2xl border border-green-200" data-aos="zoom-in" data-aos-delay="700">
                            <div class="text-2xl font-bold text-green-600 mb-1">650+</div>
                            <div class="text-sm text-green-700">Games & Apps</div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-4 rounded-2xl border border-pink-200" data-aos="zoom-in" data-aos-delay="800">
                            <div class="text-2xl font-bold text-pink-600 mb-1">400+</div>
                            <div class="text-sm text-pink-700">Art & Music</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Categories Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 max-w-5xl mx-auto">
                <!-- Technology -->
                <a href="{{ route('project.explore', ['category' => 'technology']) }}" class="group" data-aos="zoom-in" data-aos-delay="100">
                    <div class="bg-white rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1 border border-neutral-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-neutral-900 mb-1 group-hover:text-blue-600 transition-colors duration-300">Technology</h4>
                        <p class="text-xs text-neutral-600">AI, robotics & innovations</p>
                    </div>
                </a>
                
                <!-- Design -->
                <a href="{{ route('project.explore', ['category' => 'design']) }}" class="group" data-aos="zoom-in" data-aos-delay="200">
                    <div class="bg-white rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1 border border-neutral-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-neutral-900 mb-1 group-hover:text-purple-600 transition-colors duration-300">Design</h4>
                        <p class="text-xs text-neutral-600">UI/UX & creative solutions</p>
                    </div>
                </a>
                
                <!-- Games -->
                <a href="{{ route('project.explore', ['category' => 'games']) }}" class="group" data-aos="zoom-in" data-aos-delay="300">
                    <div class="bg-white rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1 border border-neutral-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-neutral-900 mb-1 group-hover:text-green-600 transition-colors duration-300">Games</h4>
                        <p class="text-xs text-neutral-600">Indie games & VR experiences</p>
                    </div>
                </a>
                
                <!-- Art -->
                <a href="{{ route('project.explore', ['category' => 'art']) }}" class="group" data-aos="zoom-in" data-aos-delay="400">
                    <div class="bg-white rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1 border border-neutral-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-neutral-900 mb-1 group-hover:text-pink-600 transition-colors duration-300">Art</h4>
                        <p class="text-xs text-neutral-600">Paintings & visual arts</p>
                    </div>
                </a>
                
                <!-- Music -->
                <a href="{{ route('project.explore', ['category' => 'music']) }}" class="group" data-aos="zoom-in" data-aos-delay="500">
                    <div class="bg-white rounded-2xl p-6 text-center transition-all duration-300 group-hover:shadow-xl group-hover:-translate-y-1 border border-neutral-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-neutral-900 mb-1 group-hover:text-red-600 transition-colors duration-300">Music</h4>
                        <p class="text-xs text-neutral-600">Albums & audio innovations</p>
                    </div>
                </a>
            </div>

            <!-- Bottom CTA with Enhanced Graphics -->
            <div class="text-center mt-20 relative" data-aos="fade-up" data-aos-delay="600">
                <!-- Background Illustration -->
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                    <div class="w-80 h-80 opacity-5">
                        <svg viewBox="0 0 200 200" class="w-full h-full text-gray-400">
                            <!-- Network Connection Lines -->
                            <g stroke="currentColor" stroke-width="1" fill="none" opacity="0.3">
                                <line x1="40" y1="40" x2="80" y2="60"/>
                                <line x1="80" y1="60" x2="120" y2="40"/>
                                <line x1="120" y1="40" x2="160" y2="60"/>
                                <line x1="40" y1="140" x2="80" y2="120"/>
                                <line x1="80" y1="120" x2="120" y2="140"/>
                                <line x1="120" y1="140" x2="160" y2="120"/>
                                <line x1="100" y1="20" x2="100" y2="180"/>
                                <line x1="60" y1="80" x2="140" y2="100"/>
                            </g>
                            <!-- Connection Nodes -->
                            <circle cx="40" cy="40" r="4" fill="currentColor" class="text-blue-400"/>
                            <circle cx="80" cy="60" r="4" fill="currentColor" class="text-purple-400"/>
                            <circle cx="120" cy="40" r="4" fill="currentColor" class="text-green-400"/>
                            <circle cx="160" cy="60" r="4" fill="currentColor" class="text-pink-400"/>
                            <circle cx="40" cy="140" r="4" fill="currentColor" class="text-red-400"/>
                            <circle cx="80" cy="120" r="4" fill="currentColor" class="text-yellow-400"/>
                            <circle cx="120" cy="140" r="4" fill="currentColor" class="text-indigo-400"/>
                            <circle cx="160" cy="120" r="4" fill="currentColor" class="text-teal-400"/>
                            <circle cx="100" cy="100" r="8" fill="currentColor" class="text-gray-500"/>
                        </svg>
                    </div>
                </div>

                <!-- Social Proof with Visual Elements -->
                <div class="relative z-10 mb-8">
                    <div class="inline-flex items-center space-x-4 bg-gradient-to-r from-white via-gray-50 to-white backdrop-blur-sm px-8 py-4 rounded-3xl border border-gray-200 shadow-lg">
                        <!-- Animated User Avatars -->
                        <div class="flex -space-x-2">
                            <div class="w-8 h-8 rounded-full border-2 border-white shadow-md animate-pulse-slow overflow-hidden">
                                <img src="{{ asset('images/alice.jpg') }}" alt="Alice" class="w-full h-full object-cover">
                            </div>
                            <div class="w-8 h-8 rounded-full border-2 border-white shadow-md animate-pulse-slow overflow-hidden" style="animation-delay: 0.5s;">
                                <img src="{{ asset('images/mark.jpg') }}" alt="Mark" class="w-full h-full object-cover">
                            </div>
                            <div class="w-8 h-8 rounded-full border-2 border-white shadow-md animate-pulse-slow overflow-hidden" style="animation-delay: 1s;">
                                <img src="{{ asset('images/alice.jpg') }}" alt="Alice" class="w-full h-full object-cover">
                            </div>
                            <div class="w-8 h-8 rounded-full border-2 border-white shadow-md animate-pulse-slow overflow-hidden" style="animation-delay: 1.5s;">
                                <img src="{{ asset('images/mark.jpg') }}" alt="Mark" class="w-full h-full object-cover">
                            </div>
                            <div class="w-8 h-8 rounded-full border-2 border-white shadow-md animate-pulse-slow overflow-hidden" style="animation-delay: 2s;">
                                <img src="{{ asset('images/alice.jpg') }}" alt="Alice" class="w-full h-full object-cover">
                            </div>
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-400 to-gray-500 rounded-full border-2 border-white flex items-center justify-center shadow-md">
                                <span class="text-xs text-white font-bold">+2K</span>
                            </div>
                        </div>
                        
                        <!-- Live Activity Indicator -->
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
                            <span class="text-sm font-semibold text-gray-900">Live Now</span>
                        </div>
                        
                        <!-- Activity Text -->
                        <div class="text-center">
                            <div class="text-lg font-bold text-gray-900">2,847 People</div>
                            <div class="text-sm text-gray-600">exploring projects right now</div>
                        </div>
                    </div>
                </div>

                <!-- Fun Discovery Message -->
                <div class="bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 rounded-3xl p-8 max-w-3xl mx-auto border border-blue-100 shadow-sm">
                    <div class="text-center">
                        <div class="inline-flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Ready to Discover?</h3>
                        </div>
                        <p class="text-lg font-medium text-gray-900 mb-2">
                            Your next favorite project is just one click away!
                        </p>
                        <p class="text-gray-600 mb-6">
                            Join the community of innovators, creators, and dreamers making amazing things happen.
                        </p>
                        
                        <!-- Quick Start Button -->
                        <a href="{{ route('project.explore') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-semibold rounded-2xl hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Start Exploring Now
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="section-padding bg-neutral-50" id="how-it-works">
        <div class="container-custom">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl lg:text-5xl font-display font-bold text-neutral-900 mb-6">
                    How It Works
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto">
                    From idea to reality in three simple steps. Join thousands of creators who have successfully funded their dreams.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <!-- Step 1 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-primary rounded-2xl flex items-center justify-center mx-auto shadow-glow">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-sm">1</div>
                    </div>
                    <h3 class="text-2xl font-display font-semibold text-neutral-900 mb-4">Create Your Project</h3>
                    <p class="text-neutral-600 leading-relaxed">
                        Share your innovative idea with compelling visuals, detailed descriptions, and clear funding goals to attract supporters.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-secondary rounded-2xl flex items-center justify-center mx-auto shadow-glow">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-sm">2</div>
                    </div>
                    <h3 class="text-2xl font-display font-semibold text-neutral-900 mb-4">Build Your Community</h3>
                    <p class="text-neutral-600 leading-relaxed">
                        Engage with potential backers, share updates, and build a loyal community around your project before and during your campaign.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative mb-8">
                        <div class="w-20 h-20 bg-gradient-accent rounded-2xl flex items-center justify-center mx-auto shadow-glow-accent">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-sm">3</div>
                    </div>
                    <h3 class="text-2xl font-display font-semibold text-neutral-900 mb-4">Get Funded</h3>
                    <p class="text-neutral-600 leading-relaxed">
                        Receive funding from your supporters and turn your vision into reality. We handle payments securely and transparently.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="section-padding bg-white" id="projects">
        <div class="container-custom">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl lg:text-5xl font-display font-bold text-neutral-900 mb-6">
                    Featured Projects
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto mb-8">
                    Discover amazing projects from creators around the world. From tech innovations to artistic endeavors.
                </p>
                <a href="{{ route('project.explore') }}" class="btn btn-outline">View All Projects</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($featuredProjects as $index => $project)
                <a href="{{ route('project.public', $project->id) }}" class="block">
                    <div class="card card-hover group" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="relative overflow-hidden">
                        <div class="h-48 bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                            @if($project->image && file_exists(public_path('image/' . $project->image)))
                                <img src="{{ asset('image/' . $project->image) }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-white text-4xl font-bold">{{ strtoupper(substr($project->project_name, 0, 2)) }}</div>
                            @endif
                        </div>
                        <div class="absolute top-4 right-4">
                            <div class="badge badge-secondary">{{ ucfirst($project->category) }}</div>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">{{ strtoupper(substr($project->user->name, 0, 1)) }}</span>
                            </div>
                            <div>
                                <div class="font-semibold text-neutral-900">{{ $project->user->name }}</div>
                                <div class="text-sm text-neutral-600">{{ $project->project_location }}</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-semibold text-neutral-900 mb-3">{{ $project->project_name }}</h3>
                        <p class="text-neutral-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($project->project_description), 120) }}
                        </p>
                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-2xl font-bold text-primary-600">${{ number_format($project->pledged) }}</span>
                                <span class="text-sm text-neutral-600">of ${{ number_format($project->goal) }}</span>
                            </div>
                            <div class="w-full bg-neutral-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-primary-600 to-primary-700 h-2 rounded-full" style="width: {{ min(($project->pledged / $project->goal) * 100, 100) }}%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm text-neutral-600">
                            <span>{{ number_format($project->investors) }} backers</span>
                            <span>
                                @php
                                    $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
                                    $diffInDays = $endDate->diffInDays(now());
                                @endphp
                                @if($endDate->isPast())
                                    Ended
                                @elseif($diffInDays == 0)
                                    Today
                                @elseif($diffInDays == 1)
                                    1 day left
                                @else
                                    {{ $diffInDays }} days left
                                @endif
                            </span>
                        </div>
                    </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center text-neutral-600">
                    No featured projects available at the moment.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Recent Projects Section -->
    @if($recentProjects->count() > 0)
    <section class="section-padding bg-neutral-50" id="recent-projects">
        <div class="container-custom">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl lg:text-5xl font-display font-bold text-neutral-900 mb-6">
                    Recent Projects
                </h2>
                <p class="text-xl text-neutral-600 max-w-3xl mx-auto mb-8">
                    Fresh ideas and innovations from creators who just launched their campaigns. Support early and be part of their journey.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recentProjects as $index => $project)
                <a href="{{ route('project.public', $project->id) }}" class="block">
                    <div class="card card-hover group" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="relative overflow-hidden">
                        <div class="h-48 bg-gradient-to-br from-secondary-400 to-secondary-600 flex items-center justify-center">
                            @if($project->image && file_exists(public_path('image/' . $project->image)))
                                <img src="{{ asset('image/' . $project->image) }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-white text-4xl font-bold">{{ strtoupper(substr($project->project_name, 0, 2)) }}</div>
                            @endif
                        </div>
                        <div class="absolute top-4 right-4">
                            <div class="badge badge-accent">{{ ucfirst($project->category) }}</div>
                        </div>
                        <div class="absolute top-4 left-4">
                            <div class="badge bg-green-500 text-white">New</div>
                        </div>
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-secondary-500 to-secondary-700 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-bold">{{ strtoupper(substr($project->user->name, 0, 1)) }}</span>
                            </div>
                            <div>
                                <div class="font-semibold text-neutral-900">{{ $project->user->name }}</div>
                                <div class="text-sm text-neutral-600">{{ $project->project_location }}</div>
                            </div>
                        </div>
                        <h3 class="text-xl font-display font-semibold text-neutral-900 mb-3">{{ $project->project_name }}</h3>
                        <p class="text-neutral-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($project->project_description), 120) }}
                        </p>
                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-2xl font-bold text-secondary-600">${{ number_format($project->pledged) }}</span>
                                <span class="text-sm text-neutral-600">of ${{ number_format($project->goal) }}</span>
                            </div>
                            <div class="w-full bg-neutral-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-secondary-600 to-secondary-700 h-2 rounded-full" style="width: {{ min(($project->pledged / $project->goal) * 100, 100) }}%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-sm text-neutral-600">
                            <span>{{ number_format($project->investors) }} backers</span>
                            <span>
                                @php
                                    $createdDate = $project->created_at instanceof \Carbon\Carbon ? $project->created_at : \Carbon\Carbon::parse($project->created_at);
                                    $diffInDays = $createdDate->diffInDays(now());
                                @endphp
                                @if($diffInDays == 0)
                                    Today
                                @elseif($diffInDays == 1)
                                    1 day ago
                                @else
                                    {{ $diffInDays }} days ago
                                @endif
                            </span>
                        </div>
                    </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us Section -->
    <section class="section-padding bg-neutral-50" id="about">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <h2 class="text-4xl lg:text-5xl font-display font-bold text-neutral-900 mb-6">
                        Why Choose
                        <span class="text-gradient-primary">CrowdFund?</span>
                    </h2>
                    <p class="text-xl text-neutral-600 mb-8 leading-relaxed">
                        We're more than just a platform – we're your partner in bringing ideas to life. 
                        Join a community of creators and supporters who believe in the power of innovation.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-neutral-900 mb-2">Trusted & Secure</h3>
                                <p class="text-neutral-600">Bank-level security and transparent processes ensure your funds and data are always protected.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-secondary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-neutral-900 mb-2">Lightning Fast</h3>
                                <p class="text-neutral-600">Launch your campaign in minutes with our intuitive tools and streamlined process.</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-accent rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-neutral-900 mb-2">Global Community</h3>
                                <p class="text-neutral-600">Connect with supporters worldwide and tap into our vibrant community of innovators.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left">
                    <!-- Statistics Grid -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="card text-center p-8">
                            <div class="text-4xl font-display font-bold text-primary-600 mb-2 counter" data-target="99.8">0</div>
                            <div class="text-neutral-600">Success Rate</div>
                        </div>
                        <div class="card text-center p-8">
                            <div class="text-4xl font-display font-bold text-secondary-600 mb-2 counter" data-target="24">0</div>
                            <div class="text-neutral-600">Hour Support</div>
                        </div>
                        <div class="card text-center p-8">
                            <div class="text-4xl font-display font-bold text-accent-600 mb-2 counter" data-target="180">0</div>
                            <div class="text-neutral-600">Countries</div>
                        </div>
                        <div class="card text-center p-8">
                            <div class="text-4xl font-display font-bold text-primary-600 mb-2 counter" data-target="1">0</div>
                            <div class="text-neutral-600">Million Users</div>
                        </div>
                    </div>

                    <!-- Floating elements -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-primary rounded-2xl opacity-20 animate-pulse-slow"></div>
                    <div class="absolute -bottom-6 -left-6 w-20 h-20 bg-gradient-accent rounded-xl opacity-20 animate-bounce-slow"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="section-padding bg-gradient-dark text-white" id="contact">
        <div class="container-custom text-center">
            <div class="max-w-3xl mx-auto" data-aos="fade-up">
                <h2 class="text-4xl lg:text-5xl font-display font-bold mb-6">
                    Stay Updated
                </h2>
                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                    Get the latest updates on new projects, success stories, and platform features. 
                    Join our newsletter and be part of the innovation journey.
                </p>

                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto mb-8 form-validate" method="POST" action="/newsletter">
                    @csrf
                    <input 
                        type="email" 
                        name="email"
                        placeholder="Enter your email address" 
                        class="flex-1 px-6 py-4 rounded-xl border-0 bg-white/10 backdrop-blur-sm text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50"
                        required
                    >
                    <button type="submit" class="btn btn-accent px-8">
                        Subscribe
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </form>

                <p class="text-sm text-white/70">
                    No spam, ever. Unsubscribe anytime. By subscribing, you agree to our 
                    <a href="#" class="underline hover:no-underline">Privacy Policy</a>.
                </p>
            </div>
        </div>
    </section>
</x-app-layout>

@push('styles')
<style>
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Enhanced animations for the explore section */
    .animate-tilt {
        animation: tilt 3s linear infinite;
    }
    
    @keyframes tilt {
        0%, 50%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(0.5deg); }
        75% { transform: rotate(-0.5deg); }
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse-slow {
        0%, 100% {
            opacity: 0.3;
            transform: scale(1);
        }
        50% {
            opacity: 0.5;
            transform: scale(1.05);
        }
    }
    
    .animate-bounce-slow {
        animation: bounce-slow 3s infinite;
    }
    
    @keyframes bounce-slow {
        0%, 100% {
            transform: translateY(-25%);
            animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
        }
        50% {
            transform: translateY(0);
            animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }
    }

    /* Gradient text utilities */
    .text-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Enhanced hover effects */
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Custom backdrop blur for better browser support */
    .backdrop-blur-sm {
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
    }

    /* Additional animations */
    .animate-spin-slow {
        animation: spin-slow 20s linear infinite;
    }
    
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
@endpush