<x-app-layout>
    <x-slot name="title">Investor Dashboard</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <!-- Dashboard Header -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ auth()->user()->name }}!</h1>
                        <p class="text-lg text-gray-600 mt-1">Manage your investments and discover new projects</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('project.explore') }}" class="btn btn-primary">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Explore Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Invested -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Invested</p>
                            <p class="text-2xl font-bold text-gray-900">${{ number_format($totalInvested, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Projects Backed -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Projects Backed</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalProjects }}</p>
                        </div>
                    </div>
                </div>

                <!-- Average Investment -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Average Investment</p>
                            <p class="text-2xl font-bold text-gray-900">
                                ${{ $totalProjects > 0 ? number_format($totalInvested / $totalProjects, 2) : '0.00' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Investments -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Investments</h3>
                            <a href="{{ route('investor.backed-projects') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        @if($recentInvestments->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentInvestments as $investment)
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                            <span class="text-white font-bold text-sm">
                                                {{ strtoupper(substr($investment->project->project_name, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $investment->project->project_name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $investment->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-sm font-semibold text-gray-900">
                                                ${{ number_format($investment->amount, 2) }}
                                            </p>
                                            <p class="text-xs text-green-600">Completed</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <p class="text-gray-500">No investments yet</p>
                                <a href="{{ route('project.explore') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium mt-2 inline-block">
                                    Start exploring projects
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Recommended Projects -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Recommended for You</h3>
                            <a href="{{ route('project.explore') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        @if($recommendedProjects->count() > 0)
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($recommendedProjects->take(4) as $project)
                                    <a href="{{ route('project.public', $project) }}" class="group block">
                                        <div class="bg-gray-50 rounded-xl p-4 group-hover:bg-gray-100 transition-colors">
                                            <div class="aspect-video bg-gradient-to-br from-primary-500 to-primary-600 rounded-lg mb-3 flex items-center justify-center">
                                                @if($project->image)
                                                    <img src="{{ asset($project->image) }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover rounded-lg">
                                                @else
                                                    <span class="text-white font-bold text-lg">
                                                        {{ strtoupper(substr($project->project_name, 0, 2)) }}
                                                    </span>
                                                @endif
                                            </div>
                                            <h4 class="font-semibold text-gray-900 text-sm mb-1 line-clamp-2">
                                                {{ $project->project_name }}
                                            </h4>
                                            <p class="text-xs text-gray-600 mb-2">
                                                {{ ucfirst($project->category) }}
                                            </p>
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs font-medium text-green-600">
                                                    ${{ number_format($project->pledged) }} raised
                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    {{ $project->funding_percentage }}% funded
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <p class="text-gray-500">Explore projects to get personalized recommendations</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <a href="{{ route('project.explore') }}" class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white hover:from-blue-600 hover:to-blue-700 transition-all transform hover:scale-105">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-lg">Explore Projects</h3>
                            <p class="text-blue-100 text-sm">Find your next investment opportunity</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('investor.backed-projects') }}" class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-105">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-lg">Backed Projects</h3>
                            <p class="text-green-100 text-sm">Track your investments</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('investor.profile') }}" class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white hover:from-purple-600 hover:to-purple-700 transition-all transform hover:scale-105">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-lg">Manage Profile</h3>
                            <p class="text-purple-100 text-sm">Update your information</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>