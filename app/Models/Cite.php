<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cite extends Model
{
    use HasFactory;

        protected $table = 'cite';

        protected $primaryKey = 'id_cite';
    
        protected $fillable = [
            'nom_cite', 'lieu', 'localisation', 'photo_cite', 'desc_cite', 'id_resp_cite'
        ];
    
        // Relations
        public function responsable()
        {
            return $this->belongsTo(ResponsableCite::class, 'id_resp_cite');
        }

        // Relation avec les chambres
        public function chambres()
        {
            return $this->hasMany(Chambre::class, 'id_cite');
        }

    
}
