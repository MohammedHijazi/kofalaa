<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\Street;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $countries = Country::all();
        $gevernorates = Governorate::all();
        $cities = City::all();
        $streets = Street::all();

        return view('mgmt.create',[
            'countries' => $countries,
            'gevernorates' => $gevernorates,
            'cities' => $cities,
            'streets' => $streets
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
