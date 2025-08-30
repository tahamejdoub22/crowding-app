@props(['show' => false])

<div class="bg-yellow-50 border-2 border-yellow-200 rounded-xl p-4 {{ $show ? '' : 'hidden' }}" id="test-cards-info">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="ml-3 flex-1">
            <h3 class="text-lg font-semibold text-yellow-800 mb-3">🧪 Test Card Numbers</h3>
            <p class="text-sm text-yellow-700 mb-4">Use these test card numbers to simulate different payment scenarios:</p>
            
            <div class="space-y-3">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Successful Payment -->
                    <div class="bg-green-100 border border-green-200 rounded-lg p-3">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-green-800 uppercase tracking-wide">✅ Success</span>
                            <button onclick="copyToClipboard('4242424242424242')" class="text-green-600 hover:text-green-800 text-xs font-medium">
                                Copy
                            </button>
                        </div>
                        <code class="text-sm font-mono text-green-900">4242 4242 4242 4242</code>
                        <p class="text-xs text-green-700 mt-1">Payment will succeed</p>
                    </div>

                    <!-- Declined Payment -->
                    <div class="bg-red-100 border border-red-200 rounded-lg p-3">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-red-800 uppercase tracking-wide">❌ Declined</span>
                            <button onclick="copyToClipboard('4000000000000002')" class="text-red-600 hover:text-red-800 text-xs font-medium">
                                Copy
                            </button>
                        </div>
                        <code class="text-sm font-mono text-red-900">4000 0000 0000 0002</code>
                        <p class="text-xs text-red-700 mt-1">Card will be declined</p>
                    </div>

                    <!-- Insufficient Funds -->
                    <div class="bg-orange-100 border border-orange-200 rounded-lg p-3">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-orange-800 uppercase tracking-wide">💳 Insufficient</span>
                            <button onclick="copyToClipboard('4000000000009995')" class="text-orange-600 hover:text-orange-800 text-xs font-medium">
                                Copy
                            </button>
                        </div>
                        <code class="text-sm font-mono text-orange-900">4000 0000 0000 9995</code>
                        <p class="text-xs text-orange-700 mt-1">Insufficient funds</p>
                    </div>

                    <!-- Expired Card -->
                    <div class="bg-purple-100 border border-purple-200 rounded-lg p-3">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-purple-800 uppercase tracking-wide">⏰ Expired</span>
                            <button onclick="copyToClipboard('4000000000000127')" class="text-purple-600 hover:text-purple-800 text-xs font-medium">
                                Copy
                            </button>
                        </div>
                        <code class="text-sm font-mono text-purple-900">4000 0000 0000 0127</code>
                        <p class="text-xs text-purple-700 mt-1">Expired card</p>
                    </div>
                </div>

                <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                    <h4 class="text-sm font-semibold text-blue-800 mb-2">📋 Test Details</h4>
                    <div class="text-xs text-blue-700 space-y-1">
                        <p><strong>Expiry:</strong> Any future date (e.g., 12/25)</p>
                        <p><strong>CVV:</strong> Any 3-digit number (e.g., 123)</p>
                        <p><strong>Name:</strong> Any name</p>
                        <p><strong>ZIP:</strong> Any ZIP code</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success toast
        if (window.Toast) {
            window.Toast.success('Card number copied to clipboard!');
        } else {
            alert('Card number copied: ' + text);
        }
    }, function(err) {
        console.error('Could not copy text: ', err);
        alert('Failed to copy card number');
    });
}
</script>