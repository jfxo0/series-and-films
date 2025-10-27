<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function series()
    {
        return $this->hasMany(Serie::class, 'category_id');
    }

}
