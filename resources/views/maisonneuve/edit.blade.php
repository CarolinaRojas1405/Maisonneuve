@extends('layouts.layout')
@section('content')

<div class="container">
    <div class="pt-2">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/etudiant" class="btn btn-primary me-md-2" type="button">@lang('lang.back')</a>
        </div>
        <div class="card-header mt-5 pl-4 pr-4 pt-4 pb-4">
              <h2 class="display-4">@lang('lang.edit')</h2>

            <hr>
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <legend>@lang('lang.complete_form')</legend>
                <div class="mb-3">
                    <label for="nom" class="form-label">@lang('lang.name')</label>
                    <input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" value="{{ $etudiant->nom }}" required>
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">@lang('lang.address')</label>
                    <input id="adresse" class="form-control" name="adresse" placeholder="Adresse" value="{{ $etudiant->adresse }}" required></input>
                </div>
                <div class="mb-3">
                    <label for="telephone" class="form-label">@lang('lang.phone')</label>
                    <input id="telephone" class="form-control" name="telephone" placeholder="Téléphone" value="{{ $etudiant->telephone }}" required></input>
                </div>
                <div class="mb-3">
                    <label for="courriel" class="form-label">@lang('lang.email')</label>
                    <input id="courriel" class="form-control" name="courriel" placeholder="Courriel" value="{{ $etudiant->courriel }}" required></input>
                </div>
                <div class="mb-3">
                    <label for="date_naissance" class="form-label">@lang('lang.birthday')</label>
                    <input id="date_naissance" class="form-control" name="date_naissance" placeholder="aaaa-mm-dd" value="{{ $etudiant->date_naissance }}" required></input>
                </div>
                <div class="mb-3">
                    <label for="ville_id" class="form-label">@lang('lang.city')</label>
                    <select id="ville_id" name="ville_id" class="form-select">
                        <option>{{ $etudiant->find($etudiant->ville_id)->ville->nom }}</option>
                        @foreach($villes as $ville)
                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="row mt-2">
                    <div class="control-group col-12 text-center">
                        <button id="btn-submit" class="btn btn-primary">
                        @lang('lang.send')
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>


@endsection
