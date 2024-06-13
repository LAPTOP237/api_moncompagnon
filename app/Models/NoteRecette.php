<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteRecette extends Model
{
    use HasFactory;

    protected $table = 'note_recette';
    protected $primaryKey = 'id_note_rec';
    

    protected $fillable = [
        'nb_etoiles_rec', 'motif_note_rec', 'id_etudiant', 'id_rec'
    ];

    public $timestamps = false;

    // Relations
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'id_etudiant');
    }

    public function recette()
    {
        return $this->belongsTo(Recette::class, 'id_rec');
    }

}
