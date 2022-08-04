<html dir="rtl">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>
    <div class="card ma">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادرة المستفيدين
            <!--search input-->
            <div class="input-group mb-1" style="width: 500px">
                <input id="search-field" type="text" class="form-control typehead" placeholder="بحث عن مستفيد">
            </div>

            <a class="btn btn-primary" href="#" role="button">اضافة مستفيد</a>

        </div>
        <div class="card-body">
            <table id="requests" class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>الرقم</th>
                    <th>الاسم</th>
                    <th>نوع الكفالة</th>
                    <th>تاريخ الاضافة</th>
                    <th>عمليات</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td style="display: flex; flex-direction: row; justify-content: space-evenly">
                        <a href="#" class="btn btn-primary" style="margin-left: 5px">تعديل</a>
                        <form action="#" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin-left: 5px">حذف</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <!--script fot auto complete family members name when searching for them  -->
    <script>
        $(document).ready(function () {
            let path = "{{ route('autocomplete.name') }}";
            $('#search-field').typeahead({
                source: function (query, process) {
                    return $.get(path, { query: query }, function (data) {
                            console.log(data);
                        return process(data);
                    });
                }
            });
        });
    </script>

    </body>

</html>






