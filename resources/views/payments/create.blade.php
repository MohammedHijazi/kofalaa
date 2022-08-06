@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <div class="card ma" >
        <fieldset>
            <legend>بيانات الدفعة</legend>
            <!-- make first row -->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">رقم الدفعة</label>
                    <input type="text" class="form-control" id="" disabled>
                </div>
                <!--Date disabled input-->
                <div class="form-group col-md-6">
                    <label for="">التاريخ</label>
                    <input type="date" class="form-control" id="" disabled>
                </div>
            </div>
            <!-- make second row -->
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">الرقم الدفتري</label>
                    <input type="text" class="form-control" id="">
                </div>
                <div class="form-group col-md-6">
                    <label for="">الكفيل</label>
                    <input type="text" class="form-control" id="">
                </div>
            </div>
        </fieldset>
    </div>


@endsection
