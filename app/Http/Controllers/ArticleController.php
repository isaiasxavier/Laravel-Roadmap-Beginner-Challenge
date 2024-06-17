<?php

namespace App\Http\Controllers;



use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(2);
        
        return view('homepage', compact('articles'));
    }
    
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
