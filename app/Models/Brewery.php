<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    public function item()
    {
        return $this->hasOne(Item::class);
    }
}
