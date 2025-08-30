@props(['transparent' => false])

<nav 
    class="navbar fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-in-out {{ $transparent ? 'bg-transparent' : 'bg-white/95 backdrop-blur-md shadow-lg border-b border-primary-100' }}" 
    x-data="{ 
        open: false, 
        scrolled: false,
        transparent: {{ $transparent ? 'true' : 'false' }}
    }" 
    x-init="
        window.addEventListener('scroll', () => {
            scrolled = window.pageYOffset > 20;
            if (transparent && scrolled) {
                $el.classList.remove('bg-transparent');
                $el.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-lg', 'border-b', 'border-primary-100');
            } else if (transparent && !scrolled) {
                $el.classList.add('bg-transparent');
                $el.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-lg', 'border-b', 'border-primary-100');
            }
        })
    "
    :class="{ 'py-4': !scrolled && transparent, 'py-3': scrolled || !transparent }"
>
    <div class="container-custom">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gradient-primary rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 transform group-hover:scale-110">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-primary rounded-2xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-2xl font-display font-bold text-gradient-primary">CrowdFund</span>
                        <span class="text-xs text-accent-600 font-medium tracking-wide">FUND YOUR DREAMS</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:block">
                <div class="ml-10 flex items-center space-x-8">
                    @auth
                        @if(auth()->user()->hasRole('projectinvestor'))
                            <a href="{{ route('project.explore') }}" class="relative nav-link group">
                                <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">Explore Projects</span>
                                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                            </a>
                            <a href="{{ route('investor.backed-projects') }}" class="relative nav-link group">
                                <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">My Investments</span>
                                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                            </a>
                        @elseif(auth()->user()->hasRole('projectresponsable'))
                            <a href="{{ route('project.index') }}" class="relative nav-link group">
                                <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">My Projects</span>
                                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                            </a>
                            <a href="{{ route('project.create') }}" class="relative nav-link group">
                                <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">Create Project</span>
                                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                            </a>
                        @else
                            <a href="{{ route('project.explore') }}" class="relative nav-link group">
                                <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">Browse Projects</span>
                                <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                            </a>
                        @endif
                    @else
                        <a href="#how-it-works" class="relative nav-link group">
                            <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">How it Works</span>
                            <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                        </a>
                        <a href="#projects" class="relative nav-link group">
                            <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">Projects</span>
                            <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                        </a>
                        <a href="#about" class="relative nav-link group">
                            <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">About</span>
                            <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                        </a>
                        <a href="#contact" class="relative nav-link group">
                            <span class="text-accent-700 hover:text-primary-600 transition-colors duration-300 font-semibold">Contact</span>
                            <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-primary transition-all duration-300 group-hover:w-full"></div>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Desktop Auth Buttons -->
            <div class="hidden lg:flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 text-accent-700 hover:text-primary-600 transition-colors duration-200 group">
                            <div class="w-8 h-8 bg-gradient-primary rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="font-semibold">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="dropdownOpen" x-transition @click.outside="dropdownOpen = false" class="absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-xl border border-primary-100 py-2">
                            @if(auth()->user()->hasRole('projectresponsable'))
                                <!-- Project Creator Navigation -->
                                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide border-b border-primary-100 mb-2">Creator Dashboard</div>
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="{{ route('project.index') }}" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    My Projects
                                </a>
                            @elseif(auth()->user()->hasRole('projectinvestor'))
                                <!-- Investor Navigation -->
                                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide border-b border-primary-100 mb-2">My Portfolio</div>
                                <a href="{{ route('investor.dashboard') }}" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Investment Dashboard
                                </a>
                                <a href="{{ route('investor.backed-projects') }}" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    My Investments
                                </a>
                                <div class="border-t border-primary-100 my-2"></div>
                                <a href="{{ route('project.explore') }}" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Discover New Projects
                                </a>
                            @else
                                <!-- Default Navigation -->
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile
                                </a>
                            @endif
                            <div class="border-t border-primary-100 my-2"></div>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-3 text-left text-red-600 hover:bg-red-50 transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="relative inline-flex items-center justify-center px-6 py-2.5 text-accent-700 hover:text-primary-600 font-semibold transition-all duration-300 group">
                        <span class="relative z-10">Sign In</span>
                        <div class="absolute inset-0 bg-primary-50 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="{{ route('register') }}" class="relative inline-flex items-center justify-center px-6 py-2.5 bg-gradient-primary text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 group overflow-hidden">
                        <span class="relative z-10 flex items-center">
                            Get Started
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-600 to-secondary-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden">
                <button @click="open = !open" class="relative p-3 rounded-xl text-accent-700 hover:bg-primary-50 hover:text-primary-600 transition-all duration-200">
                    <svg x-show="!open" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="lg:hidden bg-white/95 backdrop-blur-md border-t border-primary-100">
        <div class="container-custom py-6 space-y-4">
            @auth
                @if(auth()->user()->hasRole('projectinvestor'))
                    <a href="{{ route('project.explore') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Explore Projects</a>
                    <a href="{{ route('investor.backed-projects') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">My Investments</a>
                @elseif(auth()->user()->hasRole('projectresponsable'))
                    <a href="{{ route('project.index') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">My Projects</a>
                    <a href="{{ route('project.create') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Create Project</a>
                @else
                    <a href="{{ route('project.explore') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Browse Projects</a>
                @endif
            @else
                <a href="#how-it-works" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">How it Works</a>
                <a href="#projects" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Projects</a>
                <a href="#about" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">About</a>
                <a href="#contact" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Contact</a>
            @endauth
            
            <div class="border-t border-primary-200 pt-4 mt-4">
                @auth
                    @if(auth()->user()->hasRole('projectresponsable'))
                        <a href="{{ route('dashboard') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Creator Dashboard</a>
                    @elseif(auth()->user()->hasRole('projectinvestor'))
                        <a href="{{ route('investor.dashboard') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Investment Dashboard</a>
                    @else
                        <a href="{{ route('dashboard') }}" @click="open = false" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="block mt-2">
                        @csrf
                        <button type="submit" class="w-full text-left py-3 px-4 text-red-600 hover:bg-red-50 rounded-xl transition-all duration-200 font-semibold">Sign Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block py-3 px-4 text-accent-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all duration-200 font-semibold">Sign In</a>
                    <a href="{{ route('register') }}" class="block mt-2 py-3 px-4 bg-gradient-primary text-white text-center font-semibold rounded-xl shadow-lg">Get Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
.navbar-scrolled {
    @apply bg-white/95 backdrop-blur-md shadow-lg border-b border-primary-100;
}

.nav-link:hover .absolute {
    width: 100%;
}
</style>