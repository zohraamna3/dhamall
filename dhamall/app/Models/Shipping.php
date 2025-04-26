<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipping';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Method',
        'City',
        'ShippingFee',
        'EstimatedDeliveryTime',
        'AdminId'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ShippingFee' => 'decimal:2',
        'EstimatedDeliveryTime' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Shipping method constants
     */
    public const METHOD_FAST = 'Fast Shipping';
    public const METHOD_FREE = 'Free Shipping';

    /**
     * Get the admin user who created this shipping method.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'AdminId');
    }

    /**
     * Scope a query to only include fast shipping methods.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFastShipping($query)
    {
        return $query->where('Method', self::METHOD_FAST);
    }

    /**
     * Scope a query to only include free shipping methods.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFreeShipping($query)
    {
        return $query->where('Method', self::METHOD_FREE);
    }

    /**
     * Scope a query to only include shipping methods for a specific city.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $city
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForCity($query, string $city)
    {
        return $query->where('City', $city);
    }

    /**
     * Get the estimated delivery time in human-readable format.
     *
     * @return string
     */
    public function getEstimatedDeliveryAttribute(): string
    {
        return $this->EstimatedDeliveryTime . ' days';
    }

    /**
     * Check if this is a free shipping method.
     *
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->Method === self::METHOD_FREE;
    }

    /**
     * Check if this is a fast shipping method.
     *
     * @return bool
     */
    public function isFast(): bool
    {
        return $this->Method === self::METHOD_FAST;
    }
}
