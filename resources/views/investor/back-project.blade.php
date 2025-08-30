<x-app-layout>
    <x-slot name="title">Back {{ $project->project_name }}</x-slot>

    <!-- Enhanced CSS for better animations and interactions -->
    <style>
        .reward-tier {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .reward-tier:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .reward-tier.selected {
            transform: translateY(-1px);
            box-shadow: 0 20px 25px -5px rgba(59, 130, 246, 0.15), 0 10px 10px -5px rgba(59, 130, 246, 0.1);
        }
        .amount-input {
            transition: all 0.3s ease;
        }
        .amount-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        .payment-method-card {
            transition: all 0.3s ease;
        }
        .payment-method-card:hover {
            transform: translateY(-1px);
        }
        .payment-method-card.selected {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }
        .progress-step {
            transition: all 0.3s ease;
        }
        .progress-step.active {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }
        .floating-label {
            position: absolute;
            left: 12px;
            top: 12px;
            background: white;
            padding: 0 8px;
            transition: all 0.3s ease;
            pointer-events: none;
            color: #6b7280;
        }
        .floating-label.active {
            top: -8px;
            font-size: 0.75rem;
            color: #3b82f6;
            font-weight: 500;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4 mb-6">
                    <div class="progress-step active flex items-center px-4 py-2 rounded-full">
                        <span class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-blue-600 font-bold text-sm mr-2">1</span>
                        <span class="text-sm font-medium">Select Reward</span>
                    </div>
                    <div class="w-8 h-0.5 bg-gray-300"></div>
                    <div class="progress-step flex items-center px-4 py-2 rounded-full bg-gray-200 text-gray-600">
                        <span class="w-6 h-6 bg-gray-400 rounded-full flex items-center justify-center text-white font-bold text-sm mr-2">2</span>
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
                    <a href="{{ route('project.public', $project) }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Back to Project
                    </a>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Back This Project</h1>
                <p class="text-xl text-gray-600">{{ $project->project_name }}</p>
                <p class="text-sm text-gray-500 mt-2">by {{ $project->creator->name }}</p>
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

            @if($existingInvestment)
                <div class="max-w-2xl mx-auto mb-6 bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-blue-800">You've already backed this project with ${{ number_format($existingInvestment->amount, 2) }}. 
                                <a href="{{ route('investor.backed-projects.show', $existingInvestment) }}" class="underline font-medium">View details</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Backing Form -->
                <div class="lg:col-span-2">
                    <form method="POST" action="{{ route('project.back.submit', $project) }}" class="space-y-8" id="backing-form">
                        @csrf

                        <!-- Reward Selection -->
                        @if($rewards->count() > 0)
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                                <div class="flex items-center justify-between mb-6">
                                    <h3 class="text-2xl font-bold text-gray-900">Choose Your Reward</h3>
                                    <div class="text-sm text-gray-500">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Select a reward tier or choose custom amount
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <!-- No Reward Option -->
                                    <label class="reward-tier relative flex cursor-pointer group">
                                        <input type="radio" name="reward_id" value="" class="sr-only peer" onchange="updateAmountField(null)">
                                        <div class="flex-1 p-6 border-2 border-gray-200 rounded-xl peer-checked:border-blue-400 peer-checked:bg-blue-50 peer-checked:shadow-lg group-hover:border-gray-300">
                                            <div class="flex justify-between items-start mb-4">
                                                <div class="flex-1">
                                                    <div class="flex items-center justify-between mb-3">
                                                        <h4 class="text-lg font-bold text-gray-900">Support without reward</h4>
                                                        <div class="text-2xl font-bold text-blue-600">
                                                            <span class="text-sm">$</span>
                                                            <span id="custom-amount-display">0</span>
                                                        </div>
                                                    </div>
                                                    <p class="text-gray-600 mb-4">Back this project with any amount to help bring it to life. Perfect if you just want to support the creator.</p>
                                                    
                                                    <div class="relative">
                                                        <label class="floating-label" id="custom-amount-label">Enter your amount</label>
                                                        <div class="relative">
                                                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">$</span>
                                                            <input type="number" 
                                                                   id="custom_amount_no_reward" 
                                                                   name="custom_amount" 
                                                                   min="1" 
                                                                   step="0.01"
                                                                   class="amount-input w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg font-medium"
                                                                   placeholder="25.00"
                                                                   oninput="updateCustomAmountDisplay(this.value)"
                                                                   onfocus="activateLabel('custom-amount-label')"
                                                                   onblur="deactivateLabel('custom-amount-label', this.value)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ml-4 opacity-0 peer-checked:opacity-100 transition-opacity">
                                                    <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center">
                                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>

                                    @foreach($rewards as $reward)
                                        <label class="reward-tier relative flex cursor-pointer group">
                                            <input type="radio" 
                                                   name="reward_id" 
                                                   value="{{ $reward->id }}" 
                                                   class="sr-only peer"
                                                   onchange="updateAmountField({{ $reward->discount }})">
                                            <div class="flex-1 p-6 border-2 border-gray-200 rounded-xl peer-checked:border-blue-400 peer-checked:bg-blue-50 peer-checked:shadow-lg group-hover:border-gray-300">
                                                <div class="flex justify-between items-start mb-4">
                                                    <div class="flex-1">
                                                        <div class="flex items-center justify-between mb-3">
                                                            <h4 class="text-lg font-bold text-gray-900">{{ $reward->name }}</h4>
                                                            <span class="text-2xl font-bold text-blue-600">${{ number_format($reward->discount, 2) }}</span>
                                                        </div>
                                                        <p class="text-gray-600 mb-4">{{ $reward->description }}</p>
                                                        
                                                        <div class="flex items-start space-x-4 text-sm text-gray-500">
                                                            @if($reward->estimated_delivery_date)
                                                                <div class="flex items-center">
                                                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                                    </svg>
                                                                    Delivery: {{ \Carbon\Carbon::parse($reward->estimated_delivery_date)->format('M Y') }}
                                                                </div>
                                                            @endif
                                                            @if(isset($reward->quantity) && $reward->quantity > 0)
                                                                @php
                                                                    $taken = \App\Models\Investment::where('reward_id', $reward->id)->where('status', 'completed')->count();
                                                                    $remaining = $reward->quantity - $taken;
                                                                @endphp
                                                                <div class="flex items-center">
                                                                    <svg class="w-4 h-4 mr-1 {{ $remaining > 10 ? 'text-green-500' : 'text-orange-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                                    </svg>
                                                                    {{ $remaining }} remaining
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="ml-4 opacity-0 peer-checked:opacity-100 transition-opacity">
                                                        <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center">
                                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                @error('reward_id')
                                    <p class="text-red-500 text-sm mt-3 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                                @error('custom_amount')
                                    <p class="text-red-500 text-sm mt-3 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        @else
                            <!-- Custom Amount Only -->
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6">Contribution Amount</h3>
                                <div class="relative">
                                    <label class="floating-label" id="main-amount-label">Enter your contribution amount</label>
                                    <div class="relative">
                                        <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium text-lg">$</span>
                                        <input type="number" 
                                               id="custom_amount" 
                                               name="custom_amount" 
                                               min="1" 
                                               step="0.01" 
                                               required
                                               class="amount-input w-full pl-10 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-xl font-medium"
                                               placeholder="25.00"
                                               onfocus="activateLabel('main-amount-label')"
                                               onblur="deactivateLabel('main-amount-label', this.value)">
                                    </div>
                                    @error('custom_amount')
                                        <p class="text-red-500 text-sm mt-2 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <!-- Payment Method Selection -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-900">Payment Method</h3>
                                @if(!$hasPaymentMethods)
                                    <span class="text-sm text-orange-600 bg-orange-50 px-3 py-1 rounded-full">Setup Required</span>
                                @endif
                            </div>
                            
                            @if($hasPaymentMethods)
                                <div class="space-y-3 mb-6">
                                    @foreach($paymentMethods as $method)
                                        <label class="payment-method-card relative flex cursor-pointer">
                                            <input type="radio" 
                                                   name="payment_method_id" 
                                                   value="{{ $method->id }}" 
                                                   class="sr-only peer" 
                                                   {{ $method->is_default ? 'checked' : '' }}>
                                            <div class="flex-1 p-4 border-2 border-gray-200 rounded-xl peer-checked:border-blue-400 peer-checked:bg-blue-600 peer-checked:text-white transition-all">
                                                <div class="flex items-center justify-between">
                                                    <div class="flex items-center space-x-4">
                                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center peer-checked:bg-white/20 bg-gray-100">
                                                            @if($method->type === 'credit_card' || $method->type === 'debit_card')
                                                                <svg class="w-5 h-5 peer-checked:text-white text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                                                </svg>
                                                            @elseif($method->type === 'paypal')
                                                                <svg class="w-5 h-5 peer-checked:text-white text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.628.628 0 0 0-.36-.594.734.734 0 0 0-.64-.003c-.91.387-1.888.58-2.91.58h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H7.076l1.12-7.106c.082-.518.526-.9 1.05-.9h2.19c4.298 0 7.664-1.747 8.647-6.797.03-.149.054-.294.077-.437z"/>
                                                                </svg>
                                                            @else
                                                                <svg class="w-5 h-5 peer-checked:text-white text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                                                </svg>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <div class="font-semibold">{{ $method->display_name }}</div>
                                                            <div class="text-sm opacity-75">
                                                                {{ ucfirst(str_replace('_', ' ', $method->type)) }}
                                                                @if($method->is_default)
                                                                    <span class="ml-2 font-medium">• Default</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                                        <div class="w-6 h-6 bg-white rounded-full flex items-center justify-center">
                                                            <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                <div class="pt-4 border-t border-gray-200">
                                    <a href="{{ route('investor.payment-settings') }}" 
                                       class="inline-flex items-center text-sm text-blue-600 hover:text-blue-700 font-medium transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Add new payment method
                                    </a>
                                </div>
                            @else
                                <!-- No Payment Methods -->
                                <div class="text-center py-12 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl">
                                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 mb-2">No Payment Methods</h4>
                                    <p class="text-gray-600 mb-6">Add a payment method to back this project</p>
                                    <a href="{{ route('investor.payment-settings') }}" 
                                       class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-colors">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                        </svg>
                                        Add Payment Method
                                    </a>
                                </div>
                            @endif

                            @error('payment_method_id')
                                <p class="text-red-500 text-sm mt-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Optional Message -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Message to Creator <span class="text-sm font-normal text-gray-500">(Optional)</span></h3>
                            <div class="relative">
                                <textarea name="message" 
                                          rows="4" 
                                          maxlength="1000"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                          placeholder="Share why you're excited about this project or send encouragement to the creator...">{{ old('message') }}</textarea>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400" id="message-counter">0/1000</div>
                            </div>
                            @error('message')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-4 sm:space-y-0 gap-4">
                            <a href="{{ route('project.public', $project) }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                                    id="continue-button"
                                    @if(!$hasPaymentMethods) disabled @endif>
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                                Continue to Review
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Project Summary Sidebar -->
                <div class="lg:sticky lg:top-8 lg:self-start">
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
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $project->project_name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">by {{ $project->creator->name }}</p>

                            <!-- Project Stats -->
                            @php
                                $fundingPercentage = $project->goal > 0 ? min(($project->pledged / $project->goal) * 100, 100) : 0;
                                $endDate = $project->end_date instanceof \Carbon\Carbon ? $project->end_date : \Carbon\Carbon::parse($project->end_date);
                                $daysLeft = (int) abs($endDate->diffInDays(now()));
                                $isActive = $endDate->isFuture();
                            @endphp

                            <!-- Funding Progress -->
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-2xl font-bold text-gray-900">
                                        ${{ number_format($project->pledged) }}
                                    </span>
                                    <span class="text-lg font-bold {{ $fundingPercentage >= 100 ? 'text-green-600' : 'text-blue-600' }}">
                                        {{ number_format($fundingPercentage) }}%
                                    </span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 mb-3">
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
                                    <div class="text-xl font-bold text-gray-900">{{ number_format($project->investors) }}</div>
                                    <div class="text-gray-500">backers</div>
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

                            @if($isActive)
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Campaign ends {{ $endDate->format('M j, Y') }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Security Notice -->
                    <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-4">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-green-800 mb-1">Secure Payment</h4>
                                <p class="text-xs text-green-700">Your payment is protected by enterprise-grade encryption and will only be charged if the project reaches its goal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript for better interactions -->
    <script>
        // Update amount field based on reward selection
        function updateAmountField(amount) {
            const customAmountField = document.getElementById('custom_amount_no_reward');
            if (customAmountField) {
                if (amount) {
                    customAmountField.value = amount;
                    customAmountField.min = amount;
                    updateCustomAmountDisplay(amount);
                } else {
                    customAmountField.min = 1;
                    customAmountField.value = '';
                    updateCustomAmountDisplay(0);
                }
            }
        }

        // Update custom amount display
        function updateCustomAmountDisplay(value) {
            const display = document.getElementById('custom-amount-display');
            if (display) {
                display.textContent = value || '0';
            }
        }

        // Floating label animations
        function activateLabel(labelId) {
            const label = document.getElementById(labelId);
            if (label) {
                label.classList.add('active');
            }
        }

        function deactivateLabel(labelId, value) {
            const label = document.getElementById(labelId);
            if (label && !value) {
                label.classList.remove('active');
            }
        }

        // Message counter
        document.querySelector('textarea[name="message"]').addEventListener('input', function() {
            const counter = document.getElementById('message-counter');
            const length = this.value.length;
            counter.textContent = length + '/1000';
            
            if (length > 900) {
                counter.classList.add('text-orange-500');
            } else {
                counter.classList.remove('text-orange-500');
            }
        });

        // Form validation enhancement
        document.getElementById('backing-form').addEventListener('submit', function(e) {
            const submitButton = document.getElementById('continue-button');
            
            // Disable button to prevent double submission
            submitButton.disabled = true;
            submitButton.innerHTML = `
                <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Processing...
            `;
            
            // Re-enable after 3 seconds if form doesn't submit
            setTimeout(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = `
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                    Continue to Review
                `;
            }, 3000);
        });

        // Auto-focus on custom amount when no reward is selected
        document.querySelector('input[name="reward_id"][value=""]').addEventListener('change', function() {
            if (this.checked) {
                setTimeout(() => {
                    document.getElementById('custom_amount_no_reward').focus();
                }, 100);
            }
        });
    </script>
</x-app-layout>