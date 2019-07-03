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

    <div class="col-md-12 col-lg-5 col-xl-5">
        <section class="panel panel-custom-management">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                </div>
                <h2 class="panel-title"><i class="fa fa-tachometer" style="color:#ffffff"></i> Machine Registration
                </h2>
            </header>

            <div class="panel-body panel-body-custom-management">

                <form id="form_create_user" enctype="multipart/form-data">
                    @csrf
                    <div class="widget-content">
                        <center>
                            <figure class="profile-picture">
                                <img id="img_machine" src="{{URL::to('/')}}/upload/machine/image.png"
                                    class="img-thumbnail" width="150">
                            </figure> {{-- profile --}}

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
                                                    style="color:#ffffff"></i> Select Machine Image</span>
                                            <input type="file" name="img_user" id="img_input_machine"
                                                onchange="MACHINE.file_preview(this)">
                                        </span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload"
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

                        </center> {{--  --}}

                        <hr>


                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="control-label">Machine Control Number</label>
                                <input type="text" id="txt_machine_control_number" name="txt_machine_control_number" class="form-control"
                                    placeholder="Machine Control No.">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Model</label>
                                <select class="form-control" name="slc_model" id="slc_model">
                                    <option selected="true" disabled="">Select Model</option>
                                    {{-- <option value="Area Head">Area Head</option> --}}
                                </select>
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Machine Location</label>
                                <select class="form-control" name="slc_machine_location" id="slc_machine_location">
                                    <option selected="true" disabled="">Select Machine Location</option>
                                    {{-- <option value="BUILDING 2">Building 2</option>
                                    <option value="BUILDING 4">Building 4</option> --}}
                                </select>
                            </div>
                        </div> {{-- machine_control,model,machine_location form-group-end --}}


                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="control-label">Machine Name</label>
                                <select class="form-control" name="slc_machine_name" id="slc_machine_name">
                                    <option selected="true" disabled="">Select Machine Name</option>
                                    {{-- <option value="AIR PRESS">Air Press</option>
                                    <option value="BENDER MACHINE">Bender Machine</option>
                                    <option value="DEBURRING MACHINE">Deburring Machine</option>
                                    <option value="DRILL PRESS">Drill Press</option>
                                    <option value="DRILLING MACHINE">Drilling Machine</option>
                                    <option value="GRINDING MACHINE">Grinding Machine</option>
                                    <option value="HOT PRESS MACHINE">Hot Press Machine</option>
                                    <option value="INJECTION MOLD MACHINE">Injection Mold Machine</option>
                                    <option value="KNURLING MACHINE(KNURL)">Knurling Machine(Knurl)</option>
                                    <option value="LATHE MACHINE">Lathe Machine</option>
                                    <option value="LATHE MACHINE(MINI)">Lathe Machine(Mini)</option>
                                    <option value="LEVELLER MACHINE">Leveller Machine</option>
                                    <option value="NC TAPPING MACHINE">NC Tapping Machine</option>
                                    <option value="PRESS MACHINE">Press Machine</option>
                                    <option value="RIVET MACHINE">Rivet Machine</option>
                                    <option value="SHEAR MACHINE">Shear Machine</option>
                                    <option value="SPOT WELDING MACHINE">Spot Welding Machine</option>
                                    <option value="TAPPING MACHINE">Tapping Machine</option> --}}
                                </select>
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Manufacturer</label>
                                <select class="form-control" name="slc_manufacturer" id="slc_manufacturer">
                                    <option selected="true" disabled="">Select Manufacturer</option>
                                    {{-- <option value="Area Head">Area Head</option> --}}
                                </select>
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Line</label>
                                <select class="form-control" name="slc_line" id="slc_line">
                                    <option selected="true" disabled="">Select Line</option>
                                    {{-- <option value="BENDER">BENDER</option>
                                    <option value="DEBURRING">DEBURRING</option>
                                    <option value="DIE MAINTENANCE">DIE MAINTENANCE</option>
                                    <option value="DRILL/TAP">DRILL/TAP</option>
                                    <option value="MOLDING">MOLDING</option>
                                    <option value="PRESS">PRESS</option>
                                    <option value="RIVET">RIVET</option>
                                    <option value="SHAFT ASSY">SHAFT ASSY</option>
                                    <option value="SHAFTING">SHAFTING</option>
                                    <option value="SHEARING">SHEARING</option>
                                    <option value="SPOT">SPOT</option>
                                    <option value="WASHING">WASHING</option> --}}
                                </select>
                            </div>
                        </div> {{-- machine_name,manufacturer,line form-group-end --}}

                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="control-label">Serial Number</label>
                                <input type="text" id="txt_serial_number" name="txt_serial_number" class="form-control"
                                    placeholder="Serial Number">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Machine Controller</label>
                                <select class="form-control" name="slc_machine_controller" id="slc_machine_controller">
                                    <option selected="true" disabled="">Select Machine Controller</option>
                                    {{-- <option value="Area Head">Area Head</option> --}}
                                </select>
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Year Made</label>
                                <input type="date" class="form-control" name="txt_year_made" id="txt_year_made">
                            </div>
                        </div> {{-- serial,controller,year made form-group-end --}}

                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="control-label">Fixed Asset Number</label>
                                <input type="text" id="txt_serial" name="txt_asset_number" class="form-control"
                                    placeholder="Fixed Asset Number">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Working Capacity</label>
                                <input type="text" id="txt_working_capacity" name="txt_working_capacity" class="form-control"
                                    placeholder="Working Capacity">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Date Arrived</label>
                                <input type="date" class="form-control" name="txt_date_arrived" id="txt_date_arrived">
                            </div>
                        </div> {{-- serial,controller,year made form-group-end --}}

                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label class="control-label">Padlock Number</label>
                                <input type="text" id="txt_padlock_number" name="txt_padlock_number" class="form-control"
                                    placeholder="Padlock Number">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">User</label>
                                <select class="form-control" name="slc_user" id="slc_user">
                                    <option selected="true" disabled="">Select User</option>
                                    {{-- <option value="PRESS 1">PRESS 1</option>
                                    <option value="PRESS 2">PRESS 2</option> --}}
                                </select>
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-4">
                                <label class="control-label">Remarks</label>
                                <input type="text" class="form-control" name="txt_date_arrived" id="txt_date_arrived">
                            </div>
                        </div> {{-- serial,controller,year made form-group-end --}}
                        <hr>
                        <div id="form_control1" class="row form-group">
                            <div class="col-lg-12">
                                <button id="btn_save" class="form-control btn btn-custom" type="submit">Save</button>
                            </div>
                        </div> {{-- save btn form-group-end --}}

                </form> {{-- form-create-user-end --}}

                <div id="form_control2" class="row form-group" style="display:none;">
                    <div class="col-lg-12">
                        <button type="button" id="btn_update" class="btn btn-custom"
                            onclick="USER.update()">Update</button>
                        <button type="button" id="btn_cancel" class="btn btn-default"
                            onclick="USER.cancel()">Cancel</button>
                    </div>
                </div>

            </div> {{-- panel-body-end --}}

        </section>
    </div> {{-- col-md-12 end --}}



    <div class="col-md-12 col-lg-7 col-xl-7">
        <header class="panel-heading">
            <div class="panel-actions">
                <div class="form-check-inline form-check">
                    <label for="rad_status1" class="form-check-label ">
                        <input type="radio" id="rad_status1" name="rad_status" value="0" class="form-check-input"
                            checked>Activated
                    </label>
                    &nbsp;&nbsp;
                    <label for="rad_status2" class="form-check-label ">
                        <input type="radio" id="rad_status2" name="rad_status" value="1"
                            class="form-check-input">Deactivated
                    </label>
                </div> {{-- form-check-inline-end --}}
            </div> {{-- panel-actions-end --}}
            <h2 class="panel-title"><i class="fa fa-list" style="color:#ffffff"></i> Machine List</h2>
        </header>
        <div class="panel-body panel-body-custom-management">
            <table id="tbl_user" class="table table-bordered mb-none">
                <thead>
                    <tr>
                        <td>User</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div> {{-- panel-body-end --}}
    </div> {{-- col-md-12 end --}}
</div> {{-- row-end --}}
@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/machine/index.js"></script>
@endsection