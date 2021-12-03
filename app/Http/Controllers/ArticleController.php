<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\LocalizationController;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $id = null;
            $name = null;
            if(Auth::check()){
                $id = Auth::user()->id;
                $name = Auth::user()->name;
                /*$articles = Article::all();
                return view('article.index', ['id' => $id, 'name' => $name, 'articles' => $articles]);
    
            }
            return redirect('login'); */
            $articles = Article::mesArticle();
            return view('article.index', ['id' => $id, 'name' => $name, 'articles' => $articles]);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $newArticle = Article::create([
            'titre' => $request->titre,
            'titre_fr' => $request->titre_fr,
            'texte' => $request->texte,
            'texte_fr' => $request->texte_fr,
            //'id_user' => Auth::user()->id
            'id_user'=>$request->id_user
          ]);

        return redirect('articles/'.$newArticle->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //return $article;
        if(Auth::check()){
            return  view('article.show', ['article' => $article]);
        }
        return redirect('login');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $user_id = $article->id_user;
        if(Auth::check() && Auth::user()->id == $user_id){
            return view('article.edit', ['article'=> $article]);
        }
        return redirect('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        if(Auth::check()){
            $article->update([
                'titre' => $request->titre,
                'texte' => $request->texte,
                'titre_fr' => $request->titre_fr,
                'texte_fr' => $request->texte_fr,
            ]);
        }
  
          return redirect('articles/mes-articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articles/mes-articles');
    }
}
