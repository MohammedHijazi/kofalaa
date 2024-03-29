@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <div class="card ma">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة الكفلاء

            <a class="btn btn-primary" href="{{route('search.index')}}" role="button">بحث عن كفيل</a>
            <a class="btn btn-primary" href="{{route('sponsors.late')}}" role="button">عرض المتأخرون</a>
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

                        <td>{{$sponsor->beneficiaries->count()}}</td>
                        <td style="display: flex; flex-direction: row; justify-content: space-between">
                            <a href="{{route('sponsors.beneficiaries',$sponsor->id)}}" class="btn btn-primary" style="margin-left: 5px">ادارة المستفيدين</a>
                            <a href="{{route('sponsors.profile',$sponsor->id)}}" class="btn btn-primary" style="margin-left: 5px">عرض</a>
                            <a href="{{route('sponsors.edit',$sponsor->id)}}" class="btn btn-primary" style="margin-left: 5px">تعديل</a>
                            <form action="{{route('sponsors.destroy',$sponsor->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="margin-left: 5px">حذف</button>
                            </form>
                            <!--button for sending sms to the sponsor-->
                            <form action="{{route('sponsors.sms',$sponsor->id)}}" method="post">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-dark" style="margin-left: 5px">ارسال SMS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
