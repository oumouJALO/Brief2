<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ['contenu','auteur','article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
