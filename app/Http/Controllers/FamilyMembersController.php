<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMembersController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:family_members,id_number',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'social_status' => 'required',
            'educational_qualification' => 'string',
        ]);

        $request->merge(['relation' => 'son']);

        $member = FamilyMember::create($request->all());

        return redirect()->route('beneficiaries.show', $request->beneficiary_id)->with('success', 'تم إضافة عضو أسرة المستفيد بنجاح');
    }

    public function edit($id)
    {
        $member = FamilyMember::findOrFail($id);

        return view('benf.editFamilyMember', ['member' => $member]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:family_members,id_number,' . $id,
            'birth_date' => 'required|date',
        ]);

        $member = FamilyMember::findOrFail($id);


    }

}
