<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'area_id',
        'title',
        'slug',
        'cover_image',
        'address',
        'introduction',
        'description',
        'type',
        'cost',
        'listed',
    ];

    protected $attributes = [
        'listed' => 1,
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function amenities()
    {
        return $this->hasMany(Amenity::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
