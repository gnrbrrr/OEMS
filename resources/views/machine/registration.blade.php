@extends('layouts.app')

@section('content')
<form id="form_machine_registration" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-black panel-machine-registration">
                <div class="panel-heading collapsed" data-toggle="collapse" data-target="#div_machine_details"
                    aria-expanded="false">
                    <h4 class="box-title"> <i class="ion ion-clipboard"></i> &nbsp;<b>MACHINE 
                        DETAILS</b></h4>
                </div>

                <div class="panel-body collapse" id="div_machine_details" aria-expanded="false" style="height: 30px;">


                    <center>
                        <img src="{{URL::to('/')}}/upload/machine/image.png" style="width:15%;margin-bottom:2%;"
                            id="img_machine" class="img-thumbnail">
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
                                        <input type="file" name="img_input_machine" id="img_input_machine"
                                            onchange="HELPER.file_preview(this,'img_machine','{{URL::to('/')}}/upload/machine/image.png')">
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
                    </center>

                    <hr>

                    <div class="row form-group">
                        <div class="col-md-4">
                            <label class="control-label">Machine Control Number</label>
                            <input type="text" id="txt_control_number" name="txt_control_number" class="form-control"
                                placeholder="Machine Control No." autocomplete="off">
                        </div>

                        <div class="col-md-8">
                            <label class="control-label">Machine Name</label>
                            <input list="list_machine_name" class="form-control" placeholder="Select Machine Name"
                                name="txt_machine_name" id="txt_machine_name" autocomplete="off">
                            <datalist id="list_machine_name"></datalist>
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>
                    </div> {{-- machine_control,model,machine_location form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label class="control-label">Model</label>
                            <input list="list_model" class="form-control" placeholder="Select Model" name="txt_model"
                                id="txt_model" autocomplete="off">
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
                            <input list="list_manufacturer" class="form-control" placeholder="Select Manufacturer"
                                name="txt_manufacturer" id="txt_manufacturer" autocomplete="off">
                            <datalist id="list_manufacturer"></datalist>
                        </div>

                    </div> {{-- machine_name,manufacturer,line form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-8">
                            <label class="control-label">Serial Number</label>
                            <input type="text" id="txt_serial_number" name="txt_serial_number" class="form-control"
                                placeholder="Serial Number" autocomplete="off">
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>

                        <div class="col-lg-4">
                            <label class="control-label">Year Made</label>
                            <input type="date" class="form-control" name="txt_date_made" id="txt_date_made">
                        </div>
                    </div> {{-- serial,controller,year made form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label class="control-label">Section</label>
                            <input list="list_section" name="txt_section" class="form-control" placeholder="Select Section"
                                id="txt_section" autocomplete="off">
                            <datalist id="list_section"></datalist>
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
                            <input list="list_line" class="form-control" placeholder="Select Line" name="txt_line"
                                id="txt_line" autocomplete="off">
                            <datalist id="list_line"></datalist>
                        </div>
                    </div> {{--  section, machine location, line form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-8">
                            <label class="control-label">Fixed Asset Number</label>
                            <input type="text" id="txt_fixed_asset_number" name="txt_fixed_asset_number"
                                class="form-control" placeholder="Fixed Asset Number" autocomplete="off">
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>

                        <div class="col-lg-4">
                            <label class="control-label">Date Arrived</label>
                            <input type="date" class="form-control" name="txt_arrival_date" id="txt_arrival_date">
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
                            <input type="text" id="txt_working_capacity" name="txt_working_capacity"
                                class="form-control" placeholder="Working Capacity" autocomplete="off">
                        </div>

                        <div class="mb-md hidden-lg hidden-xl"></div>

                    </div> {{-- serial,controller,year made form-group-end --}}

                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label class="control-label">Remarks</label>
                            <textarea class="form-control" name="txt_remarks" id="txt_remarks" placeholder="Remarks"
                                autocomplete="off"></textarea>
                        </div>
                    </div> {{-- remarks form-group-end --}}


                </div>
            </div>
        </div>
    </div> {{-- Machine Details row-end --}}


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-black panel-machine-registration">
                <div class="panel-heading collapsed" data-toggle="collapse" data-target="#div_pm_schedule_detail"
                    aria-expanded="false">
                    <h4 class="box-title"> <i class="ion ion-clipboard"></i> &nbsp;<b>PREVENTIVE MAINTENANCE
                        </b></h4>
                </div>
                <div class="panel-body collapse" id="div_pm_schedule_detail" aria-expanded="false"
                    style="height: 30px;">


                    <div class="row">
                        <div class="col-lg-12">

                            <div class="form-group">
                                <label class="col-md-1 control-label" for="inputSuccess">Schedule Type</label>
                                <div class="col-md-4 custom-bg">
                                    <label class="checkbox-inline">
                                        <input type="radio" id="chk_sched_quarterly" name="chk_sched_type" value="quarterly">
                                        Quarterly
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="chk_sched_semi" name="chk_sched_type" value="semi_annual">
                                        Semi Annual
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="chk_sched_annual" name="chk_sched_type" value="annual">
                                        Annual
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" id="chk_sched_3years" name="chk_sched_type" value="every_3">
                                        Every 3 Years
                                    </label>
                                </div>
                            </div>

                            <div class="form-group" id="div_sched">

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <button id="btn_save" class="btn btn-primary form-control" type="submit">Submit</button>
        </div>
    </div>

</form>



@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/machine/registration.js"></script>
@endsection