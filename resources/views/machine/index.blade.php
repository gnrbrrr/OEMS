@extends('layouts.app')

@section('content')
<style>
    .form-group {
        padding: 0% 25px;
        margin-bottom: 1rem;
        border-radius: 10px;
    }

    .btn-custom {
        /* margin-bottom: -16px; */
        background-color: #305e79;
        color: #ffffff;
        /* box-shadow: 0px 0 7px 2px #00498e; */
    }

    .btn-custom:hover {
        /* margin-bottom: -16px; */
        background-color: #22668e;
        color: #ffffff;
        box-shadow: 0px 0 5px 1px #00498e;
    }
</style>
<div class="row">



    <div class="col-md-12 col-lg-12 col-xl-12">
        <header class="panel-heading">
            <div class="panel-actions">
                <div class="form-check-inline form-check">

                    <a onclick="MACHINE.showModal_addMachine()" title="Add Machine"><i
                            class="icon_btn fa fa-plus fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a onclick="MACHINE.fnc_test()" title="View History"><i
                            class="icon_btn fa fa-history fa-2x"></i></a>

                </div> {{-- form-check-inline-end --}}
            </div> {{-- panel-actions-end --}}
            <h2 class="panel-title"><i class="fa fa-list" style="color:#ffffff"></i> Machine List</h2>
        </header>
        <div class="panel-body panel-body-custom-management">
            <table id="tbl_machine" class="table table-bordered mb-none align-center-middle">
                <thead>
                    <tr>
                        <td>No</td>
                        <td width="15%">Actions</td>
                        <td width="5%">Machine Controller No.</td>
                        <td>Machine Name</td>
                        <td width="10%">Model</td>
                        <td>Controller</td>
                        <td width="5%">Serial No</td>
                        <td width="7.5%">Fixed Asset No</td>
                        <td width="5%">Padlock No.</td>
                        <td width="10%">Manufacturer</td>
                        <td width="5%">Working Capacity</td>
                        <td>Location</td>
                        <td>Line</td>
                        <td>User</td>
                        <td width="3%">Year Made</td>
                        <td width="7%">Date Arrived</td>
                        <td>Remark</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div> {{-- panel-body-end --}}
    </div> {{-- col-md-12 end --}}
</div> {{-- row-end --}}

<!-- Modal Form -->
<div id="mdl_machine_registration" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content - start-->
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-5">
                    <section class="panel"> {{-- modal - section panel - start --}}
                        <header class="panel-heading panel-modal">
                            <h2 class="panel-title">Machine Registration</h2>
                        </header>
                        <div class="panel-body">
                            <form id="form_machine_registration" class="form-horizontal mb-lg" novalidate="novalidate">
                                @csrf
                                <div id="div_img_machine">


                                    <br>

                                    <div class="form-group" id="div_form_group">
                                        {{-- <div class="col-md-6"> --}}
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <input type="hidden" value="" name="">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    {{-- <i class="fa fa-file fileupload-exists"></i> --}}
                                                    <span class="fileupload-preview"></span>
                                                </div> {{-- uneditable-input-end --}}
                                                <span class="btn btn-default btn-file btn-custom">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new"><i class="fa fa-camera"
                                                            style="color:#ffffff"></i>
                                                        Select Machine Image</span>
                                                    <input type="file" name="img_input_machine" id="img_input_machine"
                                                        onchange="MACHINE.file_preview(this)">
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload"
                                                    onclick="MACHINE.file_preview()">Remove</a>
                                            </div> {{-- input-append-end --}}

                                        </div> {{-- fileupload-end --}}

                                    </div> {{-- input-file form-group-end --}}

                                    <div class="form-group">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="txt_img_filename"
                                                style="display:none;align-text:center;" disabled>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>

                                {{-- <hr> --}}

                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">Machine Control Number</label>
                                        <input type="text" id="txt_machine_control_number"
                                            name="txt_machine_control_number" class="form-control"
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
                                        <input type="date" class="form-control" name="txt_year_made" id="txt_year_made">
                                    </div>
                                </div> {{-- serial,controller,year made form-group-end --}}

                                <div class="row form-group">
                                    <div class="col-lg-4">
                                        <label class="control-label">User</label>
                                        <input list="list_user" name="txt_user" class="form-control"
                                            placeholder="Select User" id="txt_user" autocomplete="off">
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
                                        <input type="text" id="txt_asset_number" name="txt_asset_number" class="form-control"
                                            placeholder="Fixed Asset Number" autocomplete="off">
                                    </div>

                                    <div class="mb-md hidden-lg hidden-xl"></div>

                                    <div class="col-lg-4">
                                        <label class="control-label">Date Arrived</label>
                                        <input type="date" class="form-control" name="txt_date_arrived"
                                            id="txt_date_arrived">
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

                                {{-- <div id="form_control1" class="row form-group">
                                                    <div class="col-lg-12">
                                                        <button id="btn_save" class="form-control btn btn-custom" type="submit">Save</button>
                                                    </div>
                                                </div> --}} {{-- save btn form-group-end --}}
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit" id="btn_submit">Submit</button>
                                    <button class="btn btn-default" type="button" id="btn_cancel">Cancel</button>
                                </div>
                            </div>
                        </footer>
                        </form>
                    </section> {{-- modal - section panel - start --}}
                </div>
                <div class="col-lg-7">
                    <figure class="profile-picture">
                        <img id="img_machine" src="{{URL::to('/')}}/upload/machine/image.png" class="img-thumbnail"
                            width="150">
                    </figure> {{-- profile --}}
                </div>
            </div>
        </div>
        <!-- Modal content - end-->
    </div>
</div>
@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/machine/index.js"></script>
@endsection