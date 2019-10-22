$(document).ready(function() {
  console.log('MACHINE(Registration) - READY');
  MACHINE.load_data();
});

var MACHINE = (function() {
  var this_machine = {};

  var all_machine_data = {};

  var all_equipment_data = {};

  var prop = '';
  var row_count_oil = 0;
  var row_count_spare = 0;
  var row_count_equipment = 0;

  _sched_details = function(sched) {
    var details = '';
    details += `<div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-black bold-text">

                      <div class="panel-heading" data-toggle="collapse" data-target="#div_oil_${sched}" aria-expanded="false">
                          <i class="fa fa-tint"></i><b class="panel-title">&nbsp;Oil Needed</b>&nbsp&nbsp<i class="fa fa-caret-down"></i>
                      </div>

                      <div class="panel-body text-center collapse" id="div_oil_${sched}" aria-expanded="false">
                        <div class="form-group">
                            <label for="txt_lubrication_type">Lubrication Type</label>
                            <select id="txt_lubrication_type_${sched}" name="txt_lubrication_type_${sched}" class="form-control">
                                <option value="N/A" selected="selected"></option>
                                <option value="CHANGE OIL">CHANGE OIL</option>
                                <option value="REFILL OIL">REFILL OIL</option>
                            </select>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <table class="table table-responsive" id="tbl_oil_${sched}">
                            <thead>
                              <tr>
                                <td>
                                  <a id="btn_add_oil_${sched}" onclick="MACHINE.add_oil('${sched}')">
                                    <i class="fa fa-plus-square" style="color:#305e79"></i>
                                  </a>
                                </td>
                                <td>Parts to be Lubricated</td>
                                <td>Recommended Lubricant</td>
                                <td>Unit Quantity</td>
                                <td>Lubricant Quantity(Liters)</td>
                                <td>Total (Liters)</td>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                          </div>
                        </div>
                          
                      </div>

                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-black bold-text">

                      <div class="panel-heading" data-toggle="collapse" data-target="#div_spare_${sched}" aria-expanded="false">
                          <i class="fa fa-gears"></i><b class="panel-title">&nbsp;Spare Parts Needed</b> &nbsp&nbsp<i class="fa fa-caret-down"></i>
                      </div>
                      <div class="panel-body text-center collapse" id="div_spare_${sched}" aria-expanded="false">
                       <div class="row">
                          <div class="col-lg-12">
                            <table class="table table-responsive" id="tbl_spare_${sched}">
                            <thead>
                              <tr>
                                <td>
                                  <a id="btn_add_spare_${sched}" onclick="MACHINE.add_spare('${sched}')">
                                    <i class="fa fa-plus-square" style="color:#305e79"></i>
                                  </a>
                                </td>
                                <td>Part Code</td>
                                <td>Part Name</td>
                                <td>Quantity</td>
                                <td>Unit Type</td>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-black bold-text">

                      <div class="panel-heading" data-toggle="collapse" data-target="#div_equipment_${sched}" aria-expanded="false">
                          <i class="fa fa-wrench"></i><b class="panel-title">&nbsp;Equipments Needed</b> &nbsp&nbsp<i class="fa fa-caret-down"></i>
                      </div>
                      <div class="panel-body text-center collapse" id="div_equipment_${sched}" aria-expanded="false">
                        <div class="row">
                          <div class="col-lg-12">
                            <table class="table table-responsive" id="tbl_equipment_${sched}">
                            <thead>
                              <tr>
                                <td>
                                  <a id="btn_add_equipment_${sched}" onclick="MACHINE.add_equipment('${sched}')">
                                    <i class="fa fa-plus-square" style="color:#305e79"></i>
                                  </a>
                                </td>
                                <td>Equipment Control Number</td>
                                <td>Model</td>
                                <td>Equipment Controller</td>
                                <td>Serial No.</td>
                                <td>Working Capacity</td>
                                <td>Line</td>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
                `;

    $(`#div_${sched}`).html(details);
    // console.log(`#div_${sched}`);
  };

  _quarterly = function() {
    prop += `
<div class="form-group form-group-bordered">
            <div class="row">
                <div class="col-lg-9">
                  <label for="txt_date" data-toggle="collapse" data-target="#div_q1">Input Quarter 1 PM Schedule &nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                  <input type="text" id="txt_date_sched_1" name="txt_date_sched_1" class="form-control" autocomplete="off"
                  onchange="MACHINE.change_first_schedule('quarterly')">
                </div>
                <div class="col-lg-3">
                  <label for="txt_date">Day</label>
                  <input type="text" id="txt_day_sched_1" class="form-control" readonly>
                </div>
            </div>

            <div class="panel-body container-fluid collapse" id="div_q1"></div>
</div>
            
<div class="form-group form-group-bordered">  
            <div class="row">
                <div class="col-lg-9">
                  <label for="txt_date" data-toggle="collapse" data-target="#div_q2">Quarter 2 PM Schedule &nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                  <input type="text" id="txt_date_sched_2" name="txt_date_sched_2" class="form-control" readonly>
                </div>
                <div class="col-lg-3">
                  <label for="txt_date">Day</label>
                  <input type="text" id="txt_day_sched_2" class="form-control" readonly>
                </div>
            </div>

            <div class="panel-body collapse" id="div_q2"></div>
</div>
<div class="form-group form-group-bordered">  
            <div class="row">
                <div class="col-lg-9">
                  <label for="txt_date" data-toggle="collapse" data-target="#div_q3">Quarter 3 PM Schedule &nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                  <input type="text" id="txt_date_sched_3" name="txt_date_sched_3" class="form-control" readonly>
                </div>
                <div class="col-lg-3">
                  <label for="txt_date">Day</label>
                  <input type="text" id="txt_day_sched_3" class="form-control" readonly>
                </div>
            </div>

            <div class="panel-body collapse" id="div_q3"></div>
</div>
<div class="form-group form-group-bordered">  
            <div class="row">
                <div class="col-lg-9">
                  <label for="txt_date" data-toggle="collapse" data-target="#div_q4">Annual PM Schedule &nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                  <input type="text" id="txt_date_sched_4" name="txt_date_sched_4" class="form-control" readonly>
                </div>
                <div class="col-lg-3">
                  <label for="txt_date">Day</label>
                  <input type="text" id="txt_day_sched_4" class="form-control" readonly> 
                </div>
            </div>
            
            <div class="panel-body collapse" id="div_q4"></div>
</div>`;

    $(`#div_form_sched`).html(prop);

    for (var i = 1; i < 5; i++) {
      _sched_details(`q${i}`);
      $(`#txt_date_sched_${i}`).datepicker();
    }
    // _sched_details(`q1`);
  };

  _semi_annual = function() {
    prop += ` <div class="form-group form-group-bordered">
                <div class="row">
                  <div class="col-lg-9">
                    <label for="txt_date" data-toggle="collapse" data-target="#div_s1">Input Semi Annual PM Schedule 1 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                    <input type="text" id="txt_date_sched_1" name="txt_date_sched_1" class="form-control" autocomplete="off"
                    onchange="MACHINE.change_first_schedule('semi_annual')">
                  </div>
                  <div class="col-lg-3">
                    <label for="txt_date">Day</label>
                    <input type="text" id="txt_day_sched_1" class="form-control" readonly>
                  </div>
                </div>
                
                <div class="panel-body collapse" id="div_s1"></div>
              </div>
              
            <div class="form-group form-group-bordered">
              <div class="row">
                <div class="col-lg-9">
                  <label for="txt_date" data-toggle="collapse" data-target="#div_s2">Semi Annual PM Schedule 2 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                  <input type="text" id="txt_date_sched_2" name="txt_date_sched_2" class="form-control" readonly>
                </div>
                <div class="col-lg-3">
                  <label for="txt_date">Day</label>
                  <input type="text" id="txt_day_sched_2" class="form-control" readonly>
                </div>
              </div>
                
              <div class="panel-body collapse" id="div_s2"></div>
            </div>`;
    $(`#div_form_sched`).html(prop);

    for (var i = 1; i < 3; i++) {
      _sched_details(`s${i}`);
      $(`#txt_date_sched_${i}`).datepicker();
    }
  };

  _annual = function() {
    prop += `<div class="form-group form-group-bordered">
              <div class="row">
                  <div class="col-lg-9">
                    <label for="txt_date" data-toggle="collapse" data-target="#div_a1">Input Annual PM Schedule 1 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                    <input type="text" id="txt_date_sched_1" name="txt_date_sched_1" class="form-control" autocomplete="off"
                    onchange="MACHINE.change_first_schedule('annual')">
                  </div>
                  <div class="col-lg-3">
                    <label for="txt_date">Day</label>
                    <input type="text" id="txt_day_sched_1" class="form-control" readonly>
                  </div>
              </div>

              <div class="panel-body collapse" id="div_a1"></div>
            </div>

            <div class="form-group form-group-bordered">
              <div class="row">
                  <div class="col-lg-9">
                    <label for="txt_date" data-toggle="collapse" data-target="#div_a2">Annual PM Schedule 2 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                    <input type="text" id="txt_date_sched_2" name="txt_date_sched_2" class="form-control" readonly>
                  </div>
                  <div class="col-lg-3">
                    <label for="txt_date">Day</label>
                    <input type="text" id="txt_day_sched_2" class="form-control" readonly>
                  </div>
              </div>

              <div class="panel-body collapse" id="div_a2"></div>
            </div>
            
            <div class="form-group form-group-bordered">
              <div class="row">
                  <div class="col-lg-9">
                    <label for="txt_date" data-toggle="collapse" data-target="#div_a3">Annual PM Schedule 3 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                    <input type="text" id="txt_date_sched_3" name="txt_date_sched_3" class="form-control" readonly>
                  </div>
                  <div class="col-lg-3">
                    <label for="txt_date">Day</label>
                    <input type="text" id="txt_day_sched_3" class="form-control" readonly>
                  </div>
              </div>
              
              <div class="panel-body collapse" id="div_a3"></div>
            </div>`;
    $(`#div_form_sched`).html(prop);

    for (var i = 1; i < 4; i++) {
      _sched_details(`a${i}`);
      $(`#txt_date_sched_${i}`).datepicker();
    }
  };

  _every_3 = function() {
    prop += ` <div class="form-group form-group-bordered">
                <div class="row">
                    <div class="col-lg-9">
                      <label for="txt_date" data-toggle="collapse" data-target="#div_e1">Input Every 3rd Year PM Schedule 1 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                      <input type="text" id="txt_date_sched_1" name="txt_date_sched_1" class="form-control" autocomplete="off"
                      onchange="MACHINE.change_first_schedule('every_3')">
                    </div>
                    <div class="col-lg-3">
                      <label for="txt_date">Day</label>
                      <input type="text" id="txt_day_sched_1" class="form-control" readonly>
                    </div>
                </div>
                
                <div class="panel-body collapse" id="div_e1"></div>
              </div>
              
            <div class="form-group form-group-bordered">
              <div class="row">
                <div class="col-lg-9">
                  <label for="txt_date" data-toggle="collapse" data-target="#div_e2">Every 3rd Year Schedule 2 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                  <input type="text" id="txt_date_sched_2" name="txt_date_sched_2" class="form-control" readonly>
                </div>
                <div class="col-lg-3">
                  <label for="txt_date">Day</label>
                  <input type="text" id="txt_day_sched_2" class="form-control" readonly>
                </div>
                </div>
                
                <div class="panel-body collapse" id="div_e2"></div>
            </div>
            
            <div class="form-group form-group-bordered">
              <div class="row">
                  <div class="col-lg-9">
                    <label for="txt_date" data-toggle="collapse" data-target="#div_e3">Every 3rd Year Schedule 3 &nbsp&nbsp<i class="fa fa-caret-down fa-custom-blue"></i></label>
                    <input type="text" id="txt_date_sched_3" name="txt_date_sched_3" class="form-control" readonly>
                  </div>
                  <div class="col-lg-3">
                    <label for="txt_date">Day</label>
                    <input type="text" id="txt_day_sched_3" class="form-control" readonly>
                  </div>
              </div>
              
              <div class="panel-body collapse" id="div_e3"></div>
            </div>`;

    $(`#div_form_sched`).html(prop);

    for (var i = 1; i < 4; i++) {
      _sched_details(`e${i}`);
      $(`#txt_date_sched_${i}`).datepicker();
    }
  };

  this_machine.load_data = function() {
    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Machine/load`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        console.log(data);

        all_machine_data = data['machine_data'];
        all_equipment_data = data['equipment_data'];
        all_spare_parts_data = data['spare_parts_data'];

        var tbody = '';
        var x = 1;

        $('#list_machine_name').empty();
        $('#list_machine_location').empty();
        $('#list_section').empty();
        $('#list_line').empty();

        $.each(all_machine_data, function(key, value) {
          // console.log(key);
          $.each(all_machine_data[key], function(key2, value2) {
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
  };

  this_machine.change_first_schedule = function(type) {
    let raw_date = $(`#txt_date_sched_1`).val();
    let date_1st = new Date(raw_date);
    let date_2nd = new Date(raw_date);
    let date_3rd = new Date(raw_date);
    let date_annual = new Date(raw_date);

    if (type == 'quarterly') {
      date_2nd.setMonth(date_1st.getMonth() + 3);
      date_3rd.setMonth(date_1st.getMonth() + 6);
      date_annual.setMonth(date_1st.getMonth() + 9);

      $('#txt_day_sched_1').val(gen_date(date_1st).day);
      $('#txt_day_sched_2').val(gen_date(date_2nd).day);
      $('#txt_day_sched_3').val(gen_date(date_3rd).day);
      $('#txt_day_sched_4').val(gen_date(date_annual).day);

      $('#txt_date_sched_1').val(gen_date(date_1st).date);
      $('#txt_date_sched_2').val(gen_date(date_2nd).date);
      $('#txt_date_sched_3').val(gen_date(date_3rd).date);
      $('#txt_date_sched_4').val(gen_date(date_annual).date);
    } else if (type == 'semi_annual') {
      date_2nd.setMonth(date_1st.getMonth() + 6);

      $('#txt_day_sched_1').val(gen_date(date_1st).day);
      $('#txt_day_sched_2').val(gen_date(date_2nd).day);

      $('#txt_date_sched_1').val(gen_date(date_1st).date);
      $('#txt_date_sched_2').val(gen_date(date_2nd).date);
    } else if (type == 'annual') {
      date_2nd.setFullYear(date_1st.getFullYear() + 1);
      date_3rd.setFullYear(date_1st.getFullYear() + 2);

      $('#txt_day_sched_1').val(gen_date(date_1st).day);
      $('#txt_day_sched_2').val(gen_date(date_2nd).day);
      $('#txt_day_sched_3').val(gen_date(date_3rd).day);

      $('#txt_date_sched_1').val(gen_date(date_1st).date);
      $('#txt_date_sched_2').val(gen_date(date_2nd).date);
      $('#txt_date_sched_3').val(gen_date(date_3rd).date);
    } else if (type == 'every_3') {
      date_2nd.setFullYear(date_1st.getFullYear() + 3);
      date_3rd.setFullYear(date_1st.getFullYear() + 6);

      $('#txt_day_sched_1').val(gen_date(date_1st).day);
      $('#txt_day_sched_2').val(gen_date(date_2nd).day);
      $('#txt_day_sched_3').val(gen_date(date_3rd).day);

      $('#txt_date_sched_1').val(gen_date(date_1st).date);
      $('#txt_date_sched_2').val(gen_date(date_2nd).date);
      $('#txt_date_sched_3').val(gen_date(date_3rd).date);
    }
  };

  this_machine.add_oil = function(sched) {
    /* var a = [];
    var b = [];
    $('input[name="q1_oil"]').map(function() {
      a.push($(this).val());
    });
    console.log(a); */

    row_count_oil += 1;
    let inputs = '';

    inputs += `<tr id="tr_oil_${sched}_${row_count_oil}">
      <td><a onclick="MACHINE.reduce_row('${sched}', '${row_count_oil}', 'oil')" class="fa fa-times"></a></td>
      <td><input type="text" class="form-control" name="txt_oil_parts_lub_${sched}_${row_count_oil}" id="txt_oil_parts_lub_${sched}_${row_count_oil}" autocomplete="off"></td>
      <td><select class="form-control" name="txt_oil_lub_id_${sched}_${row_count_oil}" id="txt_oil_lub_id_${sched}_${row_count_oil}">
            <option selected="selected" value="N/A"></option>
            </select>
      </td>
      <td><input type="text" class="form-control" onchange="MACHINE.compute_total_qty('${sched}', '${row_count_oil}', 'unit')" name="txt_oil_unit_qty_${sched}_${row_count_oil}" id="txt_oil_unit_qty_${sched}_${row_count_oil}" autocomplete="off"></td>
      <td><input type="text" class="form-control" onchange="MACHINE.compute_total_qty('${sched}', '${row_count_oil}', 'lub')" name="txt_oil_lub_qty_${sched}_${row_count_oil}" id="txt_oil_lub_qty_${sched}_${row_count_oil}" autocomplete="off"></td>
      <td><input type="text" class="form-control" name="txt_oil_total_qty_${sched}_${row_count_oil}" id="txt_oil_total_qty_${sched}_${row_count_oil}" readonly></td>
    </tr>`;

    $(`#tbl_oil_${sched} tbody`).append(inputs);

    $.each(all_spare_parts_data['data'], function(key, value) {
      if (value.type == 'Lubricant') {
        $(`#txt_oil_lub_id_${sched}_${row_count_oil}`).append(
          $('<option>', { value: value.id }).text(value.code)
        );
      }
    });
  };

  this_machine.add_spare = function(sched) {
    row_count_spare += 1;
    let inputs = '';

    inputs += `<tr id="tr_spare_${sched}_${row_count_spare}">
      <td><a onclick="MACHINE.reduce_row('${sched}', '${row_count_spare}', 'spare')" class="fa fa-times"></a></td>
      <td><select onclick="MACHINE.plot_spare_details('${sched}', '${row_count_spare}')" class="form-control" name="txt_spare_code_${sched}_${row_count_spare}" id="txt_spare_code_${sched}_${row_count_spare}">
            <option value="N/A"></option>
          <select/>
      </td>
      <input type="hidden" name="txt_spare_id_${sched}_${row_count_spare}" id="txt_spare_id_${sched}_${row_count_spare}">
      <td><input class="form-control" name="txt_spare_name_${sched}_${row_count_spare}" id="txt_spare_name_${sched}_${row_count_spare}" readonly/></td>
      <td><input class="form-control" name="txt_spare_total_qty_${sched}_${row_count_spare}" id="txt_spare_qty_${sched}_${row_count_spare}"/></td>
      <td><input class="form-control" name="txt_spare_unit_type_${sched}_${row_count_spare}" id="txt_spare_unit_type_${sched}_${row_count_spare}" readonly/></td>
    </tr>`;

    $(`#tbl_spare_${sched} tbody`).append(inputs);

    $.each(all_spare_parts_data['data'], function(key, value) {
      if (value.type != 'Lubricant') {
        $(`#txt_spare_code_${sched}_${row_count_spare}`).append(
          $('<option>', {
            value: value.id
          }).text(value.code.toUpperCase())
        );
      }
    });
  };

  this_machine.add_equipment = sched => {
    row_count_equipment += 1;
    let inputs = '';

    inputs += `<tr id="tr_equipment_${sched}_${row_count_equipment}">
      <td><a onclick="MACHINE.reduce_row('${sched}', '${row_count_equipment}', 'equipment')" class="fa fa-times"></a></td>
      <td><select onchange="MACHINE.plot_equipment_details('${sched}', '${row_count_equipment}')" class="form-control" name="txt_equipment_name_${sched}_${row_count_equipment}" id="txt_equipment_name_${sched}_${row_count_equipment}">
        <option value="N/A"></option>
      <select/>
      </td>
                <input type="hidden" name="txt_equipment_id_${sched}_${row_count_equipment}" id="txt_equipment_id_${sched}_${row_count_equipment}">
      <td><input class="form-control" name="txt_equipment_model_${sched}_${row_count_equipment}" id="txt_equipment_model_${sched}_${row_count_equipment}" readonly/></td>
      <td><input class="form-control" name="txt_equipment_controller_${sched}_${row_count_equipment}" id="txt_equipment_controller_${sched}_${row_count_equipment}" readonly /></td>
      <td><input class="form-control" name="txt_equipment_serial_${sched}_${row_count_equipment}" id="txt_equipment_serial_${sched}_${row_count_equipment}" readonly/></td>
      <td><input class="form-control" name="txt_equipment_working_cap_${sched}_${row_count_equipment}" id="txt_equipment_working_cap_${sched}_${row_count_equipment}" readonly/></td>
      <td><input class="form-control" name="txt_equipment_line_${sched}_${row_count_equipment}" id="txt_equipment_line_${sched}_${row_count_equipment}" readonly/></td>
    </tr>`;

    $(`#tbl_equipment_${sched} tbody`).append(inputs);

    $('#list_equipment_name').empty();

    $.each(all_equipment_data['data'], (key, value) => {
      $(`#txt_equipment_name_${sched}_${row_count_equipment}`).append(
        $('<option>', {
          value: value.id
        }).text(value.equipment_control_number.toUpperCase())
      );
    });
  };

  this_machine.reduce_row = (sched, row_c, need) => {
    $(`#tr_${need}_${sched}_${row_c}`).remove();
  };

  this_machine.plot_equipment_details = (sched, row_c) => {
    var id = $(`#txt_equipment_name_${sched}_${row_c}`).val();

    $.each(all_equipment_data['data'], (key, value) => {
      if (value.id == id) {
        $(`#txt_equipment_id_${sched}_${row_c}`).val(value.id);
        $(`#txt_equipment_model_${sched}_${row_c}`).val(value.model);
        $(`#txt_equipment_controller_${sched}_${row_c}`).val(
          value.equipment_controller
        );
        $(`#txt_equipment_serial_${sched}_${row_c}`).val(value.serial_number);
        $(`#txt_equipment_working_cap_${sched}_${row_c}`).val(
          value.working_capacity
        );
        $(`#txt_equipment_line_${sched}_${row_c}`).val(value.line);
      }
    });
  };

  this_machine.plot_spare_details = (sched, row_c) => {
    var id = $(`#txt_spare_code_${sched}_${row_c}`).val();

    $.each(all_spare_parts_data['data'], (key, value) => {
      if (value.id == id) {
        $(`#txt_spare_id_${sched}_${row_c}`).val(value.id);
        $(`#txt_spare_name_${sched}_${row_c}`).val(value.name);
        $(`#txt_spare_unit_type_${sched}_${row_c}`).val(value.unit);
      }
    });
  };

  this_machine.compute_total_qty = (sched, row, txt_type) => {
    // alert($(`#txt_oil_${txt_type}_qty_${sched}_${row}`).val());
    var type = txt_type == 'lub' ? 'unit' : 'lub';

    var cur_value = $(`#txt_oil_${txt_type}_qty_${sched}_${row}`).val();
    var other_value = $(`#txt_oil_${type}_qty_${sched}_${row}`).val();
    var total = other_value * cur_value;

    $(`#txt_oil_total_qty_${sched}_${row}`).val(total);
  };

  function gen_date(date_var) {
    let date = {};
    let days = [
      'Sunday',
      'Monday',
      'Tuesday',
      'Wednesday',
      'Thursday',
      'Friday',
      'Saturday'
    ];

    if (date_var.getDay() == 0) {
      date_var.setDate(date_var.getDate() + 1);
    } else if (date_var.getDay() == 6) {
      date_var.setDate(date_var.getDate() - 1);
    }

    let month =
      date_var.getMonth() + 1 < 10
        ? `0${date_var.getMonth() + 1}`
        : `${date_var.getMonth() + 1}`;
    let day =
      date_var.getDate() < 10
        ? `0${date_var.getDate()}`
        : `${date_var.getDate()}`;

    date = {
      date: `${date_var.getFullYear()}-${month}-${day}`,
      day: `${days[date_var.getDay()]}`
    };
    return date;
  }

  $('#txt_machine_name').focusout(function() {
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

    if (
      $(this).val() == '' ||
      $(this).val() == null ||
      $(this).val() == undefined
    ) {
      return 0;
    }
    $.ajax({
      type: 'get',
      url: `${_APP_URL}/Machine/machine_name/${machine_name}`,
      dataType: 'json',
      cache: false,
      success: function(data) {
        console.log(data);

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

  $('input[name="chk_sched_type"]').on('change', function() {
    var form = '';
    prop = '';
    var sched_type = '';
    $('div#div_sched.form-group').html('');

    $.each($("input[name='chk_sched_type']:checked"), function() {
      if ($(this).val() == 'quarterly') {
        sched_type = 'Quarterly';
      }
      if ($(this).val() == 'annual') {
        sched_type = 'Annual';
      }
      if ($(this).val() == 'semi_annual') {
        sched_type = 'Semi Annual';
      }
      if ($(this).val() == 'every_3') {
        sched_type = 'Every 3 Years';
      }

      form += `<h1>${sched_type}</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-black bold-text">
                        <div class="panel-heading" aria-expanded="false">
                            <i class="fa fa-clock-o"></i><b>&nbsp;Schedule</b></div>
                        <div class="panel-body text-center" id="div_pm_schedule" aria-expanded="false">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group" id="div_form_sched">
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>`;
    });

    $('div#div_sched.form-group').html(form);

    x = 0;
    $.each($('input[name="chk_sched_type"]:checked'), function() {
      if ($(this).val() == 'quarterly') {
        _quarterly();
      } else if ($(this).val() == 'annual') {
        _annual();
      } else if ($(this).val() == 'semi_annual') {
        _semi_annual();
      } else if ($(this).val() == 'every_3') {
        _every_3();
      }

      $('#txt_date_sched_1').datepicker();

      x++;
    });
  });

  $('#form_machine_registration').on('submit', function(event) {
    event.preventDefault();

    if (
      $('#txt_date_sched_1').val() == '' ||
      $('#txt_date_sched_1').val() == 'NaN-NaN-NaN'
    ) {
      +iziToast.error({
        title: 'WARNING',
        message: 'Please input PM Schedule'
      });

      $('#txt_date_sched_1').focus();

      return 0;
      // console.log(new_data);
    }

    $.ajax({
      url: `${_APP_URL}/Machine`, // Url to which the request is send
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
            message: 'Machine registered successfully'
          });

          $('#form_machine_registration').trigger('reset');

          $('#mdl_machine_registration').modal('hide');
          // MACHINE.load_data();
        }
      }

      /* },
        error: function(data) {
          console.log(data);
        },
        complete: function(data) {
          $('#img_machine').attr('src', '');
          $('#img_machine').attr('src', '/OEMS/public/upload/machine/image.png');
        } */
    });
  });

  return this_machine;
})();
