    <x-layout>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create New Podcast
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form action="{{ route('dashboard.managepodcast.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Title</label>
                        <input type="text" name="nama" id="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="author_id" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Author</label>
                        <select name="author_id" id="author_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" required>
                            @foreach(\App\Models\User::all() as $author)
                                <option value="{{ $author->id }}">{{ $author->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="genre_id" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Genre</label>
                        <select name="genre_id" id="genre_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" required>
                            @foreach(\App\Models\Genre::all() as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="desc" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Description</label>
                        <textarea name="desc" id="desc" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="duration" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Duration</label>
                        <input type="number" name="duration" id="duration" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="release_date" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Release Date</label>
                    <input type="date" name="release_date" id="release_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" required>
                    </div>
                    <div class="mb-4">
                        <label for="files" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Audio File</label>
                        <input type="file" name="files" id="files" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" accept="audio/*" required>
                    </div>
                    <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 dark:text-gray-300">Image</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-600 dark:text-white" accept="image/*" required>
                        </div>
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Podcast</button>
                </form>
            </div>
        </div>
    </x-layout>