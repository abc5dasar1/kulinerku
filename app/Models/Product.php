<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'price',
        'photo',
        'dsc',
        'category_id'
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
