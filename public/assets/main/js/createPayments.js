let beneficiaryId;
let beneficiaryName;
$(document).ready(function () {
    let sponsorId = $('#sponsor-id option:selected').val();
    let path = "{{route('sponsors.beneficiaries', ':sponsorId')}}";
    $('.sid').change(function () {
        sponsorId = $('#sponsor-id option:selected').val();
        path = "http://127.0.0.1:8000/api/search/"+sponsorId+"/beneficiaries";
        jQuery(".sid").attr('disabled',true);
    });

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
            beneficiaryId = item.id;
            beneficiaryName = item.name;
        },
        //show hints
        hint: true,
        //show suggestions
        minLength: 0,
        //show all results on focus
        items: 'all',
        autoFocus: true,

    });
});

let count = 1;
$(document).on('click','#add-payment',function () {
    let sponsorId = $('#sponsor-id option:selected').val();
    let ld_number = $('#led-number').val();
    $('#ledger_number').val(ld_number);
    $('#sp_id').val(sponsorId);

    $('#payments-table').append(`<tr>
                        <!--make input fields -->
                        <td class="col-1">${count}</td>
                        <td class="col-1"><input name="beneficiaries_ids[]" class="form-control" type="text" value="${beneficiaryId}"></td>
                        <td class="col-3"><input name="beneficiaries_names[]" class="form-control" type="text" value="${beneficiaryName}"></td>
                        <td class="col-2"><input name="amounts[]" class='form-control' type="text" ></td>
                        <td class="col-2">
                            <select class="form-control" name="currencies[]">
                                <option disabled selected>العملة</option>
                                <option value="ILS">شيكل</option>
                                <option value="USD">دولار</option>
                            </select>
                        </td>
                        <td class="col-1">
                            <a class="btn btn-danger remove-payment" href="#" role="button">حذف</a>
                        </td>
                    </tr>`
    );
    count+=1;
});

$(document).on('click', '.remove-payment', function() {
    $(this).closest('tr').remove();
});


