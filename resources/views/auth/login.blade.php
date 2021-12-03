@extends('layouts.layout')

@section('content')

<main class="login-form">
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header text-center">@lang('lang.connection')</h3>
                    <div class="card-body">
                    @if(session('success'))
                        <h4 class="text-danger">{{session('success')}}</h4>
                    @endif
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="@lang('lang.email')" id="email" class="form-control" value="{{ old('email') }}" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="@lang('lang.password')" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">@lang('lang.sign_in')</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection