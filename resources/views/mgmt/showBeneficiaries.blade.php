<html dir="rtl">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    </head>

    <body>
    <div class="card ma" style="width: 80%; margin-right: 10%; margin-top: 3%">
        <div class="card-header" style=" display: flex; justify-content: space-between; align-content: center; align-items: center; ">ادارة المستفيدين
            <!--search input-->
            <div class="input-group mb-1" style="width: 500px">
                <input id="search-field" type="text" class="form-control typehead" placeholder="بحث عن مستفيد">
            </div>
            <input type="hidden" name="beneficiary-id" id="beneficiary-id">
            <input type="hidden" name="sponsor-id" id="sponsor-id" value="{{$sponsor->id}}">
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="monthly" name="sponsorship-type" id="sponsorship-type" checked>شهري
                </label>
            </div>
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="yearly" name="sponsorship-type" id="sponsorship-type">سنوي
                </label>
            </div>

            <a class="btn btn-primary" id="add-beneficiary" href="#" role="button">اضافة مستفيد</a>

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
                <tbody id="#requests">
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
            fetchBeneficiaries();
            let path = "{{ route('autocomplete.name') }}";
            $('#search-field').typeahead({
                source: function (query, process) {
                    return $.get(path, { query: query }, function (data) {
                        return process(data);
                    });
                },
                displayText: function (item) {
                    return item.id+"-"+item.name;
                },
                afterSelect: function (item) {
                    $('#beneficiary-id').val(item.id);
                }
            });
        });

        $(document).on('click', '#add-beneficiary', function (e) {
            e.preventDefault();
            let data = {
                'sponsorship-type':  $(this).parent().find('input[name="sponsorship-type"]:checked').val(),
                'beneficiary-id': $('#beneficiary-id').val(),
                'sponsor-id':$('#sponsor-id').val()
            }
            console.log(data)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "http://127.0.0.1:8000/api/add_beneficiary",
                data: data,
                dataType: "json",
                success: function (response) {
                    fetchBeneficiaries();
                }
            });

            });

        <!--script for getting all the beneficiaries of the sponsor-->
            function fetchBeneficiaries(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/api/sponsor"+'/'+'<?php echo $sponsor->id; ?>'+'/'+'beneficiaries',
                    dataType: "json",
                    success: function (response) {
                        let data = response;
                        let html = '';
                        let sponsorship_type = '';
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].pivot.sponsorship_type === 'monthly') {
                                sponsorship_type = 'شهري';
                            } else {
                                sponsorship_type = 'سنوي';
                            }
                            html += '<tr>';
                            html += '<td>' + (i + 1) + '</td>';
                            html += '<td>' + data[i].id + '</td>';
                            html += '<td>' + data[i].name + '</td>';
                            html += '<td>' + sponsorship_type + '</td>';
                            html += '<td>' + data[i].created_at + '</td>';
                            html += '<td style="display: flex; flex-direction: row; justify-content: space-evenly">';
                            html += '<button  class="btn btn-primary update" style="height: 40px;">تغيير نوع الكفالة</button>';
                            html += '<button  class="btn btn-danger destroy" >حذف</button>';
                            html += '<input type="hidden" class="benef-id" value="' + data[i].id + '">';
                            html += '</td>';
                            html += '</tr>';
                        }
                        $('#requests tbody').html(html);
                    },
                    error: function(response) {
                        //Do Something to handle error
                        console.log(response);
                    }
                    });
                }


        //script for deleting a beneficiary from the sponsor
        $(document).on('click', '.destroy', function (e) {
            e.preventDefault();
            var id = $(this).parent().find('input.benef-id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/sponsor"+'/'+'<?php echo $sponsor->id; ?>'+'/'+'beneficiary'+'/'+id,
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    fetchBeneficiaries();
                }
            });
        });

        //script for updating a beneficiary from the sponsor
        $(document).on('click', '.update', function (e) {
            e.preventDefault();
            let id = $(this).parent().find('input.benef-id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/api/update/sponsor"+'/'+'<?php echo $sponsor->id; ?>'+'/'+'beneficiary'+'/'+id,
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    fetchBeneficiaries();
                }
            });
        });
    </script>

    </body>

</html>






