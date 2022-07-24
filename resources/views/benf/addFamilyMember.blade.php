
<div class="modal fade" id="addMember" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="{{route('beneficiaries.add_family_member',$beneficiary->id)}}" method="post" id="addMember_form">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel">اضافة فرد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="beneficiary_id" id="farmer_id" type="hidden" value="{{$beneficiary->id}}" class="form-control">


                    <div class="col-md-3">
                        <label class="form-label required ">الاسم رباعي</label>
                        <input name="name" id="name" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="id_number" id="id_number" type="number" class="form-control">
                    </div>

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الميلاد</label>
                        <input name="birth_date" id="birthday" type="date" class="form-control">
                    </div>

                    <!-- select gender -->
                    <div class="form-group col-md-3"  >
                        <label for="gender">الجنس</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="male">ذكر</option>
                            <option value="female"> أنثى</option>
                        </select>
                    </div>

                    <br>

                    <div class="form-group col-md-3"  >
                        <label for="gender">الحالة الاجتماعية</label>
                        <select class="form-control" id="social_status" name="social_status">
                            <option selected disabled value="">اختر...</option>
                            <option value="single">أعزب</option>
                            <option value="married"> متزوج</option>
                            <option value="other"> أخرى</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">المؤهل التعليمي</label>
                        <input name="educational_qualification" id="educational_qualification" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">الصف</label>
                        <input name="grade" id="grade" type="text" class="form-control">
                    </div>

                    <div class="form-group col-md-3"  >
                        <label for="education_level">تقييم المستوى التعليمي</label>
                        <select class="form-control" id="education_level" name="education_level">
                            <option selected disabled value="">اختر...</option>
                            <option value="ممتاز">ممتاز</option>
                            <option value="متوسط"> متوسط</option>
                            <option value="ضعيف">ضعيف</option>
                        </select>
                    </div>

                    <br>

                    <div class="col-md-6">
                        <label class="form-label required ">مهارات</label>
                        <input name="skills" id="skills" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">المهنة</label>
                        <input name="job" id="job" type="text" class="form-control">
                    </div>


                    <div class="form-group col-md-3"  >
                        <label for="education_level">الحالة الصحية</label>
                        <select class="form-control" id="health_status" name="health_status">
                            <option selected disabled value="">اختر...</option>
                            <option value="سليم">سليم</option>
                            <option value="مريض"> مريض</option>
                            <option value="اعاقة">اعاقة</option>
                        </select>
                    </div>

                    <br>

                    <div class="col-md-3">
                        <label class="form-label required ">نوع المرض</label>
                        <input name="sickness_type" id="sickness_type" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">نوع الاعاقة</label>
                        <input name="disability_type" id="disability_type" type="text" class="form-control">
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
</div>
