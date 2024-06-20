<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index()
    {
    }

    public function homepage()
    {
        $articles = Article::paginate(2);

        return view('homepage', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        // Capture os dados do formulário
        $data = $request->all();

        // Adicione o user_id ao array de dados
        $data['user_id'] = auth()->id();
        // Adicione o category_id ao array de dados
        $data['category_id'] = $request->category_id;

        // Crie um novo artigo
        $article = Article::create($data);
        
        // Associe as tags ao artigo
        if (is_array($request->tag_id)) {
            foreach ($request->tag_id as $tag_id) {
                $tags = ArticleTag::create([
                    'article_id' => $article->id,
                    'tag_id' => $tag_id,
                ]);
            }
        } else {
            // Handle the case when tag_id is not an array or not sent in the request
            // You can log an error message or throw an exception
            Log::error('tag_id is not an array or not sent in the request');
        }
        
        
        
        // Redirecione o usuário de volta para a página de criação de artigos com uma mensagem de sucesso
        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    public function create()
    {
        $categories = Category::all(); //usado para popular o select Category
        $tags = Tag::all();

        return view('articles.create', compact('categories', 'tags'));
    }
}
