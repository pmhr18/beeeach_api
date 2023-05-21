<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    public function item()
    {
        return $this->hasOne(Item::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function prefecture()
    {
        return $this->hasMany(Prefecture::class);
    }
}
