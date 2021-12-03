@extends('layouts.layout')
@section('content')


    @php $locale = session()->get('locale'); @endphp
    @php $user = Auth::user()->id; @endphp
    @php $name = Auth::user()->name; @endphp
    <div class="container my-5 py-5">
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <h1  class="navbar-brand mr-auto">@lang('lang.posts_by') </h1>
            <h2 class="navbar-brand mr-auto">{{ $name }} </h2>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">@lang('lang.update')</th>
                    <th scope="col">@lang('lang.title')</th>
                    <th scope="col">@lang('lang.text')</th>
                    <th scope="col">@lang('lang.created_at')</th>
                    <th scope="col">@lang('lang.delete')</th>
                </tr>
            </thead>
            <tbody>
            @forelse($articles as $article)

                <tr>
                    <td scope="row"><a href="/Maisonneuve2095376/articles/{{ $article->id }}/edit" class="btn btn-outline-success">&#9998;</a></td>
                    <td>{{ strtoupper($article->titre) }}</td>
                    <td>{{ ucfirst($article->texte) }}</td>
                    <td>{{ strftime('%d/%m/%Y', strtotime($article->created_at)) }}</td>
                    <td scope="row">
                        <form id="delete-frm" action="/Maisonneuve2095376/articles/{{ $article->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="d-grid gap-2 d-md-flex">
                                <button class="btn btn-outline-danger">&#10060;</button>
                            </div>
                        </form>
                    </td>
                    </a>
                </tr>
            @empty
            <tr>
                <th scope="col">@lang('lang.no_post')</th>
            </tr>
            </tbody>
            @endforelse
        </table>
        <div>
            <a href="/Maisonneuve2095376/articles/create/new" class="btn btn-outline-primary">@lang('lang.add')</a>
        </div>
    </div>

@endsection