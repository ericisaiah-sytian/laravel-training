<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['brand'] ?? false, fn($query, $brand) =>
            $query->whereHas('brand', fn ($query) =>
                $query->where('slug', $brand)
            )
        );
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    protected $fillable = [
        'name',
        'brand_id',
        'slug',
        'excerpt',
        'thumbnail'
    ];
}
