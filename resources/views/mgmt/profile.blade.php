<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User profile form requirement</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
    <!--     <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 10px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
        .othertop {
            margin-top: 5px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!--------------------------------------------------------------------------------------------------------------------->
<!--Basic info section-->
<!--------------------------------------------------------------------------------------------------------------------->

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            @if($sponsor->type == 'personal')
                <form class="form-horizontal">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>بيانات الداعم </legend>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ID">الرقم التعريفي</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->personalSponsor->id_number}}" type="text" placeholder="ID" class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ID"> نوع الرقم التعريفي</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->personalSponsor->id_type}}" type="text" placeholder="ID" class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name (Full name)">الاسم رباعي</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->name}}" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name (Full name)">الجنسية</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->personalSponsor->nationality}}" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">نوع الداعم</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="شخص" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>






                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Phone number ">رقم الجوال </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input value="{{$sponsor->personalSponsor->mobile}}" type="text" placeholder="Phone number " class="form-control input-md" readonly>
                                </div>

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Phone number ">رقم الهاتف </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <input value="{{$sponsor->personalSponsor->phone}}" type="text" placeholder="Mobile number " class="form-control input-md" readonly>
                                </div>

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email Address">البريد الالكتروني</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>

                                    </div>
                                    <input value="{{$sponsor->email}}" type="text" placeholder="Email Address" class="form-control input-md" readonly>

                                </div>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email Address">الدولة</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-location-arrow"></i>

                                    </div>
                                    <input value="{{$sponsor->country}}" type="text" placeholder="Email Address" class="form-control input-md" readonly>

                                </div>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email Address">المحافظة</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-location-arrow"></i>

                                    </div>
                                    <input value="{{$sponsor->personalSponsor->governorate}}" type="text" placeholder="Email Address" class="form-control input-md" readonly>

                                </div>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email Address">المدينة</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-location-arrow"></i>

                                    </div>
                                    <input value="{{$sponsor->personalSponsor->city}}" type="text" placeholder="Email Address" class="form-control input-md" readonly>

                                </div>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email Address">الحي</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-location-arrow"></i>

                                    </div>
                                    <input value="{{$sponsor->personalSponsor->street}}" type="text" placeholder="Email Address" class="form-control input-md" readonly>

                                </div>

                            </div>
                        </div>


                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" >العنوان</label>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="2" readonly>{{$sponsor->personalSponsor->address}}</textarea>
                            </div>
                        </div>

                    </fieldset>
                </form>
            @else
                <form class="form-horizontal">
                    <fieldset>
                        <!-- Form Name -->
                        <legend>بيانات الداعم </legend>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ID">الرقم التعريفي</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->id}}" type="text" placeholder="ID" class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name (Full name)">الاسم </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->name}}" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Name (Full name)">الدولة</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->country}}" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">نوع الداعم</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="مؤسسة" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" >مسؤول التواصل </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <input value="{{$sponsor->institutionSponsor->contact_person}}" type="text"  class="form-control input-md" readonly>
                                </div>
                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Phone number ">رقم الهاتف الأساسي </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input value="{{$sponsor->institutionSponsor->primary_phone}}" type="text" placeholder="Phone number " class="form-control input-md" readonly>
                                </div>

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Phone number ">رقم الهاتف الثانوي </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input value="{{$sponsor->institutionSponsor->secondary_phone}}" type="text" placeholder="Phone number " class="form-control input-md" readonly>
                                </div>

                            </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Email Address">البريد الالكتروني</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>

                                    </div>
                                    <input value="{{$sponsor->email}}" type="text" placeholder="Email Address" class="form-control input-md" readonly>

                                </div>

                            </div>
                        </div>




                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" >العنوان</label>
                            <div class="col-md-4">
                                <textarea class="form-control" rows="2" readonly>{{$sponsor->institutionSponsor->address}}</textarea>
                            </div>
                        </div>

                    </fieldset>
                </form>
            @endif
        </div>
    </div>
</div>


<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

</body>

</html>
