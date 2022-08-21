<?php

namespace App\Imports;

use App\Models\Payment;
use App\Models\PaymentManagement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PaymentsImport implements ToCollection, WithHeadingRow, WithValidation
{
    protected $ledgers;
    protected $sponsors;

    public function __construct()
    {
        $this->ledgers = Payment::pluck('ledger_number')->toArray();
        $this->sponsors = Payment::pluck('sponsor_id')->toArray();
    }

    protected function createPayment($ledger_number,$sponsor_id){
        $payment = Payment::create([
            'ledger_number'=>$ledger_number,
            'sponsor_id'=>$sponsor_id
        ]);
        return $payment;
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
            $ledger_number=$row['ledger_number'];
            $sponsor_id=$row['sponsor_id'];
            $beneficiary_id=$row['beneficiary_id'];
            $amount=$row['amount'];
            $currency=$row['currency'];

            //check if payment already exists in the system or not if not create a new payment
            if(!in_array($ledger_number,$this->ledgers)){
                $payment=$this->createPayment($ledger_number,$sponsor_id);
                $payment_id=$payment->id;
                $new_ledger_number=$payment->ledger_number;
                PaymentManagement::create([
                    'payment_id'=>$payment_id,
                    'beneficiary_id'=>$beneficiary_id,
                    'amount'=>$amount,
                    'currency'=>$currency
                ]);
                $this->ledgers[]=$new_ledger_number;

            }else{
                $payment_id=$this->getPaymentId($ledger_number);
                //check if beneficiary is already in the payment
                $payment_management=PaymentManagement::where('payment_id',$payment_id)->where('beneficiary_id',$beneficiary_id)->first();
                if(!$payment_management){
                    PaymentManagement::create([
                        'payment_id'=>$payment_id,
                        'beneficiary_id'=>$beneficiary_id,
                        'amount'=>$amount,
                        'currency'=>$currency
                    ]);
                }
            }
        }

    }

    public function rules(): array
    {
        return [
            'ledger_number'=>'required',
            'sponsor_id'=>'required|exists:sponsors,id',
            'beneficiary_id'=>'required|exists:family_members,id',
            'amount'=>'required|numeric|min:0',
            'currency'=>'required|in:ILS,USD,EUR,GBP,CAD'
        ];
    }

}
