<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiant';

    protected $primaryKey = 'id_etudiant';

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
