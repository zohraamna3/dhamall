<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    protected $fillable = [
        'UserId',
        'OrderItemId',
        'Text',
        'Status',
        'Type'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'OrderItemId');
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->where('Status', 'Unread');
    }

    public function scopeRecent($query, $days = 7)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }
}
