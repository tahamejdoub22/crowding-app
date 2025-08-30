<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Investment;
use App\Models\PaymentMethod;
use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class InvestorController extends Controller
{
    /**
     * Display the investor dashboard
     */
    public function dashboard()
    {
        $user = Auth::user();
        
        // Get investor statistics
        $totalInvested = Investment::where('user_id', $user->id)->sum('amount');
        $totalProjects = Investment::where('user_id', $user->id)->distinct('project_id')->count();
        $recentInvestments = Investment::with('project')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Get recommended projects based on previous investments
        $investedCategories = Investment::join('projects', 'investments.project_id', '=', 'projects.id')
            ->where('investments.user_id', $user->id)
            ->pluck('projects.category')
            ->unique()
            ->toArray();
        
        $recommendedProjects = Project::where('status', 'active')
            ->where('end_date', '>', now())
            ->when(!empty($investedCategories), function($query) use ($investedCategories) {
                return $query->whereIn('category', $investedCategories);
            })
            ->whereNotIn('id', Investment::where('user_id', $user->id)->pluck('project_id'))
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        return view('investor.dashboard', compact(
            'totalInvested',
            'totalProjects', 
            'recentInvestments',
            'recommendedProjects'
        ));
    }

    /**
     * Display investor profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('investor.profile', compact('user'));
    }

    /**
     * Update investor profile
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'bio' => ['nullable', 'string', 'max:1000'],
            'location' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'current_password' => ['nullable', 'required_with:password'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check current password if new password is provided
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
            }
        }

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/avatars'), $avatarName);
            $user->avatar = 'images/avatars/' . $avatarName;
        }

        // Update user data
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'location' => $request->location,
            'website' => $request->website,
            'phone' => $request->phone,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('investor.profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Display payment settings
     */
    public function paymentSettings()
    {
        $user = Auth::user();
        $paymentMethods = PaymentMethod::where('user_id', $user->id)->get();
        
        return view('investor.payment-settings', compact('paymentMethods'));
    }

    /**
     * Store new payment method
     */
    public function storePaymentMethod(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => ['required', 'in:credit_card,debit_card,paypal,bank_transfer'],
            'card_holder_name' => ['required_if:type,credit_card,debit_card', 'string', 'max:255'],
            'card_number' => ['required_if:type,credit_card,debit_card', 'string', 'max:20'],
            'expiry_month' => ['required_if:type,credit_card,debit_card', 'integer', 'between:1,12'],
            'expiry_year' => ['required_if:type,credit_card,debit_card', 'integer', 'min:2024'],
            'cvv' => ['required_if:type,credit_card,debit_card', 'string', 'size:3'],
            'paypal_email' => ['required_if:type,paypal', 'email'],
            'bank_name' => ['required_if:type,bank_transfer', 'string', 'max:255'],
            'account_number' => ['required_if:type,bank_transfer', 'string', 'max:255'],
            'routing_number' => ['required_if:type,bank_transfer', 'string', 'max:255'],
            'is_default' => ['boolean'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Set default payment method
        if ($request->is_default) {
            PaymentMethod::where('user_id', Auth::id())->update(['is_default' => false]);
        }

        $paymentData = [
            'user_id' => Auth::id(),
            'type' => $request->type,
            'is_default' => $request->is_default ?? false,
        ];

        // Store payment method details (encrypted for security)
        if (in_array($request->type, ['credit_card', 'debit_card'])) {
            $paymentData['details'] = encrypt([
                'card_holder_name' => $request->card_holder_name,
                'card_number_last_four' => substr($request->card_number, -4),
                'expiry_month' => $request->expiry_month,
                'expiry_year' => $request->expiry_year,
                // Note: CVV should never be stored, only used for transactions
            ]);
        } elseif ($request->type === 'paypal') {
            $paymentData['details'] = encrypt([
                'paypal_email' => $request->paypal_email,
            ]);
        } elseif ($request->type === 'bank_transfer') {
            $paymentData['details'] = encrypt([
                'bank_name' => $request->bank_name,
                'account_number_last_four' => substr($request->account_number, -4),
                'routing_number' => $request->routing_number,
            ]);
        }

        PaymentMethod::create($paymentData);

        return redirect()->route('investor.payment-settings')
            ->with('success', 'Payment method added successfully!');
    }

    /**
     * Delete payment method
     */
    public function deletePaymentMethod($id)
    {
        $paymentMethod = PaymentMethod::where('user_id', Auth::id())->findOrFail($id);
        $paymentMethod->delete();

        return redirect()->route('investor.payment-settings')
            ->with('success', 'Payment method deleted successfully!');
    }

    /**
     * Display backed projects
     */
    public function backedProjects()
    {
        $user = Auth::user();
        $investments = Investment::with(['project', 'reward'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $totalInvested = Investment::where('user_id', $user->id)->sum('amount');
        $totalProjects = Investment::where('user_id', $user->id)->distinct('project_id')->count();

        return view('investor.backed-projects', compact('investments', 'totalInvested', 'totalProjects'));
    }

    /**
     * Show details of a backed project
     */
    public function backedProjectDetails(Investment $investment)
    {
        // Ensure the investment belongs to the authenticated user
        if ($investment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access to this investment.');
        }

        // Load relationships
        $investment->load(['project', 'reward', 'project.updates', 'paymentMethod']);

        return view('investor.backed-project-details', compact('investment'));
    }

    /**
     * Show project backing form
     */
    public function backProject(Project $project)
    {
        $user = Auth::user();
        
        // Check if project is still active and can be backed
        if ($project->status !== 'active' || $project->end_date <= now()) {
            return redirect()->route('project.public', $project)
                ->with('error', 'This project is no longer accepting backers.');
        }

        // Check if user has already backed this project
        $existingInvestment = Investment::where('user_id', $user->id)
            ->where('project_id', $project->id)
            ->first();

        $rewards = $project->rewards()->orderBy('discount', 'asc')->get();
        
        // Get user's payment methods with proper ordering
        $paymentMethods = PaymentMethod::where('user_id', $user->id)
            ->active()
            ->orderBy('is_default', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Check if user needs to add payment methods
        $hasPaymentMethods = $paymentMethods->count() > 0;

        return view('investor.back-project', compact(
            'project', 
            'rewards', 
            'paymentMethods', 
            'hasPaymentMethods',
            'existingInvestment'
        ));
    }

    /**
     * Show backing confirmation page
     */
    public function confirmBacking(Request $request, Project $project)
    {
        $user = Auth::user();
        
        // Enhanced validation with custom messages
        $request->validate([
            'reward_id' => 'nullable|exists:rewards,id',
            'custom_amount' => 'required|numeric|min:1|max:1000000',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'message' => 'nullable|string|max:1000',
        ], [
            'custom_amount.required' => 'Please enter a contribution amount.',
            'custom_amount.min' => 'Minimum contribution amount is $1.',
            'custom_amount.max' => 'Maximum contribution amount is $1,000,000.',
            'payment_method_id.required' => 'Please select a payment method.',
            'payment_method_id.exists' => 'Selected payment method is invalid.',
            'message.max' => 'Message cannot exceed 1000 characters.',
        ]);

        // Verify project is still active
        if ($project->status !== 'active' || $project->end_date <= now()) {
            return redirect()->route('project.public', $project)
                ->with('error', 'This project is no longer accepting backers.');
        }

        // Verify payment method belongs to user
        $paymentMethod = PaymentMethod::where('user_id', $user->id)
            ->where('id', $request->payment_method_id)
            ->active()
            ->firstOrFail();

        $reward = $request->reward_id ? Reward::find($request->reward_id) : null;
        $amount = floatval($request->custom_amount);
        $message = $request->message;

        // Enhanced reward validation
        if ($reward) {
            if ($amount < $reward->discount) {
                return back()->withErrors([
                    'custom_amount' => 'Amount must be at least $' . number_format($reward->discount, 2) . ' for the "' . $reward->name . '" reward tier.'
                ])->withInput();
            }
            
            // Check if reward is still available (if it has quantity limits)
            if (isset($reward->quantity) && $reward->quantity > 0) {
                $rewardBackedCount = Investment::where('reward_id', $reward->id)
                    ->where('status', 'completed')
                    ->count();
                    
                if ($rewardBackedCount >= $reward->quantity) {
                    return back()->withErrors([
                        'reward_id' => 'This reward tier is no longer available.'
                    ])->withInput();
                }
            }
        }

        // Check for duplicate backing attempt
        $existingInvestment = Investment::where('user_id', $user->id)
            ->where('project_id', $project->id)
            ->first();

        if ($existingInvestment) {
            return redirect()->route('investor.backed-projects.show', $existingInvestment)
                ->with('info', 'You have already backed this project. View your backing details below.');
        }

        // Calculate any processing fees (if applicable)
        $processingFee = $amount * 0.029 + 0.30; // Example: 2.9% + $0.30
        $totalAmount = $amount + $processingFee;

        return view('investor.confirm-backing', compact(
            'project', 
            'reward', 
            'paymentMethod', 
            'amount', 
            'message',
            'processingFee',
            'totalAmount'
        ));
    }

    /**
     * Process the backing payment
     */
    public function processBacking(Request $request, Project $project)
    {
        $user = Auth::user();
        
        // Re-validate all inputs with enhanced validation
        $request->validate([
            'reward_id' => 'nullable|exists:rewards,id',
            'custom_amount' => 'required|numeric|min:1|max:1000000',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'message' => 'nullable|string|max:1000',
        ]);

        // Verify project is still active
        if ($project->status !== 'active' || $project->end_date <= now()) {
            return back()->withErrors(['error' => 'This project is no longer accepting backers.']);
        }

        // Check for duplicate backing
        $existingInvestment = Investment::where('user_id', $user->id)
            ->where('project_id', $project->id)
            ->first();

        if ($existingInvestment) {
            return redirect()->route('investor.backed-projects.show', $existingInvestment)
                ->with('info', 'You have already backed this project.');
        }

        // Verify payment method ownership and status
        $paymentMethod = PaymentMethod::where('user_id', $user->id)
            ->where('id', $request->payment_method_id)
            ->active()
            ->firstOrFail();

        $reward = $request->reward_id ? Reward::find($request->reward_id) : null;
        $amount = floatval($request->custom_amount);

        // Final reward validation
        if ($reward) {
            if ($amount < $reward->discount) {
                return back()->withErrors(['error' => 'Invalid amount for selected reward tier.']);
            }
            
            // Double-check reward availability
            if (isset($reward->quantity) && $reward->quantity > 0) {
                $rewardBackedCount = Investment::where('reward_id', $reward->id)
                    ->where('status', 'completed')
                    ->count();
                    
                if ($rewardBackedCount >= $reward->quantity) {
                    return back()->withErrors(['error' => 'Selected reward tier is no longer available.']);
                }
            }
        }

        try {
            // Use database transaction for data consistency
            \DB::beginTransaction();

            // Generate unique payment reference
            $paymentReference = 'PAY_' . strtoupper(uniqid()) . '_' . $project->id;

            // Create the investment record
            $investment = Investment::create([
                'user_id' => $user->id,
                'project_id' => $project->id,
                'reward_id' => $reward?->id,
                'amount' => $amount,
                'payment_method_id' => $paymentMethod->id,
                'message' => $request->message,
                'status' => 'processing',
                'payment_reference' => $paymentReference,
                'backed_at' => now(),
            ]);

            // Simulate payment processing with different outcomes
            $paymentSuccess = $this->processPaymentGateway($paymentMethod, $amount, $paymentReference);

            if ($paymentSuccess) {
                // Update investment status
                $investment->update([
                    'status' => 'completed',
                    'processed_at' => now(),
                ]);

                // Update project statistics atomically
                $project->increment('pledged', $amount);
                $project->increment('investors');

                // Log successful transaction
                \Log::info('Successful backing', [
                    'user_id' => $user->id,
                    'project_id' => $project->id,
                    'investment_id' => $investment->id,
                    'amount' => $amount,
                ]);

                \DB::commit();

                return redirect()->route('investor.backed-projects.show', $investment)
                    ->with('success', '🎉 Congratulations! Your backing of $' . number_format($amount, 2) . ' has been processed successfully.');

            } else {
                // Payment failed
                $investment->update(['status' => 'failed']);
                \DB::rollback();

                return back()->withErrors(['error' => 'Payment processing failed. Your payment method was not charged. Please try again or use a different payment method.']);
            }

        } catch (\Exception $e) {
            \DB::rollback();
            
            \Log::error('Backing process failed', [
                'user_id' => $user->id,
                'project_id' => $project->id,
                'error' => $e->getMessage(),
            ]);

            return back()->withErrors(['error' => 'An unexpected error occurred. Please try again or contact support.']);
        }
    }

    /**
     * Simulate payment gateway processing
     * In a real application, this would integrate with Stripe, PayPal, etc.
     */
    private function processPaymentGateway($paymentMethod, $amount, $reference)
    {
        // Simulate payment processing time
        usleep(500000); // 0.5 seconds

        // Test card numbers for different scenarios
        $testCards = [
            '4242424242424242' => 'success',     // Always succeeds
            '4000000000000002' => 'decline',     // Always declined
            '4000000000009995' => 'insufficient', // Insufficient funds
            '4000000000000127' => 'expired',     // Expired card
            '4000000000000119' => 'processing_error', // Processing error
        ];

        // Get card number from payment method details
        $cardNumber = $paymentMethod->details['card_number'] ?? null;

        // Check if it's a test card
        if (isset($testCards[$cardNumber])) {
            $result = $testCards[$cardNumber];
            
            // Create payment record with test result
            \App\Models\Payment::create([
                'user_id' => $paymentMethod->user_id,
                'project_id' => request()->route('project')->id,
                'amount' => $amount,
                's_payment_id' => $reference,
                'status' => $result === 'success' ? 'completed' : 'failed',
                'payment_method' => 'test_card',
                'transaction_data' => [
                    'test_card' => $cardNumber,
                    'test_scenario' => $result,
                    'processed_at' => now()->toISOString(),
                    'reference' => $reference
                ]
            ]);

            // Return success only for successful test scenarios
            return $result === 'success';
        }

        // For non-test cards, simulate 95% success rate
        $success = rand(1, 100) <= 95;
        
        // Create payment record
        \App\Models\Payment::create([
            'user_id' => $paymentMethod->user_id,
            'project_id' => request()->route('project')->id,
            'amount' => $amount,
            's_payment_id' => $reference,
            'status' => $success ? 'completed' : 'failed',
            'payment_method' => $paymentMethod->type,
            'transaction_data' => [
                'simulated' => true,
                'processed_at' => now()->toISOString(),
                'reference' => $reference
            ]
        ]);

        return $success;
    }
}