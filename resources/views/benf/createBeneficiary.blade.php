
    <div class="modal fade" id="addBeneficiary" tabindex="-1" role="dialog" aria-labelledby="addBeneficiary"
         aria-hidden="true">

        <form action="" method="POST" id="addBeneficiary_form">
            @csrf
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEquipmentLabel">اضافة مستفيد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body row">

                        <div class="errMsgContainer mb-3" id="errMsgContainer"></div>

                        <div class="col-md-4">
                            <label class="form-label required">نوع المستفيد</label>
                            <select name="type" id="machine_type" class="form-select">
                                <option selected disabled value="">اختر النوع...</option>
                                <option value="حالة انسانية">حالة انسانية</option>
                                <option value="يتيم الأبوين">يتيم الأبوين</option>
                                <option value="يتيم الأب">يتيم الأب</option>
                                <option value="يتيم الأم">يتيم الأم</option>
                                <option value="غير يتيم">غير يتيم</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

