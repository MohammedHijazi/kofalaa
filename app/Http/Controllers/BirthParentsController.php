<?php

namespace App\Http\Controllers;

use App\Models\BirthParent;
use App\Models\Governorate;
use Illuminate\Http\Request;

class BirthParentsController extends Controller
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
        if ($request->type == 'father'){
            $request->validate([
               'full_name' => 'required',
                'birth_date' => 'required|date|before:today,death_date',
                'death_date' => 'nullable|date|after:birth_date',
                'id_number' => 'required|unique:parents,id_number',
                'father_job_before_death'=>'string|max:255|nullable',
                'death_cause'=>'string|max:255|nullable',
                'death_place'=>'string|max:255|nullable',
                'details'=>'string|max:255|nullable',
            ]);

            $father = BirthParent::create($request->all());

            return redirect()->route('beneficiaries.show', $request->beneficiary_id)->with('success', 'تم إضافة أب بنجاح');
        }elseif ($request->type == 'mother'){
            $request->validate([
                'full_name' => 'required',
                'birth_date' => 'required|date|before:today',
                'id_number' => 'required|unique:parents,id_number',
                'mother_job_details'=>'string|max:255|nullable',
                'mother_income_amount'=>'string|max:255|nullable',
                'live_with_children'=>'in:yes,no',
                'social_status'=>'in:married,widow',
            ]);


            $mother = BirthParent::create($request->all());

            return redirect()->route('beneficiaries.show', $request->beneficiary_id)->with('success', 'تم إضافة أم بنجاح');

        }

    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $parent = BirthParent::findOrFail($id);
        $gevernorates = Governorate::all();
        if ($parent->type == 'father') {
            return view('benf.editFather', compact('parent', 'gevernorates'));
        }elseif ($parent->type == 'mother') {
            return view('benf.editMother', compact('parent', 'gevernorates'));
        }
    }


    public function update(Request $request, $id)
    {
        $parent = BirthParent::findOrFail($id);

        if ($parent->type == 'father') {
            $request->validate([
                'full_name' => 'required',
                'birth_date' => 'required|date|before:today,death_date',
                'death_date' => 'nullable|date|after:birth_date',
                'id_number' => 'required|unique:parents,id_number,'.$id,
                'father_job_before_death'=>'string|max:255|nullable',
                'death_cause'=>'string|max:255|nullable',
                'death_place'=>'string|max:255|nullable',
                'details'=>'string|max:255|nullable',
            ]);
            $parent->update($request->all());
            return redirect()->route('beneficiaries.show', $parent->beneficiary_id)->with('success', 'تم تعديل أب بنجاح');
        }elseif ($parent->type == 'mother') {
            $request->validate([
                'full_name' => 'required',
                'birth_date' => 'required|date|before:today',
                'id_number' => 'required|unique:parents,id_number,'.$id,
                'mother_job_details'=>'string|max:255|nullable',
                'mother_income_amount'=>'string|max:255|nullable',
                'live_with_children'=>'in:yes,no',
                'social_status'=>'in:married,widow',
            ]);
            $parent->update($request->all());
            return redirect()->route('beneficiaries.show', $parent->beneficiary_id)->with('success', 'تم تعديل أم بنجاح');
        }
    }


    public function destroy($id)
    {
        $parent = BirthParent::findOrFail($id);
        $parent->delete();
        return redirect()->route('beneficiaries.show', $parent->beneficiary_id)->with('success', 'تم حذف بنجاح');
    }
}
