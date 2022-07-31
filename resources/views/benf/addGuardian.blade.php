<div class="modal fade" id="addGuardian" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="#" method="post">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel"> اضافة وصي</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="beneficiary_id"  type="hidden" value="{{$beneficiary->id}}" class="form-control">
                    <input name="type" type="hidden" value="وصي">

                    <div class="col-md-3">
                        <label class="form-label required ">الاسم رباعي</label>
                        <input name="full_name" id="name" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required">رقم الهوية</label>
                        <input name="id_number"  type="number" class="form-control">
                    </div>

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الميلاد</label>
                        <input name="birth_date"  type="date" class="form-control">
                    </div>

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">صلة القرابة</label>
                        <input name="relation"  type="text" class="form-control">
                    </div>

                    <br>


                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الوصاية</label>
                        <input name="guardiation_data"  type="date" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required ">الجهة المانحة للوصاية</label>
                        <input name="issue_place"  type="text" class="form-control">
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

                    <div class="col-md-6">
                        <label class="form-label required ">تفاصيل العنوان</label>
                        <input name="address"  type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
</div>
