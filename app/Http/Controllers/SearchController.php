<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\City;
use App\Models\Country;
use App\Models\FamilyMember;
use App\Models\Governorate;
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

        $beneficiary_id=$request['beneficiary_id'];
        $creation_date_from=$request['creation_date_from'];
        $creation_date_to=$request['creation_date_to'];

        if ($type == 'family') {
            $beneficiaries = new FamilyMember();
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
        }
    }
}
