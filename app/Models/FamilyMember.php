<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $table = 'family_members';

    protected $fillable =[
        'beneficiary_id',
        'name',
        'id_number',
        'birth_date',
        'relation',
        'gender',
        'social_status',
        'educational_qualification',
        'grade',
        'education_level',
        'skills',
        'job',
        'health_status',
        'sickness_type',
        'disability_type',
        'beneficiary_type',
    ];

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }


}