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
                <div class="card-body">
                    <h1 class="display-one">{{ ucfirst($article->titre_fr) }}</h1>
                    <p>{!! $article->texte_fr !!}</p>
                    <hr>
                </div>
                @elseif($locale == 'en')
                <div class="card-body">
                    <h1 class="display-one">{{ ucfirst($article->titre) }}</h1>
                    <p>{!! $article->texte !!}</p>
                    <hr>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection