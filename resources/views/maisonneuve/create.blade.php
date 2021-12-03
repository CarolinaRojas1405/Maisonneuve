@extends('layouts.layout')

@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">
                    <h3 class="card-header text-center">@lang('lang.register_user')</h3>
                    <div class="card-body">

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="nom" class="form-label">@lang('lang.name')</label>
                                <input type="text" placeholder="@lang('lang.name')" value="{{ old('name') }}" id="name" class="form-control" name="name"
                                    required minlength="2" maxlength="50" autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label for="courriel" class="form-label">@lang('lang.email')</label>
                                <input type="text" placeholder="@lang('lang.email')" value="{{ old('email') }}" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label for="adresse" class="form-label">@lang('lang.address')</label>
                                <input type="text" placeholder="@lang('lang.address')" value="{{ old('adresse') }}" id="adresse" class="form-control"
                                    name="adresse" required autofocus>
                                @if ($errors->has('adresse'))
                                <span class="text-danger">{{ $errors->first('adresse') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label for="ville_id" class="form-label">@lang('lang.city')</label>
                                <select id="ville_id" name="ville_id" class="form-select">
                                    <option>- @lang('lang.selectCity') -</option>
                                    @foreach($villes as $ville)
                                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="telephone" class="form-label">@lang('lang.phone')</label>
                                <input type="text" placeholder="@lang('lang.phone')" value="{{ old('telephone') }}" id="telephone" class="form-control"
                                    name="telephone" required autofocus>
                                @if ($errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label for="date_naissance" class="form-label">@lang('lang.birthday')</label>
                                <input type="date" placeholder="@lang('lang.date')" value="{{ old('date_naissance') }}" id="date_naissance" class="form-control"
                                    name="date_naissance" required autofocus>
                                @if ($errors->has('date_naissance'))
                                <span class="text-danger">{{ $errors->first('date_naissance') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label for="password" class="form-label">@lang('lang.password')</label>
                                <input type="password" placeholder="@lang('lang.password')" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label for="password" class="form-label">@lang('lang.passwordConfirmation')</label>
                                <input type="password" placeholder="@lang('lang.passwordConfirmation')" id="passwordConfirmation" class="form-control" name="passwordConfirmation" required>
                                @if ($errors->has('passwordConfirmation'))
                                <span class="text-danger">{{ $errors->first('passwordConfirmation') }}</span>
                                @endif
                            </div>


                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">@lang('lang.sign_up')</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection