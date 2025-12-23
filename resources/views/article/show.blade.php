<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
    background-color: #f4f6f8;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Conteneur principal */
.container {
    width: 70%;
    margin: 40px auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Titre */
.titre {
    font-size: 32px;
    color: #2c3e50;
    margin-bottom: 10px;
}

/* Auteur */
.auteur {
    color: #555;
    margin-bottom: 20px;
}

/* Image */
.image-box {
    text-align: center;
    margin-bottom: 20px;
}

.image-box img {
    max-width: 100%;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

/* Description */
.description {
    font-size: 18px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 30px;
}

/* Commentaires */
.commentaire {
    background: #f1f1f1;
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 10px;
}

.comment-auteur {
    font-weight: bold;
    color: #2980b9;
}

.aucun {
    color: #888;
    font-style: italic;
}

/* Formulaire */
form {
    margin-top: 20px;
}

form input,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

form textarea {
    height: 120px;
}

form button {
    background-color: #2980b9;
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

form button:hover {
    background-color: #1f6391;
}

        </style>
</head>
<body>
<div class="container mt-4">

<h1>{{ $article->titre }}</h1>

<p>
    <strong>Auteur :</strong> {{ $article->auteur }}
</p>

@if($article->image)
    <!-- <img src="{{ asset('storage/'.$article->image) }}" style="width:300px;"> -->
    <img src="{{ asset('images/' . $article->image) }}" alt="image" width="200">

@endif

<p>
    {{ $article->description }}
</p>

<hr>

<h3>Commentaires</h3>

@if($article->commentaires->count() > 0)
    @foreach($article->commentaires as $commentaire)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
           <p class="comment-auteur">{{ $commentaire->auteur }} <span class="date">({{ $commentaire->created_at->format('d/m/Y H:i') }})</span></p>
            {{ $commentaire->contenu }}
        </div>
    @endforeach
@else
    <p>Aucun commentaire pour le moment.</p>
@endif

<hr>

<h3>Ajouter un commentaire</h3>

<form action="{{ route('commentaires.store', $article->id) }}" method="POST">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article->id }}">

    <input type="text" name="auteur" placeholder="Votre nom" required><br><br>
    <textarea name="contenu" placeholder="Votre commentaire" required></textarea><br><br>

    <button type="submit">Envoyer</button>
</form>

</body>
</html>
