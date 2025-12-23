<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
        .container {
            margin: 0 auto;
            position: relative;
            width: unset;
        }
        #app {
            width: 60%;
            margin: 4rem auto;
        }
        .question-wrapper {
            text-align: center;
        }
    </style>

<title>Articles</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('article.index') }}>Les articles</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('article.create') }}>ajout d'article</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <h1 class="mb-4">📄 Liste des articles</h1>
    <div class="row">
        @forelse ($articles as $article)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $article->titre }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ Str::limit($article->contenu, 100) }}</p>
                         <p><strong>image</strong> {{ $article->image}}</p>
                        <p><strong>Description :</strong> {{ $article->description }}</p>
                        <p><strong>Auteur :</strong> {{ $article->auteur }}</p>
                        <img src="{{ asset('images/' . $article->image) }}" alt="image" width="200">
                    </div>
                    <div class="card-footer">
                        <div class="d-flex gap-2">
                            <a href="{{ route('article.show', $article->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('article.destroy', $article->id) }}" method="post" style="display:inline-block;" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun article trouvé.</p>
        @endforelse
    </div>
  </div>
   </body>
</html>