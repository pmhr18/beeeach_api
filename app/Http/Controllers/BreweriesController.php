<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brewery;

class BreweriesController extends Controller
{
    public function index()
    {
        return 'test';
    }
    public function show($id)
    {
        $record = Brewery::find($id);
        // $country = Brewery::with('country')->find($id);
        // $prefecture = Brewery::with('prefecture')->find($id);
        DD($record);
        return $record;
    }
}
