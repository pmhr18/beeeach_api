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

    public function search(Request $request)
    {
        // アイテムを抽出するクエリビルダを作成
        $query = Item::query();
        
        //検索条件取得
        $fetchKeywordValue = $request->input('inputKeyword');

        // inputKeyword が渡されたらキーワード検索、そうでなければ条件検索を実行
        if (!empty($fetchKeywordValue)) {
            // キーワード検索
            // 検索文字列全体の前後にある空白を除去
            $keyword_remove_space = preg_replace( '/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $fetchKeywordValue);
            // 検索文字列内の半角スペースを全角スペースにする
            $keyword_unify_space =  mb_convert_kana($keyword_remove_space, 's');
            // 全角空白で文字を区切り配列へ
            $searchTerms = preg_split('/[\s]+/', $keyword_unify_space);

            foreach ($searchTerms as $searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%");
                $query->orWhereHas('brewery', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orWhereHas('country', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orWhereHas('prefecture', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orWhereHas('style', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orWhereHas('color', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orWhereHas('abv', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orWhereHas('type', function ($query) use ($searchTerm) {
                    $query->where('name', 'like', "%$searchTerm%");
                });
                $query->orwhereHas('tastes', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', "%$searchTerm%");
                });
                $query->orwhereHas('containers', function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', "%$searchTerm%");
                });
            }

        } else {
            // 条件検索
            $fetchBreweryId = $request->input('breweryId');
            $fetchCountryId = $request->input('countryId');
            $fetchPrefectureId = $request->input('prefectureId');
            $fetchTasteId = $request->input('tasteId');
            $fetchContainerId = $request->input('containerId');
            $fetchStyleId = $request->input('styleId');
            $fetchColorId = $request->input('colorId');
            $fetchAbvId = $request->input('abvId');
            $fetchTypeId = $request->input('typeId');

            // 各条件を組み合わせてクエリを絞り込む
            if (!empty($fetchBreweryId)) {
                $query->whereIn('brewery_id', $fetchBreweryId);
            }
            if (!empty($fetchCountryId)) {
                $query->whereIn('country_id', $fetchCountryId);
            }
            if (!empty($fetchPrefectureId)) {
                $query->whereIn('prefecture_id', $fetchPrefectureId);
            }
            if (!empty($fetchStyleId)) {
                $query->whereIn('style_id', $fetchStyleId);
            }
            if (!empty($fetchColorId)) {
                $query->whereIn('color_id', $fetchColorId);
            }
            if (!empty($fetchAbvId)) {
                $query->whereIn('abv_id', $fetchAbvId);
            }
            if (!empty($fetchTypeId)) {
                $query->whereIn('type_id', $fetchTypeId);
            }

            // アイテムを抽出するクエリビルダを作成
            // tastesテーブルの条件を絞り込む
            if (!empty($fetchTasteId)) {
                $query->whereHas('tastes', function ($subQuery) use ($fetchTasteId) {
                    $subQuery->whereIn('tastes.id', $fetchTasteId);
                });
            }
            // containersテーブルの条件を絞り込む
            if (!empty($fetchContainerId)) {
                $query->whereHas('containers', function ($subQuery) use ($fetchContainerId) {
                    $subQuery->whereIn('containers.id', $fetchContainerId);
                });
            }

        }

        // アイテムのidを取得
        $itemIds = $query->pluck('id');
        $buildItems = [];
    
        foreach ($itemIds as $itemId) {
            $item = Item::find($itemId);
            $itemName = $item->name;
            $country = Country::find($item->country_id);
            $prefecture = Prefecture::find($item->prefecture_id);
            $color = Color::find($item->color_id);
            $style = Style::find($item->style_id);
            $abv = Abv::find($item->abv_id);
            $type = Type::find($item->type_id);
            $brewery = Brewery::find($item->brewery_id);
            $tastes = $item->tastes()->get();
            $containers = $item->containers()->get();
    
            $buildItems[] = [
                'item_id' => $itemId,
                'item_name' => $itemName,
                'country' => $country,
                'prefecture' => $prefecture,
                'color' => $color,
                'style' => $style,
                'abv' => $abv,
                'type' => $type,
                'brewery' => $brewery,
                'tastes' => $tastes,
                'containers' => $containers,
            ];
        }
    
        return response()->json($buildItems);
    }

    public function show($id)
    {
        // アイテムのidを取得
        $itemId = $id;
        
        $item = Item::find($itemId);
        $itemName = $item->name;
        $country = Country::find($item->country_id);
        $prefecture = Prefecture::find($item->prefecture_id);
        $color = Color::find($item->color_id);
        $style = Style::find($item->style_id);
        $abv = Abv::find($item->abv_id);
        $type = Type::find($item->type_id);
        $brewery = Brewery::find($item->brewery_id);
        $tastes = $item->tastes()->get();
        $containers = $item->containers()->get();

        $buildItems = [
            'item_id' => $itemId,
            'item_name' => $itemName,
            'country' => $country,
            'prefecture' => $prefecture,
            'color' => $color,
            'style' => $style,
            'abv' => $abv,
            'type' => $type,
            'brewery' => $brewery,
            'tastes' => $tastes,
            'containers' => $containers,
        ];

        return response()->json($buildItems);
    }
}
