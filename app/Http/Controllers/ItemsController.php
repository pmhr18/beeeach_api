<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ShowItemsResource;
use App\Services\ItemService;
use App\Models\Item;
use App\Models\Brewery;
use App\Models\Country;
use App\Models\Prefecture;
use App\Models\Taste;
use App\Models\Container;
use App\Models\Style;
use App\Models\Color;
use App\Models\Abv;
use App\Models\Type;

class ItemsController extends Controller
{
    /**
     *  サービスクラスを関連付ける
     *
     * @var [type]
     */
    private $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
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
        $initialData = $this->itemService->getInitialData();
        return response()->json($initialData);
    }

    /**
     * ビール情報を登録する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemName = $request->input('itemName');
        $breweryId = $request->input('breweryId');
        $countryId = $request->input('countryId');
        $prefectureId = $request->input('prefectureId');
        $tasteIds = $request->input('tasteId');
        $containerIds = $request->input('containerId');
        $styleId = $request->input('styleId');
        $colorId = $request->input('colorId');
        $abvId = $request->input('abvId');
        $typeId = $request->input('typeId');

        // findメソッドを使用してデータを取得
        $brewery = Brewery::find($breweryId); 
        $country = Country::find($countryId); 
        $prefecture = Prefecture::find($prefectureId); 
        $taste = Taste::find($tasteIds); 
        $container = Container::find($containerIds); 
        $style = Style::find($styleId); 
        $color = Color::find($colorId); 
        $abv = Abv::find($abvId); 
        $type = Type::find($typeId);

        //　取得したデータをレコード追加
        $item = new Item();
        $item->user_id = 991;
        $item->name = $request->input('itemName');
        $item->brewery_id = $breweryId;
        $item->country_id = $countryId;
        $item->prefecture_id = $prefectureId;
        $item->style_id = $styleId;
        $item->color_id = $colorId;
        $item->abv_id = $abvId;
        $item->type_id = $typeId;
        $item->main_image_url = null;
        $item->save();

        // 中間テーブルへレコード追加
        $item->tastes()->sync($tasteIds);
        $item->containers()->sync($containerIds);

        // レスポンスをJSON形式で返します
        return response()->json([
            'itemName' => $itemName,
            'brewery' => $brewery,
            'country' => $country,
            'prefecture' => $prefecture,
            'taste' => $taste,
            'container' => $container,
            'style' => $style,
            'color' => $color,
            'abv' => $abv,
            'type' => $type
        ]);
    }

    /**
     * 特定のビール情報を取得する
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::with([
            'country',
            'prefecture',
            'color',
            'style',
            'abv',
            'type',
            'brewery',
            // 'tastes',
            // 'containers'
        ])->findOrFail($id);
        
        return new ShowItemsResource($item);
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
