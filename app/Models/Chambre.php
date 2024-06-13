<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    protected $table = 'chambre';
    protected $primaryKey = 'id_chambre';

    protected $fillable = [
        'code_chambre', 'photo_chambre', 'desc_chambre', 'niveau', 'est_equipe', 'prix', 'Column1', 'id_cite', 'created_at', 'update_at'
    ];
}
