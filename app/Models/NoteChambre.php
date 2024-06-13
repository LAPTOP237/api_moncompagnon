<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteChambre extends Model
{
    use HasFactory;
 
        protected $table = 'note_chambre';

        protected $primaryKey ='id_note_chambre';
    
        protected $fillable = [
            'nb_etoiles_chambre', 'motif_note_chambre', 'id_etudiant', 'id_chambre'
        ];
    
        public $timestamps = false;
    
        // Relations
        public function etudiant()
        {
            return $this->belongsTo(Etudiant::class, 'id_etudiant');
        }
    
        public function chambre()
        {
            return $this->belongsTo(Chambre::class, 'id_chambre');
        }
    

}
