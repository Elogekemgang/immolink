<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Message extends Model
{
    //
    protected function initialize()
    {
        Schema::create('messages', function (Blueprint $table) {

    $table->id();

    $table->foreignId('conversation_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('sender_id')
          ->constrained('users')
          ->cascadeOnDelete();

    $table->text('message')->nullable();

    $table->string('attachment')->nullable();

    $table->boolean('is_read')->default(false);

    $table->timestamps();

});
}

public function conversation()
{
    return $this->belongsTo(Conversation::class);
}

public function sender()
{
    return $this->belongsTo(User::class,'sender_id');
}

protected $fillable = [

    'conversation_id',

    'sender_id',

    'message',

    'attachment',

    'is_read'

];

}
