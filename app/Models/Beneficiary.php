<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable =[
        'type'
    ];

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function guardians()
    {
        return $this->hasMany(Guardian::class);
    }

    public function birthParents()
    {
        return $this->hasMany(BirthParent::class);
    }

    public function housingCondition(){
        return $this->hasOne(HousingCondition::class);
    }

    public function economicSituation(){
        return $this->hasOne(EconomicSituation::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }






}
