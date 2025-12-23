<?php

namespace App\Models;

use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
     use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'auteur',
        'image',
    ];
    
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
