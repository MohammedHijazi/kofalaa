@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/payments.index.style.css')}}">
@endsection

@section('content')
    <div class="card ma" >
        <div class="card-header">
            <div class="row">
                <h5>بيانات الدفعة</h5>
            </div>
        </div>
        <div class="card-body">
            <fieldset>
                <!-- make first row -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">رقم الدفعة</label>
                        <input type="text" class="form-control" id="" disabled>
                    </div>
                    <!--Date disabled input-->
                    <div class="form-group col-md-6">
                        <label for="">التاريخ</label>
                        <input type="text" class="form-control" id="" disabled value="{{date("m/d/Y")}}">
                    </div>
                </div>
                <!-- make second row -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">الرقم الدفتري</label>
                        <input type="text" class="form-control" id="led-number">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">الكفيل</label>
                        <!--select from dropdown list-->
                        <select name="sponsor-id" id="sponsor-id" class="form-control sid">
                            <option disabled selected >الكفيل</option>
                            @foreach($sponsors as $sponsor)
                                <option value="{{$sponsor->id}}">{{$sponsor->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </fieldset>
        </div>

    </div>
    <div class="card ma" >
        <div class="card-header">
            <div class="row">
                <h5>المستفيدون</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row" style="margin-top: 20px; margin-right: 200px">
                <div class="form-group col-md-1" style="margin-left: 20px">
                    <label for="">المستفيد</label>
                </div>
                <div class="form-group col-md-6">
                    <input id="search-field" type="text" class="form-control typehead" placeholder="بحث عن مستفيد">
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary row" id="add-payment" href="#" role="button">اضافة</a>
                </div>
            </div>
            <form action="{{route('payments.store')}}" method="post">
                @csrf
                <input type="hidden" name="ledger_number" id="ledger_number">
                <input type="hidden" name="sponsor_id" id="sp_id">
                <table id="requests" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الرقم</th>
                        <th>الاسم</th>
                        <th>المبلغ</th>
                        <th>العملة</th>
                        <th>عمليات</th>
                    </tr>
                    </thead>
                    <tbody id="payments-table">
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" style="margin-right: 370px">حفظ</button>
            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{asset('assets/main/js/createPayments.js')}}"></script>
@endsection
