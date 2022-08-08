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
                        <input type="text" class="form-control" id="">
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
                    <a class="btn btn-primary row" id="add-beneficiary" href="#" role="button">اضافة</a>
                </div>
            </div>

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
                <tbody>
                    <tr>
                        <!--make input fields -->
                        <td class="col-1">#</td>
                        <td class="col-1">#</td>
                        <td class="col-3">#</td>
                        <td class="col-2"><input class='form-control' type="text" ></td>
                        <td class="col-2">
                            <select class="form-control">
                                <option disabled selected>العملة</option>
                                <option value="ILS">شيكل</option>
                                <option value="USD">دولار</option>
                            </select>
                        </td>
                        <td class="col-1">
                            <a class="btn btn-danger" href="#" role="button">حذف</a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            let sponsorId = $('#sponsor-id option:selected').val();
            let beneficiaryId;
            let path = "{{route('sponsors.beneficiaries', ':sponsorId')}}";
            $('.sid').change(function () {
                sponsorId = $('#sponsor-id option:selected').val();
                path = "http://127.0.0.1:8000/api/search/"+sponsorId+"/beneficiaries";
            });

            $('#search-field').typeahead({
                source: function (query, process) {
                    return $.get(path, { query: query }, function (data) {
                        return process(data);
                    });
                },
                displayText: function (item) {
                    return item.id+"-"+item.name;
                },
                afterSelect: function (item) {
                    beneficiaryId = item.id;
                    console.log(beneficiaryId);
                },
                //show hints
                hint: true,
                //show suggestions
                minLength: 0,
                //show all results on focus
                items: 'all',
                autoFocus: true,

            });
        });
    </script>
@endsection
