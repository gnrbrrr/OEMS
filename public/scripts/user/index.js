$(document).ready(function () {


    console.log('ready');
    USER.load_data(0);


    $('#form_create_user').on('submit', function (event) {
        event.preventDefault();

        $.ajax({
            url: 'User', // Url to which the request is send
            type: 'POST',             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {

                if (data.length > 0) {
                    console.log(data);
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
                        message: 'User created successfully',
                    });

                    // $('#img_profile').attr('src','');
                    $('#img_profile').attr('src', '/OEMS/public/upload/user/sample-user.png');
                    $('#form_create_user').trigger('reset');
                    USER.load_data(0);

                }
            },
            error: function (data) {
                console.log(data);
            }
        })

    });

    $("input[name*='rad_status']:radio").click(function () {
        var rad_value = parseInt($(this).val());
        // console.log(rad_value);
        USER.load_data(rad_value);
    });

});




var USER = (function () {

    var this_user = {};
    var _curr_id = 0;

    this_user.file_preview = function (input) {
        if (input != undefined && (input.files && input.files[0])) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#img_profile').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else {
            $('#img_profile').attr('src', '/OEMS/public/upload/user/sample-user.png');
        }
    };



    this_user.load_data = function (status) {

        var table_status = (status === 0 ? 'Deactivate' : 'Activate');

        $.ajax({
            type: 'get',
            url: 'User/load/' + status,
            dataType: 'json',
            cache: false,
            success: function (data) {
                // console.log(data);
                var tbody = '';
                var x = 0;

                $.each(data, function () {
                    tbody +=
                        '<tr>' +
                        '   <td>' +
                        '       <div>' +
                        '           <table class="table" style="margin-bottom:0px;">' +
                        '               <tr>' +
                        '                   <td rowspan=3 align="center" style="vertical-align:middle" class="td_value">' +
                        '                       <img id="img_profile" src="/OEMS/public/upload/user/' + data[x].image + '" class="img-thumbnail" style="border-radius: 100%;" width="150">' +
                        '                   </td>' +
                        '                   <td colspan=2>' +
                        '                       <h3>' + data[x].lastname + ', ' + data[x].firstname + ' ' + data[x].middlename + '</h3>' +
                        '                    </td>' +
                        '                   <td style="vertical-align:middle" colspan=2>' +
                        '                       <div class="btn-group">' +
                        '                           <button type="button" onclick="USER.edit(' + data[x].id + ')" class="btn btn-default btn-sm" data-toggle="tooltip" title="Edit User"><i class="fa fa-edit u-controls"></i></button>' +
                        '                           <button type="button" onclick="USER.reset_password(' + data[x].id + ')" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Reset Password" ><i class="fa fa-refresh u-controls"></i></button>' +
                        '                           <button type="button" onclick="USER.change_status(' + data[x].id + ',' + status + ')" class="btn btn-default btn-sm ' + table_status + '" data-toggle="tooltip" data-placement="top" title="'+ table_status +'">' + table_status + '</button>' +
                        '                       </div>' +
                        '                   </td>' +
                        '               </tr>' +

                        '               <tr>' +
                        '                   <td class="td_label"><h5>Employee ID:</h5></td>' +
                        '                   <td class="td_value"><h5 class="bold">' + data[x].employee_number + '</h5></td>' +

                        '                   <td class="td_label"><h5>Section:</h5></td>' +
                        '                   <td class="td_value"><h5 class="bold">' + data[x].section + '</h5></td>' +
                        '               </tr>' +
                        '               <tr>' +
                        '                   <td class="td_label"><h5>Position:</h5></td>' +
                        '                   <td class="td_value"><h5 class="bold">' + data[x].position + '</h5></td>' +

                        '                   <td class="td_label"><h5>Designation:</h5></td>' +
                        '                   <td class="td_value"><h5 class="bold">' + data[x].designation + '</h5></td>' +
                        '               </tr>' +
                        '           </table>' +
                        '       </div>' +
                        '   </td>' +
                        '</tr>';

                    x++;

                });

                $('#tbl_user').DataTable().destroy();
                $('#tbl_user tbody').html(tbody);
                $('#tbl_user').DataTable();
            }
        });
    }

    this_user.change_status = function (id, status) {

        var eqivalent_status = (status == 0 ? 'deactivate' : 'activate');

        iziToast.warning({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 9999,
            title: 'WARNING',
            message: 'Are you sure you want to <b>' + eqivalent_status + '</b> this user?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {

                    $.ajax({
                        type: 'POST',
                        url: _APP_URL + '/User/change_status',
                        data:
                        {
                            _token: _TOKEN,
                            _method: 'PATCH',
                            id: id,
                            status: status
                        },
                        cache: false,
                        success: function (data) {

                            iziToast.success({
                                title: 'SUCCESS',
                                message: 'User created successfully',
                            });

                            USER.load_data(0);
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    });

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }, true],
                ['<button>NO</button>', function (instance, toast) {

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ]
        });
    }

    this_user.edit = function (id) {
        $.ajax({
            type: 'get',
            url: 'User/' + id,
            dataType: 'json',
            cache: false,
            success: function (data) {
                console.log(data);

                _curr_id = id;

                $('#div_form_group').hide();

                $('#txt_img_filename').show().val(data.image);
                $('#txt_firstname').val(data.firstname);
                $('#txt_middlename').val(data.middlename);
                $('#txt_lastname').val(data.lastname);
                $('#txt_email').val(data.email);
                $('#slc_position').val(data.position);
                $('#slc_designation').val(data.designation);
                $('#slc_section').val(data.section);
                $('#txt_employee_num').val(data.employee_number);
                // $('#img_filename_hidden').val(data.image);

                $('#img_profile').attr('src', '/OEMS/public/upload/user/' + data.image);

                $('#form_control2').show();

                // $('#div_form_pass').hide();

                $("div[id*='div_form_pass']").hide();

                $('#btn_reset_pass').hide();
                $('#form_control1').hide();
            }
        });
    }

    this_user.update = function () {

        var firstname = $('#txt_firstname').val();
        var middlename = $('#txt_middlename').val();
        var lastname = $('#txt_lastname').val();
        var email = $('#txt_email').val();
        var position = $('#slc_position').val();
        var designation = $('#slc_designation').val();
        var section = $('#slc_section').val();
        var employee_number = $('#txt_employee_num').val();

        $.ajax({
            type: 'POST',
            url: _APP_URL + '/User/' + _curr_id,
            data:
            {
                _token: _TOKEN,
                _method: "PATCH",
                firstname: firstname,
                middlename: middlename,
                lastname: lastname,
                email: email,
                position: position,
                designation: designation,
                section: section,
                employee_number: employee_number
            },
            cache: false,
            success: function (data) {

                if (data.length > 0) {
                    // console.log(data);
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
                        message: 'User created successfully',
                    });

                    // $('#img_profile').attr('src','');
                    $('#img_profile').attr('src', '/OEMS/public/upload/user/sample-user.png');
                    $('#form_create_user').trigger('reset');
                    USER.load_data(0);

                }
            },
            error: function (data) {
                console.log(data);
            },
            complete: function (data) {
                USER.cancel();
            }
        });



    }

    this_user.reset_password = function (id) {


        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 9999,
            title: 'WARNING',
            message: 'Are you sure you want to reset your password?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {

                    $.ajax({
                        type: 'POST',
                        url: _APP_URL + '/User/reset',
                        data: {
                            _token: _TOKEN,
                            _method: "PATCH",
                            id: id
                        },
                        cache: false,
                        success: function (data) {

                            console.log(data);
                            // if (data.length > 0) {

                            //     $.each(data, function () {
                            //         iziToast.error({
                            //             title: 'WARNING',
                            //             message: this,
                            //         });
                            //     });

                            // }
                            // else 
                            // {
                            iziToast.success({
                                position: 'bottomRight',
                                title: 'SUCCESS',
                                message: 'Please be noted that <b>employee number</b> will be its <b>new default password</b>.',
                            });
                            // }
                        },
                        error: function (data) {
                            console.log(data);
                        }

                    });

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }, true],
                ['<button>NO</button>', function (instance, toast) {

                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');

                }],
            ]
        });
    }

    this_user.cancel = function () {
        $('#form_create_user').trigger('reset');

        _curr_id = 0;
        $('#form_control2').hide();
        $('#btn_reset_pass').hide();
        $('#txt_img_filename').hide().val('');

        $('#img_profile').attr('src', '/OEMS/public/upload/user/sample-user.png');

        // $('#div_form_pass').show();

        $("div[id*='div_form_pass']").show();

        $('#form_control1').show();
        $('#div_form_group').show();
    }

    return this_user;
})();

