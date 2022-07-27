@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <div class="container" >

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary" href="#">بيانات المستفيد</a>
            </div>
        </nav>
        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%" >
                <div class="card-body">
                    <h5 class="card-title">بيانات أساسية</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="card-text">الأسم: <span class="fw-bolder"> # </span></p>
                            <p class="card-text">رقم الهوية: <span class="fw-bolder">#</span>
                            <p class="card-text">الجنس: <span class="fw-bolder">#</span>
                            <p class="card-text">رقم البطاقة: <span class="fw-bolder">#</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">رقم الجوال: <span class="fw-bolder">#</span>
                            </p>
                            <p class="card-text">بريد الإلكتروني: <span class="fw-bolder">#</span>
                            </p>
                            <p class="card-text">الحالة الإجتماعية: <span
                                    class="fw-bolder">#</span></p>
                            <p class="card-text">المؤهل العلمي: <span
                                    class="fw-bolder">#</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="card-text">المدينة: <span class="fw-bolder">#</span>
                            </p>
                            <p class="card-text">المنطقة: <span class="fw-bolder">#</span>
                            </p>
                            <p class="card-text">اقرب معلم: <span class="fw-bolder">#</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">أفراد العائلة
                        <span>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#addMember">اضافة </button>
                        </span>
                    </h5>
                    <div class="row equipment_table">
                        @if ($beneficiary->familyMembers->count() == 0)
                            لا يوجد أفراد العائلة
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">رقم الفرد</th>
                                    <th scope="col">اسم الفرد </th>
                                    <th scope="col">رقم الهوية </th>
                                    <th scope="col">الحالة الصحية</th>
                                    <th scope="col">عمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($beneficiary->familyMembers as $member)
                                        <tr>
                                            <td>{{$member->id}}</td>
                                            <td>{{$member->name}}</td>
                                            <td>{{$member->id_number}}</td>
                                            <td>{{$member->health_status}}</td>
                                            <td style="width: 220px">
                                                <a href="{{route('beneficiaries.family_members.show',$member->id)}}" class="btn btn-primary" >عرض</a>
                                                <a href="{{route('beneficiaries.family_members.edit',$member->id)}}" class="btn btn-primary">تعديل</a>
                                                <a href="{{route('beneficiaries.family_members.destroy',$member->id)}}" class="btn btn-danger">حدف</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @extends('benf.addFamilyMember')

        <br>

        <div class="row">
            <div class="card bg-light" style="width: 100%">
                <div class="card-body">
                    <h5 class="card-title">بيانات الأب والأم

                        @if($beneficiary->birthParents->count() < 2)
                            <span>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#addFather">اضافة أب
                                </button>
                            </span>

                            <span>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#addMother">اضافة أم
                                </button>
                            </span>
                        @endif
                    </h5>
                    <div class="row equipment_table">
                        @if ($beneficiary->birthParents->count() == 0)
                            لا يوجد بيانات
                        @else
                            <table class="table table-success table-bordered">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">رقم الوالد/ة</th>
                                    <th scope="col">اسم الوالد/ة </th>
                                    <th scope="col">رقم الهوية </th>
                                    <th scope="col">عمليات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($beneficiary->birthParents as $parent)
                                    <tr>
                                        <td>{{$parent->id}}</td>
                                        <td>{{$parent->full_name}}</td>
                                        <td>{{$parent->id_number}}</td>
                                        <td style="width: 220px">
                                            <a href="#" class="btn btn-primary" >عرض</a>
                                            <a href="#" class="btn btn-primary">تعديل</a>
                                            <a href="#" class="btn btn-danger">حدف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @extends('benf.addFather')
        @extends('benf.addMother')


@endsection

@section('scripts')
            <script>
                $('#gov').change(function () {
                    $('#cit').children().remove()
                    $('#cit').append(new Option('اختر...', 'اختر...'))
                    $('#str').children().remove()
                    $('#str').append(new Option('اختر...', 'اختر...'))

                    var gov = $('#gov').val();
                    $.ajax({
                        url: '{{route('data')}}',
                        type: 'get',
                        success: function (data) {
                            $.each(data,function (key,item) {
                                if (item.name === gov){
                                    $.each(item.cities,function (key,item) {
                                        $('#cit').append('<option value="'+item.name+'">'+item.name+'</option>');
                                    });
                                }
                            });

                        }
                    });
                });
                $('#cit').change(function () {
                    $('#str').children().remove()
                    $('#str').append(new Option('اختر...', 'اختر...'))

                    var cit = $('#cit').val();
                    $.ajax({
                        url: '{{route('data')}}',
                        type: 'get',
                        success: function (data) {
                            $.each(data,function (key,item) {
                                $.each(item.cities,function (key,item) {
                                    if (item.name === cit){
                                        $.each(item.streets,function (key,item) {
                                            $('#str').append('<option value="'+item.name+'">'+item.name+'</option>');
                                        });
                                    }

                                });
                            })
                        }
                    });
                });
            </script>
@endsection
