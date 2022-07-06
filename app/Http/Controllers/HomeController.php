<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\InstitutionSponsor;
use App\Models\PersonalSponsor;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $sponsors = Sponsor::all();


        return view('mgmt.index',['sponsors'=>$sponsors]);
    }
}
