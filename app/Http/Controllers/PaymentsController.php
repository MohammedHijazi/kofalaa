<?php

namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Throwable;


class PaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        return view('payments.index', compact('payments'));
    }

    //function to get beneficiaries names for their corresponding sponsor for autocomplete when searching
    public function fetchBeneficiaries($id){
        $result=Sponsor::find($id)->beneficiaries;
        return Response::json($result);
    }

    public function create()
    {
        $sponsors=Sponsor::all('id','name');
        return view('payments.create',['sponsors'=>$sponsors]);
    }

    public function store(Request $request){
//        dd($request->all());
        $request=$request->all();
        $ledger_number=$request['ledger_number'];
        $sponsor_id=$request['sponsor_id'];

        DB::beginTransaction();
        try {
            $payment = Payment::create([
                'ledger_number'=>$ledger_number,
                'sponsor_id'=>$sponsor_id
            ]);

            $payment_id = $payment->id;

            for($i=0 ; $i<count($request['beneficiaries_ids']) ; $i++){
                $beneficiary_id=$request['beneficiaries_ids'][$i];
                $amount=$request['amounts'][$i];
                $currency=$request['currencies'][$i];

                $payment->beneficiaries()->create([
                    'payment_id'=>$payment_id,
                    'beneficiary_id'=>$beneficiary_id,
                    'amount'=>$amount,
                    'currency'=>$currency
                ]);
            }

            DB::commit();

            return redirect()->route('payments.index')->with('success','Payment created successfully');

        }catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }


    }
}
