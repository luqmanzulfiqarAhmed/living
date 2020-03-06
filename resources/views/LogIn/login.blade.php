@extends('admin.adminLayout')
@section('content')
    <body class="login-img3-body">
        <div class="container">
            {!! Form::open(['action' => 'AdminLoginController@store' , 'method' => 'POST' , 'class' => 'login-form']) !!}
                <div class="login-wrap">
                    <p class="login-img"><i class="icon_lock_alt"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        {{{ Form::email('adminEmail', '', ['class' => 'form-control' , 'placeholder' => 'Email' , 'maxlength' => '25']) }}}
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        {{{ Form::password('adminPassword', ['class' => 'form-control' , 'placeholder' => 'Password' , 'maxlength' => '15'] )}}}
                    </div>
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                        <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                    </label>
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </body>
@endsection