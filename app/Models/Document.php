<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use DB;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';


    protected $fillable = [
        'id', 'fichier', 'titre', 'titre_fr', 'extension', 'etudiant_id'];

    
        public function users() {
        return $this->hasOne(User::class, 'id');
    }
    

    static public function selectDoc(){
        $lang = null;
        if(session()->has('locale') && session()->get('locale') == 'fr')
        {
            $lang = '_fr';
        }

        $requete = Document::Select('documents.id', 'documents.fichier','documents.created_at', 'users.name', DB::raw('(case WHEN titre'.$lang.' is null THEN titre ELSE titre'.$lang.' END) as titre'))
        ->join('users', 'documents.etudiant_id', '=', 'users.id')
        ->where('titre', '!=', null)
        ->get();
        return $requete;
    }
}
