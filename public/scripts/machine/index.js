$(document).ready(function () {

    console.log('ready');
    MACHINE.load_data();

});




var MACHINE = (function () {

    var this_machine = {};

    var all_machine_data = {};


    this_machine.file_preview = function (input) {
        if (input != undefined && (input.files && input.files[0])) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_machine').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
        }
    };

    this_machine.load_data = function () {
        $.ajax({
            type: 'get',
            url: 'Machine/load',
            dataType: 'json',
            cache: false,
            success: function (data) {
                console.log(data);

                all_machine_data = data;

                var tbody = '';
                var x = 1;
                var status = 'Good';

                $.each(data['data'], function () {
                    status = (this.status === 'Good Condition' ? 'Good' : this.status);
                    year_made = new Date(this.date_made);
                    // arrival_date = new Date(this.arrival_date);
                    year = year_made.getFullYear();

                    tbody += '<tr class=machine_' + status + '>' +
                        '<td>' + x + '</td>' +
                        '<td style="vertical-align:bottom;">' +
                        '<a onclick="MACHINE.edit('+ this.id +')" title="Add Machine"><i style="color:#305e79;" class="fa fa-plus fa-2x" ></i ></a >&nbsp&nbsp'+
                        '&nbsp&nbsp<a onclick="MACHINE.change('+ this.id +')" title="View History"><i style="color:#305e79;" class="fa fa-history fa-2x"></i></a>'+
                        '</td>' +
                        '<td>' + this.control_number.toUpperCase() + '</td>' +
                        '<td>' + this.machine_name.toUpperCase() + '</td>' +
                        '<td>' + this.model.toUpperCase() + '</td>' +
                        '<td>' + this.machine_controller.toUpperCase() + '</td>' +
                        '<td>' + this.serial_number.toUpperCase() + '</td>' +
                        '<td>' + this.fixed_asset_number.toUpperCase() + '</td>' +
                        '<td>' + this.padlock_number.toUpperCase() + '</td>' +
                        '<td>' + this.manufacturer.toUpperCase() + '</td>' +
                        '<td>' + this.working_capacity.toUpperCase() + '</td>' +
                        '<td>' + this.machine_location.toUpperCase() + '</td>' +
                        '<td>' + this.line.toUpperCase() + '</td>' +
                        '<td>' + this.location_user.toUpperCase() + '</td>' +
                        '<td>' + year + '</td>' +
                        '<td>' + this.arrival_date + '</td>' +
                        '<td>' + this.remarks + '</td>' +
                        '</tr>';
                    x++;
                });

                $('#tbl_machine').DataTable().destroy();
                $('#tbl_machine tbody').html(tbody);
                $('#tbl_machine').DataTable();
            }
        });
        // alert('wew');
    }

    this_machine.showModal_addMachine = function () {
        // console.log('wew');
        $('#mdl_machine_registration').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#list_machine_name').empty();
        $('#list_machine_location').empty();
        $('#list_user').empty();
        $('#list_line').empty();

        $.each(all_machine_data['machine_name'], function (key, value) {
            $('#list_machine_name')
                .append($('<option>', { value: value.toUpperCase() })
                    .text(value.toUpperCase()));
        });

        $.each(all_machine_data['machine_location'], function (key, value) {
            $('#list_machine_location')
                .append($('<option>', { value: value.toUpperCase() })
                    .text(value.toUpperCase()));
        });

        $.each(all_machine_data['location_user'], function (key, value) {
            $('#list_user')
                .append($('<option>', { value: value.toUpperCase() })
                    .text(value.toUpperCase()));
        });

        $.each(all_machine_data['line'], function (key, value) {
            $('#list_line')
                .append($('<option>', { value: value.toUpperCase() })
                    .text(value.toUpperCase()));
        });
    }

    this_machine.edit = function (id) {
        // var id = $(this).attr('id');
        alert(id);
    };

    this_machine.change = function (id) {
        // var id = $(this).attr('id');
        alert(id);
    };

    $('#txt_machine_name').focusout(function () {
        // alert($(this).val().toUpperCase());

        var machine_name = $(this).val().toUpperCase();
        $('#list_model').empty();
        $('#list_machine_controller').empty();
        $('#list_manufacturer').empty();

        $.ajax({
            type: 'get',
            url: 'Machine/machine_name/' + machine_name,
            dataType: 'json',
            cache: false,
            success: function (data) {


                $.each(data['model'], function (key, value) {
                    $('#list_model')
                        .append($('<option>', { value: value.toUpperCase() })
                            .text(value.toUpperCase()));
                });

                $.each(data['machine_controller'], function (key, value) {
                    $('#list_machine_controller')
                        .append($('<option>', { value: value.toUpperCase() })
                            .text(value.toUpperCase()));
                });


                $.each(data['manufacturer'], function (key, value) {
                    $('#list_manufacturer')
                        .append($('<option>', { value: value.toUpperCase() })
                            .text(value.toUpperCase()));
                });



            }
        });
    });

    $('#form_machine_registration').on('submit', function (event) {
        event.preventDefault();

        $.ajax({
            url: 'Machine', // Url to which the request is send
            type: 'POST',             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                console.log(data);

                if (data.length > 0) {
                    $.each(data, function () {
                        iziToast.error({
                            title: 'WARNING',
                            message: this,
                        });
                    });
                }
                else {
                    iziToast.success({
                        title: 'SUCCESS',
                        message: 'Machine registered successfully',
                    });

                    $('#form_machine_registration').trigger('reset');
                    
                    $('#mdl_machine_registration').modal('hide');
                    MACHINE.load_data();

                }
            },
            error: function (data) {
                console.log(data);
            },
            complete: function (data) {
                $('#img_machine').attr('src', '');
                $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
            }
        });

    });

    /* $('#mdl_machine_registration').modal('hide', function () {
        
        $('#img_machine').attr('src', '');
        $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
        
    }); */

    $('#btn_cancel').click(function () {
        $('#mdl_machine_registration').modal('hide');
        $('#form_machine_registration').trigger('reset');

        $('#img_machine').attr('src', '');
        $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
    });
    return this_machine;
})();
