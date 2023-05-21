<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
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
        public function brewery()
    {
        return $this->hasOne(Brewery::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
