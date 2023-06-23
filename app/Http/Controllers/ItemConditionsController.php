<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;

class ItemConditionsController extends Controller
{
    // サービスクラスを関連付ける
    private $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    // 初期選択データを取得する
    public function index()
    {
        $initialData = $this->itemService->getInitialData();
        return response()->json($initialData);
    }
    // 検索結果データを取得する
    public function result(Request $request)
    {
        $items = $this->itemService->searchItems($request);
        return response()->json($items);
    }
}
