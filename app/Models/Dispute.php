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

        'status'

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
}