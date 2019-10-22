$(document).ready(function() {
  console.log('MASTERLIST(Machine)  - READY');
  MACHINE.load_data();
});

var MACHINE = (function() {
  var this_machine = {};

  var _all_machine_data = {};

  var _curr_id = 0;

  _actions = (position, id) => {
    if (position === 'Admin') {
      return `<a onclick="MACHINE.edit(${id})" title="Edit Machine"><i style="color:#1c648f;" class="fa fa-edit fa-2x" ></i ></a >&nbsp&nbsp
           &nbsp&nbsp<a onclick="MACHINE.change_status(${id})" title="Delete Machine"><i style="color:#1c648f;" class="fa fa-trash-o fa-2x"></i></a>`;
    } else {
      return `<a onclick="MACHINE.mdi(${id})" title="Machine Daily Inspection"><i style="color:#1c648f;" class="fa fa-check-square fa-2x" ></i ></a >&nbsp&nbsp
           &nbsp&nbsp<a onclick="MACHINE.mdi_summary(${id})" title="MDI Summary"><i style="color:#1c648f" class="fa fa-bars fa-2x"></i ></a>`;
    }
  };

  this_machine.mdi_summary = id => {
    alert(`MDI SUMMARY FOR : ${id}`);
  };

  this_machine.mdi = id => {
    alert(`Machine Daily Inspection FOR : ${id}`);
  };

  this_machine.load_data = ()  => {
    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Machine/load`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        console.log(data);

        _all_machine_data = data['machine_data'];

        var tbody = '';
        var x = 1;

        $.each(_all_machine_data['data'], function() {
          year_made = new Date(this.date_made);
          // arrival_date = new Date(this.arrival_date);
          year = year_made.getFullYear();

          tbody += `<tr class=status_${this.status}>
                        <td>${x}</td>
                        <td>${_actions(data.user_credentials, this.id)}</td>
                        <td> ${this.control_number.toUpperCase()}</td>
                        <td>${this.machine_name.toUpperCase()}</td>
                        <td>${this.model.toUpperCase()}</td>
                        <td>${this.machine_controller.toUpperCase()}</td>
                        <td>${this.serial_number.toUpperCase()}</td>
                        <td>${this.fixed_asset_number.toUpperCase()}</td>
                        <td>${this.padlock_number.toUpperCase()}</td>
                        <td>${this.manufacturer.toUpperCase()}</td>
                        <td>${this.working_capacity.toUpperCase()}</td>
                        <td>${this.machine_location.toUpperCase()}</td>
                        <td>${this.line.toUpperCase()}</td>
                        <td>${this.section.toUpperCase()}</td>
                        <td>${year}</td>
                        <td>${this.date_arrived}</td>
                        <td>${this.remarks}</td>
                        </tr>`;
          x++;
        });

        $('#tbl_machine')
          .DataTable()
          .destroy();
        $('#tbl_machine tbody').html(tbody);
        $('#tbl_machine').DataTable();
      }
    });
    // alert('wew');
  };

  this_machine.showModal_updateMachine = () => {
    // console.log('wew');
    $('#mdl_machine_registration').modal({
      backdrop: 'static',
      keyboard: false
    });
    $('#list_machine_name').empty();
    $('#list_machine_location').empty();
    $('#list_user').empty();
    $('#list_line').empty();

    $.each(_all_machine_data['machine_name'], function(key, value) {
      $('#list_machine_name').append(
        $('<option>', { value: value.toUpperCase() }).text(value.toUpperCase())
      );
    });

    $.each(_all_machine_data['machine_location'], function(key, value) {
      $('#list_machine_location').append(
        $('<option>', { value: value.toUpperCase() }).text(value.toUpperCase())
      );
    });

    $.each(_all_machine_data['section'], function(key, value) {
      $('#list_user').append(
        $('<option>', { value: value.toUpperCase() }).text(value.toUpperCase())
      );
    });

    $.each(_all_machine_data['line'], function(key, value) {
      $('#list_line').append(
        $('<option>', { value: value.toUpperCase() }).text(value.toUpperCase())
      );
    });
  };

  this_machine.edit = (id) => {
    _curr_id = id;

    $('#mdl_machine_registration').modal({
      backdrop: 'static',
      keyboard: false
    });

    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Machine/${id}`,
      dataType: 'json',
      cache: false,
      async: false,
      success: function(data) {
        // console.log(data);

        MACHINE.showModal_updateMachine();

        $.get(`${_APP_URL}/upload/machine/${data.image_name}`)
          .done(function() {
            $('#img_machine').attr(
              'src',
              `/OEMS/public/upload/machine/${data.image_name}`
            );
          })
          .fail(function() {
            $('#img_machine').attr(
              'src',
              `/OEMS/public/upload/machine/image.png`
            );
          });

        $('#txt_control_number').val(data.control_number);
        $('#txt_machine_name').val(data.machine_name);
        $('#txt_model').val(data.model);
        $('#txt_machine_controller').val(data.machine_controller);
        $('#txt_manufacturer').val(data.manufacturer);
        $('#txt_serial_number').val(data.serial_number);
        $('#txt_date_made').val(data.date_made);
        $('#txt_section').val(data.section);
        $('#txt_machine_location').val(data.machine_location);
        $('#txt_line').val(data.line);
        $('#txt_fixed_asset_number').val(data.fixed_asset_number);
        $('#txt_arrival_date').val(data.date_arrived);
        $('#txt_padlock_number').val(data.padlock_number);
        $('#txt_working_capacity').val(data.working_capacity);
        $('#txt_remarks').val(data.remarks);
        // $('#txt_image_filename').val(data.image_name);

        $('.div_btn_store').hide();
        $('.div_form_group').hide();

        $('.div_btn_update').show();
        $('.div_image_filename').show();
      }
    });
  };

  this_machine.change_status = (id) => {
    iziToast.error({
      title: 'WARNING',
      message: 'Delete button function is still on development progress'
    });
  };

  this_machine.update = () => {
    // alert(`${_curr_id} : MACHINE ID`);
    var new_data = {};
    new_data['_method'] = 'PATCH';
    new_data['_token'] = _TOKEN;
    var data = $('#form_mdl_machine_registration').serializeArray();
    $.each(data, function(key, value) {
      new_data[value.name] = value.value;
    });

    $.ajax({
      type: 'post',
      url: `${_APP_URL}/Machine/${_curr_id}`,
      dataType: 'json',
      data: new_data,
      cache: false,
      success: function(data) {
        if (data.length > 0) {
          // console.log(data);
          $.each(data, function() {
            iziToast.error({
              title: 'WARNING',
              message: this
            });
          });
        } else {
          iziToast.success({
            title: 'SUCCESS',
            message: 'Machine Updated Successfully'
          });

          // $('#img_profile').attr('src','');

          $('#form_mdl_machine_registration').trigger('reset');

          $('#mdl_machine_registration').modal('hide');
          MACHINE.load_data();
        }
      }
    });
  };

  $('#txt_machine_name').focusout(() => {
    // alert($(this).val().toUpperCase());

    var machine_name = $(this)
      .val()
      .toUpperCase();
    $('#list_model').empty();
    $('#list_machine_controller').empty();
    $('#list_manufacturer').empty();
    $('#txt_model').val('');
    $('#txt_machine_controller').val('');
    $('#txt_manufacturer').val('');

    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Machine/machine_name/${machine_name}`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        $.each(data['model'], function(key, value) {
          $('#list_model').append(
            $('<option>', { value: value.toUpperCase() }).text(
              value.toUpperCase()
            )
          );
        });

        $.each(data['machine_controller'], function(key, value) {
          $('#list_machine_controller').append(
            $('<option>', { value: value.toUpperCase() }).text(
              value.toUpperCase()
            )
          );
        });

        $.each(data['manufacturer'], function(key, value) {
          $('#list_manufacturer').append(
            $('<option>', { value: value.toUpperCase() }).text(
              value.toUpperCase()
            )
          );
        });
      }
    });
  });

  $('#form_mdl_machine_registration').on('submit', (event) => {
    event.preventDefault();

    $.ajax({
      url: `${_APP_URL}Machine`, // Url to which the request is send
      type: 'POST', // Type of request to be send, called as method
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false, // To send DOMDocument or non processed data file it is set to false
      success: function(
        data // A function to be called if request succeeds
      ) {
        console.log(data);

        if (data.length > 0) {
          $.each(data, function() {
            iziToast.error({
              title: 'WARNING',
              message: this
            });
          });
        } else {
          iziToast.success({
            title: 'SUCCESS',
            message: 'Machine registered successfully'
          });

          $('#form_mdl_machine_registration').trigger('reset');

          $('#mdl_machine_registration').modal('hide');
          MACHINE.load_data();
        }
      },
      error: function(data) {
        console.log(data);
      },
      complete: function(data) {
        $('#img_machine').attr('src', '');
        $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
      }
    });
  });

  $('#btn_cancel*').click(() => {
    $('.div_btn_store').show();
    $('.div_btn_update').hide();
    $('#mdl_machine_registration').modal('hide');
    $('#form_mdl_machine_registration').trigger('reset');

    $('#img_machine').attr('src', '');
    $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
  });
  return this_machine;
})();
