@extends('admin.base')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">اضافة حي </div>

                    <div class="card-body">

                        <div class="container bootstrap snippets bootdey">

                            <div class="row">
                                <!-- left column -->

                                <!-- edit form column -->
                                <div class="col-md-12 personal-info">
                                    @if (\Session::has('success'))
                                        <div class="alert alert-info alert-dismissable">
                                            <a class="panel-close close" data-dismiss="alert">×</a>
                                            <i class="fa fa-coffee"></i>
                                            {!! \Session::get('success') !!}
                                        </div>
                                    @endif


                                    <form method="post" action="{{route('streets.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="city_id" class="col-md-4 col-form-label text-md-right">{{ __('city_id') }}</label>

                                            <div class="col-md-6">
                                                <select id="city_id" required name="city_id"  class="form-control @error('city_id') is-invalid @enderror" >
                                                    @foreach ($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach

                                                </select>


                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
