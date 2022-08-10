<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ledger_number',
        'sponsor_id',
    ];

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }

    public function beneficiaries(){
        return $this->hasMany(PaymentManagement::class,'payment_id','id');
    }
}
