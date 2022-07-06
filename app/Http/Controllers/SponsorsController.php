<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $countries = Country::all();
        return view('mgmt.create',[
            'countries' => $countries,
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
