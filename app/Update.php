<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $fillable = ['title', 'price', 'content'];
}
