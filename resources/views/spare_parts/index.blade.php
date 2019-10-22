@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <div class="form-check-inline form-check">

                    </div> {{-- form-check-inline-end --}}
                </div> {{-- panel-actions-end --}}
                <h2 class="panel-title"><i class="fa fa-list" style="color:#ffffff"></i> Spare Parts List</h2>
            </header>
            <div class="panel-custom panel-body panel-body-custom-management">
                <table id="tbl_spare_parts" class="table-object table mb-none align-center-middle">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td width="7%">Actions</td>
                            <td width="5%">Code</td>
                            <td>Name</td>
                            <td width="5%">Type</td>
                            <td>Brand</td>
                            <td width="7%">Specification</td>
                            <td>Supplier</td>
                            <td width="7.5%">Line</td>
                            <td width="5%">Location</td>
                            <td width="8%">Stock Quantity</td>
                            <td width="5%">Minimum Stock</td>
                            <td>Unit</td>
                            <td>Currency</td>
                            <td width="3%">Price per Unit</td>
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
<div id="mdl_spare_parts_registration" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content - start-->
        <div class="modal-content panel">

            <section>

                <header class="panel-heading">
                    <h2 class="panel-title">Spare Parts Registration Form</h2>
                </header>

                <div class="panel-body">
                    <form id="form_spare_parts_registration">

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="control-label">Code</label>
                                <input type="text" id="txt_sp_code" name="txt_sp_code" class="form-control"
                                    placeholder="Code" autocomplete="off">
                            </div>

                            <div class="col-lg-8">
                                <label class="control-label">Name</label>
                                <input type="text" id="txt_sp_name" name="txt_sp_name" class="form-control"
                                    placeholder="Code" autocomplete="off">
                            </div>
                        </div> {{-- COdDE & NAME END --}}

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="control-label">Type</label>
                                <input type="text" list="list_type" id="txt_sp_type" name="txt_sp_type"
                                    class="form-control" placeholder="Type" autocomplete="off">
                                <datalist id="list_type"></datalist>
                            </div>

                            <div class="col-lg-6">
                                <label class="control-label">Brand</label>
                                <input type="text" list="list_brand" id="txt_sp_brand" name="txt_sp_brand"
                                    class="form-control" placeholder="Brand" autocomplete="off">
                                <datalist id="list_brand"></datalist>
                            </div>

                        </div> {{-- TYPE & BRAND END --}}

                        <div class="row">
                            <div class="col-lg-12">
                                <label class="control-label">Specification</label>
                                <input type="text" list="list_specification" id="txt_sp_specs" name="txt_sp_specs"
                                    class="form-control" placeholder="Specification" autocomplete="off">
                                <datalist id="list_specification"></datalist>
                            </div>
                        </div> {{-- SPECIFICATION END --}}

                        <div class="row">
                            <div class="col-lg-12">
                                <label class="control-label">Supplier</label>
                                <input type="text" list="list_supplier" id="txt_sp_supplier" name="txt_sp_supplier"
                                    class="form-control" placeholder="Supplier" autocomplete="off">
                                <datalist id="list_supplier"></datalist>
                            </div>
                        </div> {{-- SUPPLIER END --}}

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="control-label">Line</label>
                                <input type="text" list="list_line" id="txt_sp_line" name="txt_sp_line"
                                    class="form-control" placeholder="Line" autocomplete="off">
                                <datalist id="list_line"></datalist>
                            </div>

                            <div class="col-lg-6">
                                <label class="control-label">Location</label>
                                <input type="text" list="list_location" id="txt_sp_location" name="txt_sp_location"
                                    class="form-control" placeholder="Location" autocomplete="off">
                                <datalist id="list_location"></datalist>
                            </div>
                        </div> {{-- LINE & LOCATION END --}}

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="control-label">Unit</label>
                                <input type="text" list="list_unit" id="txt_sp_unit" name="txt_sp_unit"
                                    class="form-control" placeholder="Unit (ex. Litre, Piece)" autocomplete="off">
                                <datalist id="list_unit"></datalist>
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label">Alternative Unit</label>
                                <input type="text" list="list_unit" id="txt_sp_alt_unit" name="txt_sp_alt_unit"
                                    class="form-control" placeholder="Unit (ex. Litre, Piece)" autocomplete="off">
                            </div>
                        </div> {{-- UNIT & ALT_UNIT END --}}

                        <div class="row">
                            <div class="col-lg-6">
                                <label class="control-label">Stock Quantity</label>
                                <input type="number" id="txt_sp_stock" name="txt_sp_stock" class="form-control"
                                    placeholder="Stock Quantity" autocomplete="off">
                            </div>
                            <div class="col-lg-6">
                                <label class="control-label">Minimum Stock</label>
                                <input type="number" id="txt_sp_minimum" name="txt_sp_minimum" class="form-control"
                                    placeholder="Min Stock" autocomplete="off">
                            </div>
                        </div> {{-- STOCK QTY & MINIMUM STOCK END --}}

                        <div class="row">
                            <div class="col-lg-4">
                                <label class="control-label">Currency</label>
                                <input type="text" list="list_currency" id="txt_sp_currency" name="txt_sp_currency"
                                    class="form-control" placeholder="Unit (ex.PHP, USD, SGD)" autocomplete="off">
                                <datalist id="list_currency"></datalist>
                            </div>

                            <div class="col-lg-8">
                                <label class="control-label">Price</label>
                                <input type="number" id="txt_sp_price" name="txt_sp_price" class="form-control"
                                    placeholder="Price" autocomplete="off">
                            </div>
                        </div> {{-- LINE & LOCATION END --}}

                        <div class="row">
                            <div class="col-lg-12">
                                <label class="control-label">Remarks</label>
                                <textarea id="txt_sp_remarks" name="txt_sp_remarks" class="form-control"
                                    placeholder="Remarks" autocomplete="off"> </textarea>
                            </div>
                        </div> {{-- REMARKS END --}}

                    </form>
                </div>

                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary modal-confirm" onclick="SPARE_PARTS.update()">Update</button>
                            <button class="btn btn-default modal-dismiss" id="btn_cancel">Cancel</button>
                        </div>
                    </div>
                </footer>

            </section>


        </div>
        <!-- Modal content - end-->

    </div>
</div> {{-- MODAL END--}}


@endsection

@section('custom-script')
<script src="{{URL::to('/')}}/scripts/spare_parts/index.js"></script>
@endsection