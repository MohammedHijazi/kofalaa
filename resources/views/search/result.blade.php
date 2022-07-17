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
            <th>#</th>
            <th>الاسم</th>
            <th>النوع</th>
            <th>الدولة</th>
            <th>العنوان</th>
            <th>رقم الهاتف</th>
            <th>عدد المستفيدين</th>
            <th>عمليات</th>
            <tr>
                <td>1</td>
                <td>محمد احمد محمود</td>
                <td>شخص</td>
                <td>فلسطين</td>
                <td>غزة</td>
                <td>28000000</td>
                <td>2</td>
                <td>
                    <button>ادارة</button
                    ><button style="background-color: gold; width: 120px">
                        Send SMS
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>محمد احمد محمود</td>
                <td>شخص</td>
                <td>فلسطين</td>
                <td>غزة</td>
                <td>28000000</td>
                <td>2</td>
                <td>
                    <button>ادارة</button
                    ><button style="background-color: gold; width: 120px">
                        Send SMS
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>محمد احمد محمود</td>
                <td>شخص</td>
                <td>فلسطين</td>
                <td>غزة</td>
                <td>28000000</td>
                <td>2</td>
                <td>
                    <button>ادارة</button
                    ><button style="background-color: gold; width: 120px">
                        Send SMS
                    </button>
                </td>
            </tr>
            <tr style="text-align: right">
                <td colspan="8" style="padding-right: 15px">
                    <a href="#">الاول</a> <a href="#">|السابق</a>
                    <a href="#">|التالي</a> <a href="#">|الأخير</a>
                </td>
            </tr>
        </table>
    </section>
    <a href="{{route('search.index')}}" style="font-size: 22px; margin: 0px 500px 0px;">رجوع</a>
</body>
</html>
