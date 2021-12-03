@extends('layouts.layout')
@section('content')



    <div class="container my-5 py-3">
        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
            <div class="btn-box">
                <a href="/Maisonneuve2095376/articles/create/new" class="btn btn-outline-primary">@lang('lang.add')</a>
            </div>
        </div>
        <h1>@lang('lang.posts')</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">@lang('lang.title')</th>
                    <th scope="col">@lang('lang.author')</th>
                    <th scope="col">@lang('lang.created_at')</th>
                </tr>
            </thead>
            <tbody>
            @forelse($articles as $article)
                <tr>
                    <th scope="row"></th>
                    <td><a class="table-title" href="/Maisonneuve2095376/articles/{{$article->id}}">{{ ucfirst($article->titre) }}</a></td>
                    <td>{{ ucfirst($article->name) }}</td>
                    <td>{{ strftime('%d/%m/%Y', strtotime($article->created_at)) }}</td>
                </tr>
                @empty
                <tr>
                    <th scope="col">Pas d'article </th>
                </tr>
            </tbody>
            @endforelse
        </table>

    </div>

@endsection
