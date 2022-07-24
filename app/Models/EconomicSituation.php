<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicSituation extends Model
{
    use HasFactory;

    protected $table = 'economic_situations';

    protected $fillable = [
        'beneficiary_id',
        'average_income',
        'source_of_income',
        'receive_help',
        'help_amount',
        'help_source',
        'assets',
        'assets_profits',
        'total_income',
        'description',
    ];

    public function beneficiary(){
        return $this->belongsToOne(Beneficiary::class);
    }


}
