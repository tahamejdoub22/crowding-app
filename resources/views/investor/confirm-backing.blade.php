<x-app-layout>
    <x-slot name="title">Confirm Backing - {{ $project->project_name }}</x-slot>

    <style>
        .confirmation-card {
            transition: all 0.3s ease;
        }
        .confirmation-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .progress-step {
            transition: all 0.3s ease;
        }
        .progress-step.active {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }
        .progress-step.completed {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }
        .amount-breakdown {
            animation: fadeInUp 0.5s ease-out;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .pulse-success {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .8;
            }
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4 mb-6">
                    <div class="progress-step completed flex items-center px-4 py-2 rounded-full">
                        <span class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-600 font-bold text-sm mr-2">✓</span>
                        <span class="text-sm font-medium">Select Reward</span>
                    </div>
                    <div class="w-8 h-0.5 bg-green-400"></div>
                    <div class="progress-step active flex items-center px-4 py-2 rounded-full">
                        <span class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold text-sm mr-2">2</span>
                        <span class="text-sm font-medium">Confirm</span>
                    </div>
                    <div class="w-8 h-0.5 bg-gray-300"></div>
                    <div class="progress-step flex items-center px-4 py-2 rounded-full bg-gray-200 text-gray-600">
                        <span class="w-6 h-6 bg-gray-400 rounded-full flex items-center justify-center text-white font-bold text-sm mr-2">3</span>
                        <span class="text-sm font-medium">Payment</span>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center space-x-4 mb-6">
                    <a href="{{ route('project.back', $project) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Selection
                    </a>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Confirm Your Backing</h1>
                <p class="text-lg text-gray-600">Review your contribution details before proceeding</p>
            </div>

            @if(session('error'))
                <div class="max-w-2xl mx-auto mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-red-800">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Confirmation Area -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Backing Summary -->
                    <div class="confirmation-card bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Backing Summary</h3>
                            <div class="flex items-center text-green-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm font-medium">Ready to back</span>
                            </div>
                        </div>
                        
                        <!-- Project Info -->
                        <div class="flex items-center space-x-4 pb-6 border-b border-gray-200 mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex-shrink-0">
                                @if($project->image)
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover rounded-xl">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="text-lg font-bold text-white">
                                            {{ strtoupper(substr($project->project_name, 0, 2)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl font-bold text-gray-900">{{ $project->project_name }}</h4>
                                <p class="text-sm text-gray-600 mt-1">by {{ $project->creator->name }}</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    {{ ucfirst($project->category) }}
                                </div>
                            </div>
                        </div>

                        <!-- Reward or Custom Amount -->
                        @if($reward)
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 mb-6">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="flex items-start space-x-3">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="font-bold text-gray-900 text-lg">{{ $reward->name }}</h5>
                                            <p class="text-gray-700 text-sm mt-1">{{ $reward->description }}</p>
                                            @if($reward->estimated_delivery_date)
                                                <div class="flex items-center mt-3 text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                    Estimated delivery: {{ \Carbon\Carbon::parse($reward->estimated_delivery_date)->format('F Y') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-2xl font-bold text-blue-600">${{ number_format($reward->discount, 2) }}</span>
                                        <div class="text-sm text-gray-500">minimum</div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-gray-900 text-lg">Support without reward</h5>
                                            <p class="text-gray-700 text-sm">Thank you for supporting this project!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Amount Breakdown -->
                        <div class="amount-breakdown">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Payment Breakdown</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-gray-600">Your contribution</span>
                                    <span class="text-xl font-bold text-gray-900">${{ number_format($amount, 2) }}</span>
                                </div>
                                @if(isset($processingFee))
                                    <div class="flex justify-between items-center py-2 text-sm">
                                        <span class="text-gray-500">Processing fee (2.9% + $0.30)</span>
                                        <span class="text-gray-600">${{ number_format($processingFee, 2) }}</span>
                                    </div>
                                    <div class="border-t border-gray-200 pt-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-lg font-semibold text-gray-900">Total charge</span>
                                            <span class="text-2xl font-bold text-blue-600">${{ number_format($totalAmount, 2) }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="confirmation-card bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Payment Method</h3>
                        
                        <div class="flex items-center justify-between p-4 border-2 border-blue-200 bg-blue-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                    @if($paymentMethod->type === 'credit_card' || $paymentMethod->type === 'debit_card')
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                        </svg>
                                    @elseif($paymentMethod->type === 'paypal')
                                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.628.628 0 0 0-.36-.594.734.734 0 0 0-.64-.003c-.91.387-1.888.58-2.91.58h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H7.076l1.12-7.106c.082-.518.526-.9 1.05-.9h2.19c4.298 0 7.664-1.747 8.647-6.797.03-.149.054-.294.077-.437z"/>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $paymentMethod->display_name }}</div>
                                    <div class="text-sm text-gray-600">{{ ucfirst(str_replace('_', ' ', $paymentMethod->type)) }}</div>
                                </div>
                            </div>
                            <div class="text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Optional Message -->
                    @if($message)
                        <div class="confirmation-card bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Your Message to Creator</h3>
                            <div class="bg-gray-50 rounded-xl p-4">
                                <p class="text-gray-700 leading-relaxed">{{ $message }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Important Notes -->
                    <div class="confirmation-card bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-6 h-6 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            Important Information
                        </h3>
                        <div class="space-y-3 text-sm text-gray-700">
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p>Your payment will only be charged if this project reaches its funding goal.</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p>You can modify or cancel your backing anytime before the campaign ends.</p>
                            </div>
                            <div class="flex items-start space-x-3">
                                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p>You'll receive email updates about the project's progress and any changes.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <form method="POST" action="{{ route('project.back.process', $project) }}" id="final-backing-form">
                        @csrf
                        <input type="hidden" name="reward_id" value="{{ $reward?->id }}">
                        <input type="hidden" name="custom_amount" value="{{ $amount }}">
                        <input type="hidden" name="payment_method_id" value="{{ $paymentMethod->id }}">
                        <input type="hidden" name="message" value="{{ $message }}">
                        
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-4 sm:space-y-0 gap-4">
                            <a href="{{ route('project.back', $project) }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                                </svg>
                                Modify Backing
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                                    id="confirm-button">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Confirm & Back Project
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    
                    <!-- Project Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Project Image -->
                        <div class="relative h-48 bg-gradient-to-br from-blue-500 to-blue-600">
                            @if($project->image)
                                <img src="{{ asset($project->image) }}" alt="{{ $project->project_name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-4xl font-bold text-white">
                                        {{ strtoupper(substr($project->project_name, 0, 2)) }}
                                    </span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->project_name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">by {{ $project->creator->name }}</p>

                            @php
                                $fundingPercentage = $project->goal > 0 ? min(($project->pledged / $project->goal) * 100, 100) : 0;
                                $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
                                $daysLeft = (int) abs($endDate->diffInDays(now()));
                                $isActive = $endDate->isFuture();
                            @endphp

                            <!-- Funding Progress -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-2xl font-bold text-gray-900">
                                        ${{ number_format($project->pledged) }}
                                    </span>
                                    <span class="text-lg font-bold {{ $fundingPercentage >= 100 ? 'text-green-600' : 'text-blue-600' }}">
                                        {{ number_format($fundingPercentage) }}%
                                    </span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                                    <div class="bg-gradient-to-r {{ $fundingPercentage >= 100 ? 'from-green-500 to-emerald-500' : 'from-blue-500 to-blue-600' }} h-3 rounded-full transition-all duration-500"
                                         style="width: {{ min($fundingPercentage, 100) }}%">
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm">
                                    pledged of <span class="font-semibold">${{ number_format($project->goal) }}</span> goal
                                </p>
                            </div>

                            <!-- Stats Grid -->
                            <div class="grid grid-cols-2 gap-4 text-center text-sm border-t border-gray-200 pt-4">
                                <div>
                                    <div class="text-xl font-bold text-gray-900">{{ number_format($project->investors + 1) }}</div>
                                    <div class="text-gray-500">backers</div>
                                    <div class="text-xs text-green-600 font-medium mt-1">+1 with you!</div>
                                </div>
                                <div>
                                    <div class="text-xl font-bold {{ $isActive ? 'text-gray-900' : 'text-red-500' }}">
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

                    <!-- Security Notice -->
                    <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-green-800 mb-2">Secure & Protected</h4>
                                <ul class="text-xs text-green-700 space-y-1">
                                    <li>• Enterprise-grade encryption</li>
                                    <li>• PCI-DSS compliant processing</li>
                                    <li>• 100% money-back guarantee</li>
                                    <li>• 24/7 fraud monitoring</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Support Contact -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-blue-800 mb-2">Need Help?</h4>
                                <p class="text-xs text-blue-700 mb-3">Questions about backing or payment?</p>
                                <div class="space-y-2 text-xs">
                                    <a href="mailto:support@crowdfund.com" class="flex items-center text-blue-600 hover:text-blue-700 transition-colors">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        support@crowdfund.com
                                    </a>
                                    <a href="tel:+1-555-123-4567" class="flex items-center text-blue-600 hover:text-blue-700 transition-colors">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        +1 (555) 123-4567
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for form enhancement -->
    <script>
        document.getElementById('final-backing-form').addEventListener('submit', function(e) {
            const confirmButton = document.getElementById('confirm-button');
            
            // Disable button and show processing state
            confirmButton.disabled = true;
            confirmButton.innerHTML = `
                <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Processing Payment...
            `;
            
            // Add loading overlay
            const overlay = document.createElement('div');
            overlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
            overlay.innerHTML = `
                <div class="bg-white rounded-2xl p-8 max-w-sm mx-4 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Processing your backing...</h3>
                    <p class="text-sm text-gray-600">Please don't close this window</p>
                </div>
            `;
            document.body.appendChild(overlay);
            
            // Re-enable after timeout if form doesn't submit
            setTimeout(() => {
                confirmButton.disabled = false;
                confirmButton.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Confirm & Back Project
                `;
                document.body.removeChild(overlay);
            }, 10000);
        });
    </script>
</x-app-layout>