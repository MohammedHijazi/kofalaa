<?php

namespace App\Http\Controllers;


use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class PaymentsController extends Controller
{
    public function index()
    {
        return view('payments.index');
    }

    //function to get beneficiaries names for their corresponding sponsor for autocomplete when searching
    public function fetchBeneficiaries($id){
        $result=Sponsor::find($id)->beneficiaries;
        return Response::json($result);
    }

    public function create()
    {
        $sponsors=Sponsor::all('id','name');
        return view('payments.create',['sponsors'=>$sponsors]);
    }
}
