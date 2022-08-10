@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <div class="card ma">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة الكفلاء

            <a class="btn btn-primary" href="#" role="button">بحث عن دفعة</a>
            <a class="btn btn-primary" href="{{route('payments.create')}}" role="button">اضافة دفعة</a>

        </div>
        <div class="card-body">
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
                                <a class="btn btn-primary row" href="#" role="button" style="margin-left: 20px;">ادارة</a>
                                <form action="#" method="post">
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
