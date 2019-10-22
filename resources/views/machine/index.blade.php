@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <div class="form-check-inline form-check">

                        {{-- <a onclick="MACHINE.showModal_addMachine()" title="Add Machine"><i
                                class="icon_btn fa fa-plus fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp; --}}
                                {{-- <a onclick="MACHINE.fnc_test()" title="View History"><i
                                    class="icon_btn fa fa-history fa-2x"></i></a> --}}

                    </div> {{-- form-check-inline-end --}}
                </div> {{-- panel-actions-end --}}
                <h2 class="panel-title"><i class="fa fa-list" style="color:#ffffff"></i> Machine List</h2>
            </header>
            <div class="panel-custom panel-body panel-body-custom-management">
                <table id="tbl_machine" class="table-object table mb-none align-center-middle">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td width="7%">Actions</td>
                            <td width="5%">Machine Controller No.</td>
                            <td>Machine Name</td>
                            <td width="7%">Model</td>
                            <td>Controller</td>
                            <td width="5%">Serial No</td>
                            <td width="7.5%">Fixed Asset No</td>
                            <td width="5%">Padlock No.</td>
                            <td width="8%">Manufacturer</td>
                            <td width="5%">Working Capacity</td>
                            <td>Location</td>
                            <td>Line</td>
                            <td>Section</td>
                            <td width="3%">Year Made</td>
                            <td width="7%">Date Arrived</td>
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
<div id="mdl_machine_registration" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content - start-->
        <div class="modal-content">

            <div id="modalForm" class="modal-block modal-block-primary" style="max-width: 1200px;">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Registration Form</h2>
                    </header>
                    <div class="panel-body">
                        <form id="form_mdl_machine_registration">
                            <div class="col-lg-7" style="position: relative;max-width: 600px;">

                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">Machine Control Number</label> <br>
                                        <input type="text" id="txt_control_number"
                                            name="txt_control_number" class="form-control"
                                            placeholder="Machine Control No." autocomplete="off">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-8">
                                        <label class="control-label">Machine Name</label>
                                        <input list="list_machine_name" class="form-control"
                                            placeholder="Select Machine Name" name="txt_machine_name"
                                            id="txt_machine_name" autocomplete="off">
                                        <datalist id="list_machine_name"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>
                                </div> {{-- machine_control,model,machine_location form-group-end --}}


                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">Model</label>
                                        <input list="list_model" class="form-control" placeholder="Select Model"
                                            name="txt_model" id="txt_model" autocomplete="off">
                                        <datalist id="list_model"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Machine Controller</label>
                                        <input list="list_machine_controller" class="form-control"
                                            placeholder="Select Machine Controller" name="txt_machine_controller"
                                            id="txt_machine_controller" autocomplete="off">
                                        <datalist id="list_machine_controller"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Manufacturer</label>
                                        <input list="list_manufacturer" class="form-control"
                                            placeholder="Select Manufacturer" name="txt_manufacturer"
                                            id="txt_manufacturer" autocomplete="off">
                                        <datalist id="list_manufacturer"></datalist>
                                    </div>

                                </div> {{-- machine_name,manufacturer,line form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-8">
                                        <label class="control-label">Serial Number</label>
                                        <input type="text" id="txt_serial_number" name="txt_serial_number"
                                            class="form-control" placeholder="Serial Number" autocomplete="off">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Year Made</label>
                                        <input type="date" class="form-control" name="txt_date_made" id="txt_date_made">
                                    </div>
                                </div> {{-- serial,controller,year made form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">User</label>
                                        <input list="list_user" name="txt_section" class="form-control"
                                            placeholder="Select User" id="txt_section" autocomplete="off">
                                        <datalist id="list_user"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Machine Location</label>
                                        <input list="list_machine_location" class="form-control"
                                            placeholder="Select Machine Location" name="txt_machine_location"
                                            id="txt_machine_location" autocomplete="off">
                                        <datalist id="list_machine_location"></datalist>
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Line</label>
                                        <input list="list_line" class="form-control" placeholder="Select Line"
                                            name="txt_line" id="txt_line" autocomplete="off">
                                        <datalist id="list_line"></datalist>
                                    </div>

                                    {{--  <div class="mb-md hidden-lg hidden-xl"></div> --}}


                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-8">
                                        <label class="control-label">Fixed Asset Number</label>
                                        <input type="text" id="txt_fixed_asset_number" name="txt_fixed_asset_number"
                                            class="form-control" placeholder="Fixed Asset Number" autocomplete="off">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Date Arrived</label>
                                        <input type="date" class="form-control" name="txt_arrival_date"
                                            id="txt_arrival_date">
                                    </div>
                                </div> {{-- serial,controller,year made form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-6">
                                        <label class="control-label">Padlock Number</label>
                                        <input type="text" id="txt_padlock_number" name="txt_padlock_number"
                                            class="form-control" placeholder="Padlock Number">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-6">
                                        <label class="control-label">Working Capacity</label>
                                        <input type="text" id="txt_working_capacity" name="txt_working_capacity"
                                            class="form-control" placeholder="Working Capacity" autocomplete="off">
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
                                    style="margin-top:60px;margin-bottom:2%;border:0px" id="img_machine"
                                    class="img-thumbnail">
                                <br>

                            </div>
                        </form>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary modal-confirm" onclick="MACHINE.update()">Update</button>
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
<script src="{{URL::to('/')}}/scripts/machine/index.js"></script>
@endsection