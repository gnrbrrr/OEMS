$(document).ready(function() {
  console.log('MASTERLIST(Equipment) - READY');
  EQUIPMENT.load_data();
});

const EQUIPMENT = (function() {
  var this_equipment = {};
  var _all_equipment_data = {};
  var _curr_id;

  this_equipment.load_data = function() {
    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Equipment/load`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        // console.log(data);

        _all_equipment_data = data;

        var tbody = '';
        var x = 1;

        $.each(data['data'], function() {
          year_made = new Date(this.date_made);
          // arrival_date = new Date(this.arrival_date);
          year = year_made.getFullYear();

          tbody += `<tr class=status_${this.status}>
                        <td>${x}</td>
                        <td>
                        <a onclick="EQUIPMENT.edit(${this.id})" title="Edit Equipment"><i style="color:#1c648f;" class="fa fa-edit fa-2x" ></i ></a >&nbsp&nbsp
                        &nbsp&nbsp<a onclick="EQUIPMENT.change_status(${this.id})" title="Delete Equipment"><i style="color:#1c648f;" class="fa fa-trash-o fa-2x"></i></a>
                        </td>
                        <td>${this.equipment_name}</td>
                        <td>${this.model}</td>
                        <td>${this.equipment_controller}</td>
                        <td>${this.serial_number}</td>
                        <td>${this.fixed_asset_number}</td>
                        <td>${this.working_capacity}</td>
                        <td>${this.manufacturer}</td>
                        <td>${this.line}</td>
                        <td>${this.equipment_location}</td>
                        <td>${this.section}</td>
                        <td>${year}</td>
                        <td>${this.date_arrived}</td>
                        <td>${this.remarks}</td>
                        </tr>`;
          x++;
        });

        $.each(data, function(key, value) {
          // console.log(key);

          $.each(data[key], function(key2, value2) {
            // if (key != 'data') console.log(`${key} : ${value2}`);
            if (key != 'data') {
              $('#list_' + key).append(
                $('<option>', { value: value2.toUpperCase() }).text(
                  value2.toUpperCase()
                )
              );
            }
          });
        });

        $('#tbl_equipment')
          .DataTable()
          .destroy();
        $('#tbl_equipment tbody').html(tbody);
        $('#tbl_equipment').DataTable();
      }
    });
    // alert('wew');
  };

  this_equipment.edit = function(id) {
    _curr_id = id;

    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Equipment/${id}`,
      dataType: 'json',
      cache: false,
      async: false,
      success: function(data) {
        console.log(data);

        EQUIPMENT.showModal_updateEquipment();

        $.get(`${_APP_URL}/upload/equipment/${data.equipment_name}.jpg`)
          .done(function() {
            $('#img_equipment').attr(
              'src',
              `/OEMS/public/upload/equipment/${data.equipment_name}.jpg`
            );
          })
          .fail(function() {
            $('#img_equipment').attr(
              'src',
              `/OEMS/public/upload/machine/image.png`
            );
          });

        $('#txt_equipment_name').val(data.equipment_name);
        $('#txt_model').val(data.model);
        $('#txt_controller').val(data.equipment_controller);
        $('#txt_serial_number').val(data.serial_number);
        $('#txt_fixed_asset_number').val(data.fixed_asset_number);
        $('#txt_manufacturer').val(data.manufacturer);
        $('#txt_working_capacity').val(data.working_capacity);
        $('#txt_line').val(data.line);
        $('#txt_equipment_location').val(data.equipment_location);
        $('#txt_section').val(data.section);
        $('#txt_date_made').val(data.date_made);
        $('#txt_arrival_date').val(data.date_arrived);
        $('#txt_remarks').val(data.remarks);
      }
    });
  };

  this_equipment.update = function() {
    // alert(_curr_id)
    var new_data = {};
    new_data['_method'] = 'PATCH';
    new_data['_token'] = _TOKEN;
    var data = $('#form_equipment_registration').serializeArray();
    $.each(data, function(key, value) {
      new_data[value.name] = value.value;
    });

    $.ajax({
      type: 'post',
      url: `${_APP_URL}/Equipment/${_curr_id}`,
      dataType: 'json',
      data: new_data,
      cache: false,
      success: function(data) {
        // console.log(data);
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
            message: 'Equipment Updated Successfully'
          });

          // $('#img_profile').attr('src','');

          $('#form_equipment_registration').trigger('reset');

          $('#mdl_equipment_registration').modal('hide');
          EQUIPMENT.load_data();
        }
      }
    });
  };

  this_equipment.change_status = function(id) {
    iziToast.error({
      title: 'WARNING',
      message: 'Delete button function is still on development progress'
    });
  };

  this_equipment.showModal_updateEquipment = function() {
    // console.log(_all_equipment_data);
    $('#mdl_equipment_registration').modal({
      backdrop: 'static',
      keyboard: false
    });

    $('#list_equipment_name').empty();
    $('#list_machine_location').empty();
    $('#list_user').empty();
    $('#list_line').empty();


    $.each(_all_equipment_data, function(key, value) {
      console.log(key);
      $.each(_all_equipment_data[key], function(key2, value2) {
        // if (key != 'data') console.log(`${key} : ${value2}`);
        if (key != 'data') {
          $(`#list_${key}`).append(
            $('<option>', { value: value2.toUpperCase() }).text(
              value2.toUpperCase()
            )
          );
        }
      });
    });

  };

  $('#txt_equipment_name').focusout(function() {
    // alert($(this).val().toUpperCase());

    var equipment_name = $(this)
      .val()
      .toUpperCase();
    $('#list_model').empty();
    $('#list_controller').empty();
    $('#list_manufacturer').empty();
    $('#txt_model').val('');
    $('#txt_controller').val('');
    $('#txt_manufacturer').val('');

    if (
      $(this).val() == '' ||
      $(this).val() == null ||
      $(this).val() == undefined
    ) {
      return 0;
    }
    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Equipment/equipment_name/${equipment_name}`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        $.each(data, function(key, value) {
          // console.log(key);
          $.each(data[key], function(key2, value2) {
            // if (key != 'data') console.log(`${key} : ${value2}`);
            if (key != 'data') {
              $(`#list_${key}`).append(
                $('<option>', { value: value2.toUpperCase() }).text(
                  value2.toUpperCase()
                )
              );
            }
          });
        });
      }
    });
  });

  $('#btn_cancel*').click(function() {
    $('#mdl_equipment_registration').modal('hide');
    $('#form_equipment_registration').trigger('reset');

    $('#img_equipment').attr('src', '');
    $('#img_equipment').attr('src', '/OEMS/public/upload/machine/image.png');
  });

  $('#form_equipment_registration').on('submit', function(event) {
    event.preventDefault();
    $.ajax({
      url: 'registration', // Url to which the request is send
      type: 'POST', // Type of request to be send, called as method
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false, // To send DOMDocument or non processed data file it is set to false
      success: function(data) {
        // console.log(data);
        
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
            message: 'Equipment created successfully'
          });

          $('#img_equipment').attr(
            'src',
            '/OEMS/public/upload/machine/image.png'
          );
          $('#form_equipment_registration').trigger('reset'); 
        }
      }
    });
  });

  return this_equipment;
})();
