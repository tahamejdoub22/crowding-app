<nav class="navbar fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-200" 
     x-data="{ open: false }"
>
    <div class="container-custom">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="relative">
                        <div class="w-10 h-10 bg-gradient-primary rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 transform group-hover:scale-110">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="absolute -inset-1 bg-gradient-primary rounded-xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-display font-bold text-gradient-primary">CrowdFund</span>
                    </div>
                </a>
            </div>

            <!-- Center Navigation - Simple -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 transition-colors duration-200 font-medium">
                    Home
                </a>
                <a href="{{ route('project.index') }}" class="text-gray-700 hover:text-primary-600 transition-colors duration-200 font-medium">
                    Browse Projects
                </a>
                @auth
                    @if(auth()->user()->hasRole('projectresponsable'))
                        <a href="{{ route('project.create') }}" class="text-gray-700 hover:text-primary-600 transition-colors duration-200 font-medium">
                            Start Project
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Right Side - Auth -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <div class="relative" x-data="{ dropdownOpen: false }">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 text-gray-700 hover:text-primary-600 transition-colors duration-200 group">
                            <div class="w-8 h-8 bg-gradient-primary rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold text-white">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <span class="font-medium">{{ Str::limit(auth()->user()->name, 20) }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': dropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="dropdownOpen" x-transition @click.outside="dropdownOpen = false" class="absolute right-0 mt-3 w-64 bg-white rounded-xl shadow-xl border border-gray-200 py-2">
                            @if(auth()->user()->hasRole('projectresponsable'))
                                <!-- Project Creator Navigation -->
                                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide border-b border-gray-100 mb-2">Creator Dashboard</div>
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="{{ route('project.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                    My Projects
                                </a>
                                <a href="{{ route('project.create') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Create Project
                                </a>
                            @elseif(auth()->user()->hasRole('projectinvestor'))
                                <!-- Investor Navigation -->
                                <div class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wide border-b border-gray-100 mb-2">Investor Dashboard</div>
                                <a href="{{ route('investor.dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                                <a href="{{ route('investor.backed-projects') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    My Investments
                                </a>
                                <a href="{{ route('investor.profile') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Profile Settings
                                </a>
                            @else
                                <!-- Default Navigation -->
                                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    Dashboard
                                </a>
                            @endif
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2 text-left text-red-600 hover:bg-red-50 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-colors duration-200">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="bg-gradient-primary text-white font-medium px-4 py-2 rounded-lg hover:shadow-lg transition-all duration-200">
                        Get Started
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" class="p-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" x-transition class="md:hidden bg-white border-t border-gray-200">
        <div class="container-custom py-4 space-y-2">
            <a href="{{ route('home') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                Home
            </a>
            <a href="{{ route('project.index') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                Browse Projects
            </a>
            @auth
                @if(auth()->user()->hasRole('projectresponsable'))
                    <a href="{{ route('project.create') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        Start Project
                    </a>
                @endif
                <div class="border-t border-gray-200 pt-2 mt-2">
                    @if(auth()->user()->hasRole('projectresponsable'))
                        <a href="{{ route('dashboard') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            Creator Dashboard
                        </a>
                        <a href="{{ route('project.index') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            My Projects
                        </a>
                    @elseif(auth()->user()->hasRole('projectinvestor'))
                        <a href="{{ route('investor.dashboard') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            Investor Dashboard
                        </a>
                        <a href="{{ route('investor.backed-projects') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            My Investments
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            Dashboard
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="block mt-1">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 px-4 text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                            Sign Out
                        </button>
                    </form>
                </div>
            @else
                <div class="border-t border-gray-200 pt-2 mt-2">
                    <a href="{{ route('login') }}" @click="open = false" class="block py-2 px-4 text-gray-700 hover:text-primary-600 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" @click="open = false" class="block py-2 px-4 bg-gradient-primary text-white text-center rounded-lg mt-2">
                        Get Started
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>