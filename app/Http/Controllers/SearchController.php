<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $gevernorates = Governorate::all();
        $cities = City::all();
        return view('search.index',[
            'countries' => $countries,
            'gevernorates' => $gevernorates,
            'cities' => $cities
        ]);
    }

    public function search(Request $request){

        return view('search.result');
    }
}
