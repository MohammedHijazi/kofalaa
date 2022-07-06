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
                        @if($sponsor->type == 'person')
                            <td>{{$sponsor->full_name}}</td>
                        @else
                            <td>{{$sponsor->name}}</td>
                        @endif

                        @if($sponsor->type == 'person')
                            <td>شخص</td>
                        @else
                            <td>مؤسسة</td>
                        @endif

                        @if($sponsor->type == 'person')
                            <td>{{$sponsor->country_of_residence}}</td>
                        @else
                            <td>{{$sponsor->country}}</td>
                        @endif

                        <td>{{$sponsor->address}}</td>

                        @if($sponsor->type == 'person')
                            <td>{{$sponsor->phone}}</td>
                        @else
                            <td>{{$sponsor->primary_phone}}</td>
                        @endif


                        <td></td>
                        <td>
                            <a href="#" class="btn btn-primary">ادارة</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
