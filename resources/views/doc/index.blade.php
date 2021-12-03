@extends('layouts.layout')
@section('content')

    @php $locale = session()->get('locale'); @endphp
    @php $user = Auth::user()->id; @endphp
    @php $name = Auth::user()->name; @endphp

    <div class="container my-5 py-5">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                    <div class="btn-box">
                        <a href="/Maisonneuve2095376/document/create/doc" class="btn btn-outline-primary btn-sm">@lang('lang.add')</a>
                    </div>
                </div>

                <div class="group ps-5">
                    @forelse($docs as $document)
                        @if($locale == 'fr')

                            <div class="card text-dark bg-light mb-3 m-sm-5 list-group" style="width: 18rem;">
                                <div class="card-header">{{ ucfirst($document->titre_fr) }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ ucfirst($document->fichier) }}</h5>
                                    <a href="/Maisonneuve2095376/document/{{ $document->id }}/download" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg></a>
                                    <p class="card-text">{{ strftime('%d/%m/%Y', strtotime($document->created_at)) }}</p>
                                    @if($user == $document->etudiant_id)
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                                        <a href="/Maisonneuve2095376/document/{{ $document->id }}/edit" class="btn btn-outline-success">&#9998;</a>
                                        <form id="delete-frm" action="/Maisonneuve2095376/document/{{ $document->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="d-grid gap-2 d-md-flex">
                                                <button class="btn btn-outline-danger">&#10060;</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    
                        @elseif($locale == 'en')
                            <div class="card text-dark bg-light mb-3 m-sm-5 list-group" style="width: 18rem;">
                                <div class="card-header">{{ ucfirst($document->titre) }}</div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ ucfirst($document->fichier) }}</h5>
                                    <a href="/Maisonneuve2095376/document/{{ $document->id }}/download" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                    </svg></a>
                                    <p class="card-text">{{ strftime('%d/%m/%Y', strtotime($document->created_at)) }}</p>
                                    @if($user == $document->etudiant_id)
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                                        <a href="/Maisonneuve2095376/document/{{ $document->id }}/edit" class="btn btn-outline-success">&#9998;</a>
                                        <form id="delete-frm" action="/document/{{ $document->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="d-grid gap-2 d-md-flex">
                                                <button class="btn btn-outline-danger">&#10060;</button>
                                            </div>
                                        </form>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @empty
                        <p class="text-warning">Aucun étudiant disponible </p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!--  -->