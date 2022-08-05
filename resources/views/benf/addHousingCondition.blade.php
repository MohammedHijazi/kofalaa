<div class="modal fade" id="addHousing" tabindex="-1" role="dialog"  aria-hidden="true">
    <form action="{{route('beneficiaries.housing.store')}}" method="post">
        @csrf
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEquipmentLabel">اضافة وصف للحالة السكن</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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

                    <input name="beneficiary_id"  type="hidden" value="{{$beneficiary->id}}" class="form-control">

                    <div class="form-group col-md-3" >
                        <label for="gender">خاصية المسكن</label>
                        <select class="form-control" name="housing_type">
                            <option selected disabled value="">اختر...</option>
                            <option value="own">ملك</option>
                            <option value="rented">ايجار</option>
                            <option value="other">غير ذلك</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">قيمة الايجار</label>
                        <input name="rent_amount" type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">عدد الغرف</label>
                        <input name="number_of_rooms" type="number" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">عدد الأفراد في الغرفة</label>
                        <input name="people_per_room"  type="number" class="form-control">
                    </div>

                    <br>


                    <div class="col-md-3">
                        <label class="form-label required ">حالة البناء</label>
                        <input name="building_condition"  type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">نوع البناء</label>
                        <input name="building_type"  type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">مساحة البناء</label>
                        <input name="building_space"  type="text" class="form-control">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">حالة الأثاث</label>
                        <input name="furniture_condition"  type="text" class="form-control">
                    </div>

                    <br>


                    <div class="col-md-6 row-span-6">
                        <label class="form-label required ">وصف عام للسكن</label>
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
