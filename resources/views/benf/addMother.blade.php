<div class="modal fade" id="addMother" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="{{route('parents.store')}}" method="post">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel"> اضافة أم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="beneficiary_id"  type="hidden" value="{{$beneficiary->id}}" class="form-control">
                    <input name="type" type="hidden" value="mother">

                    <div class="col-md-3">
                        <label class="form-label required ">الاسم رباعي</label>
                        <input name="full_name" id="name" type="text" class="form-control">
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



                    <br>


                    <div class="col-md-3">
                        <label class="form-label required ">عمل الأم</label>
                        <input name="mother_job_details"  type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">اجمالي دخل الأم</label>
                        <input name="mother_income_amount"  type="text" class="form-control">
                    </div>


                    <!-- select gender -->
                    <div class="form-group col-md-3"  >
                        <label for="">هل تعيش الأم مع الأبناء</label>
                        <select class="form-control"  name="live_with_children">
                            <option selected disabled value="">اختر...</option>
                            <option value="yes">نعم</option>
                            <option value="no"> لا</option>
                        </select>
                    </div>


                    <div class="form-group col-md-3"  >
                        <label for="gender">الحالة الاجتماعية</label>
                        <select class="form-control" id="social_status" name="social_status">
                            <option selected disabled value="">اختر...</option>
                            <option value="widow">أرملة</option>
                            <option value="married"> متزوجة</option>
                        </select>
                    </div>


                    <br>

                    <div class="form-group col-md-3"  >
                        <label >المحافظة</label>
                        <select class="form-control" name="governorate" id="gov">
                            <option selected disabled value="">اختر...</option>
                            @foreach($gevernorates as $gevernorate)
                                <option value="{{$gevernorate->name}}">{{$gevernorate->name}}</option>
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
                        <input name="address"  type="text" class="form-control">
                    </div>


                    <br>

                    <div class="form-group col-md-3"  >
                        <label for="gender">المستوى التعليمي</label>
                        <select class="form-control"  name="education_level">
                            <option selected disabled value="">اختر...</option>
                            <option value="ممتاز">ممتاز</option>
                            <option value="متوسط">متوسط</option>
                            <option value="ضعيف">ضعيف</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">المهارات</label>
                        <input name="skills"  type="text" class="form-control">
                    </div>


                    <br>

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
