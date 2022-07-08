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

    public function createCity()
    {
        $governorates=Governorate::all();
        return view('admin.cities.create',['governorates'=>$governorates]);
    }

    public function storeCity(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:cities',
            'governorate_id'=>'required'
        ]);
        $city=new City();
        $city->name=$request->name;
        $city->governorate_id=$request->governorate_id;
        $city->save();
        return redirect()->route('admin.cities.index')->with('success','City created successfully');
    }



}
