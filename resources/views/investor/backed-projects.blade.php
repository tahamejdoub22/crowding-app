<x-app-layout>
    <x-slot name="title">Backed Projects</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <!-- Header -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900">My Backed Projects</h1>
                        <p class="text-lg text-gray-600 mt-1">Track your investments and project updates</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-4">
                        <div class="bg-blue-50 rounded-xl px-4 py-2">
                            <span class="text-sm font-medium text-blue-700">Total Invested</span>
                            <div class="text-xl font-bold text-blue-900">${{ number_format($totalInvested, 2) }}</div>
                        </div>
                        <div class="bg-green-50 rounded-xl px-4 py-2">
                            <span class="text-sm font-medium text-green-700">Projects Backed</span>
                            <div class="text-xl font-bold text-green-900">{{ $totalProjects }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if($investments->count() > 0)
                <!-- Filter/Sort Options -->
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <option>All Projects</option>
                            <option>Active Campaigns</option>
                            <option>Completed</option>
                            <option>Successful</option>
                        </select>
                        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <option>Sort by Date</option>
                            <option>Sort by Amount</option>
                            <option>Sort by Project Name</option>
                        </select>
                    </div>
                    <a href="{{ route('project.explore') }}" class="btn btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Explore More Projects
                    </a>
                </div>

                <!-- Investments Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($investments as $investment)
                        @php
                            $project = $investment->project;
                            $fundingPercentage = $project->goal > 0 ? min(($project->pledged / $project->goal) * 100, 100) : 0;
                            $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
                            $daysLeft = (int) abs($endDate->diffInDays(now()));
                            $isActive = $endDate->isFuture();
                        @endphp

                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                            <!-- Project Image -->
                            <div class="relative h-48 bg-gradient-to-br from-primary-500 to-primary-600">
                                @if($project->image)
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-4xl font-bold text-white">
                                            {{ strtoupper(substr($project->project_name, 0, 2)) }}
                                        </span>
                                    </div>
                                @endif
                                
                                <!-- Status Badge -->
                                <div class="absolute top-4 right-4">
                                    @if($investment->status === 'completed')
                                        <span class="px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                                            Backed
                                        </span>
                                    @elseif($investment->status === 'pending')
                                        <span class="px-3 py-1 bg-yellow-500 text-white text-xs font-semibold rounded-full">
                                            Pending
                                        </span>
                                    @endif
                                </div>

                                <!-- Investment Amount -->
                                <div class="absolute bottom-4 left-4">
                                    <div class="bg-white/90 backdrop-blur-sm rounded-lg px-3 py-1">
                                        <span class="text-sm font-bold text-gray-900">${{ number_format($investment->amount, 2) }}</span>
                                        <span class="text-xs text-gray-600 ml-1">backed</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Details -->
                            <div class="p-6">
                                <div class="mb-4">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">
                                        <a href="{{ route('project.public', $project) }}" class="hover:text-primary-600 transition-colors">
                                            {{ $project->project_name }}
                                        </a>
                                    </h3>
                                    <p class="text-sm text-gray-600 mb-2">{{ ucfirst($project->category) }}</p>
                                    <p class="text-sm text-gray-500">
                                        Backed on {{ $investment->created_at->format('M j, Y') }}
                                    </p>
                                </div>

                                <!-- Project Progress -->
                                <div class="mb-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-sm font-medium text-gray-700">Progress</span>
                                        <span class="text-sm font-bold {{ $fundingPercentage >= 100 ? 'text-green-600' : 'text-gray-900' }}">
                                            {{ number_format($fundingPercentage) }}%
                                        </span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-gradient-to-r {{ $fundingPercentage >= 100 ? 'from-green-500 to-emerald-500' : 'from-primary-500 to-primary-600' }} h-2 rounded-full transition-all duration-300"
                                             style="width: {{ min($fundingPercentage, 100) }}%">
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Stats -->
                                <div class="grid grid-cols-3 gap-4 text-center text-sm mb-4">
                                    <div>
                                        <div class="font-bold text-gray-900">${{ number_format($project->pledged) }}</div>
                                        <div class="text-gray-500">raised</div>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ number_format($project->investors) }}</div>
                                        <div class="text-gray-500">backers</div>
                                    </div>
                                    <div>
                                        <div class="font-bold {{ $isActive ? 'text-gray-900' : 'text-red-500' }}">
                                            @if($isActive)
                                                {{ $daysLeft == 0 ? 'Today' : $daysLeft }}
                                            @else
                                                Ended
                                            @endif
                                        </div>
                                        <div class="text-gray-500">
                                            {{ $isActive ? ($daysLeft == 0 ? '' : 'days left') : '' }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Reward Info -->
                                @if($investment->reward)
                                    <div class="bg-gray-50 rounded-xl p-3 mb-4">
                                        <div class="text-sm font-medium text-gray-900 mb-1">Reward Tier</div>
                                        <div class="text-sm text-gray-600">{{ $investment->reward->name }}</div>
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex space-x-2">
                                    <a href="{{ route('project.public', $project) }}" 
                                       class="flex-1 btn btn-outline btn-small text-center">
                                        View Project
                                    </a>
                                    @if($investment->status === 'completed')
                                        <a href="{{ route('investor.backed-projects.show', $investment) }}" 
                                           class="flex-1 btn btn-primary btn-small text-center">
                                            View Details
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $investments->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No backed projects yet</h3>
                        <p class="text-gray-600 mb-6">
                            Start exploring amazing projects and support creators bringing innovative ideas to life.
                        </p>
                        <a href="{{ route('project.explore') }}" class="btn btn-primary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Explore Projects
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>