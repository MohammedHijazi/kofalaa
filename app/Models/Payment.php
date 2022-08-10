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

    public function getTotalAmountAttribute(){
        $total_amount=0;
        foreach($this->beneficiaries as $beneficiary) {

            if ($beneficiary->currency == 'ILS') {
                $total_amount += $beneficiary->amount;
            } elseif ($beneficiary->currency == 'USD') {
                $total_amount += ($beneficiary->amount * 3.3);
            } elseif ($beneficiary->currency == 'EUR') {
                $total_amount += ($beneficiary->amount * 3.9);
            } elseif ($beneficiary->currency == 'GBP') {
                $total_amount += ($beneficiary->amount * 4.2);
            } elseif ($beneficiary->currency == 'CAD') {
                $total_amount += ($beneficiary->amount * 1.5);
            }
        }
        return $total_amount;
    }

    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }

    public function beneficiaries(){
        return $this->hasMany(PaymentManagement::class,'payment_id','id');
    }
}
