let beneficiaryId;
let beneficiaryName;
let sponsorId = $('#sponsor-id option:selected').val();
let count;
$(document).ready(function () {
    count= $('#payments-table').children().length+1;
    let path = "http://127.0.0.1:8000/api/search/"+sponsorId+"/beneficiaries";
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

$(document).on('click','#add-payment',function () {
    $('#payments-table').append(`<tr>
                        <!--make input fields -->
                        <td class="col-1">${count} <input type="hidden" name="bpids[]" value="${null}"></td>
                        <td class="col-1"><input name="beneficiaries_ids[]" class="form-control" type="text" value="${beneficiaryId}"></td>
                        <td class="col-3"><input name="beneficiaries_names[]" class="form-control" type="text" value="${beneficiaryName}" disabled></td>
                        <td class="col-2"><input name="amounts[]" class='form-control' type="text" ></td>
                        <td class="col-2">
                            <select class="form-control" name="currencies[]">
                                <option disabled selected>العملة</option>
                                <option value="ILS">شيكل</option>
                                <option value="USD">دولار</option>
                                <option value="EUR">يورو</option>
                                <option value="GBP">جنيه</option>
                                <option value="CAD">دولار كندي</option>
                            </select>
                        </td>
                        <td class="col-1">
                            <a class="btn btn-danger remove-payment" href="#" role="button">حذف</a>
                        </td>
                    </tr>`
    );
    count+=1;
});


