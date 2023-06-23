<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * リレーション定義
     *
     * @return void
     */
    // メモ　引数の渡しにはLaravelのデフォルト規定で収まらない値を入れるときに必要なので精査してください
    public function brewery()
    {
        return $this->belongsTo(Brewery::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function style()
    {
        return $this->belongsTo(Style::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function abv()
    {
        return $this->belongsTo(Abv::class);
    }

    // 中間テーブル経由のリレーション
    public function tastes()
    {
        return $this->belongsToMany(Taste::class, 'item_taste');
    }
    public function containers()
    {
        return $this->belongsToMany(Container::class, 'item_container');
    }
    public function images()
    {
        return $this->belongsToMany(Image::class, 'item_image');
    }
    public function likes()
    {
        //hogehoge
    }
    public function favourites()
    {
        //hogehoge
    }
    public function comments()
    {
        //hogehoge
    }
}
