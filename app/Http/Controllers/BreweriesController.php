<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brewery;
use App\Models\StoreInfo;
use App\Models\Item;
use App\Models\Country;
use App\Models\Prefecture;

class BreweriesController extends Controller
{
    public function create()
    {
        $country = Country::all();
        $prefecture = Prefecture::all();
        $storeInfo = StoreInfo::all();

        return response()->json([
            'storeInfo' => $storeInfo,
            'country' => $country,
            'prefecture' => $prefecture,
        ]);

        // $createBreweries[] = [
        //     'country' => $country,
        //     'prefecture' => $prefecture,
        //     'storeInfo' => $storeInfo,
        // ];

        // return response()->json($createBreweries);
    }

    public function store(Request $request)
    {
        $breweryName = $request->input('breweryName');
        $formalName = $request->input('formalName');
        $address = $request->input('address');
        $access = $request->input('access');
        $countryId = $request->input('countryId');
        $prefectureId = $request->input('prefectureId');
        $storeInfoIds = $request->input('storeInfoId');

        // findメソッドを使用してデータを取得
        $country = Country::find($countryId); 
        $prefecture = Prefecture::find($prefectureId); 
        $storeInfo = StoreInfo::find($storeInfoIds); 

        //　取得したデータをレコード追加
        $brewery = new Brewery();
        $brewery->user_id = 991;
        $brewery->name = $breweryName;
        $brewery->formal_name = $formalName;
        $brewery->address = $address;
        $brewery->access = $access;
        $brewery->country_id = $countryId;
        $brewery->prefecture_id = $prefectureId;
        $brewery->main_image_url = null;
        $brewery->save();

        // 中間テーブルへレコード追加
        $brewery->store_info()->sync($storeInfoIds);

        // レスポンスをJSON形式で返します
        return response()->json([
            'breweryName' => $breweryName,
            'formalName' => $formalName,
            'address' => $address,
            'access' => $access,
            'country' => $country,
            'prefecture' => $prefecture,
            'storeInfo' => $storeInfo,
        ]); 
    }

    public function show($id)
    {
        $breweryId = $id;

        $record = Brewery::with('country', 'prefecture')
            ->find($id);
            // ->toJson();
        $storeInfo = $record->store_info()->get();
        // $country = Brewery::with('country')->find($id);
        // $prefecture = Brewery::with('prefecture')->find($id);
        DD($storeInfo);
        return $record;
    }
}
