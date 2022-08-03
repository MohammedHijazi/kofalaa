<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\City;
use App\Models\Country;
use App\Models\FamilyMember;
use App\Models\Governorate;
use App\Models\Guardian;
use App\Models\InstitutionSponsor;
use App\Models\PersonalSponsor;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $governorates = Governorate::all();
        $cities = City::all();
        return view('search.index',[
            'countries' => $countries,
            'governorates' => $governorates,
            'cities' => $cities
        ]);
    }

    public function search(Request $request){
        $request = $request->all();

        $type = $request['type'];
        $name=$request['name'];
        $country=$request['country'];
        $gevernorate=$request['gevernorate'];
        $city=$request['city'];
        $nationality=$request['nationality'];
        $contact_person=$request['contact_person'];
        $id_number=$request['id_number'];

        if($type=='personal'){
            $sponsors = new PersonalSponsor();
            if($name){
                $sponsors = $sponsors->whereHas('sponsor',function($q)use($name){
                    $q->where('name','like','%'.$name.'%');
                });
            }
            if($country){
                $sponsors = $sponsors->whereHas('sponsor',function($q)use($country){
                    $q->where('country','=',$country);
                });
            }
            if($gevernorate){
                $sponsors = $sponsors->where('governorate','=',$gevernorate);
            }
            if($city){
                $sponsors = $sponsors->where('city','=',$city);
            }
            if ($nationality){
                $sponsors = $sponsors->where('nationality','=',$nationality);
            }
            if ($id_number){
                $sponsors = $sponsors->where('id_number','=',$id_number);
            }
            $sponsors = $sponsors->get();


            return view('search.result',['sponsors'=>$sponsors]);
        }else{
            $sponsors = new InstitutionSponsor();
            if($name){
                $sponsors = $sponsors->whereHas('sponsor',function($q)use($name){
                    $q->where('name','like','%'.$name.'%');
                });
            }
            if($country){
                $sponsors = $sponsors->whereHas('sponsor',function($q)use($country){
                    $q->where('country','=',$country);
                });
            }
            if($contact_person){
                $sponsors = $sponsors->where('contact_person','like','%'.$contact_person.'%');
            }
            $sponsors = $sponsors->get();
            return view('search.result',['sponsors'=>$sponsors]);
        }
    }

    public function searchBeneficiariesIndex(){
        $countries = Country::all();
        $governorates = Governorate::all();
        $cities = City::all();

        return view('search.benf.search',['governorates'=>$governorates,'cities'=>$cities,'countries'=>$countries]);
    }


    public function searchBeneficiaries(){
        $request = request()->all();
        $type=$request['type'];
        $beneficiaries = new FamilyMember();

        if ($type == 'family') {
            $beneficiary_id=$request['beneficiary_id'];
            $creation_date_from=$request['creation_date_from'];
            $creation_date_to=$request['creation_date_to'];

            if($beneficiary_id){
                $beneficiaries = $beneficiaries->whereHas('beneficiary',function($q)use($beneficiary_id){
                    $q->where('beneficiary_id','=',$beneficiary_id);
                });
            }elseif($creation_date_from){
                $beneficiaries = $beneficiaries->whereHas('beneficiary',function($q)use($creation_date_from){
                    $q->where('created_at','>=',$creation_date_from);
                });
            }elseif ($creation_date_to) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary',function($q)use($creation_date_to){
                    $q->where('created_at','<=',$creation_date_to);
                });
            }

            $beneficiaries = $beneficiaries->get();

            return view('search.benf.result',['beneficiaries'=>$beneficiaries]);
        }elseif ($type == 'member'){
            $full_name=$request['full_name'];
            $id_number=$request['id_number'];
            $birth_date=$request['birth_date'];
            $gender=$request['gender'];

            $beneficiaries = new FamilyMember();
            if($full_name){
                $beneficiaries = $beneficiaries->where('name','like','%'.$full_name.'%');
            }elseif ($id_number) {
                $beneficiaries = $beneficiaries->where('id_number', '=', $id_number);
            }elseif ($birth_date) {
                $beneficiaries = $beneficiaries->where('birth_date', '=', $birth_date);
            }elseif ($gender){
                $beneficiaries = $beneficiaries->where('gender','=',$gender);
            }

            $beneficiaries = $beneficiaries->get();

            return view('search.benf.result',['beneficiaries'=>$beneficiaries]);

        }elseif($type == 'guardian'){
            $full_name=$request['full_name'];
            $id_number=$request['id_number'];
            $relation=$request['relation'];
            $guardiation_date=$request['guardiation_date'];
            $issue_place=$request['issue_place'];

            $beneficiaries = new FamilyMember();

            if($full_name) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($full_name) {
                    $q->where('full_name', 'like', '%' . $full_name . '%')->where('type', '=', 'وصي');
                });

            }elseif ($id_number) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($id_number) {
                    $q->where('id_number', '=', $id_number)->where('type', '=', 'وصي');
                });


            }elseif ($relation) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($relation) {
                    $q->where('relation', '=', $relation)->where('type', '=', 'وصي');
                });

            }elseif ($guardiation_date) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($guardiation_date) {
                    $q->where('guardiation_data', '=', $guardiation_date)->where('type', '=', 'وصي');
                });
            }elseif ($issue_place) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($issue_place) {
                    $q->where('issue_place', '=', $issue_place)->where('type', '=', 'وصي');
                });

            }

            $beneficiaries = $beneficiaries->get();

            return view('search.benf.result',['beneficiaries'=>$beneficiaries]);
        }elseif ($type=='custodian'){
            $full_name=$request['full_name'];
            $id_number=$request['id_number'];
            $relation=$request['relation'];
            $issue_place=$request['issue_place'];

            $beneficiaries = new FamilyMember();


            if($full_name) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($full_name) {
                    $q->where('full_name', 'like', '%' . $full_name . '%')->where('type', '=', 'حاضن');
                });

            }elseif ($id_number) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($id_number) {
                    $q->where('id_number', '=', $id_number)->where('type', '=', 'حاضن');
                });


            }elseif ($relation) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($relation) {
                    $q->where('relation', '=', $relation)->where('type', '=', 'حاضن');
                });

            }elseif ($issue_place) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($issue_place) {
                    $q->where('issue_place', '=', $issue_place)->where('type', '=', 'حاضن');
                });
            }

            $beneficiaries = $beneficiaries->get();

            return view('search.benf.result',['beneficiaries'=>$beneficiaries]);

        }elseif ($type == 'ruler'){
            $full_name=$request['full_name'];
            $id_number=$request['id_number'];
            $relation=$request['relation'];
            $issue_place=$request['issue_place'];

            $beneficiaries = new FamilyMember();


            if($full_name) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($full_name) {
                    $q->where('full_name', 'like', '%' . $full_name . '%')->where('type', '=', 'ولي');
                });

            }elseif ($id_number) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($id_number) {
                    $q->where('id_number', '=', $id_number)->where('type', '=', 'ولي');
                });


            }elseif ($relation) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($relation) {
                    $q->where('relation', '=', $relation)->where('type', '=', 'ولي');
                });

            }elseif ($issue_place) {
                $beneficiaries = $beneficiaries->whereHas('beneficiary.guardians', function ($q) use ($issue_place) {
                    $q->where('issue_place', '=', $issue_place)->where('type', '=', 'ولي');
                });
            }

            $beneficiaries = $beneficiaries->get();

            return view('search.benf.result',['beneficiaries'=>$beneficiaries]);
        }
    }
}
