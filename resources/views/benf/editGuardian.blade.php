@extends('layouts.app')


@section('content')
    <form action="{{route('guardians.update',$guardian->id)}}" method="post">
        @csrf
        @method('put')
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel"> تعديل {{$guardian->type}}  </h5>
                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="type" type="hidden" value="{{$guardian->type}}">

                    <div class="col-md-3">
                        <label class="form-label required ">الاسم رباعي</label>
                        <input name="full_name" id="name" type="text" class="form-control" value="{{$guardian->full_name}}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="id_number"  type="number" class="form-control" value="{{$guardian->id_number}}">
                    </div>

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الميلاد</label>
                        <input name="birth_date"  type="date" class="form-control" value="{{$guardian->birth_date}}">
                    </div>

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">صلة القرابة</label>
                        <input name="relation"  type="text" class="form-control" value="{{$guardian->relation}}">
                    </div>

                    <br>

                    @if($guardian->type == 'وصي')
                        <div class="col-md-3">
                            <label class="form-label required">تاريخ الوصاية</label>
                            <input name="guardiation_data"  type="date" class="form-control" value="{{$guardian->guardiation_data}}">
                        </div>
                    @else
                        <div class="col-md-3">
                            <label class="form-label required">رقم الجوال</label>
                            <input name="mobile_number"  type="text" class="form-control" value="{{$guardian->mobile_number}}">
                        </div>
                    @endif



                    <div class="col-md-6">
                        <label class="form-label required ">الجهة المانحة للوصاية</label>
                        <input name="issue_place"  type="text" class="form-control" value="{{$guardian->issue_place}}">
                    </div>


                    <br>

                    <div class="form-group col-md-3"  >
                        <label >المحافظة</label>
                        <select class="form-control" name="governorate" id="gov">
                            <option selected disabled value="">اختر...</option>
                            @foreach($governorates as $governorate)
                                <option @if($guardian->governorate == $governorate->name) selected @endif value="{{$governorate->name}}">{{$governorate->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3"  >
                        <label >المدينة</label>
                        <select class="form-control" name="city" id="cit">
                            <option selected disabled value="">اختر...</option>
                        </select>
                    </div>


                    <div class="form-group col-md-3"  >
                        <label >الحي</label>
                        <select class="form-control" name="street" id="str">
                            <option selected disabled value="">اختر...</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required ">تفاصيل العنوان</label>
                        <input name="address"  type="text" class="form-control" value="{{$guardian->address}}">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
@endsection
