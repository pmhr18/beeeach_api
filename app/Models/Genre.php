<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
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
}
