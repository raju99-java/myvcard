<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class CardArena extends Model {
    protected $table = 'cardarenas';
    protected $fillable = [
        'image','status'
    ];

}
