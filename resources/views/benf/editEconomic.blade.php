@extends('layouts.app')


@section('content')
    <form action="{{route('beneficiaries.updateEconomical',$economic->id)}}" method="post">
        @csrf
        @method('put')
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel">تعديل وصف للحالة الاقتصادية</h5>
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

                    <div class="col-md-3">
                        <label class="form-label required ">معدل دخل الأسرة</label>
                        <input name="average_income" id="name" type="text" class="form-control" value="{{$economic->average_income}}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">مصدر الدخل</label>
                        <input name="source_of_income" id="name" type="text" class="form-control" value="{{$economic->source_of_income}}">
                    </div>

                    <div class="form-group col-md-3"  >
                        <label for="gender">هل تتلقى الأسرة مساعدات؟</label>
                        <select class="form-control" name="receive_help">
                            <option selected disabled value="">اختر...</option>
                            <option @if($economic->receive_help == 'yes') selected @endif value="yes">نعم</option>
                            <option @if($economic->receive_help == 'no') selected @endif value="no"> لا</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">قيمة المساعدات شهريا</label>
                        <input name="help_amount" id="name" type="text" class="form-control" value="{{$economic->help_amount}}">
                    </div>

                    <br>


                    <div class="col-md-3">
                        <label class="form-label required ">مصدر كفالات الأيتام</label>
                        <input name="help_source"  type="text" class="form-control" value="{{$economic->help_source}}">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required ">الأملاك</label>
                        <input name="assets"  type="text" class="form-control" value="{{$economic->assets}}">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">قيمة العائد من الأملاك</label>
                        <input name="assets_profits"  type="text" class="form-control" value="{{$economic->assets_profits}}">
                    </div>
                    <br>

                    <div class="col-md-3">
                        <label class="form-label required ">قيمة الدخل الاجمالي</label>
                        <input name="total_income"  type="text" class="form-control" value="{{$economic->total_income}}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required ">وصف عام للحالة الاقتصادية</label>
                        <input name="description"  type="text" class="form-control" value="{{$economic->description}}">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
@endsection
