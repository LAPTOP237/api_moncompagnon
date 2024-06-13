<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableCite extends Model
{
    use HasFactory;

    protected $table = 'responsable_cite';

    protected $primaryKey = 'id_resp_cite';
    protected $fillable = [
        'doc_cite', 
        'cni', 
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
