<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';
    protected $fillable = ['name', 'info', 'episodes', 'status', 'image', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}



