<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreInfo extends Model
{
    protected $table = 'store_info';
    /**
     * リレーション定義
     *
     * @return void
     */
    public function breweries()
    {
        return $this->belongsToMany(Item::class, 'brewery_store_info');
    }
}
