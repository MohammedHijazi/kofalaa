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
                    <th>#</th>
                    <th>الرقم</th>
                    <th>الرقم الدفتري</th>
                    <th>الكفيل</th>
                    <th>التاريخ</th>
                    <th>المبلغ الاجمالي</th>
                    <th>العملة</th>
                    <th>عدد المستفيدين</th>
                    <th>عمليات</th>
                </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
@endsection
