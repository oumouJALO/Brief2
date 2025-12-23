<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentaireController extends Controller
{
     public function store(Request $request, $articleId)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'contenu' => 'required',
            'auteur' => 'required',
            'date de publication' => 'nullable|date',
        ]);

        Commentaire::create([
            'contenu' => $request->contenu,
            'auteur' => $request->auteur,
            'article_id' => $articleId
        ]);

        return redirect()->back()->with('success', 'Commentaire ajouté');
    }
    
    public function article()
{
    return $this->belongsTo(Article::class);
}

}