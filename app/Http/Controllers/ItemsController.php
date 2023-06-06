<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function create()
    {
        $brewery = Brewery::all();
        $country = Country::all();
        $prefecture = Prefecture::all();
        $taste = Taste::all();
        $container = Container::all();
        $style = Style::all();
        $color = Color::all();
        $abv = Abv::all();
        $type = Type::all();

        return response()->json([
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
        $lastInsertedId = $item->item_id;

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

    public function conditions()
    {
        $itemId = Item::select('id')->get();
        return response()->json([
            'itemId' => $itemId
        ]);
    }

    public function search(Request $request)
    {
        $itemId = $request->input('itemId');
        $item = Item::with(
            'brewery:id,name',
            'country:id,name',
            'prefecture:id,name',
            'type:id,name',
            'style:id,name',
            'color:id,name',
            'abv:id,name',
            'tastes:name',
            'containers:name'
        )->find($itemId);
        
        return response()->json([
            'item' => $item
        ]);
    }
}
