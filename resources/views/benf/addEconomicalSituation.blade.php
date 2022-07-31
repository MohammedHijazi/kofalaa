<div class="modal fade" id="addEconomical" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="{{route('beneficiaries.economical.status.store')}}" method="post">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel">اضافة وصف للحالة الاقتصادية</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body row" >

                    <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                    <input name="beneficiary_id"  type="hidden" value="{{$beneficiary->id}}" class="form-control">

                    <div class="col-md-3">
                        <label class="form-label required ">معدل دخل الأسرة</label>
                        <input name="average_income" id="name" type="text" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">مصدر الدخل</label>
                        <input name="source_of_income" id="name" type="text" class="form-control">
                    </div>

                    <div class="form-group col-md-3"  >
                        <label for="gender">هل تتلقى الأسرة مساعدات؟</label>
                        <select class="form-control" name="receive_help">
                            <option selected disabled value="">اختر...</option>
                            <option value="yes">نعم</option>
                            <option value="no"> لا</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">قيمة المساعدات شهريا</label>
                        <input name="help_amount" id="name" type="text" class="form-control">
                    </div>

                    <br>


                    <div class="col-md-3">
                        <label class="form-label required ">مصدر كفالات الأيتام</label>
                        <input name="help_source"  type="text" class="form-control">
                    </div>


                    <div class="col-md-6">
                        <label class="form-label required ">الأملاك</label>
                        <input name="assets"  type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">قيمة العائد من الأملاك</label>
                        <input name="assets_profits"  type="text" class="form-control">
                    </div>
                    <br>

                    <div class="col-md-3">
                        <label class="form-label required ">قيمة الدخل الاجمالي</label>
                        <input name="total_income"  type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label required ">وصف عام للحالة الاقتصادية</label>
                        <input name="description"  type="text" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
</div>
