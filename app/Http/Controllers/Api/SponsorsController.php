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
    public function fetchBenf(Request $request){
        $request = $request->all();
        $name = $request['query'];
        $result = FamilyMember::where('name','like','%'.$name.'%')->get(['name','id']);
        return Response::json($result);
    }

    //function to get family members' names for autocomplete when searching
    public function fetchSpons(Request $request){
        $request = $request->all();
        $name = $request['query'];
        $result = Sponsor::where('name','like','%'.$name.'%')->get(['name','id']);
        return Response::json($result);
    }

    //function to fetch all beneficiaries of a sponsor
    public function fetchBeneficiaries($id){
        $beneficiaries = Sponsor::find($id)->beneficiaries;
        return Response::json($beneficiaries,200);
    }


    //function to add a beneficiary to a sponsor
    public function addBeneficiary(Request $request){

        $request=$request->all();
        $beneficiary_id=$request['beneficiary-id'];
        $sponsor_id=$request['sponsor-id'];
        $sponsorship_type=$request['sponsorship-type'];


        $beneficiary_id=FamilyMember::find($beneficiary_id)->id;
        $sponsor=Sponsor::findOrFail($sponsor_id);

        //check if beneficiary is already sponsored
        $check=$sponsor->beneficiaries->contains($beneficiary_id);
        if($check){
            return Response::json(['message'=>'Beneficiary is already sponsored'],400);
        }

        //add beneficiary to sponsor if not already sponsored
        $sponsor->beneficiaries()->attach($beneficiary_id,['sponsorship_type'=>$sponsorship_type]);

        return Response::json(['message' => 'Beneficiary added successfully'],200);

    }

    //function to update a beneficiary sponsorship_type of a sponsor
    public function updateBeneficiary($sponsor_id,$beneficiary_id){
        $sponsor=Sponsor::findOrFail($sponsor_id);
        $sponsorship_type=$sponsor->beneficiaries->where('id',$beneficiary_id)->first()->pivot->sponsorship_type;
        if ($sponsorship_type=='yearly') {
            $sponsorship_type = 'monthly';
        } else {
            $sponsorship_type = 'yearly';
        }
        $sponsor->beneficiaries()->updateExistingPivot($beneficiary_id,['sponsorship_type'=>$sponsorship_type]);
        return Response::json(['message' => 'Beneficiary updated successfully'],200);
    }



    //function to delete beneficiary from sponsor
    public function destroyBeneficiary($sponsor_id,$beneficiary_id){
        $sponsor=Sponsor::findOrFail($sponsor_id);
        $beneficiary=FamilyMember::findOrFail($beneficiary_id);
        $sponsor->beneficiaries()->detach($beneficiary);
        return Response::json(['message'=>'Beneficiary removed successfully'],200);
    }





}
