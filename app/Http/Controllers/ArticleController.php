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

    /**
     * @throws Exception if $file is not an instance of UploadedFile
     */
    private function handleImageUpload(array|UploadedFile|null $file): string
    {
        if ($file instanceof UploadedFile) {
            // Gere um novo nome de arquivo baseado na hora atual e na extensão do arquivo
            $imageName = Str::random(10).'.'.$file->extension();

            // Mova o arquivo para a pasta public/images/articles-resized
            $file->move(public_path('storage/images/articles'), $imageName);

            // Caminho completo da imagem
            $imagePath = public_path('storage/images/articles/'.$imageName);

            // Redimensiona a imagem
            $this->resizeImage($imagePath, 984, 384);

            // Retorne o caminho do arquivo
            return 'storage/images/articles-resized/'.pathinfo($imageName, PATHINFO_FILENAME).'-resized.'.pathinfo($imageName, PATHINFO_EXTENSION);
        }

        // Se o arquivo não for uma instância de UploadedFile, lance uma exceção
        throw new RuntimeException('The file is not a valid instance of UploadedFile');
    }

    private function resizeImage(string $imagePath, int $width, int $height): void
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
        if (! file_exists($resizedImageDir)) {
            if (! mkdir($resizedImageDir, 0777, true) && ! is_dir($resizedImageDir)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $resizedImageDir));
            }
        }
        // Salva a imagem redimensionada
        $image->save($resizedImagePath);
    }

    public function create()
    {
        $categories = Category::all(); //usado para popular o select Category
        $tags = Tag::all();

        return view('articles.create', compact('categories', 'tags'));
    }
}
