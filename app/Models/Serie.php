<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';
    protected $fillable = ['name', 'info', 'episodes', 'status', 'image', 'category_id', 'user_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? null, function ($q, $search) {
            $q->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('info', 'like', "%{$search}%");
            });
        });

        $query->when($filters['category'] ?? null, function ($q, $categoryId) {
            $q->where('category_id', $categoryId);
        });
    }


}



