<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;
use Auth;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = ['id', 'titre', 'texte', 'titre_fr', 'texte_fr', 'id_user'];

    public $timestamp = false;

    public function users() {
        return $this->hasOne(User::class, 'id');
    }


    static public function selectArticle(){
        $lang = null;
        
        if(session()->has('locale') && session()->get('locale') == 'fr')
        {
            $lang = '_fr';
        }

        $requete = Article::Select('articles.id', 'articles.created_at', 'users.name', DB::raw('(case WHEN titre'.$lang.' is null THEN titre ELSE titre'.$lang.' END) as titre'))
        ->join('users', 'articles.id_user', '=', 'users.id')
        ->where('titre', '!=', null)
        ->get();
        return $requete;
    }

    static public function mesArticle(){
        $lang = null;
        $id = null;

        if(Auth::check()){
            $id = Auth::user()->id;
            if(session()->has('locale') && session()->get('locale') == 'fr')
            {
                $lang = '_fr';
            }
        }

        $requete = Article::Select('articles.id', 'articles.created_at', DB::raw('(case WHEN titre'.$lang.' is null THEN titre ELSE titre'.$lang.' END) as titre'))
        ->where('articles.id_user', '=', $id)
        ->where('titre', '!=', null)
        ->get();
        return $requete;
    }

}
