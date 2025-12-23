<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
     public function index()
    {
        // on retourne une vue avec compact $articles
      
       // $articles = Article::all()
         $articles = Article::with('commentaires')->get();
    return view('article.index', compact('articles'));
    }
    
    
    public function show(string $id)
    {
    $article = Article::findOrFail($id);
    $article = article::with('commentaires')->findOrFail($id);
    return view('article.show', compact('article'));
  }
    
    public function create(request $request)
    {
        return view('article.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
      'titre' => 'required|max:255',
      'description' => 'required',
      'Auteur' =>'nullable|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|'  
    ]);
   
    // 1️⃣ Créer un nom unique pour l'image
    $imageName = time() . '.' . $request->image->extension();

    // 2️⃣ Déplacer l'image dans public/images
    $request->image->move(public_path('images'), $imageName);

    // 3️⃣ Enregistrer l'article dans la DB (nom de l'image seulement)
    article::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'auteur' => $request->auteur,
        'image' => $imageName
    ]);

    return redirect()->route('article.index')->with('success', 'Article créé !');
}
    

    public function edit($id)
    {
      $article = Article::findOrFail($id);
    return view('article.edit', compact('article'));
    }
    
    
    public function update(Request $request, $id)
    {
        $request->validate([
      'titre' => 'required|max:255',
      'description' => 'required',
      'auteur' => 'nullable|max:255',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
    ]);

    $article = Article::findOrFail($id);

    $article->titre = $request->titre;
    $article->description = $request->description;
    $article->auteur = $request->auteur;

    if ($request->hasFile('image')) {
        // store in public/images and save filename
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $article->image = $imageName;
    }

    $article->save();

    return redirect()->route('article.index')->with('success', 'Article modifié avec succès.');
        
    }
    
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
    $article->delete();
    return redirect()->route('article.index')
      ->with('success', 'Article supprimé avec succès');
    }
    public function delete($id){
        //Logic to delete the article would go here
        
        return redirect()->route('articles.index');
   }
   
   public function commentaires()
{
    return $this->hasMany(Commentaire::class);
}

}


