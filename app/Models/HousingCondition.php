<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingCondition extends Model
{
    use HasFactory;

    protected $table = 'housing_conditions';

    protected $fillable = [
        'beneficiary_id',
        'housing_type',
        'rent_amount',
        'number_of_rooms',
        'people_per_room',
        'building_condition',
        'building_type',
        'building_space',
        'furniture_condition',
        'description',
        'social_status',
    ];

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }
}
