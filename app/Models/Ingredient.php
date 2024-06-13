<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredient';

    protected $primaryKey = 'id_ingre';

    protected $fillable = [
        'desc_ingre', 'nom_ingre', 'photo_ingre'
    ];
}
