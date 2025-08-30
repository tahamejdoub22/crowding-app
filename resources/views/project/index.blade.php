<x-project-layout title="Browse Projects - CrowdFund Platform">
    <div class="bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <section class="bg-white shadow-sm border-b border-gray-200">
            <div class="container-custom py-12">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-display font-bold text-gray-900 mb-4">
                        Discover Amazing <span class="text-primary-600">Projects</span>
                    </h1>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        Browse thousands of creative projects and help bring innovative ideas to life
                    </p>
                </div>

                <!-- Search & Filters -->
                <div class="max-w-4xl mx-auto">
                    <form method="GET" action="{{ route('project.index') }}" class="space-y-6">
                        <!-- Search Bar -->
                        <div class="relative">
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="Search projects by name, description, or location..."
                                class="w-full pl-12 pr-4 py-4 text-lg border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent"
                            >
                            <svg class="w-6 h-6 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <!-- Filter Row -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <!-- Category Filter -->
                            <select name="category" class="form-select rounded-lg border-gray-300">
                                <option value="">All Categories</option>
                                @foreach($categories as $key => $name)
                                    <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Status Filter -->
                            <select name="status" class="form-select rounded-lg border-gray-300">
                                <option value="">All Status</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Live Campaigns</option>
                                <option value="successful" {{ request('status') == 'successful' ? 'selected' : '' }}>Successfully Funded</option>
                                <option value="ending_soon" {{ request('status') == 'ending_soon' ? 'selected' : '' }}>Ending Soon</option>
                                <option value="recently_launched" {{ request('status') == 'recently_launched' ? 'selected' : '' }}>Recently Launched</option>
                                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Coming Soon</option>
                            </select>

                            <!-- Sort Filter -->
                            <select name="sort" class="form-select rounded-lg border-gray-300">
                                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Newest First</option>
                                <option value="funding_progress" {{ request('sort') == 'funding_progress' ? 'selected' : '' }}>Funding Progress</option>
                                <option value="funding_velocity" {{ request('sort') == 'funding_velocity' ? 'selected' : '' }}>Trending</option>
                                <option value="most_funded" {{ request('sort') == 'most_funded' ? 'selected' : '' }}>Most Funded</option>
                                <option value="most_backers" {{ request('sort') == 'most_backers' ? 'selected' : '' }}>Most Backers</option>
                                <option value="ending_soon" {{ request('sort') == 'ending_soon' ? 'selected' : '' }}>Ending Soon</option>
                                <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Most Popular</option>
                            </select>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                                </svg>
                                Filter
                            </button>
                        </div>

                        <!-- Advanced Filters Toggleable Section -->
                        <div class="border-t border-gray-200 pt-4">
                            <button type="button" id="advanced-filters-toggle" class="flex items-center text-sm text-gray-600 hover:text-gray-900 mb-4">
                                <svg id="chevron-icon" class="w-4 h-4 mr-2 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                Advanced Filters
                            </button>
                            
                            <div id="advanced-filters" class="hidden space-y-4">
                                <!-- Funding Range -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Min. Funding</label>
                                        <select name="min_funding" class="form-select rounded-lg border-gray-300 w-full">
                                            <option value="">Any Amount</option>
                                            <option value="1000" {{ request('min_funding') == '1000' ? 'selected' : '' }}>$1,000+</option>
                                            <option value="5000" {{ request('min_funding') == '5000' ? 'selected' : '' }}>$5,000+</option>
                                            <option value="10000" {{ request('min_funding') == '10000' ? 'selected' : '' }}>$10,000+</option>
                                            <option value="50000" {{ request('min_funding') == '50000' ? 'selected' : '' }}>$50,000+</option>
                                            <option value="100000" {{ request('min_funding') == '100000' ? 'selected' : '' }}>$100,000+</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Max. Funding</label>
                                        <select name="max_funding" class="form-select rounded-lg border-gray-300 w-full">
                                            <option value="">Any Amount</option>
                                            <option value="10000" {{ request('max_funding') == '10000' ? 'selected' : '' }}>Up to $10,000</option>
                                            <option value="50000" {{ request('max_funding') == '50000' ? 'selected' : '' }}>Up to $50,000</option>
                                            <option value="100000" {{ request('max_funding') == '100000' ? 'selected' : '' }}>Up to $100,000</option>
                                            <option value="500000" {{ request('max_funding') == '500000' ? 'selected' : '' }}>Up to $500,000</option>
                                            <option value="1000000" {{ request('max_funding') == '1000000' ? 'selected' : '' }}>Up to $1,000,000</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Special Filters -->
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="featured" value="1" {{ request('featured') ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">Featured</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="verified" value="1" {{ request('verified') ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">Verified</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="trending" value="1" {{ request('trending') ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">Trending</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="staff_pick" value="1" {{ request('staff_pick') ? 'checked' : '' }} class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">Staff Pick</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        @if(request()->hasAny(['search', 'category', 'status', 'sort']))
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-600">
                                    Showing {{ $projects->count() }} of {{ $projects->total() }} projects
                                </div>
                                <a href="{{ route('project.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                                    Clear all filters
                                </a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="py-12">
            <div class="container-custom">
                @if($projects->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($projects as $project)
                            <x-project-card :project="$project" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $projects->appends(request()->query())->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">No projects found</h3>
                            <p class="text-gray-600 mb-6">
                                Try adjusting your search criteria or browse all projects.
                            </p>
                            <a href="{{ route('project.index') }}" class="btn btn-primary">
                                View All Projects
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Call to Action -->
        @auth
            @if(auth()->user()->hasRole('projectresponsable'))
                <section class="bg-gradient-primary py-16">
                    <div class="container-custom text-center">
                        <h2 class="text-3xl font-display font-bold text-white mb-4">
                            Ready to Launch Your Project?
                        </h2>
                        <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                            Join thousands of creators who have successfully funded their dreams on our platform.
                        </p>
                        <a href="{{ route('project.create') }}" class="btn btn-white btn-large">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Start Your Project
                        </a>
                    </div>
                </section>
            @endif
        @endauth
    </div>

    <!-- JavaScript for Advanced Filters Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('advanced-filters-toggle');
            const advancedFilters = document.getElementById('advanced-filters');
            const chevronIcon = document.getElementById('chevron-icon');
            
            if (toggleButton && advancedFilters && chevronIcon) {
                // Check if any advanced filters are active
                const hasAdvancedFilters = {{ request()->hasAny(['min_funding', 'max_funding', 'featured', 'verified', 'trending', 'staff_pick']) ? 'true' : 'false' }};
                
                // Show advanced filters if any are active
                if (hasAdvancedFilters) {
                    advancedFilters.classList.remove('hidden');
                    chevronIcon.style.transform = 'rotate(180deg)';
                }
                
                toggleButton.addEventListener('click', function() {
                    const isHidden = advancedFilters.classList.contains('hidden');
                    
                    if (isHidden) {
                        advancedFilters.classList.remove('hidden');
                        chevronIcon.style.transform = 'rotate(180deg)';
                    } else {
                        advancedFilters.classList.add('hidden');
                        chevronIcon.style.transform = 'rotate(0deg)';
                    }
                });
            }
        });
    </script>
</x-project-layout>