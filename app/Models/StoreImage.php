<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    public function breweries()
    {
        return $this->belongsToMany(Item::class, 'brewery_store_image');
    }
}
