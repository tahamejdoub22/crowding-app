<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'details',
        'is_default',
        'is_active',
    ];

    protected $casts = [
        'details' => 'encrypted:array',
        'is_default' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user who owns this payment method
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get investments made with this payment method
     */
    public function investments(): HasMany
    {
        return $this->hasMany(Investment::class);
    }

    /**
     * Get display name for the payment method
     */
    public function getDisplayNameAttribute(): string
    {
        switch ($this->type) {
            case 'credit_card':
                return 'Credit Card ending in ' . ($this->details['card_number_last_four'] ?? '****');
            case 'debit_card':
                return 'Debit Card ending in ' . ($this->details['card_number_last_four'] ?? '****');
            case 'paypal':
                return 'PayPal (' . ($this->details['paypal_email'] ?? 'Email hidden') . ')';
            case 'bank_transfer':
                return ($this->details['bank_name'] ?? 'Bank') . ' ending in ' . ($this->details['account_number_last_four'] ?? '****');
            default:
                return ucfirst(str_replace('_', ' ', $this->type));
        }
    }

    /**
     * Get the card brand icon class
     */
    public function getCardBrandAttribute(): ?string
    {
        if (!in_array($this->type, ['credit_card', 'debit_card'])) {
            return null;
        }

        // In a real application, you would determine the card brand from the card number
        // For now, we'll return a generic card icon
        return 'credit-card';
    }

    /**
     * Check if this is a card-based payment method
     */
    public function isCard(): bool
    {
        return in_array($this->type, ['credit_card', 'debit_card']);
    }

    /**
     * Scope to get default payment method
     */
    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    /**
     * Scope to get active payment methods
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}