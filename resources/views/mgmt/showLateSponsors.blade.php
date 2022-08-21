@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <div class="card ma" style="width: 70%">
        <div class="card-header row">
            <h5 style="margin-left: 760px;">ادارة الكفلاء المتأخرين</h5>
        </div>
        <div class="card-body">
            <div class="search-card">
                <fieldset >
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
                    <th class="col-2">اسم الكفيل</th>
                    <th class="col-2">اسم المستفيد</th>
                    <th class="col-2">نوع الكفالة</th>
                    <th class="col-1" id="ops">عمليات</th>
                </tr>
                </thead>
                <tbody style="text-align: center">
                @foreach($kl as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->sponsor_name}}</td>
                        <td>{{$k->beneficiary_name}}</td>
                        @if($k->sponsorship_type == 'yearly')
                            <td>سنوي</td>
                        @else
                            <td>شهري</td>
                        @endif
                        <td>
                            <!--check box for each row -->
                            <input type="checkbox" class="checkbox" id="" value="">
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection


