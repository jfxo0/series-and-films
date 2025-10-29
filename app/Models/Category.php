<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function tag()
    {

    }

    public function tags()
    {

    }
    public function series()
    {
        return $this->hasMany(Serie::class);
    }

}
