<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname', 'cat_id'
    ];

    public function cat()
    {
        return $this->belongsTo('App\Models\FoodCategory', 'cat_id');
    }
}
