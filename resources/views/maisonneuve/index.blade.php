@extends('layouts.layout')
@section('content')

<div class="container my-5 py-3">
    <div class="card-header">
        <div>
            <p class="text-lg-start">@lang('lang.list_students')</p>
            <p>@lang('lang.instruction')</p>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/Maisonneuve2095376/etudiant/create/new" class="btn btn-outline-primary" type="button">@lang('lang.add')</a>
        </div>
    </div>
    <div class="group ps-5">
    @forelse($tous as $etudiants)
        <ul class="list-group">
            <li class="list-group-item"><a href="./etudiant/{{ $etudiants->id }}">{{ ucfirst($etudiants->name) }}</a></li>
        </ul>
    @empty
        <p class="text-warning">Aucun étudiant disponible </p>
    @endforelse
    </div>
</div>
@endsection