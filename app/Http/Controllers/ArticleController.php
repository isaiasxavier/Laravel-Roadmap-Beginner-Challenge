<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RuntimeException;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ArticleController extends Controller
{
    public function index() {}

    public function homepage()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(2);

        return view('homepage', compact('articles'));
    }

    public function show(Article $article)
    {
        // Resize the article image to 800x600
        /*$article->image = $this->resizeImage(public_path($article->image), 800, 600);*/
        
        return view('articles.show', compact('article'));
    }
    
    /**
     * @throws Exception if $file is not an instance of UploadedFile
     */
    private function handleImageUpload(array|UploadedFile|null $file): String
    {
        if($file instanceof UploadedFile){
            // Gere um novo nome de arquivo baseado na hora atual e na extensão do arquivo
            $imageName = Str::random(10) . '.' . $file->extension();
            
            // Mova o arquivo para a pasta public/images/articles-resized
            $file->move(public_path('storage/images/articles-resized'), $imageName);
            
            // Retorne o caminho do arquivo
            return 'storage/images/articles-resized/' . $imageName;
        }
        
        // Se o arquivo não for uma instância de UploadedFile, lance uma exceção
        throw new RuntimeException('The file is not a valid instance of UploadedFile');
    }
    
    public function store(ArticleRequest $request): RedirectResponse
    {
        // Capture os dados do formulário
        $data = $request->all();
        
        // Adicione o user_id ao array de dados
        $data['user_id'] = auth()->id();

        // Adicione o category_id ao array de dados
        $data['category_id'] = $request->category_id;

        // Verifique se o request tem uma imagem
        if ($request->hasFile('image')) {
            $data['image'] = $this->handleImageUpload($request->file('image'));
        }
        

        // Crie um novo artigo
        $article = Article::create($data);

        // Associe as tags ao artigo
        if (is_array($request->tag_id)) {
            foreach ($request->tag_id as $tag_id) {
                ArticleTag::create([
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
