@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <login-form route-login="{{ route('login') }}"
                        route-request="{{ route('password.request') }}"
                        old-email="{{ old('email') }}"
                        old-password="{{ old('password') }}"
                        old-remember="{{ old('remember') }}"
                        error-email="{{ $errors->first('email') }}"
                        error-password="{{ $errors->first('password') }}">
            </login-form>
        </div>
    </div>
</div>
@endsection
