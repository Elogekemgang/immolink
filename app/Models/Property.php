<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Str;

class Property extends Model
{
    protected $fillable = [

        'user_id',

        'title',

        'description',

        'type',

        'price',

        'deposit',

        'bedrooms',

        'living_rooms',

        'bathrooms',

        'kitchens',

        'parking',

        'surface',

        'city',

        'district',

        'address',

        'latitude',

        'longitude',

        'status',

        'slug',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title);
            }
        });

        static::updating(function ($property) {
            // Si le titre change, on met à jour le slug automatiquement
            if ($property->isDirty('title') && empty($property->slug)) {
                $property->slug = Str::slug($property->title);
            }
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function images()
{
    return $this->hasMany(PropertyImage::class);
}

public function mainImage()
{
    return $this->hasOne(PropertyImage::class)
                ->where('is_primary', true);
}

public function rentalRequests()
{
    return $this->hasMany(RentalRequest::class);
}


public function contract()
{
    return $this->hasOne(LeaseContract::class);
}

public function conversations()
{
    return $this->hasMany(Conversation::class);
}
}