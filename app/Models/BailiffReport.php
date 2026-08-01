<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BailiffReport extends Model
{
    protected $fillable = [

        'dispute_id',

        'bailiff_id',

        'title',

        'findings',

        'decision',

        'recommendations',

        'status',

        'submitted_at'

    ];

    public function dispute()
    {
        return $this->belongsTo(Dispute::class);
    }

    public function bailiff()
    {
        return $this->belongsTo(User::class,'bailiff_id');
    }
}