@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-black">
                <div class="panel-heading" aria-expanded="false">
                    <h4 class="box-title"> <i class="ion ion-clipboard"></i> &nbsp;<b>EQUIPMENT DETAILS</b></h4>
                </div>
                <div class="panel-body" id="div_machine_details" aria-expanded="false">

                    <form id="form_equipment_registration" enctype="multipart/form-data">
                        @csrf
                        <center>
                            <img src="{{URL::to('/')}}/upload/machine/image.png" style="width:15%;margin-bottom:2%;"
                                id="img_equipment" class="img-thumbnail">
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
                                                Select Equipment Image</span>
                                            <input type="file" name="img_input_equipment" id="img_input_equipment"
                                                onchange="HELPER.file_preview(this,'img_equipment','{{URL::to('/')}}/upload/machine/image.png')">
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
                            <div class="col-lg-4">
                                <label class="control-label">Equipment Name</label> <br>
                                <input list="list_equipment_name" class="form-control" placeholder="Equipment Name"
                                    name="txt_equipment_name" id="txt_equipment_name" autocomplete="off">
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
                        </div> {{-- Equipment name,model,controller form-group-end --}}

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label class="control-label">Serial Number</label>
                                <input type="text" id="txt_serial_number" name="txt_serial_number" class="form-control"
                                    placeholder="Serial Number" autocomplete="off">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-6">
                                <label class="control-label">Fixed Asset Number</label>
                                <input type="text" id="txt_fixed_asset_number" name="txt_fixed_asset_number"
                                    class="form-control" placeholder="Fixed Asset Number" autocomplete="off">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                        </div> {{-- serial number, fixed asset form-group-end --}}

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
                        </div> {{-- Manufacturer, working cap form-group-end --}}

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
                                <input list="list_section" name="txt_section" class="form-control" placeholder="Section"
                                    id="txt_section" autocomplete="off">
                                <datalist id="list_section"></datalist>
                            </div>

                            {{--  <div class="mb-md hidden-lg hidden-xl"></div> --}}

                        </div> {{-- line, location, section --}}

                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label class="control-label">Date Made</label>
                                <input type="date" class="form-control" name="txt_date_made" id="txt_date_made">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                            <div class="col-lg-6">
                                <label class="control-label">Date Arrived</label>
                                <input type="date" class="form-control" name="txt_arrival_date" id="txt_arrival_date">
                            </div>

                            <div class="mb-md hidden-lg hidden-xl"></div>

                        </div> {{-- date_made, date_arrived form-group-end --}}

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label class="control-label">Remarks</label>
                                <input type="text" class="form-control" name="txt_remarks" id="txt_remarks"
                                    placeholder="Remarks" autocomplete="off">
                            </div>
                        </div> {{-- remarks form-group-end --}}

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <button id="btn_save" class="form-control btn btn-custom" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div> {{-- Machine Details row-end --}}



@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/equipment/index.js"></script>
@endsection