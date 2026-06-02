<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderStatusLog extends Model
{
    use HasUuids;

    protected $fillable = [
        'order_id',
        'from_status',
        'to_status',
        'reason',
        'changed_by'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, "order_id", "id");
    }
}
