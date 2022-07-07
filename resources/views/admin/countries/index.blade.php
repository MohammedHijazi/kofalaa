@extends('admin.base')


@section('content')
    <div class="card ma" style="width: 100%" dir="rtl">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة الدول
            <a class="btn btn-primary" href="{{route('sponsors.create')}}" role="button">اضافة دولة</a>
        </div>
        <div class="card-body">
            <table id="requests" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>عمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)

                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{$country->name}}</td>

                        <td>
                            <a href="#" class="btn btn-primary">ادارة</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$countries->links()}}
        </div>
    </div>

@endsection

