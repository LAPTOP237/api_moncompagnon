<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRecette extends Model
{
    use HasFactory;

    protected $table = 'type_recette';

    protected $primaryKey = 'id_type_rec';

    protected $fillable = [
        'desc_type_rec', 'nom_type_rec'
    ];
}


