<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>البحث عن كفلاء</title>
    <link rel="stylesheet" href="{{asset('assets/main/css/search.style.css')}}" />
</head>
<body>
<fieldset
    style="
        padding-right: 150px;
        width: 70%;
        margin-right: 50px;
        margin-top: 10px;
      "
>
    <legend>البحث عن كفيل</legend>
    <label for="">شخصي</label>
    <input type="radio" name="type" value="personal"  />
    <label for="">مؤسسة</label>
    <input type="radio" name="type" value="institution" />

    <form action="{{route('search.results')}}" method="post">
        @csrf
        <table width="520" height="250">
            <tr>
                <td>الاسم</td>
                <td colspan="3"><input type="text" name="name" /></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>المحافظة</td>
                <td colspan="1">
                    <select name="" id="">
                        @foreach($gevernorates as $gevernorate)
                            <option value="{{$gevernorate->name}}">{{$gevernorate->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>المدينة</td>
                <td colspan="1">
                    <select name="" id="">
                        @foreach($cities as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>الجنسية</td>
                <td>
                    <select name="" id="">
                        @foreach($countries as $country)
                            <option value="{{$country->name}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>الدولة</td>
                <td>
                    <select name="" id="">
                        @foreach($countries as $country)
                            <option value="{{$country->name}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>مسؤول الاتصال</td>
                <td><input type="text" name="contact_person" /></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>رقم بطاقة التعريف</td>
                <td colspan="3"><input type="text" name="id_number" /></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <button
            type="submit"
            style="
        width: 200px;
        height: 30px;
        font-size: 20px;
        margin: 15px 400px 15px 0px;
      "
        >
            بحث
        </button>
    </form>
</fieldset>


<a href="{{route('home')}}" style="font-size: 22px; margin: 0px 500px 0px;">رجوع</a>
</body>
</html>
