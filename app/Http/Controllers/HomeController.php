<?php

namespace App\Http\Controllers;

use App\Models\InstitutionSponsor;
use App\Models\PersonalSponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $personal_sponsors=PersonalSponsor::inRandomOrder()->get();
        $institution_sponsors=InstitutionSponsor::inRandomOrder()->get();
        $sponsors=$personal_sponsors->concat($institution_sponsors)->shuffle();
        return view('mgmt.index',['sponsors'=>$sponsors]);
    }
}
