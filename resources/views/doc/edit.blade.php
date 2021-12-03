@extends('layouts.layout')

@section('content')
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                    <div class="btn-box">
                        <a href="/Maisonneuve2095376/document" class="btn btn-outline-primary btn-sm">&#10094; @lang('lang.all_docs')</a>
                    </div>

                </div>
                <div class="border rounded mt-5 pt-4 px-4 py-4">
                    <h1 class="display-4">@lang('lang.add_doc')</h1>
                    <p>@lang('lang.complete_form') </p>

                    <hr>
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="titre">Name (EN)</label>
                                <input type="text" id="titre" class="form-control" name="titre" value="{{ $docs->titre }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="control-group col-12">
                                <label for="titre_fr">Nom (FR)</label>
                                <input type="text" id="titre" class="form-control" name="titre_fr" value="{{ $docs->titre_fr }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="fichier"></label>
                                <input type="text" id="titre" class="form-control" name="fichier" value="{{ $docs->fichier }}" readonly="readonly">
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                @lang('lang.update')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection