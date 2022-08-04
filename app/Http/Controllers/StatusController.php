<?php

//Controller to manage economic situations and Housing conditions of beneficiaries

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\EconomicSituation;
use App\Models\HousingCondition;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function storeEconomical(Request $request)
    {

        $request->validate([
            'average_income' => 'required|string|max:255',
            'source_of_income' => 'required|string|max:255',
            'receive_help' => 'required|in:yes,no',
            'help_amount' => 'required_if:receive_help,yes|string|max:255',
            'help_source' => 'required_if:receive_help,yes|string|max:255',
            'assets' => 'string|max:255|min:3',
            'assets_profits' => 'string|max:255',
            'total_income' => 'string|max:255',
            'description' => 'string|max:255',
        ]);

        EconomicSituation::create($request->all());

        return redirect()->route('beneficiaries.show', $request->beneficiary_id);
    }

    public function storeHousing(Request $request)
    {

        $request->validate([
            'housing_type' => 'required|in:own,rented,other',
            'rent_amount' => 'required_if:housing_type,rented|string|max:255',
            'number_of_rooms' => 'integer|required',
            'people_per_room' => 'integer|required',
            'building_condition' => 'string|max:255',
            'building_type' => 'string|max:255',
            'building_space' => 'string|max:255',
            'furniture_condition' => 'string|max:255',
            'description' => 'string|max:500',
        ]);


        HousingCondition::create($request->all());

        return redirect()->route('beneficiaries.show', $request->beneficiary_id);
    }

    public function editEconomical($id){
        $economic = Beneficiary::findOrFail($id)->economicSituation;
        return view('benf.editEconomic', compact('economic'));
    }

    public function updateEconomical(Request $request,$id){
        $request->validate([
            'average_income' => 'required|string|max:255',
            'source_of_income' => 'required|string|max:255',
            'receive_help' => 'required|in:yes,no',
            'help_amount' => 'required_if:receive_help,yes|string|max:255',
            'help_source' => 'required_if:receive_help,yes|string|max:255',
            'assets' => 'string|max:255|min:3',
            'assets_profits' => 'string|max:255',
            'total_income' => 'string|max:255',
            'description' => 'string|max:255',
        ]);
        $economic = EconomicSituation::findOrFail($id);
        $economic->update($request->all());
        $beneficiary_id = $economic->beneficiary_id;
        return redirect()->route('beneficiaries.show', $beneficiary_id);
    }



    public function editHousing($id){
        $housing = Beneficiary::findOrFail($id)->housingCondition;
        return view('benf.editHousingCondition', compact('housing'));
    }

    public function updateHousing(Request $request,$id){
        $request->validate([
            'housing_type' => 'required|in:own,rented,other',
            'rent_amount' => 'required_if:housing_type,rented|string|max:255',
            'number_of_rooms' => 'integer|required',
            'people_per_room' => 'integer|required',
            'building_condition' => 'string|max:255',
            'building_type' => 'string|max:255',
            'building_space' => 'string|max:255',
            'furniture_condition' => 'string|max:255',
            'description' => 'string|max:500',
        ]);
        $housing = HousingCondition::findOrFail($id);
        $housing->update($request->all());
        $beneficiary_id = $housing->beneficiary_id;
        return redirect()->route('beneficiaries.show', $beneficiary_id);
    }
}
