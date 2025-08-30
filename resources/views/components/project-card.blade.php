@props(['project', 'publicView' => false])

@php
    $fundingPercentage = $project->goal > 0 ? min(($project->pledged / $project->goal) * 100, 100) : 0;
    $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
    $daysLeft = (int) abs($endDate->diffInDays(now()));
    $isActive = $endDate->isFuture();
    $createdDate = $project->created_at instanceof \Carbon\Carbon ? $project->created_at : \Carbon\Carbon::parse($project->created_at);
    $isNew = $createdDate->isAfter(now()->subDays(7));
@endphp

<div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
    <!-- Project Image -->
    <div class="relative overflow-hidden aspect-video">
        <img 
            src="{{ $project->image ? asset($project->image) : asset('images/project-placeholder.jpg') }}" 
            alt="{{ $project->project_name }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
        >
        
        <!-- Status Badges -->
        <div class="absolute top-4 left-4 flex flex-wrap gap-2">
            @if($isNew)
                <span class="px-2 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                    New
                </span>
            @endif
            
            @if($fundingPercentage >= 100)
                <span class="px-2 py-1 bg-primary-500 text-white text-xs font-semibold rounded-full">
                    Funded
                </span>
            @elseif(!$isActive)
                <span class="px-2 py-1 bg-gray-500 text-white text-xs font-semibold rounded-full">
                    Ended
                </span>
            @endif
        </div>

        <!-- Creator Info Overlay -->
        <div class="absolute bottom-4 left-4 flex items-center">
            <div class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center">
                <span class="text-xs font-semibold text-gray-700">
                    {{ strtoupper(substr($project->user->name ?? 'U', 0, 1)) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Project Content -->
    <div class="p-6">
        <!-- Project Title & Location -->
        <div class="mb-4">
            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-600 transition-colors">
                <a href="{{ $publicView ? route('project.public', $project->id) : route('project.show', $project->id) }}">
                    {{ $project->project_name }}
                </a>
            </h3>
            
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ $project->project_location }}
            </div>

            <p class="text-gray-600 text-sm line-clamp-2">
                {{ Str::limit($project->project_description, 100) }}
            </p>
        </div>

        <!-- Funding Progress -->
        <div class="mb-4">
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                <div 
                    class="bg-gradient-to-r from-primary-500 to-primary-600 h-2 rounded-full transition-all duration-300"
                    style="width: {{ $fundingPercentage }}%"
                ></div>
            </div>

            <!-- Funding Stats -->
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <div class="font-bold text-gray-900">
                        ${{ number_format($project->pledged) }}
                    </div>
                    <div class="text-gray-500">pledged</div>
                </div>
                <div>
                    <div class="font-bold text-gray-900">
                        {{ number_format($fundingPercentage) }}%
                    </div>
                    <div class="text-gray-500">funded</div>
                </div>
            </div>
        </div>

        <!-- Project Stats -->
        <div class="border-t border-gray-100 pt-4">
            <div class="grid grid-cols-3 gap-2 text-center text-sm">
                <!-- Goal -->
                <div>
                    <div class="font-semibold text-gray-900">
                        ${{ number_format($project->goal) }}
                    </div>
                    <div class="text-gray-500 text-xs">goal</div>
                </div>

                <!-- Backers -->
                <div>
                    <div class="font-semibold text-gray-900">
                        {{ number_format($project->investors) }}
                    </div>
                    <div class="text-gray-500 text-xs">backers</div>
                </div>

                <!-- Days Left -->
                <div>
                    <div class="font-semibold {{ $isActive ? 'text-gray-900' : 'text-red-500' }}">
                        @if($isActive)
                            {{ $daysLeft == 0 ? 'Today' : $daysLeft }}
                        @else
                            Ended
                        @endif
                    </div>
                    <div class="text-gray-500 text-xs">
                        {{ $isActive ? ($daysLeft == 0 ? '' : 'days left') : '' }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Creator Info -->
        <div class="border-t border-gray-100 pt-4 mt-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-600">
                    <span class="mr-1">by</span>
                    <span class="font-medium text-gray-900">
                        {{ $project->user->name ?? 'Unknown Creator' }}
                    </span>
                </div>

                @if($project->created_at)
                    <div class="text-xs text-gray-400">
                        {{ $createdDate->format('M j, Y') }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-6 space-y-2">
            <a 
                href="{{ $publicView ? route('project.public', $project->id) : route('project.show', $project->id) }}" 
                class="w-full btn btn-primary btn-small text-center"
            >
                View Project
            </a>
            
            @if($isActive && auth()->check() && auth()->user()->hasRole('projectinvestor'))
                @php
                    $userHasBacked = \App\Models\Investment::where('project_id', $project->id)
                        ->where('user_id', auth()->id())
                        ->where('status', 'completed')
                        ->exists();
                @endphp
                
                @if($userHasBacked)
                    <div class="w-full bg-green-100 border border-green-300 text-green-700 font-semibold py-2 px-4 rounded-lg text-center text-sm">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Backed
                    </div>
                @else
                    <a 
                        href="{{ route('project.back', $project) }}" 
                        class="w-full btn btn-outline btn-small text-center"
                    >
                        Back This Project
                    </a>
                @endif
            @elseif($isActive && !auth()->check())
                <a 
                    href="{{ route('login') }}" 
                    class="w-full btn btn-outline btn-small text-center"
                >
                    Login to Back
                </a>
            @endif
        </div>
    </div>
</div>