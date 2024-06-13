<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecetteIngredient extends Model
{
    use HasFactory;


    protected $table = 'recette_ingredient';

    protected $primaryKey = 'id_rec_ingre';
    

    protected $fillable = [
        'id_rec', 'id_ingre', 'quantite'
    ];

    public $timestamps = false;

    // Relations
    public function recette()
    {
        return $this->belongsTo(Recette::class, 'id_rec');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'id_ingre');
    }

}
