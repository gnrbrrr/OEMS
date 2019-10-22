@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <div class="form-check-inline form-check">

                        {{-- <a onclick="EQUIPMENT.showModal_addEquipment()" title="Add Machine"><i
                                class="icon_btn fa fa-plus fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp --}}
                        {{-- <a onclick="MACHINE.fnc_test()" title="View History"><i
                                    class="icon_btn fa fa-history fa-2x"></i></a> --}}

                    </div> {{-- form-check-inline-end --}}
                </div> {{-- panel-actions-end --}}
                <h2 class="panel-title"><i class="fa fa-list" style="color:#ffffff"></i> Equipment List</h2>
            </header>
            <div class="panel-custom panel-body panel-body-custom-management">
                <table id="tbl_equipment" class="table-object table mb-none align-center-middle">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td width="6%">Actions</td>
                            <td>Equipment Name</td>
                            <td>Model</td>
                            <td>Controller</td>
                            <td>Serial No</td>
                            <td>Fixed Asset No</td>
                            <td>Manufacturer</td>
                            <td>Working Capacity</td>
                            <td>Line</td>
                            <td>Location</td>
                            <td>Section</td>
                            <td>Year Made</td>
                            <td>Date Arrived</td>
                            <td>Remark</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div> {{-- panel-body-end --}}
        </div> {{-- panel-end --}}
    </div> {{-- col-md-12 end --}}
</div> {{-- row-end --}}



{{-- MODAL --}}
<div id="mdl_equipment_registration" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content - start-->
        <div class="modal-content">

            <div id="modalForm" class="modal-block modal-block-primary" style="max-width: 1200px;">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Registration Form</h2>
                    </header>
                    <div class="panel-body">
                        <form id="form_equipment_registration">
                            <div class="col-lg-7" style="position: relative;max-width: 600px;">

                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">Equipment Name</label> <br>
                                        <input list="list_equipment_name" class="form-control"
                                            placeholder="Equipment Name" name="txt_equipment_name"
                                            id="txt_equipment_name" autocomplete="off">
                                        <datalist id="list_equipment_name"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Model</label>
                                        <input list="list_model" class="form-control" placeholder="Select Model"
                                            name="txt_model" id="txt_model" autocomplete="off">
                                        <datalist id="list_model"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Controller</label>
                                        <input list="list_controller" class="form-control" placeholder="Controller Name"
                                            name="txt_controller" id="txt_controller" autocomplete="off">
                                        <datalist id="list_controller"></datalist>
                                    </div>
                                </div> {{-- machine_control,model,machine_location form-group-end --}}


                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label class="control-label">Serial Number</label>
                                        <input type="text" id="txt_serial_number" name="txt_serial_number"
                                            class="form-control" placeholder="Serial Number" autocomplete="off">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-6">
                                        <label class="control-label">Fixed Asset Number</label>
                                        <input type="text" id="txt_fixed_asset_number" name="txt_fixed_asset_number"
                                            class="form-control" placeholder="Fixed Asset Number" autocomplete="off">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                </div> {{-- machine_name,manufacturer,line form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-8">
                                        <label class="control-label">Manufacturer</label>
                                        <input list="list_manufacturer" name="txt_manufacturer" class="form-control"
                                            placeholder="Manufacturer" id="txt_manufacturer" autocomplete="off">
                                        <datalist id="list_manufacturer"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Working Capacity</label>
                                        <input type="text" id="txt_working_capacity" name="txt_working_capacity"
                                            class="form-control" placeholder="Working Capacity" autocomplete="off">
                                    </div>
                                </div> {{-- serial,controller,year made form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">Line</label>
                                        <input list="list_line" class="form-control" placeholder="Line" name="txt_line"
                                            id="txt_line" autocomplete="off">
                                        <datalist id="list_line"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Location</label>
                                        <input list="list_equipment_location" class="form-control"
                                            placeholder="Equipment Location" name="txt_equipment_location"
                                            id="txt_equipment_location" autocomplete="off">
                                        <datalist id="list_equipment_location"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Section</label>
                                        <input list="list_section" name="txt_section" class="form-control"
                                            placeholder="Section" id="txt_section" autocomplete="off">
                                        <datalist id="list_section"></datalist>
                                    </div>

                                    {{--  <div class="mb-md hidden-lg hidden-xl"></div> --}}

                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label class="control-label">Date Made</label>
                                        <input type="date" class="form-control" name="txt_date_made" id="txt_date_made">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-6">
                                        <label class="control-label">Date Arrived</label>
                                        <input type="date" class="form-control" name="txt_arrival_date"
                                            id="txt_arrival_date">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                </div> {{-- serial,controller,year made form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <label class="control-label">Remarks</label>
                                        <input type="text" class="form-control" name="txt_remarks" id="txt_remarks"
                                            placeholder="Remarks" autocomplete="off">
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5">

                                <img src="{{URL::to('/')}}/upload/machine/image.png"
                                    style="margin-top:60px;margin-bottom:2%;border:0px" id="img_equipment"
                                    class="img-thumbnail">
                                <br>

                            </div>
                        </form>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm"
                                    onclick="EQUIPMENT.update()">Update</button>
                                <button class="btn btn-default modal-dismiss" id="btn_cancel">Cancel</button>
                            </div>
                        </div>
                    </footer>
                </section>
            </div>


        </div>
        <!-- Modal content - end-->
    </div>
</div> {{-- MODAL END--}}


@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/equipment/index.js"></script>
@endsection