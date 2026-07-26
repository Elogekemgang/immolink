<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaseContract extends Model
{
    protected $fillable = [

        'property_id',

        'landlord_id',

        'tenant_id',

        'rental_request_id',

        'start_date',

        'end_date',

        'monthly_rent',

        'deposit',

        'status'

    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function landlord()
    {
        return $this->belongsTo(User::class,'landlord_id');
    }

    public function tenant()
    {
        return $this->belongsTo(User::class,'tenant_id');
    }

    public function rentalRequest()
    {
        return $this->belongsTo(RentalRequest::class);
    }
}