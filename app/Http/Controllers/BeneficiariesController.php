<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class BeneficiariesController extends Controller
{

    public function index()
    {
        $beneficiaries = Beneficiary::all();
        return view('benf.index',['beneficiaries'=>$beneficiaries]);
    }


    public function create()
    {
        return view('benf.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:حالة انسانية,يتيم الأبوين,يتيم الأب,يتيم الأم,غير يتيم',
        ]);

        $beneficiary = Beneficiary::create($request->all());
        return redirect()->route('beneficiaries.index')->with('success', 'تم إضافة المستفيد بنجاح');
    }



    public function show($id)
    {
        $beneficiary = Beneficiary::findOrFail($id);

        return view('benf.show',['beneficiary'=>$beneficiary]);
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
