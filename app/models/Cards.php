<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model {
    protected $table = 'cards';
    protected $fillable = ['image', 'name', 'cost', 'type', 'attack', 'heatlh', 'effect'];
}