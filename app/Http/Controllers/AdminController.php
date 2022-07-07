<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.base');
    }

    public function viewCountries()
    {
        $countries=Country::paginate(12);
        return view('admin.countries.index',['countries'=>$countries]);
    }

    public function viewGovernorates()
    {
        $governorates=Governorate::all();
        return view('admin.governorates.index',['governorates'=>$governorates]);
    }

    public function viewCities()
    {
        $cities=City::all();
        return view('admin.cities.index',['cities'=>$cities]);
    }



}
