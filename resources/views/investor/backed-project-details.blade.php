<x-app-layout>
    <x-slot name="title">Investment Details - {{ $investment->project->project_name }}</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center space-x-4 mb-4">
                    <a href="{{ route('investor.backed-projects') }}" class="btn btn-outline btn-small">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Backed Projects
                    </a>
                </div>
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Investment Details</h1>
                        <p class="text-lg text-gray-600 mt-1">{{ $investment->project->project_name }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        @if($investment->status === 'completed')
                            <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 text-sm font-semibold rounded-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Backing Confirmed
                            </span>
                        @elseif($investment->status === 'pending')
                            <span class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-800 text-sm font-semibold rounded-xl">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Payment Processing
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Investment Details -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Investment Summary -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Investment Summary</h3>
                        
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">${{ number_format($investment->amount, 2) }}</div>
                                <div class="text-sm text-gray-600">Amount Backed</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary-600">{{ $investment->created_at->format('M j') }}</div>
                                <div class="text-sm text-gray-600">Date Backed</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-gray-900">#{{ $investment->id }}</div>
                                <div class="text-sm text-gray-600">Backing ID</div>
                            </div>
                            <div class="text-center">
                                @if($investment->reward)
                                    <div class="text-2xl font-bold text-green-600">✓</div>
                                    <div class="text-sm text-gray-600">With Reward</div>
                                @else
                                    <div class="text-2xl font-bold text-blue-600">♡</div>
                                    <div class="text-sm text-gray-600">No Reward</div>
                                @endif
                            </div>
                        </div>

                        <!-- Reward Details -->
                        @if($investment->reward)
                            <div class="bg-primary-50 rounded-xl p-6 mb-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h4 class="text-lg font-semibold text-gray-900">{{ $investment->reward->name }}</h4>
                                    <span class="text-lg font-bold text-primary-600">${{ number_format($investment->reward->discount, 2) }}</span>
                                </div>
                                <p class="text-gray-700 mb-4">{{ $investment->reward->description }}</p>
                                
                                @if($investment->reward->estimated_delivery_date)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        Estimated delivery: {{ \Carbon\Carbon::parse($investment->reward->estimated_delivery_date)->format('F Y') }}
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Payment Information -->
                        <div class="border-t border-gray-200 pt-6">
                            <h4 class="font-semibold text-gray-900 mb-4">Payment Information</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Payment Method</span>
                                    <div class="text-right">
                                        <div class="font-medium text-gray-900">{{ $investment->paymentMethod->display_name }}</div>
                                        <div class="text-sm text-gray-500">{{ ucfirst(str_replace('_', ' ', $investment->paymentMethod->type)) }}</div>
                                    </div>
                                </div>
                                @if($investment->payment_reference)
                                    <div class="flex justify-between items-center">
                                        <span class="text-gray-600">Transaction ID</span>
                                        <span class="font-mono text-sm text-gray-900">{{ $investment->payment_reference }}</span>
                                    </div>
                                @endif
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Status</span>
                                    <span class="capitalize font-medium {{ $investment->status === 'completed' ? 'text-green-600' : 'text-yellow-600' }}">
                                        {{ $investment->status }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Message -->
                        @if($investment->message)
                            <div class="border-t border-gray-200 pt-6">
                                <h4 class="font-semibold text-gray-900 mb-3">Your Message to Creator</h4>
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-gray-700">{{ $investment->message }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Project Updates -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Project Updates</h3>
                        
                        @if($investment->project->updates && $investment->project->updates->count() > 0)
                            <div class="space-y-4">
                                @foreach($investment->project->updates->take(3) as $update)
                                    <div class="border-l-4 border-primary-400 pl-4 py-2">
                                        <h4 class="font-medium text-gray-900">{{ $update->title }}</h4>
                                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($update->description, 150) }}</p>
                                        <p class="text-xs text-gray-500 mt-2">{{ $update->created_at->format('M j, Y') }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <a href="{{ route('project.public', $investment->project) }}#updates" class="text-primary-600 hover:text-primary-700 font-medium text-sm">
                                    View all project updates →
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-gray-500">No project updates yet</p>
                                <p class="text-sm text-gray-400 mt-1">Check back later for updates from the creator</p>
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('project.public', $investment->project) }}" class="btn btn-outline">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                View Project
                            </a>
                            <button type="button" class="btn btn-outline">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                                </svg>
                                Share Project
                            </button>
                            <button type="button" class="btn btn-outline">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Download Receipt
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Project Info & Stats -->
                <div class="space-y-6">
                    <!-- Project Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Project Image -->
                        <div class="h-48 bg-gradient-to-br from-primary-500 to-primary-600">
                            @if($investment->project->image)
                                <img src="{{ asset($investment->project->image) }}" alt="{{ $investment->project->project_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">
                                        {{ strtoupper(substr($investment->project->project_name, 0, 2)) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $investment->project->project_name }}</h3>
                            <p class="text-sm text-gray-600 mb-4">by {{ $investment->project->creator->name }}</p>

                            <!-- Project Stats -->
                            @php
                                $project = $investment->project;
                                $fundingPercentage = $project->goal > 0 ? min(($project->pledged / $project->goal) * 100, 100) : 0;
                                $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
                                $daysLeft = (int) abs($endDate->diffInDays(now()));
                                $isActive = $endDate->isFuture();
                            @endphp

                            <!-- Funding Progress -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-lg font-bold text-gray-900">
                                        ${{ number_format($project->pledged) }}
                                    </span>
                                    <span class="text-lg font-bold {{ $fundingPercentage >= 100 ? 'text-green-600' : 'text-primary-600' }}">
                                        {{ number_format($fundingPercentage) }}%
                                    </span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                    <div class="bg-gradient-to-r {{ $fundingPercentage >= 100 ? 'from-green-500 to-emerald-500' : 'from-primary-500 to-primary-600' }} h-2 rounded-full transition-all duration-300"
                                         style="width: {{ min($fundingPercentage, 100) }}%">
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">
                                    pledged of ${{ number_format($project->goal) }} goal
                                </p>
                            </div>

                            <!-- Project Stats Grid -->
                            <div class="grid grid-cols-2 gap-4 text-center text-sm">
                                <div>
                                    <div class="text-lg font-bold text-gray-900">{{ number_format($project->investors) }}</div>
                                    <div class="text-gray-500">backers</div>
                                </div>
                                <div>
                                    <div class="text-lg font-bold {{ $isActive ? 'text-gray-900' : 'text-red-500' }}">
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
                        </div>
                    </div>

                    <!-- Contact Creator -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Creator</h3>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold">
                                    {{ strtoupper(substr($investment->project->creator->name, 0, 2)) }}
                                </span>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">{{ $investment->project->creator->name }}</div>
                                <div class="text-sm text-gray-600">Project Creator</div>
                            </div>
                        </div>
                        <button type="button" class="w-full btn btn-outline">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Send Message
                        </button>
                    </div>

                    <!-- Support -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Need Help?</h3>
                        <div class="space-y-3 text-sm">
                            <p class="text-gray-600">Have questions about your backing or need support?</p>
                            <div class="space-y-2">
                                <a href="mailto:support@crowdfund.com" class="flex items-center text-primary-600 hover:text-primary-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    support@crowdfund.com
                                </a>
                                <a href="#" class="flex items-center text-primary-600 hover:text-primary-700">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Help Center
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>