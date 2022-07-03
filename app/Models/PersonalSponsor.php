<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalSponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'governorate',
        'address',
        'city',
        'street',
        'address',
        'phone',
        'mobile',
        'email',
        'nationality',
        'country_of_residence',
        'id_number',
        'id_type',
        'password'

    ];
}
