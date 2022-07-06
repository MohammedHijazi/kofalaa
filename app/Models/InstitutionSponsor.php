<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionSponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact_person',
        'primary_phone',
        'secondary_phone',
        'email',
        'country',
        'password',
        'sponsor_id'
    ];

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }



}
