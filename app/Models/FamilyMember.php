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

    //Many to Many Relationship
    public function sponsors(){
        return $this->belongsToMany(
            Sponsor::class,
            'beneficiary_sponsor',
            'beneficiary_id',
            'sponsor_id',
            'id',
            'id'
        )->withPivot('sponsorship_type','created_at','updated_at');
    }



    //retrieve data from ceated_at column in pivot table
    public function getCreatedAtAttribute($value){
        return date('Y-m-d',strtotime($value));
    }

    public function payments(){
        return $this->hasMany(PaymentManagement::class,'beneficiary_id','id');
    }





}
