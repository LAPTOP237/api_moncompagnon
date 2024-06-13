<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    protected $table = 'recette';

    protected $primaryKey = 'id_rec';

    protected $fillable = [
        'nom_rec', 'desc_rec', 'photo_rec', 'preparation', 'id_type_rec'
    ];

    public function typeRecette()
    {
        return $this->belongsTo(TypeRecette::class, 'id_type_rec');
    }

    // Relation avec les ingrédients
    public function ingredients()
    {
        return $this->hasMany(RecetteIngredient::class, 'id_rec')->with('ingredient');
    }

}
