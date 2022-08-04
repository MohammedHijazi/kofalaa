<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Governorate;
use App\Models\Street;
use Illuminate\Http\Request;

//Admin panel Controller
class AdminController extends Controller
{
    public function home(){
        return view('home');
    }

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

    public function viewStreets()
    {
        $streets=Street::all();
        return view('admin.streets.index',['streets'=>$streets]);
    }

    public function createCity()
    {
        $governorates=Governorate::all();
        return view('admin.cities.create',['governorates'=>$governorates]);
    }

    public function createStreet()
    {
        $cities=City::all();
        return view('admin.streets.create',['cities'=>$cities]);
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
        return redirect()->route('cities.view')->with('success','City created successfully');
    }

    public function storeStreet(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:streets',
            'city_id'=>'required'
        ]);
        $street=new Street();
        $street->name=$request->name;
        $street->city_id=$request->city_id;
        $street->save();
        return redirect()->route('streets.view')->with('success','Street created successfully');
    }


}
