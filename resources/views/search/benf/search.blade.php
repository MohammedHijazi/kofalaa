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


        <form action="{{route('search.beneficiaries.results')}}" method="get" id="family-form">
            <input type="hidden" name="type" value="family">
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

        <form action="{{route('search.beneficiaries.results')}}" method="get" id="member-form">
            <input type="hidden" name="type" value="member">

            <table width="450" height="250">
                <tr>
                    <td>اسم الفرد</td>
                    <td colspan="3"><input type="text" name="full_name" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>رقم الهوية</td>
                    <td colspan="3"><input type="text" name="id_number" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>تاريخ الميلاد</td>
                    <td><input type="date" name="birth_date" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>الجنس</td>
                    <td colspan="3"><input checked type="radio" name="gender" value="male"/>ذكر <input type="radio" name="gender" value="female"/>أنثى</td>
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

        <form action="{{route('search.beneficiaries.results')}}" method="get" id="guardian-form">
            <input type="hidden" name="type" value="guardian">

            <table width="450" height="250">
                <tr>
                    <td>اسم الوصي</td>
                    <td colspan="3"><input type="text" name="full_name" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>رقم الهوية</td>
                    <td colspan="3"><input type="text" name="id_number" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>صلة القرابة</td>
                    <td colspan="3"><input type="text" name="relation" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>تاريخ الوصاية</td>
                    <td><input type="date" name="guardiation_date" /></td>
                </tr>

                <tr>
                    <td>الجهة المانحة للوصاية</td>
                    <td colspan="3"><input type="text" name="issue_place" /></td>
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

        <form action="{{route('search.beneficiaries.results')}}" method="get" id="custodian-form">
            <input type="hidden" name="type" value="custodian">

            <table width="450" height="250">
                <tr>
                    <td>اسم الحاضن</td>
                    <td colspan="3"><input type="text" name="full_name" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>رقم الهوية</td>
                    <td colspan="3"><input type="text" name="id_number" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>صلة القرابة</td>
                    <td colspan="3"><input type="text" name="relation" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>مكان اصدار الحضانة</td>
                    <td colspan="3"><input type="text" name="issue_place" /></td>
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

        <form action="{{route('search.beneficiaries.results')}}" method="get" id="ruler-form">
            <input type="hidden" name="type" value="ruler">

            <table width="450" height="250">
                <tr>
                    <td>اسم الولي</td>
                    <td colspan="3"><input type="text" name="full_name" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>رقم الهوية</td>
                    <td colspan="3"><input type="text" name="id_number" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>صلة القرابة</td>
                    <td colspan="3"><input type="text" name="relation" /></td>
                    <td></td>
                </tr>

                <tr>
                    <td>مكان اصدار الولاية</td>
                    <td colspan="3"><input type="text" name="issue_place" /></td>
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


    <a href="{{route('beneficiaries.index')}}" style="font-size: 22px; margin: 0px 500px 0px;">رجوع</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('input:radio[name="rad"]').change(function () {
            if ($('#family-rad').is(':checked')) {
                $('#family-form').css('display', 'block');
                $('#member-form').css('display', 'none');
                $('#guardian-form').css('display', 'none');
                $('#custodian-form').css('display', 'none');
                $('#ruler-form').css('display', 'none');
            }else if($('#member-rad').is(':checked')) {
                $('#family-form').css('display', 'none');
                $('#member-form').css('display', 'block');
                $('#guardian-form').css('display', 'none');
                $('#custodian-form').css('display', 'none');
                $('#ruler-form').css('display', 'none');
            }else if($('#guardian-rad').is(':checked')) {
                $('#family-form').css('display', 'none');
                $('#member-form').css('display', 'none');
                $('#guardian-form').css('display', 'block');
                $('#custodian-form').css('display', 'none');
                $('#ruler-form').css('display', 'none');
            }else if($('#custodian-rad').is(':checked')) {
                $('#family-form').css('display', 'none');
                $('#member-form').css('display', 'none');
                $('#guardian-form').css('display', 'none');
                $('#custodian-form').css('display', 'block');
                $('#ruler-form').css('display', 'none');
            }else{
                $('#family-form').css('display', 'none');
                $('#member-form').css('display', 'none');
                $('#guardian-form').css('display', 'none');
                $('#custodian-form').css('display', 'none');
                $('#ruler-form').css('display', 'block');
            }
        });
    </script>
</body>
</html>
