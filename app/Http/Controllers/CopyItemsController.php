<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemsResource;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breweries = Brewery::all();
        $countries = Country::all();
        $prefectures = Prefecture::all();
        $tastes = Taste::all();
        $containers = Container::all();
        $styles = Style::all();
        $colors = Color::all();
        $abvs = Abv::all();
        $types = Type::all();
    
        return response()->json([
            'breweries' => $breweries,
            'countries' => $countries,
            'prefectures' => $prefectures,
            'tastes' => $tastes,
            'containers' => $containers,
            'styles' => $styles,
            'colors' => $colors,
            'abvs' => $abvs,
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'itemName' => 'required',
            'breweryId' => 'required|exists:breweries,id',
            'countryId' => 'required|exists:countries,id',
            'prefectureId' => 'required|exists:prefectures,id',
            'tasteId' => 'required|array',
            'tasteId.*' => 'exists:tastes,id',
            'containerId' => 'required|array',
            'containerId.*' => 'exists:containers,id',
            'styleId' => 'required|exists:styles,id',
            'colorId' => 'required|exists:colors,id',
            'abvId' => 'required|exists:abvs,id',
            'typeId' => 'required|exists:types,id',
        ]);
    
        $item = new Item();
        $item->user_id = 991;
        $item->name = $validatedData['itemName'];
        $item->brewery_id = $validatedData['breweryId'];
        $item->country_id = $validatedData['countryId'];
        $item->prefecture_id = $validatedData['prefectureId'];
        $item->style_id = $validatedData['styleId'];
        $item->color_id = $validatedData['colorId'];
        $item->abv_id = $validatedData['abvId'];
        $item->type_id = $validatedData['typeId'];
        $item->main_image_url = null;
        $item->save();
    
        $item->tastes()->sync($validatedData['tasteId']);
        $item->containers()->sync($validatedData['containerId']);
    
        return new ItemsResource($item);
    }

    /**
     * Display the specified resource.
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
            'tastes',
            'containers'
            ])->find($id);

        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }
    
        return new ItemsResource($item);
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

    public function search(Request $request)
{
    // アイテムを抽出するクエリビルダを作成
    $query = Item::query();
    
    // 検索条件取得
    $fetchKeywordValue = $request->input('inputKeyword');

    // inputKeyword が渡されたらキーワード検索、そうでなければ条件検索を実行
    if (!empty($fetchKeywordValue)) {
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

    $items = [];

    foreach ($itemIds as $itemId) {
        // アイテムの情報を取得
        $item = Item::find($itemId);
        $items[] = new ItemsResource($item);
    }

    return response()->json($items);
}
}
