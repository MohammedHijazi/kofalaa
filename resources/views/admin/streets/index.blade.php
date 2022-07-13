@extends('admin.base')


@section('content')
    <div class="card ma" style="width: 100%" dir="rtl">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة الأحياء
            <a class="btn btn-primary" href="{{route('streets.create')}}" role="button">اضافة حي</a>
        </div>
        <div class="card-body">
            <table id="requests" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <td>اسم المدينة</td>
                    <th>عمليات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($streets as $street)

                    <tr>
                        <td>{{$street->id}}</td>
                        <td>{{$street->name}}</td>
                        <td>{{$street->city->name}}</td>

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

