
@section('title', 'Ajouter un article')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .container {
        width: 100%;
        max-width: 650px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        padding: 50px;
        animation: fadeIn 0.5s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        color: #2c3e50;
        font-size: 32px;
        margin-bottom: 8px;
        text-align: center;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .subtitle {
        text-align: center;
        color: #7f8c8d;
        margin-bottom: 30px;
        font-size: 15px;
        font-weight: 400;
    }

    .alert {
        padding: 16px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        font-size: 14px;
        animation: slideDown 0.3s ease-out;
        border-left: 5px solid;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-left-color: #28a745;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border-left-color: #dc3545;
    }

    .alert ul {
        margin-left: 20px;
        margin-top: 10px;
        list-style-type: disc;
    }

    .alert li {
        margin-bottom: 6px;
        line-height: 1.5;
    }

    .mb-3 {
        margin-bottom: 28px;
    }

    .form-label {
        display: block;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 10px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.7px;
    }

    .form-control {
        width: 100%;
        padding: 13px 16px;
        border: 2px solid #e8e8e8;
        border-radius: 10px;
        font-size: 15px;
        font-family: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background-color: #f8f9fa;
        color: #2c3e50;
    }

    .form-control::placeholder {
        color: #bdc3c7;
    }

    .form-control:hover {
        border-color: #d0d0d0;
        background-color: #fcfcfc;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        background-color: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1), 0 2px 8px rgba(102, 126, 234, 0.2);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 140px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
    }

    input[type="file"].form-control {
        padding: 11px 16px;
        cursor: pointer;
        background-color: #fafafa;
    }

    input[type="file"].form-control::file-selector-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 9px 18px;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s ease;
        margin-right: 12px;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    input[type="file"].form-control::file-selector-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .btn {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
    }

    .btn-primary:active {
        transform: translateY(0);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    @media (max-width: 768px) {
        .container {
            padding: 35px 25px;
        }

        h2 {
            font-size: 26px;
        }

        .form-control {
            padding: 12px 14px;
            font-size: 14px;
        }

        textarea.form-control {
            min-height: 120px;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 25px 15px;
        }

        h2 {
            font-size: 22px;
        }

        .form-control {
            padding: 11px 12px;
            font-size: 16px;
        }

        .btn {
            padding: 12px;
            font-size: 14px;
        }
    }
</style>
</head>
<body>

<div class="container">
    <h2>Modifier l'article</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" class="form-control" value="{{ old('titre', $article->titre) }}" placeholder="Entrez le titre de votre article" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5">{{ old('description', $article->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" name="auteur" class="form-control"  value="{{ old('auteur', $article->auteur) }}" placeholder="Entrez l'auteur de votre article" required>
        </div>

        <div class="mb-3">
            @if ($article->image)
    <img src="{{ asset('storage/'.$article->image) }}" width="100">
@endif
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

</body>
</html>