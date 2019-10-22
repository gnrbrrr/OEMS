@extends('layouts.app2')

@section('content')

<section class="body-sign">
    <div class="panel center-sign" style="background-color:transparent">
        <div class="outer_div">
            
            <div class="panel-title-sign mt-xl text-right">
                {{-- <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2> --}}
                <img src="{{URL::to('/')}}/theme/assets/images/login_banner.png" alt="Overall Equipment Maintenance System"
                width="500" class="oems_logo_login">
            </div>


            <div class="panel-body" style="background-color:transparent">
                <form action="{{URL::to('/')}}/User/login" method="POST" style="color:white">
                    @csrf
                    <div class="form-group mb-lg">
                        <div class="input-group input-group-icon">
                            <input name="username" type="text" class="form-control input-lg input_custom"
                                placeholder="Employee Number" autocomplete="off">
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg input_custom" placeholder="Password">
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary form-control">Sign In</button>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-10">
        </div> --}}
</section>


{{-- <section class="body-sign">
    <div class="center-sign">
        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
            </div>
            <div class="panel-body">
                <form action="{{URL::to('/')}}/User/login" method="POST">
@csrf
<div class="form-group mb-lg">
    <label>Employee Number</label>
    <div class="input-group input-group-icon">
        <input name="username" type="text" class="form-control input-lg" placeholder="Employee Number">
        <span class="input-group-addon">
            <span class="icon icon-lg">
                <i class="fa fa-user"></i>
            </span>
        </span>
    </div>
</div>

<div class="form-group mb-lg">
    <div class="clearfix">
        <label class="pull-left">Password</label>
    </div>
    <div class="input-group input-group-icon">
        <input name="password" type="password" class="form-control input-lg" placeholder="Password">
        <span class="input-group-addon">
            <span class="icon icon-lg">
                <i class="fa fa-lock"></i>
            </span>
        </span>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary btn-xs form-control">Sign In</button>
    </div>
</div>

</form>
</div>
</div>
</div>
</section> --}}


@endsection

@section('custom-script')
{{-- <script src="{{URL::to('/')}}/scripts/user/index.js"></script> --}}
@endsection