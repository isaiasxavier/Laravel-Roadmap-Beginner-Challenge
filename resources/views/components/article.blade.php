<div class="flex justify-center">
    <div class="bg-white border-2 border-gray-300 p-6 rounded-lg m-6 w-96 shadow-lg">
        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-96 object-cover rounded"> <!-- Aumente o valor de h-64 para h-96 -->
        <div class="p-6 text-black">
            <h2 class="font-bold text-xl mb-2">{{ $article->title }}</h2>
            <p class="text-base">{{ Str::limit($article->content, 100) }}</p>
            <a href="{{ route('articles.show', $article) }}" class="text-indigo-500 hover:text-indigo-800 mt-4 inline-block">Read</a>
        </div>
    </div>
</div>