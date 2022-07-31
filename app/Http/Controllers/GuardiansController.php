<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardiansController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:وصي,حاضن,ولي',
            'full_name' => 'required|string|max:255',
            'id_number' => 'required|unique:guardians,id_number',
            'birth_date' => 'required|date',
            'relation' => 'required|string|max:255',
            'mobile_number' => 'nullable|unique:guardians,mobile_number',
            'guardiation_data' => 'nullable|date',
            'issue_place' => 'required|string|max:255',
            'governorate' => 'required',
            'city' => 'nullable',
            'street' => 'nullable',
            'address' => 'nullable|string|max:255',
        ]);

        $guardian = Guardian::create($request->all());
        return redirect()->route('beneficiaries.show', $request->beneficiary_id)->with('success', 'تم إضافة ,لي أمر بنجاح');

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
