@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-md-12 col-lg-5 col-xl-5">
        <section class="panel panel-custom-management">
            <header class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-tachometer" style="color:#ffffff"></i> User Registration
                </h2>
            </header>
            <div class="panel-body panel-body-custom-management">

                <form id="form_user_registration" enctype="multipart/form-data">
                    @csrf
                    <center>
                        <figure class="profile-picture">
                            <img id="img_profile" src="{{URL::to('/')}}/theme/assets/images/sample-user.png"
                                class="img-thumbnail" style="border-radius: 100%;" width="150">
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
                                        <span class="fileupload-new"><i class="fa fa-camera" style="color:#ffffff"></i>
                                            Select Photo</span>
                                        <input type="file" name="img_user" id="img_user"
                                            onchange="HELPER.file_preview(this,'img_profile','{{URL::to('/')}}/theme/assets/images/sample-user.png')">
                                    </span>
                                    <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload"
                                        onclick="HELPER.file_preview()">Remove</a>
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

                    <br>


                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label class="control-label">First Name</label>
                            <input type="text" id="txt_firstname" name="txt_firstname" class="form-control"
                                placeholder="First Name">
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>

                        <div class="col-lg-4">
                            <label class="control-label">Middle Name</label>
                            <input type="text" id="txt_middlename" name="txt_middlename" class="form-control"
                                placeholder="Middle Name">
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>

                        <div class="col-lg-4">
                            <label class="control-label">Last Name</label>
                            <input type="text" id="txt_lastname" name="txt_lastname" class="form-control"
                                placeholder="Last Name">
                        </div>
                    </div> {{-- fname,mname,lname form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label class="control-label">Email</label>
                            <input type="email" name="txt_email" id="txt_email" class="form-control"
                                placeholder="user@ph.fujitsu.com">
                        </div>
                    </div> {{-- email form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label class="control-label">Position</label>
                            <select class="form-control" name="slc_position" id="slc_position">
                                <option selected="true" disabled="">Select Position</option>
                                <option value="Area Head">Area Head</option>
                                <option value="Manager">Manager</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Maintenance ASV">Maintenance ASV</option>
                                <option value="Operator">Operator</option>
                                <option value="PC Staff">PC Staff</option>
                                <option value="PIC">PIC</option>
                                <option value="Senior Manager">Senior Manager</option>
                            </select>
                        </div> {{-- col-position-end --}}

                        <div class="mb-md hidden-lg hidden-xl"></div>

                        <div class="col-lg-6">
                            <label class="control-label">Designation</label>
                            <select class="form-control" name="slc_designation" id="slc_designation">
                                <option selected="true" disabled="">Select Designation</option>
                                <option value="Admin">Admin</option>
                                <option value="Handler">Assistant Supervisor</option>
                                <option value="Staff">Bender Operator</option>
                                <option value="Deburring Operator">Deburring Operator</option>
                                <option value="Degreasing Operator">Degreasing Operator</option>
                                <option value="Die Maintenance">Die Maintenance</option>
                                <option value="Drill/Tapping Operator">Drill/Tapping Operator</option>
                                <option value="Forklift Operator">Forklift Operator</option>
                                <option value="Maintenance Assistant">Maintenance Assistant</option>
                                <option value="Maintenance Personnel">Maintenance Personnel</option>
                                <option value="Manager">Manager</option>
                                <option value="Material Handler">Material Handler</option>
                                <option value="Molding Operator">Molding Operator</option>
                                <option value="PC Clerk">PC Clerk</option>
                                <option value="Press Die Setter">Press Die Setter</option>
                                <option value="Production Staff">Production Staff</option>
                                <option value="Rivet Operator">Rivet Operator</option>
                                <option value="Section Leader">Section Leader</option>
                                <option value="Senior Manager">Senior Manager</option>
                                <option value="Shaft & Mold Assembly">Shaft & Mold Assembly</option>
                                <option value="Shafting Operator">Shafting Operator</option>
                                <option value="Shearing Operator">Shearing Operator</option>
                                <option value="Sma Section Leader">Sma Section Leader</option>
                                <option value="Spot Operator">Spot Operator</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Vice President">Vice President</option>
                            </select>
                        </div> {{-- col-designation-end --}}
                    </div> {{-- position,designation form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label class="control-label">Section</label>
                            <select class="form-control" name="slc_section" id="slc_section">
                                <option selected="true" disabled="">Select Section</option>
                                <option value="Press 1">Press 1</option>
                                <option value="Press 2">Press 2</option>
                            </select>
                        </div> {{-- col-section-end --}}

                        <div class="col-lg-6">
                            <label class="control-label">Employee Number</label>
                            <input type="text" name="txt_employee_num" id="txt_employee_num" class="form-control"
                                placeholder="Employee Number" autocomplete="username">
                        </div> {{-- col emp-number-end --}}
                    </div> {{-- section,emp-num form-group-end --}}

                    <div class="row form-group" id="div_form_pass1">
                        <div class="col-lg-12">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" id="txt_pass" class="form-control"
                                placeholder="Password" autocomplete="new-password">
                        </div>
                    </div> {{-- password form-group-end --}}

                    <div class="row form-group" id="div_form_pass2">
                        <div class="col-lg-12">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="txt_confirm_pass"
                                class="form-control" placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                    </div> {{-- confirm-password form-group-end --}}

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
        <div class="panel">
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
                <h2 class="panel-title"><i class="fa fa-list" style="color:#ffffff"></i> Users List</h2>
            </header> {{-- panel-heading-end --}}
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
        </div> {{-- panel-end --}}
    </div> {{-- col-md-12 end --}}
</div> {{-- row-end --}}
@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/user/index.js"></script>
@endsection