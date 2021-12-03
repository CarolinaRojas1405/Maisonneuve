@extends('layouts.layout')
@section('content')

@php $locale = session()->get('locale'); @endphp
<div class="container my-5 py-5">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                    <div class="btn-box">
                        <a href="/Maisonneuve2095376/dashboard" class="btn btn-outline-primary btn-sm">&#10094; @lang('lang.back_all')</a>
                    </div>
                    <div class="btn-box">
                        <a href="/Maisonneuve2095376/articles/mes-articles" class="btn btn-outline-primary btn-sm">&#10094; @lang('lang.back_my')</a>
                    </div>
                </div>
                @if($locale == 'fr')
                <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">titre_fr</div>
                    <div class="card-body">
                        <h5 class="card-title">Light card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                @elseif($locale == 'en')
                <div class="card-body">
                    <h1 class="display-one">{{ ucfirst($document->titre) }}</h1>
                    <p>{!! $document->texte !!}</p>
                    <hr>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection