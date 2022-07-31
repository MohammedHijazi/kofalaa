<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table = 'guardians';

    protected $fillable = [
        'beneficiary_id',
        'type',
        'full_name',
        'id_number',
        'birth_date',
        'relation',
        'mobile_number',
        'guardiation_data',
        'issue_place',
        'governorate',
        'city',
        'street',
        'address',
    ];

    public function beneficiary(){
        return $this->belongsTo(Beneficiary::class);
    }
}
