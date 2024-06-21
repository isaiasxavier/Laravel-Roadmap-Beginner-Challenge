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
use Intervention\Image\ImageManager;
use RuntimeException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        return view('articles.index', compact('articles'));
    }

    public function homepage()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(2);

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

        // Verifique se o request tem uma imagem
        if ($request->hasFile('image')) {
            $imagePaths = $this->handleImageUpload($request->file('image'));
            $data['image'] = $imagePaths['original'];
            $data['resized_image'] = $imagePaths['resized'];
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

        session()->flash('createdSuccess', [
            'message' => 'Article created!',
        ]);

        // Redirecione o usuário de volta para a página de criação de artigos com uma mensagem de sucesso
        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    /**
     * @throws Exception if $file is not an instance of UploadedFile
     */
    private function handleImageUpload(array|UploadedFile|null $file): array
    {
        if ($file instanceof UploadedFile) {
            // Gere um novo nome de arquivo baseado na hora atual e na extensão do arquivo
            $imageName = Str::random(10).'.'.$file->extension();

            // Mova o arquivo para a pasta public/images/articles-resized
            $file->move(public_path('storage/images/articles'), $imageName);

            // Caminho completo da imagem original
            $originalImagePath = 'storage/images/articles/'.$imageName;

            // Redimensiona a imagem
            $resizedImagePath = $this->resizeImage($originalImagePath, 984, 384);

            // Retorne o caminho do arquivo
            // Retorne os caminhos das imagens
            return [
                'original' => $originalImagePath,
                'resized' => $resizedImagePath,
            ];
        }

        // Se o arquivo não for uma instância de UploadedFile, lance uma exceção
        throw new RuntimeException('The file is not a valid instance of UploadedFile');
    }

    private function resizeImage(string $imagePath, int $width, int $height): string
    {
        // Abre a imagem
        $image = ImageManager::imagick()->read($imagePath);

        // Redimensiona a imagem
        $image->resize($width, $height);

        // Define o novo caminho da imagem com o sufixo -resized
        $resizedImagePath = str_replace('storage/images/articles', 'storage/images/articles-resized', $imagePath);
        // Define o novo caminho da imagem com o sufixo -resized e a pasta articles-resized
        $resizedImagePath = pathinfo($resizedImagePath, PATHINFO_DIRNAME).'/'.
        pathinfo($resizedImagePath, PATHINFO_FILENAME).'-resized.'.pathinfo($resizedImagePath, PATHINFO_EXTENSION);

        // Verifica se o diretório existe, se não, cria o diretório
        $resizedImageDir = pathinfo($resizedImagePath, PATHINFO_DIRNAME);
        if (! file_exists($resizedImageDir) && ! mkdir($resizedImageDir, 0777, true) && ! is_dir($resizedImageDir)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $resizedImageDir));
        }
        // Salva a imagem redimensionada
        $image->save($resizedImagePath);

        // Retorna o caminho da imagem redimensionada
        return $resizedImagePath;
    }

    public function create()
    {
        $categories = Category::all(); //usado para popular o select Category
        $tags = Tag::all(); //usado para popular o Select Tag

        return view('articles.create', compact('categories', 'tags'));
    }
    
    public function destroy($id): RedirectResponse
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();

            // Armazenar dados na sessão
            session()->flash('deletedSuccess', [
                'message' => 'Article deleted!',
            ]);

            return redirect()->route('article.index');
        }

        return redirect()->route('article.index')->with('error', 'Article not found');
    }
    
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all(); //usado para popular o select Category
        $tags = Tag::all(); //usado para popular o Select Tag
        
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }
}
