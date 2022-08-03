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
<section>
    <table class="result">
        <th>رقم المستفيد</th>
        <th>اسم المستفيد</th>
        <th>رقم الهوية</th>
        <th>الحالة الصحية</th>
        <th>عمليات</th>


        @foreach($beneficiaries as $beneficiary)
            <tr>
                <td>{{$beneficiary->beneficiary_id}}</td>
                <td>{{$beneficiary->name}}</td>
                <td>{{$beneficiary->id_number}}</td>
                <td>{{$beneficiary->health_status}}</td>
                <td>
                    <a href="{{route('beneficiaries.show',$beneficiary->beneficiary_id)}}">ادارة</a>
                    <button style="background-color: gold; width: 120px">
                        Send SMS
                    </button>
                </td>
            </tr>
        @endforeach


        <tr style="text-align: right">
            <td colspan="8" style="padding-right: 15px">
                <a href="#">الاول</a> <a href="#">|السابق</a>
                <a href="#">|التالي</a> <a href="#">|الأخير</a>
            </td>
        </tr>
    </table>
</section>
<a href="{{route('search.beneficiaries')}}" style="font-size: 22px; margin: 0px 500px 0px;">رجوع</a>
</body>
</html>
