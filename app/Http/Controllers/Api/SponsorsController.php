<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\FamilyMember;
use App\Models\Governorate;
use App\Models\Sponsor;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SponsorsController extends Controller
{
    //function to get all governorates and their corresponding cities and streets to be used in dropdown lists
    public function index(){
        $governorates = Governorate::get()->load('cities','cities.streets');
        return Response::json($governorates);
    }

    //function to get family members' names for autocomplete when searching
    public function fetch(Request $request){
        $request = $request->all();
        $name = $request['query'];
        $result = FamilyMember::where('name','like','%'.$name.'%')->get(['name','id']);
        return Response::json($result);
    }

    public function fetchBeneficiaries($id){
        $beneficiaries = Sponsor::find($id)->beneficiaries;
        return Response::json($beneficiaries,200);
    }


    public function addBeneficiary(Request $request){

        $request=$request->all();
        $beneficiary_id=$request['beneficiary-id'];
        $sponsor_id=$request['sponsor-id'];
        $sponsorship_type=$request['sponsorship-type'];


        $beneficiary_id=FamilyMember::find($beneficiary_id)->id;
        $sponsor=Sponsor::findOrFail($sponsor_id);

        //check if beneficiary is already sponsored by this sponsor and if so, add new beneficiary without deleting the old one
        $sponsor->beneficiaries()->attach($beneficiary_id,['sponsorship_type'=>$sponsorship_type]);


        return Response::json('Beneficiary added successfully',200);

    }



}
