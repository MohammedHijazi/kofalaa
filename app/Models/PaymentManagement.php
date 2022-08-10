<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentManagement extends Model
{
    use HasFactory;

    protected $table = 'payments_benfs';

    protected $fillable = [
        'payment_id',
        'beneficiary_id',
        'beneficiary_name',
        'amount',
        'currency',
    ];

    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id','id');
    }
}
