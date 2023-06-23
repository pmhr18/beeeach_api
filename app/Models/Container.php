<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_container');
    }
}
