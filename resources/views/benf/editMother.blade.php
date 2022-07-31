@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <form action="{{route('parents.update',$parent->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel"> تعديل أم</h5>
                </div>

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="type" type="hidden" value="mother">

                    <div class="col-md-3">
                        <label class="form-label required ">الاسم رباعي</label>
                        <input name="full_name" id="name" type="text" class="form-control" value="{{$parent->full_name}}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="id_number" id="id_number" type="number" class="form-control" value="{{$parent->id_number}}">
                    </div>

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الميلاد</label>
                        <input name="birth_date" id="birthday" type="date" class="form-control" value="{{$parent->birth_date}}">
                    </div>

                    <br>


                    <div class="col-md-3">
                        <label class="form-label required ">عمل الأم</label>
                        <input name="mother_job_details"  type="text" class="form-control" value="{{$parent->mother_job_details}}">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">اجمالي دخل الأم</label>
                        <input name="mother_income_amount"  type="text" class="form-control" value="{{$parent->mother_income_amount}}">
                    </div>


                    <!-- select gender -->
                    <div class="form-group col-md-3"  >
                        <label for="">هل تعيش الأم مع الأبناء</label>
                        <select class="form-control"  name="live_with_children">
                            <option selected disabled value="">اختر...</option>
                            <option @if($parent->live_with_children == 'yes') selected @endif value="yes">نعم</option>
                            <option @if($parent->live_with_children == 'no') selected @endif value="no"> لا</option>
                        </select>
                    </div>


                    <div class="form-group col-md-3"  >
                        <label for="gender">الحالة الاجتماعية</label>
                        <select class="form-control" id="social_status" name="social_status">
                            <option selected disabled value="">اختر...</option>
                            <option @if($parent->social_status == 'widow') selected @endif value="widow">أرملة</option>
                            <option @if($parent->social_status == 'married') selected @endif value="married"> متزوجة</option>
                        </select>
                    </div>


                    <br>

                    <div class="form-group col-md-3"  >
                        <label >المحافظة</label>
                        <select class="form-control" name="governorate" id="gov">
                            <option selected disabled value="">اختر...</option>
                            @foreach($gevernorates as $gevernorate)
                                <option @if($parent->governorate == $gevernorate->name ) selected @endif value="{{$gevernorate->name}}">{{$gevernorate->name}}</option>
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

                    <div class="col-md-3">
                        <label class="form-label required ">تفاصيل العنوان</label>
                        <input value="{{$parent->address}}" name="address"  type="text" class="form-control">
                    </div>


                    <br>

                    <div class="form-group col-md-3"  >
                        <label for="gender">المستوى التعليمي</label>
                        <select class="form-control"  name="education_level">
                            <option selected disabled value="">اختر...</option>
                            <option @if($parent->education_level == 'ممتاز') selected @endif value="ممتاز">ممتاز</option>
                            <option @if($parent->education_level == 'متوسط') selected @endif value="متوسط">متوسط</option>
                            <option @if($parent->education_level == 'ضعيف') selected @endif value="ضعيف">ضعيف</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">المهارات</label>
                        <input name="skills"  type="text" class="form-control" value="{{$parent->skills}}">
                    </div>


                    <br>

                    <div class="form-group col-md-3"  >
                        <label for="education_level">الحالة الصحية</label>
                        <select class="form-control" id="health_status" name="health_status">
                            <option selected disabled value="">اختر...</option>
                            <option @if($parent->health_status == 'سليم') selected @endif value="سليم">سليم</option>
                            <option @if($parent->health_status == 'مريض') selected @endif value="مريض"> مريض</option>
                            <option @if($parent->health_status == 'اعاقة') selected @endif value="اعاقة">اعاقة</option>
                        </select>
                    </div>

                    <br>

                    <div class="col-md-3">
                        <label class="form-label required ">نوع المرض</label>
                        <input name="sickness_type" id="sickness_type" type="text" class="form-control" value="{{$parent->sickness_type}}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">نوع الاعاقة</label>
                        <input name="disability_type" id="disability_type" type="text" class="form-control" value="{{$parent->disability_type}}">
                    </div>




                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
@endsection

@section('scripts')
    <script>
        $('#gov').change(function () {
            $('#cit').children().remove()
            $('#cit').append(new Option('اختر...', 'اختر...'))
            $('#str').children().remove()
            $('#str').append(new Option('اختر...', 'اختر...'))

            var gov = $('#gov').val();
            $.ajax({
                url: '{{route('data')}}',
                type: 'get',
                success: function (data) {
                    $.each(data,function (key,item) {
                        if (item.name === gov){
                            $.each(item.cities,function (key,item) {
                                $('#cit').append('<option value="'+item.name+'">'+item.name+'</option>');
                            });
                        }
                    });

                }
            });
        });
        $('#cit').change(function () {
            $('#str').children().remove()
            $('#str').append(new Option('اختر...', 'اختر...'))

            var cit = $('#cit').val();
            $.ajax({
                url: '{{route('data')}}',
                type: 'get',
                success: function (data) {
                    $.each(data,function (key,item) {
                        $.each(item.cities,function (key,item) {
                            if (item.name === cit){
                                $.each(item.streets,function (key,item) {
                                    $('#str').append('<option value="'+item.name+'">'+item.name+'</option>');
                                });
                            }

                        });
                    })
                }
            });
        });
    </script>
@endsection
