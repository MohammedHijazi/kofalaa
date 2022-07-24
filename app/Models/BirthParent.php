<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthParent extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable =[
        'beneficiary_id',
        'type',
        'full_name',
        'id_number',
        'birth_date',
        'father_job_before_death',
        'death_cause',
        'death_place',
        'details',
        'mother_health_status',
        'mother_job_details',
        'mother_income_amount',
        'live_with_children',
        'social_status',
        'governorate',
        'city',
        'street',
        'address',
        'education_level',
        'skills',
        'health_status',
        'sickness_type',
        'disability_type',
    ];

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }


}
