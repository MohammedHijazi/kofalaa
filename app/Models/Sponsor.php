<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'country','type'];

    public function personalSponsor()
    {
        return $this->hasOne(PersonalSponsor::class, 'sponsor_id', 'id');
    }

    public function institutionSponsor()
    {
        return $this->hasOne(InstitutionSponsor::class, 'sponsor_id', 'id');
    }

    //Many to Many Relationship
    public function beneficiaries(){
        return $this->belongsToMany(
          FamilyMember::class,
            'beneficiary_sponsor',
            'sponsor_id',
            'beneficiary_id',
            'id',
            'id'
        )->withPivot('sponsorship_type','created_at','updated_at');
    }
}
