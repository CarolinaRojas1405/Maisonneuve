<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Auth;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $tous = Etudiant::all();
       return view('maisonneuve.index',['tous' => $tous]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ville = Ville::all();
        return view('maisonneuve.create', ['villes' => $ville]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newEtudiant = Etudiant::create([
            'name' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'courriel' => $request->courriel,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
        ]);

        return redirect('etudiant/'.$newEtudiant->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $id_ville = $etudiant->ville_id;
        $ville = Ville::find($id_ville);

        //return $ville->nom;
        return view('maisonneuve.show', ['etudiants' => $etudiant, 'ville' => $ville]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $ville = Ville::all();
        return view('maisonneuve.edit', ['etudiant' => $etudiant, 'villes' => $ville]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([
            'name' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'courriel' => $request->courriel,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
        ]);
        return redirect('etudiant/'.$etudiant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect('/etudiant');
    }
}
