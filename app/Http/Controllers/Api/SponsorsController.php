<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\FamilyMember;
use App\Models\Governorate;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SponsorsController extends Controller
{
    public function index(){
        $governorates = Governorate::get()->load('cities','cities.streets');
        return Response::json($governorates);
    }

    public function fetch(Request $request){
        $request = $request->all();
        $name = $request['query'];

        $result = FamilyMember::where('name','like','%'.$name.'%')->get();

        return Response::json($result);
    }

}
