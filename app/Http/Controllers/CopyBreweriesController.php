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
            'country' => $country,
            'prefecture' => $prefecture,
            'storeInfo' => $storeInfo,
        ]);
    }

    public function show($id)
    {
        $record = Brewery::with('country', 'prefecture')->find($id)->toJson();
        // $country = Brewery::with('country')->find($id);
        // $prefecture = Brewery::with('prefecture')->find($id);
        // DD($record);
        return $record;
    }

    public function store(Request $request)
    {
        return $request;
    }
}
