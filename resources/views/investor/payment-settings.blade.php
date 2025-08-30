<x-app-layout>
    <x-slot name="title">Payment Settings</x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Payment Settings</h1>
                <p class="text-gray-600 mt-1">Manage your payment methods securely</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Payment Methods List -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Saved Payment Methods</h3>
                    </div>
                    <div class="p-6">
                        @if($paymentMethods->count() > 0)
                            <div class="space-y-4">
                                @foreach($paymentMethods as $method)
                                    <div class="border border-gray-200 rounded-xl p-4 {{ $method->is_default ? 'ring-2 ring-primary-500 bg-primary-50' : '' }}">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <!-- Payment Method Icon -->
                                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                                    @if($method->type === 'credit_card')
                                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                                        </svg>
                                                    @elseif($method->type === 'paypal')
                                                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.628.628 0 0 0-.36-.594.734.734 0 0 0-.64-.003c-.91.387-1.888.58-2.91.58h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H7.076l1.12-7.106c.082-.518.526-.9 1.05-.9h2.19c4.298 0 7.664-1.747 8.647-6.797.03-.149.054-.294.077-.437.292-1.867-.002-3.136-1.012-4.287C17.996.543 15.988 0 13.418 0H5.998c-.524 0-.972.382-1.054.901L1.837 20.663a.641.641 0 0 0 .633.74h4.606l1.12-7.106c.082-.518.526-.9 1.05-.9h2.19c4.298 0 7.664-1.747 8.647-6.797.03-.149.054-.294.077-.437z"/>
                                                        </svg>
                                                    @elseif($method->type === 'bank_transfer')
                                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $method->display_name }}</div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ ucfirst(str_replace('_', ' ', $method->type)) }}
                                                        @if($method->is_default)
                                                            <span class="ml-2 text-primary-600 font-medium">• Default</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                @if(!$method->is_default)
                                                    <button type="button" class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                                                        Set as Default
                                                    </button>
                                                @endif
                                                <form method="POST" action="{{ route('investor.payment-methods.destroy', $method) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm text-red-600 hover:text-red-700 font-medium" 
                                                            onclick="return confirm('Are you sure you want to delete this payment method?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                <p class="text-gray-500">No payment methods added yet</p>
                                <p class="text-sm text-gray-400 mt-1">Add a payment method to start backing projects</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Add Payment Method Form -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Add New Payment Method</h3>
                    </div>
                    <div class="p-6">
                        <form method="POST" action="{{ route('investor.payment-settings.store') }}" class="space-y-6">
                            @csrf

                            <!-- Payment Type Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Payment Method Type</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label class="relative flex cursor-pointer">
                                        <input type="radio" name="type" value="credit_card" class="sr-only peer" checked>
                                        <div class="flex-1 p-3 border-2 border-gray-300 rounded-xl peer-checked:border-primary-400 peer-checked:bg-primary-50 transition-all">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                                </svg>
                                                <span class="text-sm font-medium">Credit Card</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label class="relative flex cursor-pointer">
                                        <input type="radio" name="type" value="paypal" class="sr-only peer">
                                        <div class="flex-1 p-3 border-2 border-gray-300 rounded-xl peer-checked:border-primary-400 peer-checked:bg-primary-50 transition-all">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.628.628 0 0 0-.36-.594.734.734 0 0 0-.64-.003c-.91.387-1.888.58-2.91.58h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106H7.076l1.12-7.106c.082-.518.526-.9 1.05-.9h2.19c4.298 0 7.664-1.747 8.647-6.797.03-.149.054-.294.077-.437.292-1.867-.002-3.136-1.012-4.287C17.996.543 15.988 0 13.418 0H5.998c-.524 0-.972.382-1.054.901L1.837 20.663a.641.641 0 0 0 .633.74h4.606l1.12-7.106c.082-.518.526-.9 1.05-.9h2.19c4.298 0 7.664-1.747 8.647-6.797.03-.149.054-.294.077-.437z"/>
                                                </svg>
                                                <span class="text-sm font-medium">PayPal</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Test Cards Information -->
                            <div class="mb-6">
                                <button type="button" onclick="toggleTestCards()" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                    🧪 Show Test Card Numbers
                                </button>
                                <x-ui.test-cards />
                            </div>

                            <!-- Credit Card Fields -->
                            <div class="credit-card-fields space-y-4">
                                <div>
                                    <label for="card_holder_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Card Holder Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="card_holder_name" name="card_holder_name" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('card_holder_name') border-red-500 @enderror"
                                           placeholder="John Doe">
                                    @error('card_holder_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700 mb-2">
                                        Card Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="card_number" name="card_number" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('card_number') border-red-500 @enderror"
                                           placeholder="1234 5678 9012 3456" maxlength="19">
                                    @error('card_number')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-3 gap-4">
                                    <div>
                                        <label for="expiry_month" class="block text-sm font-medium text-gray-700 mb-2">
                                            Month <span class="text-red-500">*</span>
                                        </label>
                                        <select id="expiry_month" name="expiry_month" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('expiry_month') border-red-500 @enderror">
                                            <option value="">MM</option>
                                            @for($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
                                            @endfor
                                        </select>
                                        @error('expiry_month')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="expiry_year" class="block text-sm font-medium text-gray-700 mb-2">
                                            Year <span class="text-red-500">*</span>
                                        </label>
                                        <select id="expiry_year" name="expiry_year" 
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('expiry_year') border-red-500 @enderror">
                                            <option value="">YYYY</option>
                                            @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('expiry_year')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="cvv" class="block text-sm font-medium text-gray-700 mb-2">
                                            CVV <span class="text-red-500">*</span>
                                        </label>
                                        <input type="text" id="cvv" name="cvv" 
                                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('cvv') border-red-500 @enderror"
                                               placeholder="123" maxlength="3">
                                        @error('cvv')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- PayPal Fields -->
                            <div class="paypal-fields space-y-4" style="display: none;">
                                <div>
                                    <label for="paypal_email" class="block text-sm font-medium text-gray-700 mb-2">
                                        PayPal Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" id="paypal_email" name="paypal_email" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-transparent @error('paypal_email') border-red-500 @enderror"
                                           placeholder="your.email@example.com">
                                    @error('paypal_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Default Payment Method -->
                            <div class="flex items-center">
                                <input type="checkbox" id="is_default" name="is_default" value="1" 
                                       class="w-4 h-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500"
                                       {{ $paymentMethods->count() === 0 ? 'checked' : '' }}>
                                <label for="is_default" class="ml-3 text-sm text-gray-700">
                                    Set as default payment method
                                </label>
                            </div>

                            <!-- Security Notice -->
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <div>
                                        <h4 class="font-medium text-blue-900">Secure & Encrypted</h4>
                                        <p class="text-sm text-blue-700 mt-1">
                                            Your payment information is encrypted and stored securely. We never store your CVV or full card numbers.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="w-full btn btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Add Payment Method
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Handle payment type switching
        document.querySelectorAll('input[name="type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const creditCardFields = document.querySelector('.credit-card-fields');
                const paypalFields = document.querySelector('.paypal-fields');
                
                if (this.value === 'credit_card') {
                    creditCardFields.style.display = 'block';
                    paypalFields.style.display = 'none';
                } else if (this.value === 'paypal') {
                    creditCardFields.style.display = 'none';
                    paypalFields.style.display = 'block';
                }
            });
        });

        // Format card number
        document.getElementById('card_number').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') ?? value;
            if (formattedValue !== e.target.value) {
                e.target.value = formattedValue;
            }
        });

        // CVV validation
        document.getElementById('cvv').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/[^0-9]/gi, '');
        });

        // Toggle test cards visibility
        function toggleTestCards() {
            const testCardsInfo = document.getElementById('test-cards-info');
            if (testCardsInfo.classList.contains('hidden')) {
                testCardsInfo.classList.remove('hidden');
            } else {
                testCardsInfo.classList.add('hidden');
            }
        }

        // Auto-fill test card data when clicking copy
        window.copyToClipboard = function(cardNumber) {
            navigator.clipboard.writeText(cardNumber).then(function() {
                // Auto-fill the card number field
                const cardNumberField = document.getElementById('card_number');
                if (cardNumberField) {
                    cardNumberField.value = cardNumber.match(/.{1,4}/g).join(' ');
                    cardNumberField.dispatchEvent(new Event('input'));
                }
                
                // Show success message
                if (window.Toast) {
                    window.Toast.success('Card number copied and auto-filled!');
                } else {
                    alert('Card number copied: ' + cardNumber);
                }
            });
        };
    </script>
    @endpush
</x-app-layout>