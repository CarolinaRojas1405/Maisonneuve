<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use App\Models\User;
use App\Models\Article;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $ville = Ville::all();
        return view('auth.register', ['villes' => $ville]);
    }

    /**
     * Store a newly created user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
        'name' => 'required|max:50|min:2',
        'email' => 'required|email|unique:users',
        'password' => 'required_with:passwordConfirmation|min:6',
        'passwordConfirmation' => 'required|same:password',
        'adresse' => 'required|max:50|min:2',
        'telephone' => 'required|min:12',
        'date_naissance' => 'required|date:Y-m-d',
        'ville_id' => 'required|in:App\Models\Ville,id',
      ]);

        $newUser = new User;
        $newUser->fill($request->all());
        $newUser->password = Hash::make($request->password);
        $newUser->save();

        $newEtudiant = new Etudiant;
        $newEtudiant->fill($request->all());
        $newEtudiant->id = $newUser->id;
        $newEtudiant->name = $newUser->name;
        $newEtudiant->courriel = $newUser->email;
        $newEtudiant->save();


        //return $user;

        return redirect("login");
    }



    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect("login")->withSuccess('Échec de la connexion');
    }


    public function dashboard()
    {
        $name = null;
        
        if(Auth::check()){
            $articles = Article::selectArticle();

        }
        //return $articles;
        return view('maisonneuve.dashboard', ['articles' => $articles]);
    }


    /**
     * Logout.
     *
     * @param  Session
     * @return 
     */


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
