@extends('layouts.app')


@section('content')
        <form action="{{route('beneficiaries.updateHousing',$housing->id)}}" method="post">
            @csrf
            @method('put')
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">تعديل وصف للحالة السكن</h5>
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

                        <div class="form-group col-md-3" >
                            <label for="gender">خاصية المسكن</label>
                            <select class="form-control" name="housing_type">
                                <option selected disabled value="">اختر...</option>
                                <option @if($housing->housing_type == 'own') selected @endif value="own">ملك</option>
                                <option @if($housing->housing_type == 'rented') selected @endif value="rented">ايجار</option>
                                <option @if($housing->housing_type == 'other') selected @endif value="other">غير ذلك</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required ">قيمة الايجار</label>
                            <input name="rent_amount" type="text" class="form-control" value="{{$housing->rent_amount}}">
                        </div>


                        <div class="col-md-3">
                            <label class="form-label required ">عدد الغرف</label>
                            <input name="number_of_rooms" type="number" class="form-control" value="{{$housing->number_of_rooms}}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label required ">عدد الأفراد في الغرفة</label>
                            <input name="people_per_room"  type="number" class="form-control" value="{{$housing->people_per_room}}">
                        </div>

                        <br>


                        <div class="col-md-3">
                            <label class="form-label required ">حالة البناء</label>
                            <input name="building_condition"  type="text" class="form-control" value="{{$housing->building_condition}}">
                        </div>


                        <div class="col-md-3">
                            <label class="form-label required ">نوع البناء</label>
                            <input name="building_type"  type="text" class="form-control" value="{{$housing->building_type}}">
                        </div>


                        <div class="col-md-3">
                            <label class="form-label required ">مساحة البناء</label>
                            <input name="building_space"  type="text" class="form-control" value="{{$housing->building_space}}">
                        </div>


                        <div class="col-md-3">
                            <label class="form-label required ">حالة الأثاث</label>
                            <input name="furniture_condition"  type="text" class="form-control" value="{{$housing->furniture_condition}}">
                        </div>

                        <br>


                        <div class="col-md-6 row-span-6">
                            <label class="form-label required ">وصف عام للسكن</label>
                            <input name="description"  type="text" class="form-control" value="{{$housing->description}}">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                    </div>

                </div>
            </div>

        </form>
@endsection
