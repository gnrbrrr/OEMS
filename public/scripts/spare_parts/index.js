$(document).ready(function() {
  console.log('SPARE_PARTS(Masterlist)  - READY');
  SPARE_PARTS.load_data();
});

var SPARE_PARTS = (function() {
  var this_spare_parts = {};

  var _all_spare_parts = {};

  var _curr_id = 0;

  this_spare_parts.load_data = function() {
    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Spare_Parts/load`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        // console.log(data);
        _all_spare_parts = data;
        var tbody = '';
        var x = 1;

        $.each(_all_spare_parts['data'], function() {
          tbody += `<tr class=status_${this.status}>
                        <td>${x}</td>
                        <td>
                        <a onclick="SPARE_PARTS.edit(${
                          this.id
                        })" title="Edit Spare Parts"><i style="color:#1c648f;" class="fa fa-edit fa-2x" ></i ></a >&nbsp&nbsp
                        &nbsp&nbsp<a onclick="SPARE_PARTS.change_status(${
                          this.id
                        })" title="Delete Spare Parts"><i style="color:#1c648f;" class="fa fa-trash-o fa-2x"></i></a>
                        </td>
                        <td>${this.code.toUpperCase()}</td>
                        <td>${this.name.toUpperCase()}</td>
                        <td>${this.type.toUpperCase()}</td>
                        <td>${this.brand}</td>
                        <td>${this.specification}</td>
                        <td>${this.supplier.toUpperCase()}</td>
                        <td>${this.line.toUpperCase()}</td>
                        <td>${this.location.toUpperCase()}</td>
                        <td>${this.stock_quantity}</td>
                        <td>${this.minimum_stock}</td>
                        <td>${this.unit.toUpperCase()}</td>
                        <td>${this.currency.toUpperCase()}</td>
                        <td>${this.price}</td>
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

        $('#tbl_spare_parts')
          .DataTable()
          .destroy();
        $('#tbl_spare_parts tbody').html(tbody);
        $('#tbl_spare_parts').DataTable();
      }
    });
    // alert('wew');
  };

  this_spare_parts.showModal_updateMachine = function() {
    // console.log('wew');
    $('#mdl_spare_parts_registration').modal({
      backdrop: 'static',
      keyboard: false
    });

    $('#list_brand').empty();
    $('#list_currency').empty();
    $('#list_line').empty();
    $('#list_location').empty();
    $('#list_specification').empty();
    $('#list_supplier').empty();
    $('#list_type').empty();
    $('#list_unit').empty();

    $.each(_all_spare_parts, function(key, value) {
      $.each(_all_spare_parts[key], function(i, item) {
        if (key != 'data' && value != '' && item != null) {
          $(`#list_${key}`).append(
            $('<option>', { value: item.toUpperCase() }).text(
              item.toUpperCase()
            )
          );
          // console.log(`${key} : ${i} => ${item}`)
        }
      });
    });
  };

  this_spare_parts.edit = function(id) {
    _curr_id = id;

    $('#mdl_spare_parts_registration').modal({
      backdrop: 'static',
      keyboard: false
    });

    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Spare_Parts/${id}`,
      dataType: 'json',
      cache: false,
      async: false,
      success: function(data) {
        console.log(data);

        SPARE_PARTS.showModal_updateMachine();

        $('#txt_sp_code').val(data.code);
        $('#txt_sp_name').val(data.name);
        $('#txt_sp_type').val(data.type);
        $('#txt_sp_brand').val(data.brand);
        $('#txt_sp_specs').val(data.specification);
        $('#txt_sp_supplier').val(data.supplier);
        $('#txt_sp_line').val(data.line);
        $('#txt_sp_location').val(data.location);
        $('#txt_sp_stock').val(data.stock_quantity);
        $('#txt_sp_minimum').val(data.minimum_stock);
        $('#txt_sp_unit').val(data.unit);
        $('#txt_sp_alt_unit').val(data.alternative_unit);
        $('#txt_sp_currency').val(data.currency);
        $('#txt_sp_price').val(data.price);
        $('#txt_sp_remarks').val(data.remarks);
        // $('#txt_sp_remarks').val(data.remarks == '' || data.remarks == null || data.remarks == undefined ? '-' : data.remarks);
      }
    });
  };

  this_spare_parts.change_status = function(id) {
    iziToast.error({
      title: 'WARNING',
      message: 'Delete button function is still on development progress'
    });
  };

  this_spare_parts.update = function() {
    // alert(`${_curr_id} : SPARE_PARTS ID`);
    var new_data = {};
    new_data['_method'] = 'PATCH';
    new_data['_token'] = _TOKEN;
    var data = $('#form_spare_parts_registration').serializeArray();
    $.each(data, function(key, value) {
      var array_value = value.value;

      if (
        value.name == 'txt_sp_remarks' ||
        value.name == 'txt_sp_brand' ||
        value.name == 'txt_sp_specs'
      ) {
        if (
          value.value == '' ||
          value.value == null ||
          value.value == undefined
        ) {
          array_value = 'N/A';
        }
      }

      new_data[value.name] = array_value;
    });

    //  console.log(new_data);

    $.ajax({
      type: 'post',
      url: `Spare_Parts/${_curr_id}`,
      dataType: 'json',
      data: new_data,
      cache: false,
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
            message: 'Spare Parts Updated Successfully'
          });

          // $('#img_profile').attr('src','');

          $('#form_spare_parts_registration').trigger('reset');

          $('#mdl_spare_parts_registration').modal('hide');
          SPARE_PARTS.load_data();
        }
      }
    });
  };

  $('#form_spare_parts_registration').on('submit', function(event) {
    event.preventDefault();

    $.ajax({
      url: `registration`, // Url to which the request is send
      type: 'POST', // Type of request to be send, called as method
      data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false, // The content type used when sending data to the server.
      cache: false, // To unable request pages to be cached
      processData: false, // To send DOMDocument or non processed data file it is set to false
      success: function(data) {
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
            message: 'Spare Part registered successfully'
          });





          $('#form_spare_parts_registration').trigger('reset');
        }
      }
    });
  });

  $('#btn_cancel*').click(function() {
    $('.div_btn_store').show();
    $('.div_btn_update').hide();
    $('#mdl_spare_parts_registration').modal('hide');
    $('#form_spare_parts_registration').trigger('reset');

    $('#img_machine').attr('src', '');
    $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
  });

  return this_spare_parts;
})();
