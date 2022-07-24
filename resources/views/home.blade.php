@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4 ">
                                <a href="{{route('sponsors.index')}}" class="btn btn-lg btn-block btn-primary">
                                    الداعمون
                                </a>
                            </div>
                            <div class="col-md-4 ">
                                <a href="{{route('beneficiaries.index')}}" class="btn btn-lg btn-block btn-primary">
                                    المستفيدون
                                    <br>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
