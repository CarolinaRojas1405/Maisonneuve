@extends('layouts.layout')

@section('content')
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
                <div class="border rounded mt-5 pt-4 px-4 py-4">
                    <h1 class="display-4">@lang('lang.create_new_article')</h1>
                    <p>@lang('lang.complete_form') </p>

                    <hr>
                    <form action="/Maisonneuve2095376/article/create/new" method="POST">
                        @csrf

                        @if(isset(Auth::user()->id))
                        <input type="hidden" id="id_user" class="form-control" name="id_user" value="{{Auth::user()->id}}" >
                        @endif
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="titre">Title (EN)</label>
                                <input type="text" id="titre" class="form-control" name="titre" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group col-12 mt-2">
                                <label for="texte">Content (EN)</label>
                                <textarea id="texte" class="form-control" name="texte" placeholder=""  rows="5"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="titre_fr">Titre (FR)</label>
                                <input type="text" id="titre" class="form-control" name="titre_fr" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group col-12 mt-2">
                                <label for="texte_fr">Contenu (FR)</label>
                                <textarea id="texte" class="form-control" name="texte_fr" placeholder=""  rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                @lang('lang.add')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection