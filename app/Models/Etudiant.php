<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiants';

    public function ville() {
        return $this->belongsTo(Ville::class, 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id');
    }

    protected $fillable = [
        'nom', 'adresse', 'telephone', 'courriel', 'date_naissance', 'ville_id'];
}
