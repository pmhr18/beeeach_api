<?php

namespace App\Services;

use App\Http\Resources\ArrayDataResource;
use App\Models\Country;
use App\Models\Prefecture;
use App\Models\StoreInfo;

class BreweryService
{
    public function searchBreweries($request)
    {
        // ブルワリー情報の検索機能が要望され次第設計製造する
    }

    public function getInitialData()
    {
        // 初期選択データを各テーブルから全取得する
        $country = Country::all();
        $prefecture = Prefecture::all();
        $storeInfo = StoreInfo::all();

        $initialData = [
            'country' => ArrayDataResource::collection($country),
            'prefecture' => ArrayDataResource::collection($prefecture),
            'storeInfo' => ArrayDataResource::collection($storeInfo),
        ];

        return $initialData;
    }
    
}
