<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{
    protected $table = 'product_reviews';
    protected $primaryKey = 'id';

    protected $fillable = [
        'UserId',
        'ProductId',
        'Rating',
        'Title',
        'Comment',
        'Sentiment',
        'PostedOn',
        'Response'
    ];

    protected $casts = [
        'PostedOn' => 'datetime',
        'Rating' => 'integer'
    ];

    // Sentiment constants
    public const SENTIMENT_POSITIVE = 'positive';
    public const SENTIMENT_NEUTRAL = 'neutral';
    public const SENTIMENT_NEGATIVE = 'negative';

    /**
     * Relationship to Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'ProductId');
    }

    /**
     * Relationship to User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    /**
     * Scope for positive reviews
     */
    public function scopePositive($query)
    {
        return $query->where('Sentiment', self::SENTIMENT_POSITIVE);
    }

    /**
     * Scope for negative reviews
     */
    public function scopeNegative($query)
    {
        return $query->where('Sentiment', self::SENTIMENT_NEGATIVE);
    }

    /**
     * Determine if the review has a seller response
     */
    public function hasResponse(): bool
    {
        return !empty($this->Response);
    }

    /**
     * Get the sentiment as a human-readable label
     */
    public function getSentimentLabelAttribute(): string
    {
        return match($this->Sentiment) {
            self::SENTIMENT_POSITIVE => 'Positive',
            self::SENTIMENT_NEGATIVE => 'Negative',
            default => 'Neutral',
        };
    }
}
