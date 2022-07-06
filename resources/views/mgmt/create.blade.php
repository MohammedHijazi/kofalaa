@extends('layouts.app')


@section('styles')
    <link rel="stylesheet" href="{{asset('assets/main/css/create.style.css')}}">
@endsection

@section('content')
    <html lang="en" dir="rtl">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>بيانات الكفيل</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <fieldset style="width: 71%">
        <legend>بيانات الكفيل</legend>
        <form action="">
            <div class="personalInstitution">
                <input type="radio" name="x" id="personal" />
                <label for="personal">شخصي</label>
                <input type="radio" name="x" id="institution" />
                <label for="institution">مؤسسة</label>
            </div>
            <div class="idSection" style="margin-top: 15px">
                <label for="">بطاقة التعريف</label>
                <input type="radio" name="x" id="id" />
                <label for="id">هوية</label>
                <input type="radio" name="x" id="passport" />
                <label for="passport">جواز السفر</label>
                <label for="" style="margin-right: 30px">رقم بطاقة التعريف</label>
                <input type="text" id="idNumber" />
            </div>
            <div class="nameSection" style="margin-top: 15px">
                <label for="" style="margin-left: 3px">الإسم</label>
                <input type="text" id="firstName" />
                <input type="text" id="SecondName" />
                <input type="text" id="ThirdName" />
                <input type="text" id="familyName" />
            </div>
            <div class="location" style="margin-top: 15px">
                <label for="">المحافظة</label>
                <select>
                    <option value="">ss</option>
                    <option value="">ss</option>
                    <option value="">ss</option>
                </select>
                <label for="" style="margin-right: 15px">المدينة</label>
                <select>
                    <option value="">ss</option>
                    <option value="">ss</option>
                    <option value="">ss</option>
                </select>
                <label for="" style="margin-right: 15px">الحي</label>
                <select>
                    <option value="">ss</option>
                    <option value="">ss</option>
                    <option value="">ss</option>
                </select>
            </div>
            <div class="detailsOfLocation" style="margin-top: 15px">
                <label for="">تفاصيل العنوان</label>
                <input type="text" style="width: 850px" />
            </div>
            <div
                class="contactInfo"
                style="
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
          "
            >
                <div>
                    <label for="">الهاتف</label>
                    <input type="text" name="" id="" />
                </div>
                <div>
                    <label for="">الجوال</label>
                    <input type="text" name="" id="" />
                </div>
                <div>
                    <label for="">البريد</label>
                    <input type="text" name="" id="" />
                </div>
            </div>
            <div class="nationality" style="margin: 15px 0px">
                <label for="">الجنسية</label>
                <select name="" id="">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <label for="" style="margin-right: 15px">مكان الإقامة</label>
                <select name="" id="">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </form>
    </fieldset>
    <button>حفظ</button>



    <!-- form 2 -->
    <fieldset style="width: 71%">
        <legend>بيانات الكفيل</legend>
        <form action="" style="text-align: center">
            <div>
                <label for="">شخصي</label>
                <input type="radio" name="x" id="personal" />
                <label for="">مؤسسة</label>
                <input type="radio" name="x" id="institution" />
            </div><br>
            <label for="">الدولة</label>
            <select name="" id="">
                <option value="">ss</option>
                <option value="">ss</option>
                <option value="">ss</option>
            </select><br><br>
            <label for="name">الاسم</label>
            <input type="text" id="name"><br><br>
            <label for="responsibleOfContact">مسؤول الإتصال<label>
                    <input type="text" id="responsibleOfContact"><br><br>
                    <label for="location">العنوان</label>
                    <input type="text" id="location"><br><br>
                    <div class="telephone">
                        <div class="tele1">
                            <label for="tele1">الهاتف1</label>
                            <input type="text" id="tele1">
                        </div><br><br>
                        <div class="tele2">
                            <label for="tele2">الهاتف2</label>
                            <input type="text" id="tele2">
                        </div><br><br>
                        <label for="">البريد</label>
                        <input type="text" name="" id="">
                    </div>
        </form>
    </fieldset>
    <button>حفظ</button><br><br>
    <a href="/search/search.html" style="margin-right: 450px;">البحث عن كفلاء</a>
    </body>
    </html>



@endsection
