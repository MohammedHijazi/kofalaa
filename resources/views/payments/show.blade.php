@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/payments.index.style.css')}}">
@endsection

@section('content')
    <div class="card ma" >
        <div class="card-header">
            <div class="row">
                <h5>بيانات الدفعة</h5>
            </div>
        </div>
        <div class="card-body">
            <fieldset>
                <!-- make first row -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">رقم الدفعة</label>
                        <input type="text" class="form-control" id="" disabled value="{{$payment->id}}">
                    </div>
                    <!--Date disabled input-->
                    <div class="form-group col-md-6">
                        <label for="">التاريخ</label>
                        <input type="text" class="form-control" id="" disabled value="{{$payment->created_at->format('d/m/Y')}}">
                    </div>
                </div>
                <!-- make second row -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">الرقم الدفتري</label>
                        <input type="text" class="form-control" id="led-number" value="{{$payment->ledger_number}}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">الكفيل</label>
                        <!--select from dropdown list-->
                            <select name="sponsor-id" id="sponsor-id" class="form-control sid" disabled>
                            <option disabled selected >الكفيل</option>
                            @foreach($sponsors as $sponsor)
                                <option value="{{$sponsor->id}}" @if($sponsor->id == $payment->sponsor_id) selected @endif>{{$sponsor->name}}</option>
                            @endforeach
                            </select>
                    </div>
                </div>
            </fieldset>
        </div>

    </div>
    <div class="card ma" >
        <div class="card-header">
            <div class="row">
                <h5>المستفيدون</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row" style="margin-top: 20px; margin-right: 200px">
                <div class="form-group col-md-1" style="margin-left: 20px">
                    <label for="">المستفيد</label>
                </div>
                <div class="form-group col-md-6">
                    <input id="search-field" type="text" class="form-control typehead" placeholder="بحث عن مستفيد">
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary row" id="add-payment" href="#" role="button">اضافة</a>
                </div>
            </div>
            <form action="{{route('payments.update',$payment->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="ledger_number" id="ledger_number" value="{{$payment->ledger_number}}">
                <input type="hidden" name="sponsor_id" id="sp_id" value="{{$payment->sponsor_id}}">
                <table id="requests" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الرقم</th>
                        <th>الاسم</th>
                        <th>المبلغ</th>
                        <th>العملة</th>
                        <th>عمليات</th>
                    </tr>
                    </thead>
                    <tbody id="payments-table">
                    @foreach($payment->beneficiaries as $beneficiary)
                    <tr>
                        <!--make input fields -->
                        <td class="col-1" id="count">{{$loop->iteration}} <input type="hidden" name="bpids[]" value="{{$beneficiary->id}}"></td>
                        <td
                            class="col-1"><input class="form-control" type="text" value="{{$beneficiary->member->id}}"disabled>
                            <input name="beneficiaries_ids[]" class="form-control" type="hidden" value="{{$beneficiary->member->id}}">
                        </td>
                        <td class="col-3"><input name="beneficiaries_names[]" class="form-control" type="text" value="{{$beneficiary->member->name}}" disabled></td>
                        <td class="col-2"><input name="amounts[]" class='form-control' value="{{$beneficiary->amount}}" type="text" ></td>
                        <td class="col-2">
                            <select class="form-control" name="currencies[]">
                                <option disabled selected>العملة</option>
                                <option @if($beneficiary->currency == 'ILS' ) selected @endif value="ILS">شيكل</option>
                                <option @if($beneficiary->currency == 'USD' ) selected @endif value="USD">دولار</option>
                                <option @if($beneficiary->currency == 'EUR' ) selected @endif value="EUR">يورو</option>
                                <option @if($beneficiary->currency == 'GBP' ) selected @endif value="GBP">جنيه</option>
                                <option @if($beneficiary->currency == 'CAD' ) selected @endif value="CAD">دولار كندي</option>
                            </select>
                        </td>
                        <td class="col-1">
                            <a class="btn btn-danger remove-payment" href="{{route('ben.payment.destroy',$beneficiary->id)}}" role="button">حذف</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" style="margin-right: 370px">حفظ</button>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{asset('assets/main/js/editPayments.js')}}"></script>
@endsection
