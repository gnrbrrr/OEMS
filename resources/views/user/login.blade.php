@extends('layouts.app2')

@section('content')


<section class="body-sign">
    <div class="center-sign">
        <div class="panel panel-sign">
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
</section>


@endsection

@section('custom-script')
{{-- <script src="{{URL::to('/')}}/scripts/user/index.js"></script> --}}
@endsection