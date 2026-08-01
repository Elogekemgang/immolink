<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    protected $fillable = [

        'lease_contract_id',

        'opened_by',

        'bailiff_id',

        'title',

        'description',

        'status',
        
        'bailiff_status'

    ];

    public function contract()
    {
        return $this->belongsTo(LeaseContract::class,'lease_contract_id');
    }

    public function opener()
    {
        return $this->belongsTo(User::class,'opened_by');
    }

    public function bailiff()
    {
        return $this->belongsTo(User::class,'bailiff_id');
    }

    public function report()
{
    return $this->hasOne(BailiffReport::class);
}

public function leaseContract()
{
    return $this->belongsTo(LeaseContract::class);
}

}