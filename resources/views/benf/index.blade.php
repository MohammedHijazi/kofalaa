@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/index.style.css')}}">
@endsection

@section('content')
    <div class="card ma">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة المستفيدين

            <a class="btn btn-primary" href="{{route('search.beneficiaries')}}" role="button">بحث عن مستفيد</a>

            <a class="btn btn-primary"  role="button" data-toggle="modal" data-target="#addBeneficiary">اضافة مستفيد</a>
            @include('benf.createBeneficiary')

        </div>
        <div class="card-body">
            <table id="requests" class="table table-bordered">
                <thead>
                <tr>
                    <th>رقم المستفيد</th>
                    <th>نوع المستفيد</th>
                    <th>عدد أفرد العائلة</th>
                    <th>عمليات</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{$beneficiary->id}}</td>

                            <td>{{$beneficiary->type}}</td>

                            <td>{{$beneficiary->familyMembers->count()}}</td>

                            <td style="display: flex; flex-direction: row; justify-content: space-evenly">
                                <a href="{{route('beneficiaries.show',$beneficiary->id)}}" class="btn btn-primary" style="margin-left: 5px">عرض</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
