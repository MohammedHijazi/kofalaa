<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'country','type'];

    public function personalSponsors()
    {
        return $this->hasOne(PersonalSponsor::class);
    }

    public function institutionSponsors()
    {
        return $this->hasOne(InstitutionSponsor::class);
    }
}
