<?php

namespace App\Imports;

use App\Models\FoodItem;
use App\Models\FoodCategory;
use Maatwebsite\Excel\Concerns\ToModel;

class FoodImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[1])) {
            return null;
        }
        return new FoodItem([
            'food_group_id' => (int) $row[0],
            'fname' => $row[1],
        ]);
    }
}
