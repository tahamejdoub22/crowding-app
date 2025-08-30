<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $fillable = [
        // Basic Project Info
        'project_name', 'seo_title', 'seo_description', 'user_id', 'project_location', 
        'project_description', 'short_description', 'risks_challenges', 'environmental_impact',
        
        // Media
        'image', 'video_url', 'gallery', 'social_media_links',
        
        // Campaign Details
        'category', 'tags', 'team_info',
        
        // Financial
        'goal', 'minimum_goal', 'pledged', 'stretch_goals', 'funding_type', 'currency',
        
        // Timeline
        'start_date', 'launch_date', 'end_date', 'duration_days',
        
        // Analytics
        'investors', 'views', 'likes', 'shares', 'conversion_rate',
        'project_updates_count', 'comments_count',
        
        // Status
        'status', 'featured', 'verified', 'staff_pick', 'trending'
    ];

    protected $casts = [
        // Dates
        'start_date' => 'datetime',
        'launch_date' => 'datetime',
        'end_date' => 'datetime',
        
        // Numbers
        'goal' => 'decimal:2',
        'minimum_goal' => 'decimal:2',
        'pledged' => 'decimal:2',
        'investors' => 'integer',
        'views' => 'integer',
        'likes' => 'integer',
        'shares' => 'integer',
        'conversion_rate' => 'decimal:2',
        'duration_days' => 'integer',
        'project_updates_count' => 'integer',
        'comments_count' => 'integer',
        
        // Booleans
        'featured' => 'boolean',
        'verified' => 'boolean',
        'staff_pick' => 'boolean',
        'trending' => 'boolean',
        
        // JSON
        'gallery' => 'array',
        'stretch_goals' => 'array',
        'tags' => 'array',
        'team_info' => 'array',
        'social_media_links' => 'array',
    ];

    protected $appends = [
        'funding_percentage',
        'days_left',
        'is_active',
        'is_successful',
        'average_pledge',
        'funding_velocity',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rewards()
    {
        return $this->hasMany(Reward::class, 'project_id', 'id');
    }

    public function reward()
    {
        return $this->hasMany(Reward::class, 'project_id', 'id');
    }

    public function updates()
    {
        return $this->hasMany(Update::class, 'project_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'project_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'project_id', 'id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'project_id', 'id');
    }

    /**
     * Get investments made in this project
     */
    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    /**
     * Get users who have invested in this project
     */
    public function backers()
    {
        return $this->belongsToMany(User::class, 'investments')
            ->withPivot(['amount', 'reward_id', 'message', 'status', 'backed_at'])
            ->withTimestamps();
    }

    /**
     * Get recent investments
     */
    public function recentInvestments($limit = 10)
    {
        return $this->investments()
            ->with('user')
            ->where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->limit($limit);
    }

    // Accessors
    public function getFundingPercentageAttribute()
    {
        if ($this->goal <= 0) return 0;
        return min(($this->pledged / $this->goal) * 100, 100);
    }

    public function getDaysLeftAttribute()
    {
        if (!$this->end_date) return 0;
        $endDate = $this->end_date instanceof Carbon ? $this->end_date : Carbon::parse($this->end_date);
        return max($endDate->diffInDays(now(), false), 0);
    }

    public function getIsActiveAttribute()
    {
        if (!$this->end_date) return false;
        $endDate = $this->end_date instanceof Carbon ? $this->end_date : Carbon::parse($this->end_date);
        return $endDate->isFuture() && $this->status === 'active';
    }

    public function getIsSuccessfulAttribute()
    {
        return $this->pledged >= $this->goal;
    }

    public function getAveragePledgeAttribute()
    {
        return $this->investors > 0 ? $this->pledged / $this->investors : 0;
    }

    public function getFundingVelocityAttribute()
    {
        if (!$this->start_date) return 0;
        $startDate = $this->start_date instanceof Carbon ? $this->start_date : Carbon::parse($this->start_date);
        $daysSinceStart = max($startDate->diffInDays(now()), 1);
        return $this->pledged / $daysSinceStart;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where('end_date', '>', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('verified', true);
    }

    public function scopeTrending($query)
    {
        return $query->where('trending', true);
    }

    public function scopeSuccessful($query)
    {
        return $query->whereRaw('pledged >= goal');
    }

    public function scopeEndingSoon($query, $days = 7)
    {
        return $query->where('end_date', '<=', now()->addDays($days))
                    ->where('end_date', '>', now())
                    ->where('status', 'active');
    }

    public function scopeRecentlyLaunched($query, $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days))
                    ->where('status', 'active');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'active')
                    ->where('end_date', '>', now());
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Methods
    public function incrementViews()
    {
        $this->increment('views');
    }

    public function incrementLikes()
    {
        $this->increment('likes');
    }

    public function incrementShares()
    {
        $this->increment('shares');
    }

    public function updateConversionRate()
    {
        if ($this->views > 0) {
            $this->conversion_rate = ($this->investors / $this->views) * 100;
            $this->save();
        }
    }

    public function getNextStretchGoal()
    {
        if (!$this->stretch_goals) return null;
        
        foreach ($this->stretch_goals as $goal) {
            if ($this->pledged < $goal['amount']) {
                return $goal;
            }
        }
        return null;
    }

    public function getAchievedStretchGoals()
    {
        if (!$this->stretch_goals) return collect();
        
        return collect($this->stretch_goals)->filter(function ($goal) {
            return $this->pledged >= $goal['amount'];
        });
    }
}
