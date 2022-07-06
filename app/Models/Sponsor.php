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
}
