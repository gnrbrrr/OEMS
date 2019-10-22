@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-4 col-xl-4">
            <section class="panel panel-featured-left panel-featured-edited">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fa fa-warning fa-custom-big appear-animation bounceIn appear-animation-visible"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><b>Troubles (TR)</b></h4>
                                <div class="info">
                                    <strong class="amount" id="txt_trouble_tr">7</strong>
                                    {{-- <span class="text-primary">(14 unread)</span> --}}
                                </div>
                            </div>
                            {{-- <div class="summary-footer">
                                <a class="text-muted text-uppercase">(view all)</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-4 col-xl-4">
            <section class="panel panel-featured-left panel-featured-edited">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fa fa-gear fa-custom-big appear-animation bounceIn appear-animation-visible"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><b>Troubles (MDI)</b></h4>
                                <div class="info">
                                    <strong class="amount" id="txt_trouble_mdi">20</strong>
                                </div>
                            </div>
                            {{-- <div class="summary-footer">
                                <a class="text-muted text-uppercase">(withdraw)</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-12 col-lg-4 col-xl-4">
            <section class="panel panel-featured-left panel-featured-edited">
                <div class="panel-body">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fa fa-wrench fa-custom-big appear-animation bounceIn appear-animation-visible"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title"><b>Machine's for PM<b></h4>
                                <div class="info">
                                    <strong class="amount" id="txt_machine_pm">6</strong>
                                </div>
                            </div>
                            {{-- <div class="summary-footer">
                                <a class="text-muted text-uppercase">(statement)</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-tachometer" style="color:#ffffff"></i> Machine Daily Inspection</h2>
                </header>
                <div class="panel-body">
                    <table class="table table-bordered table-striped" id="tbl_dashboard_mdi" >
                        <thead>
                            <tr>
                                <th width="20%">Area</th>
                                <th width="25%">Machine</th>
                                <th width="25%">Manufacturer</th>
                                <th width="15%">Working Capacity</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-md-12 col-lg-6 col-xl-6">
            <section class="panel">
                <header class="panel-heading">            
                    <h2 class="panel-title"><i class="fa fa-calendar" style="color:#ffffff"></i> Machine Planned Maintenance</h2>
                </header>
                <div class="panel-body">
                    <table id="tbl_dashboard_mpm" class="tbl_mpm">
                        <tr>
                            <td rowspan="2" style="width:45%;">
                                <h4>Total Number of PM Schedule</h4>
                                <h1 id="txt_total_PMs">191</h1>
                            </td>
                            <td>
                                <h5>Accomplished</h5>
                                <h2 id="txt_accomplished">191</h2>
                            </td>
                            <td>
                                <h5>Pending</h5>
                                <h2 id="txt_pending">191</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>On Time</h5>
                                <h2 id="txt_on_time">191</h2>
                            </td>
                            <td>
                                <h5>Reschedule</h5>
                                <h2 id="txt_reschedule">191</h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-bar-chart-o" style="color:#ffffff"></i> Overall Daily Machine Status Monitoring</h2>
                </header>
                <div class="panel-body">
                    <table class="table" id="tbl_dashboard_overall">
                        <thead>
                            <tr>
                                <th>Code</th>
                                @for($i=1;$i<=31;$i++)
                                    <th id="th_{{$i}}">{{$i}}</th>
                                @endfor
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title"><i class="fa fa-bar-chart-o" style="color:#ffffff"></i> Overall Daily Machine Status Monitoring</h2>
                    </header>
                    <div class="panel-body">
                        <table class="table" id="tbl_dashboard_overall">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Apr</th>
                                    <th>May</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Aug</th>
                                    <th>Sep</th>
                                    <th>Oct</th>
                                    <th>Nov</th>
                                    <th>Dec</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>NEEDED<br>(liter)</th>
                                    <th>STOCKS<br>(liter)</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </section>
            </div>
        </div>
@endsection

@section('custom-script')
{{-- <script src="{{URL::to('/')}}/theme/assets/javascripts/dashboard/examples.dashboard.js"></script> --}}
@endsection