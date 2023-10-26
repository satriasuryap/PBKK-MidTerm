<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'item_type',
        'item_condition',
        'description',
        'defects',
        'quantity',
        'images',
    ];

    // Define any additional methods or relationships here if needed.

    // For example, you might want to define an accessor to handle images attribute:
    public function getImagesAttribute($images)
    {
        return json_decode($images, true);
    }
}
