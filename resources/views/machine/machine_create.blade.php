@extends('layouts.app')

@section('content')
<div class="col-md-12 col-lg-5 col-xl-5">
    <section class="panel">
        <header class="panel-heading panel-modal">
            <h2 class="panel-title">Machine Registration</h2>
        </header>
        <div class="panel-body">
            <form id="demo-form" class="form-horizontal mb-lg" novalidate="novalidate">
                <center>
                    <figure class="profile-picture">
                        <img id="img_machine" src="{{URL::to('/')}}/upload/machine/image.png" class="img-thumbnail"
                            width="150">
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
                                        Select Machine Image</span>
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
                </center>

                <hr>

                <div class="row form-group">
                    <div class="col-lg-4">
                        <label class="control-label">Machine Control Number</label>
                        <input type="text" id="txt_machine_control_number" name="txt_machine_control_number"
                            class="form-control" placeholder="Machine Control No.">
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-8">
                        <label class="control-label">Machine Name</label>
                        <input list="list_machine_name" class="form-control" placeholder="Select Machine Name"
                            name="txt_machine_name" id="txt_machine_name">
                        <datalist id="list_machine_name"></datalist>
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>
                </div> {{-- machine_control,model,machine_location form-group-end --}}


                <div class="row form-group">
                    <div class="col-lg-4">
                        <label class="control-label">Model</label>
                        <input list="list_model" class="form-control" placeholder="Select Model" name="txt_model"
                            id="txt_model">
                        <datalist id="list_model"></datalist>
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">Machine Controller</label>
                        <input list="list_machine_controller" class="form-control"
                            placeholder="Select Machine Controller" name="txt_machine_controller"
                            id="txt_machine_controller">
                        <datalist id="list_machine_controller"></datalist>
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">Manufacturer</label>
                        <input list="list_manufacturer" class="form-control" placeholder="Select Manufacturer"
                            name="txt_manufacturer" id="txt_manufacturer">
                        <datalist id="list_manufacturer"></datalist>
                    </div>

                </div> {{-- machine_name,manufacturer,line form-group-end --}}

                <div class="row form-group">
                    <div class="col-lg-8">
                        <label class="control-label">Serial Number</label>
                        <input type="text" id="txt_serial_number" name="txt_serial_number" class="form-control"
                            placeholder="Serial Number">
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">Year Made</label>
                        <input type="date" class="form-control" name="txt_year_made" id="txt_year_made">
                    </div>
                </div> {{-- serial,controller,year made form-group-end --}}

                <div class="row form-group">
                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">Machine Location</label>
                        <input list="list_machine_location" class="form-control" placeholder="Select Machine Location"
                            name="txt_machine_location" id="txt_machine_location">
                        <datalist id="list_machine_location"></datalist>
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">Line</label>
                        <input list="list_line" class="form-control" placeholder="Select Line" name="txt_line"
                            id="txt_line">
                        <datalist id="list_line"></datalist>
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">User</label>
                        <input list="list_user" name="txt_user" class="form-control" placeholder="Select User"
                            id="txt_user">
                        <datalist id="list_user"></datalist>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-8">
                        <label class="control-label">Fixed Asset Number</label>
                        <input type="text" id="txt_serial" name="txt_asset_number" class="form-control"
                            placeholder="Fixed Asset Number">
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-4">
                        <label class="control-label">Date Arrived</label>
                        <input type="date" class="form-control" name="txt_date_arrived" id="txt_date_arrived">
                    </div>
                </div> {{-- serial,controller,year made form-group-end --}}

                <div class="row form-group">
                    <div class="col-lg-6">
                        <label class="control-label">Padlock Number</label>
                        <input type="text" id="txt_padlock_number" name="txt_padlock_number" class="form-control"
                            placeholder="Padlock Number">
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                    <div class="col-lg-6">
                        <label class="control-label">Working Capacity</label>
                        <input type="text" id="txt_working_capacity" name="txt_working_capacity" class="form-control"
                            placeholder="Working Capacity">
                    </div>

                    <div class="mb-md hidden-lg hidden-xl"></div>

                </div> {{-- serial,controller,year made form-group-end --}}

                {{-- <div class="row form-group">
                                <div class="col-lg-12">
                                    <label class="control-label">Remarks</label>
                                    <input type="text" class="form-control" name="txt_date_arrived" id="txt_date_arrived">
                                </div>
                            </div> --}}

                {{-- <div id="form_control1" class="row form-group">
                                <div class="col-lg-12">
                                    <button id="btn_save" class="form-control btn btn-custom" type="submit">Save</button>
                                </div>
                            </div> --}} {{-- save btn form-group-end --}}
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <button class="btn btn-default" type="button">Cancel</button>
                </div>
            </div>
        </footer>
        </form>
    </section>
</div> {{-- col-md-12 end --}}

@endsection