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
@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $errors->first() }}
    </div>
@endif
<fieldset style="width: 71%">
    <legend>بيانات الكفيل</legend>

    @if($sponsor->type == 'personal')
        <form action="{{route('sponsors.update',$sponsor->id)}}" method="post" id="form-one">
            @csrf
            @method('put')
            <div class="idSection" style="margin-top: 15px">
                <label for="">بطاقة التعريف</label>
                <input type="radio" name="id_type" value="id" id="id" @if($sponsor->personalSponsor->id_type == 'id') checked @endif />
                <label for="id">هوية</label>
                <input  type="radio" name="id_type" value="passport" id="passport" @if($sponsor->personalSponsor->id_type == 'passport') checked @endif />
                <label for="passport">جواز السفر</label>


                <label for="" style="margin-right: 30px">رقم بطاقة التعريف</label>
                <input type="text" name="id_number" id="idNumber" value="{{$sponsor->personalSponsor->id_number}}" />
            </div>

            @php
                $name = explode(' ',$sponsor->name);

                $firstName = $name[0];
                $secondName = $name[1];
                $thirdName = $name[2];
                $lastName = $name[3];
            @endphp

            <div class="nameSection" style="margin-top: 15px">
                <label for="" style="margin-left: 3px">الإسم</label>
                <input name="first_name" type="text" id="firstName" value="{{$firstName}}" />
                <input name="second_name" type="text" id="SecondName" value="{{$secondName}}" />
                <input name="third_name" type="text" id="ThirdName" value="{{$thirdName}}" />
                <input name="last_name" type="text" id="familyName" value="{{$lastName}}" />
            </div>

            <div class="location" style="margin-top: 15px">
                <label for="">المحافظة</label>
                <select name="governorate" >
                    @foreach($gevernorates as $gevernorate)
                        <option value="{{$gevernorate->name}}" @if($sponsor->personalSponsor->governorate == $gevernorate->name) selected @endif>{{$gevernorate->name}}</option>
                    @endforeach
                </select>
                <label for="" style="margin-right: 15px">المدينة</label>
                <select name="city">
                    @foreach($cities as $city)
                        <option value="{{$city->name}}" @if($sponsor->personalSponsor->city == $city->name) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
                <label for="" style="margin-right: 15px">الحي</label>
                <select name="street">
                    @foreach($streets as $street)
                        <option value="{{$street->name}}" @if($sponsor->personalSponsor->street == $street->name) selected @endif>{{$street->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="detailsOfLocation" style="margin-top: 15px">
                <label for="">تفاصيل العنوان</label>
                <input name="address" type="text" style="width: 850px" value="{{$sponsor->personalSponsor->address}}"/>
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
                    <input type="text" name="phone" value="{{$sponsor->personalSponsor->phone}}" />
                </div>
                <div>
                    <label for="">الجوال</label>
                    <input type="text" name="mobile" value="{{$sponsor->personalSponsor->mobile}}" />
                </div>
                <div>
                    <label for="">البريد</label>
                    <input type="text" name="email" value="{{$sponsor->email}}" />
                </div>
            </div>
            <div class="nationality" style="margin: 15px 0px">
                <label for="">الجنسية</label>
                <select name="nationality" id="nationality">
                    @foreach($countries as $country)
                        <option value="{{$country->name}}" @if($sponsor->personalSponsor->nationality == $country->name) selected @endif>{{$country->name}}</option>
                    @endforeach
                </select>
                <label for="" style="margin-right: 15px">دولة الإقامة</label>
                <select name="country" id="country">
                    @foreach($countries as $country)
                        <option value="{{$country->name}}" @if($sponsor->country == $country->name) selected @endif>{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">حفظ</button>
        </form>
    @elseif($sponsor->type == 'institution')
        <form action="{{route('sponsors.edit',$sponsor->id)}}" method="post" style="text-align: center; display: block" id="form-two">
            @csrf
            @method('put')
            <label for="">الدولة</label>
            <select name="country" id="country">
                @foreach($countries as $country)
                    <option value="{{$country->name}}" @if($sponsor->$country == $country->name) selected @endif>{{$country->name}}</option>
                @endforeach
            </select><br><br>
            <label for="name">الاسم</label>
            <input type="text" id="name" name="name" value="{{$sponsor->name}}"><br><br>
            <label for="responsibleOfContact">مسؤول الإتصال<label>
            <input type="text" id="responsibleOfContact" name="contact_person" value="{{$sponsor->institutionSponsor->contact_person}}"><br><br>
            <label for="location">العنوان</label>
            <input type="text" id="location" name="address" value="{{$sponsor->institutionSponsor->address}}"><br><br>
             <div class="telephone">
                  <div class="tele1">
                  <label for="tele1">الهاتف1</label>
                  <input type="text" id="tele1" name="primary_phone" value="{{$sponsor->institutionSponsor->primary_phone}}">
             </div><br><br>
             <div class="tele2">
                 <label for="tele2">الهاتف2</label>
                 <input type="text" id="tele2" name="secondary_phone" value="{{$sponsor->institutionSponsor->secondary_phone}}">
             </div><br><br>
             <label for="">البريد</label>
             <input type="text" name="email" id="" value="{{$sponsor->email}}">
             </div>
             <button type="submit">حفظ</button>
        </form>
    @endif

</fieldset>

<br><br>

</body>
</html>
