<x-app-layout xmlns="http://www.w3.org/1999/html">
    <form class="max-w-md mx-auto" method="POST" action="{{ route('article.store') }}">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
            <br><br>
            Register Article
            <br><br><br>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-black"><strong>Title:</strong></label>
                <input type="text" name="title" id="title-input" class="bg-gray-50 border border-gray-300 text-gray-900
                text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                dark:focus:border-blue-500" placeholder="Title" required/>
            </div>

            <br>

            <div class="flex justify-between">
                <div class="w-1/3">
                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-black"><strong>Category</strong></label>
                    <select id="categories" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="">Select a Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/3">
                    <label for="tags" class="block mb-2 text-sm font-medium text-gray-900
                        dark:text-black"><strong>Tags</strong></label>
                    <select id="tags" name="tag_id[]" multiple size="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                        block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                        dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <br>
                </div>
                <div class="1/3"><br>
                    <button class="text-white bg-yellow-400 hover:bg-yellow-400 focus:ring-4 focus:outline-none
                    focus:ring-blue-300
                    font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600
                    dark:hover:bg-green-600 dark:focus:bg-green-600" id="add-tag" type="button">Add Tag
                    </button>
                    <br>
                </div>
            </div>

            <div id="tag-badges">

            </div>

            <br>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-black"
                       for="large_size"><strong>Image Upload</strong></label>
                <input class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer
                bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400" name="image" id="large_size" type="file">
            </div>

            <br>

            <div class="mb-5">
                <label for="text-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-black"><strong>Article Text:</strong></label>
                <textarea id="text-input" name="full_text" rows="20" class="block p-2.5 w-full text-sm text-gray-900
            bg-gray-50
            rounded-lg
                 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
                 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                 dark:focus:border-blue-500" placeholder="Write here your article..." required></textarea>
            </div>

            <br><br>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600
                    dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </div>
        <script src="{{ asset('js/article_tags.js') }}" type="module"></script>
    </form>
</x-app-layout>