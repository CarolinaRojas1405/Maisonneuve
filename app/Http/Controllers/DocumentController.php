<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LocalizationController;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $name = null;
        if(Auth::check()){
            $id = Auth::user()->id;
            $docs = Document::all();
            return view('doc.index', ['id' => $id, 'docs' => $docs]);

        }
        return redirect('login');
        //return $docs;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::check()){

            $request->validate([
                'fichier' => "required|mimes:pdf,zip,doc",
            ]);

            $document = new Document;
            $document->fill($request->all());
            $ext = $request->file("fichier")->getClientOriginalExtension();
            //$fichierNom = $_FILES["fichier"]["name"];
            $fichier = rand().'-'.$request->file("fichier")->getClientOriginalName();
            $request->file("fichier")->storeAs("public/fichier", $fichier);

            $document->titre = $request->titre;
            $document->titre_fr = $request->titre_fr;
            $document->extension = $ext;
            $document->etudiant_id = Auth::user()->id;
            $document->fichier = $fichier;
            $document->save();

            return redirect('/document'); 
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {

        return $document;
    }



    public function download(Document $document) {

        $path = storage_path("app/public/fichier/".$document->fichier);
        //return $path;
        return response()->download($path);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $user_id = $document->etudiant_id;
        if(Auth::check() && Auth::user()->id == $user_id){
            return view('doc.edit', ['docs'=> $document]);
        }
        return redirect('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        if(Auth::check()){
            $document->update([
                'titre' => $request->titre,
                'titre_fr' => $request->titre_fr,
            ]);
        }
  
        return redirect('/document'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        Storage::delete("public/fichier", $document->fichier);

        return redirect('/document');
    }
}
