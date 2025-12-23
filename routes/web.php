<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/article/create', ArticleController::class . '@create')->name('article.create');

Route::get('/articles', ArticleController::class . '@index')->name('article.index');

// adds a article to the database
Route::post('/article', ArticleController::class . '@store')->name('article.store');
// returns a page that shows a full article
Route::get('/article/{post}', ArticleController::class . '@show')->name('article.show');
// returns the form for editing a article
Route::get('/article/{post}/edit', ArticleController::class . '@edit')->name('article.edit');
// updates a article
Route::put('/article/{post}', ArticleController::class . '@update')->name('article.update');
// deletes a article
Route::delete('/article/{post}', ArticleController::class . '@destroy')->name('article.destroy');

Route::post('/articles/{id}/commentaires', [CommentaireController::class, 'store']) ->name('commentaires.store');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('articles.show');
