@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
        <form action="{{route('beneficiaries.family_members.update',$member->id)}}" method="post" id="addMember_form">
            @csrf
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEquipmentLabel">تعديل فرد</h5>
                    </div>

                    <div class="modal-body row" >

                        <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                        <div class="col-md-3">
                            <label class="form-label required ">الاسم رباعي</label>
                            <input name="name" id="name" type="text" class="form-control" value="{{$member->name}}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required">رقم الهوية</label>
                            <input name="id_number" id="id_number" type="number" class="form-control" value="{{$member->id_number}}">
                        </div>

                        <!-- Birthday bicker -->
                        <div class="col-md-3">
                            <label class="form-label required">تاريخ الميلاد</label>
                            <input name="birth_date" id="birthday" type="date" class="form-control" value="{{$member->birth_date}}">
                        </div>

                        <!-- select gender -->
                        <div class="form-group col-md-3"  >
                            <label for="gender">الجنس</label>
                            <select class="form-control" id="gender" name="gender">
                                <option @if($member->gender == 'male') selected @endif value="male">ذكر</option>
                                <option @if($member->gender == 'female') selected @endif value="female"> أنثى</option>
                            </select>
                        </div>

                        <br>

                        <div class="form-group col-md-3"  >
                            <label for="gender">الحالة الاجتماعية</label>
                            <select class="form-control" id="social_status" name="social_status">
                                <option selected disabled value="">اختر...</option>
                                <option @if($member->social_status == 'single') selected @endif value="single">أعزب</option>
                                <option @if($member->social_status == 'married') selected @endif value="married"> متزوج</option>
                                <option @if($member->social_status == 'other') selected @endif value="other"> أخرى</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required ">المؤهل التعليمي</label>
                            <input name="educational_qualification" id="educational_qualification" type="text" class="form-control" value="{{$member->educational_qualification}}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required ">الصف</label>
                            <input name="grade" id="grade" type="text" class="form-control" value="{{$member->grade}}">
                        </div>

                        <div class="form-group col-md-3"  >
                            <label for="education_level">تقييم المستوى التعليمي</label>
                            <select class="form-control" id="education_level" name="education_level">
                                <option selected disabled value="">اختر...</option>
                                <option @if($member->education_level == 'ممتاز') selected @endif value="ممتاز">ممتاز</option>
                                <option @if($member->education_level == 'متوسط') selected @endif value="متوسط"> متوسط</option>
                                <option @if($member->education_level == 'ضعيف') selected @endif value="ضعيف">ضعيف</option>
                            </select>
                        </div>

                        <br>

                        <div class="col-md-6">
                            <label class="form-label required ">مهارات</label>
                            <input name="skills" id="skills" type="text" class="form-control" value="{{$member->skills}}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required ">المهنة</label>
                            <input name="job" id="job" type="text" class="form-control" value="{{$member->job}}">
                        </div>


                        <div class="form-group col-md-3"  >
                            <label for="education_level">الحالة الصحية</label>
                            <select class="form-control" id="health_status" name="health_status">
                                <option selected disabled value="">اختر...</option>
                                <option @if($member->health_status == 'سليم') selected @endif value="سليم">سليم</option>
                                <option @if($member->health_status == 'مريض') selected @endif value="مريض"> مريض</option>
                                <option @if($member->health_status == 'اعاقة') selected @endif value="اعاقة">اعاقة</option>
                            </select>
                        </div>

                        <br>

                        <div class="col-md-3">
                            <label class="form-label required ">نوع المرض</label>
                            <input name="sickness_type" id="sickness_type" type="text" class="form-control" value="{{$member->sickness_type}}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required ">نوع الاعاقة</label>
                            <input name="disability_type" id="disability_type" type="text" class="form-control" value="{{$member->disability_type}}">
                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                    </div>

                </div>
            </div>

        </form>
@endsection
