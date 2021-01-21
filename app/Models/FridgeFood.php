<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FridgeFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id', 'fridge_id', 'expire_date'
    ];

    public function getFood() {

        return $this->hasMany(FoodItem::class, 'id', 'food_id');
    }
}
