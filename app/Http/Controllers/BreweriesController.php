<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ShowBreweriesResource;
use App\Services\BreweryService;
use App\Models\Brewery;
use App\Models\StoreInfo;
use App\Models\Country;
use App\Models\Prefecture;

class BreweriesController extends Controller
{
    /**
     *  サービスクラスを関連付ける
     *
     * @var [type]
     */
    private $breweryService;
    
    public function __construct(BreweryService $breweryService)
    {
        $this->breweryService = $breweryService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 初期選択データを取得する
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $initialData = $this->breweryService->getInitialData();
        return response()->json($initialData);
    }

    /**
     * ブルワリー情報を登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * 特定のブルワリー情報を取得する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brewery = Brewery::with([
            'country',
            'prefecture',
            'item',
            // 'store_info',
            // 'items',
        ])->findOrFail($id);

        return new ShowBreweriesResource($brewery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
