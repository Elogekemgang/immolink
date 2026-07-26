<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

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
}