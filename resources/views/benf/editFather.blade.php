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
                    <h5 class="modal-title" > تعديل أب</h5>
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

                    <input name="type" type="hidden" value="father">

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

                    <!-- Birthday bicker -->
                    <div class="col-md-3">
                        <label class="form-label required">تاريخ الوفاة</label>
                        <input name="death_date"  type="date" class="form-control" value="{{$parent->death_date}}">
                    </div>

                    <br>


                    <div class="col-md-6">
                        <label class="form-label required ">عمل الأب قبل الوفاة</label>
                        <input name="father_job_before_death"  type="text" class="form-control" value="{{$parent->father_job_before_death}}">
                    </div>


                    <div class="col-md-3">
                        <label class="form-label required ">سبب الوفاة</label>
                        <input name="death_cause"  type="text" class="form-control" value="{{$parent->death_cause}}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label required ">مكان الوفاة</label>
                        <input name="death_place"  type="text" class="form-control" value="{{$parent->death_place}}">
                    </div>


                    <br>


                    <div class="col-md-6">
                        <label class="form-label required ">معلومات أخرى</label>
                        <textarea name="details" type=text class="form-control">{{$parent->details}} </textarea>
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary add_equipment">حفظ</button>
                </div>

            </div>
        </div>

    </form>
@endsection
