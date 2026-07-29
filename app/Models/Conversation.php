<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Conversation extends Model
{
    //
    protected function initialize()
    {
        Schema::create('conversations', function (Blueprint $table) {

    $table->id();

    $table->foreignId('property_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('landlord_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->foreignId('tenant_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->timestamps();

});
}

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

public function messages()
{
    return $this->hasMany(Message::class);
}


protected $fillable = [

    'property_id',

    'tenant_id',

    'landlord_id'

];


}
