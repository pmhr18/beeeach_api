<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    public function prefecture()
    {
        return $this->hasMany(Prefecture::class);
    }
}
