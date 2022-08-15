let beneficiaryId='';
let sponsorId='';



//fetch data
$(document).on('click', '#search-but', function () {
    fetchData()
});


//function to fetch data
function fetchData() {
    $('tbody').empty();
    //remove th from table
    $('#ops').remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/api/payments',
        type: 'GET',
        data: {
            beneficiaryId: beneficiaryId,
            sponsorId: sponsorId,
            payment_no: $('#payment-no').val(),
            led_no: $('#led-no').val(),
            start_date: $('#start-date').val(),
            end_date: $('#end-date').val(),
        },
        success: function (data) {
            $.each(data.data, function (key, value) {
                console.log(value);
                $('tbody').append(
                    `
                    <tr>
                            <td>${key+1}</td>
                            <td>${value.id}</td>
                            <td>${value.ledger_number}</td>
                            <td>${value.sponsor_name}</td>
                            <td>${value.creation_date}</td>
                            <td>${value.total_amount}</td>
                            <td>شيكل</td>
                            <td>${value.beneficiaries_count}</td>
                        </tr>
                    `
                );
            });
        }
    });
}


//handle showing and hiding of search form
$('#search-button').on('click', function() {
    if ($('.search-card').css('display') === 'none') {
    $('.search-card').css('display', 'block');
    } else {
    $('.search-card').css('display', 'none');
    }
});

//handle autocomplete beneficiaries name for search form
$('#beneficiary-name').on('keyup', function() {
    let path = "http://127.0.0.1:8000/api/autocomplete/benf/name";
    $('#beneficiary-name').typeahead({
        source: function (query, process) {
            return $.get(path, {query: query}, function (data) {
                return process(data);
            });
        },
        displayText: function (item) {
            return item.name;
        },
        afterSelect: function (item) {
            beneficiaryId = item.id;
        },
        //show hints
        hint: true,
        //show suggestions
        minLength: 0,
        //show all results on focus
        items:'all',
        //show all data in the dropdown list
        showAll: true,
        autoFocus: true,
    });
    }
);

//handle autocomplete sponsors name for search form
$('#sponsor-name').on('keyup', function() {
        let path = "http://127.0.0.1:8000/api/autocomplete/spons/name";
        $('#sponsor-name').typeahead({
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    return process(data);
                });
            },
            displayText: function (item) {
                return item.name;
            },
            afterSelect: function (item) {
                sponsorId = item.id;
            },
            //show hints
            hint: true,
            //show suggestions
            minLength: 0,
            //show all results on focus
            items: 'all',
            //show all data in the dropdown list
            showAll: true,
            autoFocus: true,
        });
    }
)

//handle search form submit
$(document).on('click', '#search-button', function() {

});

