<x-project-layout :title="$project->project_name . ' - CrowdFund Platform'">
    @php
        $fundingPercentage = $project->goal > 0 ? min(($project->pledged / $project->goal) * 100, 100) : 0;
        $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
        $daysLeft = (int) abs($endDate->diffInDays(now()));
        $isActive = $endDate->isFuture();
        $createdDate = $project->created_at instanceof \Carbon\Carbon ? $project->created_at : \Carbon\Carbon::parse($project->created_at);
        $isNew = $createdDate->isAfter(now()->subDays(7));
        $urgencyLevel = $daysLeft <= 7 ? 'high' : ($daysLeft <= 21 ? 'medium' : 'low');
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <!-- Hero Section with Immersive Header -->
        <section class="relative bg-white shadow-sm">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-gradient-to-r from-primary-50 via-white to-primary-50 opacity-60"></div>
            
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <!-- Enhanced Breadcrumb -->
                <nav class="mb-6" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-3 text-sm">
                        <li>
                            <a href="{{ route('project.index') }}" class="flex items-center text-gray-500 hover:text-primary-600 transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                </svg>
                                Projects
                            </a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-600 font-medium">{{ $project->category }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-900 font-semibold">{{ Str::limit($project->project_name, 40) }}</span>
                        </li>
                    </ol>
                </nav>

                <!-- Project Title & Creator -->
                <div class="mb-8">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex-1">
                            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-3">
                                {{ $project->project_name }}
                            </h1>
                            <p class="text-lg lg:text-xl text-gray-600 leading-relaxed mb-4">
                                {{ $project->short_description }}
                            </p>
                            
                            <!-- Creator Info -->
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center shadow-md">
                                        <span class="text-lg font-bold text-white">
                                            {{ strtoupper(substr($project->creator->name ?? 'U', 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $project->creator->name ?? 'Unknown Creator' }}</p>
                                        <p class="text-sm text-gray-500">{{ $project->project_location }}</p>
                                    </div>
                                </div>
                                
                                <!-- Status Badges -->
                                <div class="flex flex-wrap gap-2 ml-auto">
                                    @if($project->verified)
                                        <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 text-sm font-medium rounded-full border border-blue-200">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            Verified
                                        </span>
                                    @endif
                                    
                                    @if($project->staff_pick)
                                        <span class="inline-flex items-center px-3 py-1 bg-purple-50 text-purple-700 text-sm font-medium rounded-full border border-purple-200">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            Staff Pick
                                        </span>
                                    @endif
                                    
                                    @if($project->trending)
                                        <span class="inline-flex items-center px-3 py-1 bg-red-50 text-red-700 text-sm font-medium rounded-full border border-red-200">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                                            </svg>
                                            Trending
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-8 lg:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 lg:gap-12">
                    <!-- Left Column - Project Content -->
                    <div class="xl:col-span-2 space-y-8">
                        <!-- Hero Image & Media -->
                        <div class="group">
                            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-2xl">
                                <img 
                                    src="{{ $project->image ? asset($project->image) : asset('images/project-placeholder.jpg') }}" 
                                    alt="{{ $project->project_name }}"
                                    class="w-full h-full object-cover group-hover:scale-[1.02] transition-transform duration-700 ease-out"
                                >
                                
                                <!-- Play Button Overlay for Videos -->
                                @if($project->video_url)
                                    <div class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <button class="w-20 h-20 bg-white bg-opacity-90 rounded-full flex items-center justify-center shadow-xl hover:bg-opacity-100 transition-all duration-300 hover:scale-110">
                                            <svg class="w-8 h-8 text-gray-800 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18a1 1 0 000-1.69L9.54 5.98A1 1 0 008 6.82z"/>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                                
                                <!-- Success Badge for Funded Projects -->
                                @if($fundingPercentage >= 100)
                                    <div class="absolute top-6 right-6">
                                        <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-sm font-bold rounded-full shadow-lg">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            Successfully Funded
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Project Navigation Tabs -->
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <button class="project-tab active border-primary-500 text-primary-600 whitespace-nowrap py-3 px-1 border-b-2 font-semibold text-sm" data-tab="story">
                                    Story
                                </button>
                                <button class="project-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-semibold text-sm" data-tab="updates">
                                    Updates <span class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">{{ $project->updates->count() ?? 0 }}</span>
                                </button>
                                <button class="project-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-semibold text-sm" data-tab="comments">
                                    Comments <span class="ml-2 bg-gray-100 text-gray-600 py-0.5 px-2 rounded-full text-xs">{{ $project->comments->count() ?? 0 }}</span>
                                </button>
                                @if($project->team_info && count($project->team_info) > 0)
                                <button class="project-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-3 px-1 border-b-2 font-semibold text-sm" data-tab="team">
                                    Team
                                </button>
                                @endif
                            </nav>
                        </div>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Story Tab -->
                            <div id="story" class="tab-panel active space-y-8">
                                <!-- Project Description -->
                                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
                                    <div class="prose prose-lg prose-gray max-w-none">
                                        {!! nl2br(e($project->project_description)) !!}
                                    </div>
                                </div>

                                <!-- Stretch Goals -->
                                @if($project->stretch_goals && count($project->stretch_goals) > 0)
                                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl border border-amber-200 p-8">
                                        <div class="flex items-center mb-6">
                                            <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mr-4">
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">Stretch Goals</h3>
                                                <p class="text-gray-600">Unlock additional features as we reach new milestones</p>
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            @foreach($project->stretch_goals as $goal)
                                                @php $goalAchieved = $project->pledged >= $goal['amount']; @endphp
                                                <div class="relative bg-white rounded-xl p-6 shadow-sm {{ $goalAchieved ? 'ring-2 ring-green-500' : 'border border-gray-200' }}">
                                                    <div class="flex items-start justify-between">
                                                        <div class="flex-1">
                                                            <div class="flex items-center mb-3">
                                                                <div class="w-8 h-8 rounded-full {{ $goalAchieved ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center mr-3">
                                                                    @if($goalAchieved)
                                                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                                        </svg>
                                                                    @else
                                                                        <span class="text-xs font-bold text-gray-600">{{ $loop->iteration }}</span>
                                                                    @endif
                                                                </div>
                                                                <h4 class="text-lg font-semibold {{ $goalAchieved ? 'text-green-900' : 'text-gray-900' }}">
                                                                    {{ $goal['title'] }}
                                                                </h4>
                                                            </div>
                                                            <p class="text-gray-600 leading-relaxed">{{ $goal['description'] ?? '' }}</p>
                                                        </div>
                                                        <div class="text-right ml-6">
                                                            <div class="text-2xl font-bold {{ $goalAchieved ? 'text-green-600' : 'text-gray-900' }}">
                                                                ${{ number_format($goal['amount']) }}
                                                            </div>
                                                            @if($goalAchieved)
                                                                <div class="text-sm font-medium text-green-600 mt-1">✓ Achieved!</div>
                                                            @else
                                                                <div class="text-sm text-gray-500 mt-1">Goal</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if($goalAchieved)
                                                        <div class="absolute top-3 right-3">
                                                            <span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">
                                                                Unlocked
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Risk & Challenges -->
                                @if($project->risks_challenges)
                                    <div class="bg-red-50 rounded-2xl border border-red-200 p-8">
                                        <div class="flex items-center mb-6">
                                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center mr-4">
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">Risks & Challenges</h3>
                                                <p class="text-gray-600">Transparency about potential obstacles</p>
                                            </div>
                                        </div>
                                        <div class="prose prose-gray max-w-none">
                                            <p class="text-gray-700 leading-relaxed">{{ $project->risks_challenges }}</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Environmental Impact -->
                                @if($project->environmental_impact)
                                    <div class="bg-green-50 rounded-2xl border border-green-200 p-8">
                                        <div class="flex items-center mb-6">
                                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">Environmental Impact</h3>
                                                <p class="text-gray-600">Our commitment to sustainability</p>
                                            </div>
                                        </div>
                                        <div class="prose prose-gray max-w-none">
                                            <p class="text-gray-700 leading-relaxed">{{ $project->environmental_impact }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Updates Tab -->
                            <div id="updates" class="tab-panel space-y-6" style="display: none;">
                                @if($project->updates && $project->updates->count() > 0)
                                    @foreach($project->updates as $update)
                                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                                            <div class="flex items-start justify-between mb-4">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $update->name }}</h3>
                                                <time class="text-sm text-gray-500">{{ $update->created_at->format('M j, Y') }}</time>
                                            </div>
                                            <p class="text-gray-600 leading-relaxed">{{ $update->text }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center py-12">
                                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-gray-500">No updates yet. Check back soon!</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Comments Tab -->
                            <div id="comments" class="tab-panel space-y-6" style="display: none;">
                                @if($project->comments && $project->comments->count() > 0)
                                    @foreach($project->comments as $comment)
                                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                                            <div class="flex items-start space-x-4">
                                                <div class="w-10 h-10 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <span class="text-sm font-semibold text-gray-600">
                                                        {{ strtoupper(substr($comment->user->name ?? 'A', 0, 1)) }}
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center justify-between mb-2">
                                                        <h4 class="font-semibold text-gray-900">{{ $comment->user->name ?? 'Anonymous' }}</h4>
                                                        <time class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</time>
                                                    </div>
                                                    <p class="text-gray-600 leading-relaxed">{{ $comment->text }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center py-12">
                                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"/>
                                        </svg>
                                        <p class="text-gray-500">No comments yet. Be the first to share your thoughts!</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Team Tab -->
                            @if($project->team_info && count($project->team_info) > 0)
                                <div id="team" class="tab-panel" style="display: none;">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                        @foreach($project->team_info as $member)
                                            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center">
                                                <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center mx-auto mb-6">
                                                    <span class="text-2xl font-bold text-white">
                                                        {{ strtoupper(substr($member['name'] ?? 'T', 0, 1)) }}
                                                    </span>
                                                </div>
                                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $member['name'] ?? 'Team Member' }}</h3>
                                                <p class="text-primary-600 font-semibold mb-3">{{ $member['role'] ?? 'Team Member' }}</p>
                                                @if(isset($member['experience']))
                                                    <p class="text-gray-600">{{ $member['experience'] }}</p>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right Sidebar - Funding & Support -->
                    <div class="space-y-6">
                        <!-- Mobile Support Tiers Preview -->
                        @if($project->reward && $project->reward->count() > 0)
                            <div class="xl:hidden bg-white rounded-2xl border border-gray-100 shadow-md p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 text-center">Support This Project</h3>
                                <div class="grid grid-cols-1 gap-3">
                                    @foreach($project->reward->take(2) as $reward)
                                        <button class="text-left border-2 border-gray-200 hover:border-primary-300 rounded-xl p-4 transition-all group">
                                            <div class="flex justify-between items-center mb-2">
                                                <span class="font-bold text-primary-600 text-xl">${{ number_format($reward->discount) }}</span>
                                                <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </div>
                                            <h4 class="font-semibold text-gray-900 text-sm mb-1">{{ Str::limit($reward->name, 35) }}</h4>
                                            <p class="text-xs text-gray-600">{{ Str::limit($reward->description, 60) }}</p>
                                        </button>
                                    @endforeach
                                    @if($project->reward->count() > 2)
                                        <button class="text-center py-3 text-primary-600 hover:text-primary-700 font-medium text-sm">
                                            View All {{ $project->reward->count() }} Tiers →
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Funding Statistics Card -->
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg sticky-funding-card">
                            <!-- Funding Progress -->
                            <div class="p-8 pb-6">
                                <!-- Amount Raised -->
                                <div class="mb-6">
                                    <div class="flex items-baseline justify-between mb-3">
                                        <span class="text-4xl font-bold text-gray-900">
                                            ${{ number_format($project->pledged) }}
                                        </span>
                                        <div class="text-right">
                                            <span class="text-2xl font-bold {{ $fundingPercentage >= 100 ? 'text-green-600' : 'text-primary-600' }}">
                                                {{ number_format($fundingPercentage) }}%
                                            </span>
                                            <div class="text-sm text-gray-500">funded</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Progress Bar -->
                                    <div class="relative w-full bg-gray-200 rounded-full h-3 mb-4">
                                        <div class="absolute top-0 left-0 h-full bg-gradient-to-r {{ $fundingPercentage >= 100 ? 'from-green-500 to-emerald-500' : 'from-primary-500 to-primary-600' }} rounded-full transition-all duration-1000 ease-out" 
                                             style="width: {{ min($fundingPercentage, 100) }}%">
                                        </div>
                                        @if($fundingPercentage > 100)
                                            <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-green-400 to-green-500 opacity-50 rounded-full animate-pulse" 
                                                 style="width: 100%">
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <p class="text-gray-600">
                                        pledged of <span class="font-semibold">${{ number_format($project->goal) }}</span> goal
                                    </p>
                                </div>

                                <!-- Key Stats Grid -->
                                <div class="grid grid-cols-2 gap-6 mb-6">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-gray-900">{{ number_format($project->investors) }}</div>
                                        <div class="text-sm text-gray-600">backers</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold {{ $urgencyLevel === 'high' ? 'text-red-600' : ($urgencyLevel === 'medium' ? 'text-orange-600' : 'text-gray-900') }}">
                                            @if($isActive)
                                                {{ $daysLeft === 0 ? 'Today' : $daysLeft }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                        <div class="text-sm text-gray-600">days {{ $isActive ? 'left' : 'ended' }}</div>
                                    </div>
                                </div>

                                <!-- Campaign Status -->
                                <div class="text-center py-3 px-4 {{ $urgencyLevel === 'high' ? 'bg-red-50 text-red-700 border border-red-200' : ($urgencyLevel === 'medium' ? 'bg-orange-50 text-orange-700 border border-orange-200' : 'bg-gray-50 text-gray-700 border border-gray-200') }} rounded-xl text-sm">
                                    @if($isActive)
                                        @if($urgencyLevel === 'high')
                                            🔥 Last week - Don't miss out!
                                        @elseif($urgencyLevel === 'medium')
                                            ⏰ Campaign ending soon
                                        @else
                                            📅 Campaign ends {{ $endDate->format('M j, Y') }}
                                        @endif
                                    @else
                                        Campaign ended {{ $endDate->format('M j, Y') }}
                                    @endif
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="px-8 pb-6">
                                @if($isActive)
                                    @auth
                                        @if(auth()->user()->hasRole('projectinvestor'))
                                            <a href="{{ route('project.back', $project) }}" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 mb-3 block text-center">
                                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                                </svg>
                                                Back This Project
                                            </a>
                                        @elseif(auth()->user()->hasRole('projectresponsable') && auth()->user()->id == $project->user_id)
                                            <a href="{{ route('project.edit', $project->id) }}" class="w-full btn btn-outline btn-large">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit Project
                                            </a>
                                        @else
                                            <div class="w-full bg-gray-100 text-gray-500 font-semibold py-4 px-6 rounded-xl text-center cursor-not-allowed mb-3">
                                                Login to Back Project
                                            </div>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 mb-3 block text-center">
                                            Login to Back This Project
                                        </a>
                                    @endauth
                                @else
                                    <div class="w-full bg-gray-100 text-gray-500 font-semibold py-4 px-6 rounded-xl text-center cursor-not-allowed mb-3">
                                        Campaign Ended
                                    </div>
                                @endif

                                <!-- Share & Follow Buttons -->
                                <div class="grid grid-cols-2 gap-3">
                                    <button onclick="shareProject()" class="flex items-center justify-center px-4 py-3 border-2 border-gray-200 hover:border-primary-300 text-gray-700 hover:text-primary-600 font-semibold rounded-xl transition-all">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                        </svg>
                                        Share
                                    </button>
                                    <button class="flex items-center justify-center px-4 py-3 border-2 border-gray-200 hover:border-red-300 text-gray-700 hover:text-red-600 font-semibold rounded-xl transition-all">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                        Save
                                    </button>
                                </div>
                            </div>

                            <!-- Campaign Analytics -->
                            <div class="border-t border-gray-100 px-8 py-6">
                                <h4 class="font-semibold text-gray-900 mb-4">Campaign Performance</h4>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Views</span>
                                        <span class="font-semibold">{{ number_format($project->views ?? 0) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Likes</span>
                                        <span class="font-semibold">{{ number_format($project->likes ?? 0) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Shares</span>
                                        <span class="font-semibold">{{ number_format($project->shares ?? 0) }}</span>
                                    </div>
                                    @if($project->investors > 0)
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Avg. Pledge</span>
                                            <span class="font-semibold">${{ number_format($project->pledged / $project->investors) }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Desktop Support Tiers -->
                        @if($project->reward && $project->reward->count() > 0)
                            <div class="hidden xl:block bg-white rounded-2xl border border-gray-100 shadow-md">
                                <div class="px-8 py-6 border-b border-gray-100">
                                    <h3 class="text-xl font-bold text-gray-900">Support Tiers</h3>
                                    <p class="text-gray-600 text-sm mt-1">Choose your level of support</p>
                                </div>
                                <div class="p-6 space-y-4">
                                    @foreach($project->reward as $reward)
                                        <div class="group border-2 border-gray-200 hover:border-primary-300 rounded-xl p-6 transition-all cursor-pointer hover:shadow-md">
                                            <div class="flex justify-between items-start mb-4">
                                                <div class="flex-1 min-w-0 pr-4">
                                                    <h4 class="font-semibold text-gray-900 text-sm leading-tight mb-1">{{ Str::limit($reward->name, 40) }}</h4>
                                                    <p class="text-sm text-gray-600 leading-relaxed">{{ Str::limit($reward->description, 80) }}</p>
                                                </div>
                                                <div class="text-right flex-shrink-0">
                                                    <div class="text-2xl font-bold text-primary-600">${{ number_format($reward->discount) }}</div>
                                                </div>
                                            </div>
                                            <button class="w-full bg-gray-50 group-hover:bg-primary-50 group-hover:text-primary-700 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-all text-sm">
                                                Select This Tier
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('styles')
    <style>
        /* Enhanced sticky positioning with better performance */
        @media (min-width: 1280px) {
            .sticky-funding-card {
                position: -webkit-sticky;
                position: sticky;
                top: 2rem;
                max-height: calc(100vh - 4rem);
                overflow-y: auto;
                scrollbar-width: thin;
                scrollbar-color: #e5e7eb transparent;
            }
        }
        
        /* Custom scrollbar for webkit browsers */
        .sticky-funding-card::-webkit-scrollbar {
            width: 4px;
        }
        
        .sticky-funding-card::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sticky-funding-card::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 2px;
        }
        
        .sticky-funding-card::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
        
        /* Tab styles */
        .project-tab.active {
            border-color: #3b82f6;
            color: #3b82f6;
        }
        
        .project-tab:hover:not(.active) {
            border-color: #d1d5db;
            color: #374151;
        }
        
        /* Enhanced animations */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Gradient backgrounds for better visual hierarchy */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* Progress bar animation */
        @keyframes progressFill {
            from { width: 0%; }
            to { width: var(--progress-width); }
        }
        
        /* Responsive text scaling */
        @media (max-width: 640px) {
            .text-4xl { font-size: 2.25rem; }
            .text-3xl { font-size: 1.875rem; }
        }
    </style>
    @endpush

    @push('scripts')
    <script>
        // Tab functionality with smooth transitions
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.project-tab');
            const panels = document.querySelectorAll('.tab-panel');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetTab = this.dataset.tab;
                    
                    // Remove active class from all tabs and panels
                    tabs.forEach(t => t.classList.remove('active'));
                    panels.forEach(p => {
                        p.style.display = 'none';
                        p.classList.remove('active');
                    });
                    
                    // Add active class to clicked tab and corresponding panel
                    this.classList.add('active');
                    const targetPanel = document.getElementById(targetTab);
                    if (targetPanel) {
                        targetPanel.style.display = 'block';
                        targetPanel.classList.add('active');
                    }
                });
            });
        });
        
        // Enhanced share functionality
        function shareProject() {
            const projectData = {
                title: '{{ $project->project_name }}',
                text: '{{ Str::limit($project->short_description, 100) }}',
                url: window.location.href
            };
            
            if (navigator.share) {
                navigator.share(projectData).catch(console.error);
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    // Show toast notification
                    showToast('Link copied to clipboard!');
                });
            }
        }
        
        // Toast notification system
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-4 right-4 bg-gray-900 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform';
            toast.textContent = message;
            document.body.appendChild(toast);
            
            setTimeout(() => toast.classList.remove('translate-x-full'), 100);
            setTimeout(() => {
                toast.classList.add('translate-x-full');
                setTimeout(() => document.body.removeChild(toast), 300);
            }, 3000);
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
        
        // Enhanced video play functionality
        const videoButton = document.querySelector('.video-play-button');
        if (videoButton) {
            videoButton.addEventListener('click', function() {
                const videoUrl = '{{ $project->video_url ?? "" }}';
                if (videoUrl) {
                    window.open(videoUrl, '_blank');
                }
            });
        }
    </script>
    @endpush
</x-project-layout>