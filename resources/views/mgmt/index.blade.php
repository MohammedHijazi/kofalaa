@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">

@endsection

@section('content')
    <div class="card ma">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة الكفلاء

            <a class="btn btn-primary" href="{{route('sponsors.create')}}" role="button">اضافة كفيل</a>

        </div>
        <div class="card-body">
            <table id="requests" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>النوع</th>
                    <th>الدولة</th>
                    <th>العنوان</th>
                    <th>رقم الهاتف</th>
                    <th>عدد المستفيدين</th>
                    <th>عمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($sponsors as $sponsor)

                    <tr>
                        <td>{{$sponsor->id}}</td>
                        <td>{{$sponsor->name}}</td>

                        @if($sponsor->type == 'personal')
                            <td>شخص</td>
                        @else
                            <td>مؤسسة</td>
                        @endif

                        <td>{{$sponsor->country}}</td>

                        @if($sponsor->type == 'personal')
                            <td>{{$sponsor->personalSponsor->address}}</td>
                        @else
                            <td>{{$sponsor->institutionSponsor->address}}</td>
                        @endif

                        @if($sponsor->type == 'personal')
                            <td>{{$sponsor->personalSponsor->phone}}</td>
                        @else
                            <td>{{$sponsor->institutionSponsor->primary_phone}}</td>
                        @endif

                        <td>#</td>
                        <td>
                            <a href="{{route('sponsors.profile',$sponsor->id)}}" class="btn btn-primary">عرض</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
