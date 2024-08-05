<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'price',
        'qty'
    ];
    use HasFactory;
    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function Product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
