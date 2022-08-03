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

    public function getIdTypeAttribute($value){
        if ($value == 'id'){
            return 'هوية';
        }else{
            return 'جواز سفر';
        }
    }

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }






}
