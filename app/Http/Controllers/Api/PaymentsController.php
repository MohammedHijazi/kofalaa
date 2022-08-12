<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $request = $request->all();
        //beneficiary_id
        $bid = $request['beneficiaryId'];
        //sponsor_id
        $sid = $request['sponsorId'];
        //payment_ID
        $pid = $request['payment_no'];
        $ledger_no= $request['led_no'];
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];


        $payments = new Payment();

        if($bid != null){
            $payments = $payments->whereHas('beneficiaries', function ($q) use ($bid) {
                $q->where('beneficiary_id', $bid);
            });
        }elseif ($sid != null) {
            $payments = $payments->where('sponsor_id', $sid);
        }elseif ($pid) {
            $payments = $payments->where('id', $pid);
        }elseif ($ledger_no != null) {
            $payments = $payments->where('ledger_no', $ledger_no);
        }elseif ($start_date != null) {
            $payments = $payments->where('created_at', '>=', $start_date);
        }elseif ($end_date != null) {
            $payments = $payments->where('created_at', '<=', $end_date);
        }


        $payments=$payments->get();

        return Response::json([
            'status' => 'success',
            'data' => $payments,
            'request' => $request
        ], 200);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
