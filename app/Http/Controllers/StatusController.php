<?php

namespace App\Http\Controllers;

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
}
