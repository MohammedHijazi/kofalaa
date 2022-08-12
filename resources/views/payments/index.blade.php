@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/main/css/payments.index.style.css')}}">
@endsection

@section('content')
    <div class="card ma">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة الكفلاء

            <a class="btn btn-primary" id="search-button" role="button">بحث عن دفعة</a>
            <a class="btn btn-primary" href="{{route('payments.create')}}" role="button">اضافة دفعة</a>

        </div>
        <div class="card-body">
            <div class="search-card">
                <fieldset >
                    <!-- make first row -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">رقم الدفعة</label>
                            <input type="text" class="form-control" id="payment-no">
                        </div>
                        <!--Date  input-->
                        <div class="form-group col-md-6">
                            <label for="">الرقم الدفتري</label>
                            <input type="text" class="form-control" id="led-no">
                        </div>
                    </div>
                    <!-- make second row -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">الكفيل</label>
                            <!--select from dropdown list-->
                            <input id="sponsor-name" type="text" class="form-control s-typehead" placeholder="الكفيل">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">المستفيد</label>
                            <!--select from dropdown list-->
                            <input id="beneficiary-name" type="text" class="form-control b-typehead" placeholder="المستفيد">
                        </div>
                    </div>
                    <!-- make third row for date from to date to input -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">من</label>
                            <input type="date" class="form-control" id="start-date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">إلى</label>
                            <input type="date" class="form-control" id="end-date">
                        </div>
                    </div>
                    <!-- make fourth row for search button -->
                    <div class="row">
                        <div class="form-group col-md-6">
                            <button class="btn btn-primary" id="search-but" role="button">بحث</button>
                        </div>
                    </div>
                </fieldset>
            </div>


            <table id="requests" class="table table-bordered">
                <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-1">الرقم</th>
                    <th>الرقم الدفتري</th>
                    <th class="col-2">الكفيل</th>
                    <th class="col-1">التاريخ</th>
                    <th class="col-2">المبلغ الاجمالي</th>
                    <th>العملة</th>
                    <th>عدد المستفيدين</th>
                    <th style="width: 140px;">عمليات</th>
                </tr>
                </thead>
                <tbody style="text-align: center">
                @if($payments->count() > 0)
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->ledger_number}}</td>
                            <td>{{$payment->sponsor->name}}</td>
                            <td>{{$payment->created_at->format('d/m/Y')}}</td>
                            <td>{{$payment->total_amount}}</td>
                            <td>شيكل</td>
                            <td>{{$payment->beneficiaries->count()}}</td>
                            <td style="display: flex; flex-direction: row; justify-content: space-evenly">
                                <a class="btn btn-primary row" href="{{route('payments.edit',$payment->id)}}" role="button" style="margin-left: 20px;">ادارة</a>
                                <form action="{{route('payments.destroy',$payment->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger row">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{asset('assets/main/js/searchPayments.js')}}"></script>
@endsection
