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
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <br>


            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your
                category</label>
            <select id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                <option>United States</option>
                <option>Canada</option>
                <option>France</option>
                <option>Germany</option>
            </select>


            <br>
            <label for="text-input" class="block mb-2 text-sm font-medium text-gray-900
                dark:text-black"><strong>Article Text:</strong></label>
            <textarea id="text-input" name="text_area" rows="10" class="block p-2.5 w-full text-sm text-gray-900
            bg-gray-50
            rounded-lg
                 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
                 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                 dark:focus:border-blue-500" placeholder="Write here your article..."></textarea>
            <br><br>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300
                    font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600
                    dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </div>
    </form>
</x-app-layout>