<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'reference',
        'amount',
        'currency',
        'status',
        'channel',
        'metadata'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, "order_id", "id");
    }

    public function orderStatusLog(): HasMany
    {
        return $this->hasMany(OrderStatusLog::class, "order_id", "id");
    }
}
