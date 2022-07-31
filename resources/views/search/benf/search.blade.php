<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>البحث عن كفلاء</title>
    <link rel="stylesheet" href="{{asset('assets/main/css/search.style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/main/css/benf/searchBeneficiaries.style.css')}}" />

</head>
<body>
    <fieldset style="
        padding-right: 150px;
        width: 70%;
        margin-right: 50px;
        margin-top: 50px;
      ">
        <legend>البحث عن مستفيد</legend>
        <br>
        <label>أسرة</label>
        <input type="radio" name="rad" id="family-rad" checked />
        <label>فرد أسرة</label>
        <input type="radio" name="rad" id="member-rad" />
        <label>وصي</label>
        <input type="radio" name="rad" id="guardian-rad" />
        <label>حاضن</label>
        <input type="radio" name="rad" id="custodian-rad" />
        <label>ولي أمر</label>
        <input type="radio" name="rad" id="ruler-rad" />


        <form action="{{route('search.results')}}" method="get" id="family-form">
            <table width="450" height="250">
                <tr>
                    <td>رقم المستفيد</td>
                    <td colspan="3"><input type="text" name="beneficiary_id" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>تاريخ الادخال</td>
                    <td>من:<input type="date" name="creation_date_from" /></td>
                    <td>الى:<input type="date" name="creation_date_to" /></td>
                </tr>
            </table>
            <button type="submit" style="
        width: 200px;
        height: 30px;
        font-size: 20px;
        margin: 15px 400px 15px 0px;
      ">بحث</button>
        </form>

        <form action="{{route('search.results')}}" method="get" id="member-form">
            <table width="450" height="250">
                <tr>
                    <td>اسم الفرد</td>
                    <td colspan="3"><input type="text" name="beneficiary_id" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>رقم الهوية</td>
                    <td colspan="3"><input type="text" name="beneficiary_id" /></td>
                    <td></td>
                </tr>

            </table>
            <button type="submit" style="
        width: 200px;
        height: 30px;
        font-size: 20px;
        margin: 15px 400px 15px 0px;
      ">بحث</button>
        </form>


    </fieldset>


    <a href="{{route('sponsors.index')}}" style="font-size: 22px; margin: 0px 500px 0px;">رجوع</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('input:radio[name="rad"]').change(function () {
            if ($('#family-rad').is(':checked')) {
                $('#family-form').css('display', 'block');
                $('#member-form').css('display', 'none');
            }else if($('#member-rad').is(':checked')) {
                $('#family-form').css('display', 'none');
                $('#member-form').css('display', 'block');
            }
        });
    </script>
</body>
</html>
