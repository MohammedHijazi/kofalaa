<div class="modal fade" id="addFather" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="{{route('parents.store')}}" method="post">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel"> اضافة أب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="beneficiary_id"  type="hidden" value="{{$beneficiary->id}}" class="form-control">
                    <input name="type" type="hidden" value="father">

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

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الوفاة</label>
                        <input name="death_date"  type="date" class="form-control">
                    </div>

                    <br>


                    <div class="col-md-6">
                        <label class="form-label required ">عمل الأب قبل الوفاة</label>
                        <input name="father_job_before_death"  type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">سبب الوفاة</label>
                        <input name="death_cause"  type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">مكان الوفاة</label>
                        <input name="death_place"  type="text" class="form-control">
                    </div>


                    <br>


                    <div class="col-md-6">
                        <label class="form-label required ">معلومات أخرى</label>
                        <textarea name="details" type=text class="form-control"> </textarea>
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
</div>
