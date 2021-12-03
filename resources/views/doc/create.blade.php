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
                    <form action="{{route('addDocument')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if(isset(Auth::user()->id))
                        <input type="hidden" id="etudiant_id" class="form-control" name="etudiant_id" value="{{Auth::user()->id}}" >
                        @endif

                        <div class="row">
                            <div class="control-group col-12">
                                <label for="titre">Name (EN)</label>
                                <input type="text" id="titre" class="form-control" name="titre" placeholder="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="control-group col-12">
                                <label for="titre_fr">Nom (FR)</label>
                                <input type="text" id="titre" class="form-control" name="titre_fr" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group col-12 mt-2">
                                <label for="fichier">@lang('lang.file')</label>
                                <input type="file" accept="application/pdf, .doc, .zip" id="fichier" class="form-control" name="fichier" multiple />
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