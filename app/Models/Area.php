<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    public function country()
    {
        return $this->hasMany(Country::class);
    }
}
