<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brewery;
use App\Models\StoreInfo;

class BreweriesController extends Controller
{
    public function index()
    {
        return 'test';
    }

    public function create()
    {
        $storeInfo = StoreInfo::all()->toJson();
        return $storeInfo;
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
