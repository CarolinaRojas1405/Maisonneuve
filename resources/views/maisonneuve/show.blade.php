@extends('layouts.layout')
@section('content')
    <div class="container my-5 py-5">

        <div class="pt-2">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/Maisonneuve2095376/etudiant" class="btn btn-primary me-md-2" type="button">@lang('lang.back')</a>
            </div>

            <div>
                <h2 class="display-3">{{ ucfirst($etudiants->name) }}</h2>
                <p><span>&#128197;</span>  {!! $etudiants->date_naissance !!}</p>
                <p><span>&#127969;</span> {!! $etudiants->adresse !!}</p>
                <p><span>&#127961;</span> {{ $ville->nom }}</p>
                <p><span>&#128222;</span> {!! $etudiants->telephone !!}</p>
                <p><span>&#128231;</span>  {!! $etudiants->courriel !!}</p>

            </div>
            <hr>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/Maisonneuve2095376/etudiant/{{ $etudiants->id }}/edit" class="btn btn-primary me-md-2" type="button">@lang('lang.update')</a>
                <form id="delete-frm" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="d-grid gap-2 d-md-flex">
                        <button class="btn btn-danger">@lang('lang.delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection