@extends('layouts.auth') 
@section('login')
<div class="login-box">
    <div class="login-logo">Selamat Datang</div>
    <div class="login-box-body">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <div></div>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Email"
                    required="required"
                    value="{{ old('email') }}"
                    autofocus="autofocus">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                <span class="help-block">{{ $message }}</span>
                @else
                <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Password"
                    required="required">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                <span class="help-block">{{ $message }}</span>
                @else
                <span class="help-block with-errors"></span>
                @enderror
            </div>
            <div class="row">
                <div class="col-xs-4"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection