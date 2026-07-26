<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password','phone',
    'city',
    'quarter',
    'address',
    'avatar','user_type',])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function properties()
{
    return $this->hasMany(Property::class);
}


public function rentalRequests()
{
    return $this->hasMany(RentalRequest::class,'tenant_id');
}

public function receivedRequests()
{
    return $this->hasMany(RentalRequest::class,'landlord_id');
}



public function landlordContracts()
{
    return $this->hasMany(LeaseContract::class,'landlord_id');
}

public function tenantContracts()
{
    return $this->hasMany(LeaseContract::class,'tenant_id');
}

}
