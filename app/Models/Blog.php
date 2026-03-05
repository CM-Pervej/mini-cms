<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'content',
        'feature_image',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
