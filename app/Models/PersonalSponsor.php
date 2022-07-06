<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalSponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'governorate',
        'city',
        'street',
        'address',
        'phone',
        'mobile',
        'nationality',
        'id_number',
        'id_type',
        'sponsor_id'
    ];

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }






}
