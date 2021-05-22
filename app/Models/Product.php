<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'description',
        'exclusive', 'category_id'
    ];
    protected $dates = [
        'deleted_at'
    ];

    public function category()
    {
        return $this->belongsTo(
            Category::class
        );
    }
}
