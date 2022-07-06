<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>بيانات الكفيل</title>
    <link rel="stylesheet" href="{{asset('assets/main/css/create.style.css')}}">

</head>
<body>
<fieldset style="width: 71%">
    <legend>بيانات الكفيل</legend>
    <div class="personalInstitution">
        <input type="radio" name="rad" id="radio1" checked />
        <label for="personal">شخصي</label>
        <input type="radio" name="rad" id="radio2" />
        <label for="institution">مؤسسة</label>
    </div>
    <form action="" id="form-one">
        <div class="idSection" style="margin-top: 15px">
            <label for="">بطاقة التعريف</label>
            <input type="radio" name="id_type" value="id" id="id" />
            <label for="id">هوية</label>
            <input type="radio" name="id_type" value="passport" id="passport" />
            <label for="passport">جواز السفر</label>
            <label for="" style="margin-right: 30px">رقم بطاقة التعريف</label>
            <input type="text" name="id_number" id="idNumber" />
        </div>

        <div class="nameSection" style="margin-top: 15px">
            <label for="" style="margin-left: 3px">الإسم</label>
            <input name="first_name" type="text" id="firstName" />
            <input name="second_name" type="text" id="SecondName" />
            <input name="third_name" type="text" id="ThirdName" />
            <input name="last_name" type="text" id="familyName" />
        </div>

        <div class="location" style="margin-top: 15px">
            <label for="">المحافظة</label>
            <select name="governorate">
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
            <select name="country" id="country">
                @foreach($countries as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
            <label for="" style="margin-right: 15px">دولة الإقامة</label>
            <select name="country" id="country">
                @foreach($countries as $country)
                    <option value="{{$country->name}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <button>حفظ</button>
    </form>

    <form action="" style="text-align: center" id="form-two">
        <label for="">الدولة</label>
        <select name="country" id="country">
            @foreach($countries as $country)
                <option value="{{$country->name}}">{{$country->name}}</option>
            @endforeach
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
                <button>حفظ</button>
    </form>

</fieldset>

<br><br>

<a href="#" style="margin-right: 450px;">البحث عن كفلاء</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $('input:radio[name="rad"]').change(function () {
        if ($('#radio1').is(':checked')) {
            $('#form-one').css('display', 'block');
            $('#form-two').css('display', 'none');
        } else {
            $('#form-one').css('display', 'none');
            $('#form-two').css('display', 'block');
        }
    });
</script>


</body>
</html>