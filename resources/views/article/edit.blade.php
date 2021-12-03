@extends('layouts.layout')
@section('content')

  <div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 pt-2">
            <div class="btn-box">
                <a href="/Maisonneuve2095376/articles/mes-articles" class="btn btn-outline-primary btn-sm">&#10094; @lang('lang.back')</a>
            </div>
                <div class="border rounded mt-5 pt-4 px-4 py-4">
                <h1 class="display-4">@lang('lang.edit')</h1>
                <p>@lang('lang.complete_form')</p>

                <hr>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="titre">Title (EN)</label>
                            <input type="text" id="titre" class="form-control" name="titre" placeholder="" value="{{ $article->titre }}" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="texte">Text (EN)</label>
                            <textarea id="texte" class="form-control" name="texte" placeholder=""  rows="5" required>{{ $article->texte }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="titre">Titre (FR)</label>
                            <input type="text" id="titre" class="form-control" name="titre" placeholder="" value="{{ $article->titre_fr }}" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="texte">Texte (FR)</label>
                            <textarea id="texte" class="form-control" name="texte" placeholder=""  rows="5" required>{{ $article->texte_fr }}</textarea>
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

        </div><!--/col12-->
    </div> <!--/row-->
  </div><!--/container-->


@endsection
