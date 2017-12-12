//$(document).ready(function () {
//    $('.delete').on('click', function () {
//        var choice = confirm('Do you really want to delete this record?');
//        if (choice === true) {
//            return true;
//              location.reload();
//        }
//        return false;
//    });
//});

function checkDelete() {
    var choice = confirm('Are you sure?');
    if (choice === true) {

        //location.href
        //window.location.href.reload();
        return true;

    }
    return false;
}


$(document).ready(function () {
    $(".zwsdatepicker").datepicker();
    $("#days_available").multiDatesPicker();
});


jQuery(document).ready(function () {

    jQuery('#addhere').on('click', function () {

        // $('#appendgroup').append('<tr><td><input type="text"></td><td>111</td></tr>');
        $('#appendgroup').append('<tr class="form-field form-required"><th scope="row"> <label>More Volunteer name :</label></th><td><input name="more_volunteer_name[]" type="text" ></td><th scope="row"> <label>More Volunteer Email :</label></th><td><input name="more_volunteer_email[]" type="text" required=""></td></tr>');

    });

});


//for timer

$(document).ready(function () {
    // find the input fields and apply the time select to them.
    $('#s2Time2').ptTimeSelect({
        onBeforeShow: function (i) {
            $('#sample2-data')
                    .append(
                            'onBeforeShow(event) Input field: [' +
                            $(i).attr('name') +
                            "], value: [" +
                            $(i).val() +
                            "]<br>");
        },
        onClose: function (i) {
            $('#sample2-data')
                    .append(
                            'onClose(event)Time selected: ' +
                            $(i).val() +
                            "<br>");
        }
    }); //end ptTimeSelect()
}); // end ready()


//for new time ranger

jQuery(document).ready(function () {

    jQuery('#times_available').daterangepicker({

        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'h:mm A'
        }
    }); //end ptTimeSelect()

});

//old timer
$(document).ready(function () {
    // find the input fields and apply the time select to them.
    $('#s2Time2').ptTimeSelect({
        onBeforeShow: function (i) {
            $('#sample2-data')
                    .append(
                            'onBeforeShow(event) Input field: [' +
                            $(i).attr('name') +
                            "], value: [" +
                            $(i).val() +
                            "]<br>");
        },
        onClose: function (i) {
            $('#sample2-data')
                    .append(
                            'onClose(event)Time selected: ' +
                            $(i).val() +
                            "<br>");
        }
    }); //end ptTimeSelect()
}); // end ready()

//printing code

 

function printDivAdultForm(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  
  function printDivGroupForm(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  function printDivYouthForm(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}