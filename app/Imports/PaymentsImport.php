<?php

namespace App\Imports;

use App\Models\Payment;
use App\Models\PaymentManagement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PaymentsImport implements ToCollection, WithHeadingRow
{
    protected $payments;

    public function __construct()
    {
        $this->payments = PaymentManagement::get()->pluck('ledger_number','id')->toArray();
    }

    protected function createPayment($ledger_number,$sponsor_id){
        $payment = Payment::create([
            'ledger_number'=>$ledger_number,
            'sponsor_id'=>$sponsor_id
        ]);
        return $payment->ledger_number;
    }

    protected function getPaymentId($ledger_number){
        $payment = Payment::where('ledger_number',$ledger_number)->first();
        return $payment->id;
    }

    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            $ledger_number=$row['الرقم الدفتري'];
            $sponsor_id=$row['رقم الكفيل'];
            $beneficiary_id=$row['رقم المستفيد'];
            $amount=$row['المبلغ'];
            $currency=$row['العملة'];
        }

    }

}
