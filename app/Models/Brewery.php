<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    public function item()
    {
        return $this->hasMany(Item::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    // 中間テーブル経由のリレーション
    public function store_info()
    {
        return $this->belongsToMany(StoreInfo::class, 'brewery_store_info');
    }
    public function store_image()
    {
        return $this->belongsToMany(StoreImage::class, 'brewery_store_image');
    }
}
