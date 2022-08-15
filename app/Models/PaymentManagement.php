<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentManagement extends Model
{
    use HasFactory;

    protected $table = 'payments_benfs';

    protected $appends = [
        'ledger_number'
    ];

    protected $fillable = [
        'payment_id',
        'beneficiary_id',
        'amount',
        'currency',
    ];

    public function getLedgerNumberAttribute()
    {
        return $this->payment->ledger_number;
    }


    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id','id');
    }

    public function member(){
        return $this->belongsTo(FamilyMember::class,'beneficiary_id','id');
    }
}
