<x-layout>
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-black flex flex-col h-screen">
            <!-- Logo dan Nama -->
            <div class="flex items-center px-6 py-4 border-b border-gray-700">
                <img src="{{ asset('img/podcast.png') }}" alt="PodCentral Logo" class="h-8 w-8 mr-3">
                <span class="text-xl font-semibold text-white">PodCentral</span>
            </div>
            <!-- Navigation Links -->
            <nav class="flex flex-col flex-grow px-6 py-4 space-y-2">
                <a href="/dashboard"
                    class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="{{ url('dashboard/managepodcast') }}"
                    class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="ml-3">Podcast</span>
                </a>
                <a href="{{ url('dashboard/managegenre') }}"
                    class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 19l-3 3m0 0l3-3m-3 3v-6m14-10l-3 3m0 0l3-3m-3 3v-6m-6-4l3 3m0 0l-3-3m3 3v-6" />
                        </svg>
                    <span class="ml-3">Genre</span>
                </a>
                <a href="{{ url('dashboard/pengguna') }}"
                    class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6v2h12v-2c0-3.31-2.69-6-6-6z">
                        </path>
                    </svg>
                    <span class="ml-3">Pengguna</span>
                </a>
            </nav>
            <div class="px-6 py-4 border-t border-gray-700">
                <form id="logoutForm" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="button" onclick="showPopup()"
                        class="block px-4 py-2 text-sm text-white hover:bg-gray-600">log out</button>
                </form>
                <div id="logoutPopup"
                    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-6 rounded shadow-lg">
                        <p class="mb-4">Are you sure you want to logout?</p>
                        <button onclick="confirmLogout()"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Yes
                        </button>
                        <button onclick="hidePopup()"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            No
                        </button>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1 bg-gray-100 p-6 relative">
            <section>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Podcasts</h2>
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                </div>
                @endif
                <div class="overflow-x-auto">
                    <table class="table-auto w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Category</th>
                                <th class="px-4 py-2 text-left">Author</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($podcasts as $podcast)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $podcast->nama }}</td>
                                <td class="px-4 py-2">{{ $podcast->genre->nama ?? 'No Category' }}</td>
                                <td class="px-4 py-2">{{ $podcast->author->nama }}</td>
                                <td class="px-4 py-2">{{ $podcast->release_date }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center justify-start space-x-2">
                                        <button type="button" data-modal-toggle="edit-modal-{{ $podcast->id }}"
                                            class="text-blue-500 hover:underline">Edit</button>
                                        <button type="button"
                                            onclick="showDeleteModal('{{ route('dashboard.managepodcast.destroy', $podcast->id) }}')"
                                            class="text-red-500 hover:underline">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div id="edit-modal-{{ $podcast->id }}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Edit Podcast
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="edit-modal-{{ $podcast->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <form
                                                action="{{ route('dashboard.managepodcast.update', $podcast->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="nama"
                                                        class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                                                    <input type="text" name="nama" id="nama"
                                                        value="{{ $podcast->nama }}"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="author_id"
                                                        class="block text-gray-700 text-sm font-bold mb-2">Author</label>
                                                    <select name="author_id" id="author_id"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                        @foreach(\App\Models\User::all() as $author)
                                                        <option value="{{ $author->id }}"
                                                            {{ $podcast->author_id == $author->id ? 'selected' : ''}}>
                                                            {{ $author->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="genre_id"
                                                        class="block text-gray-700 text-sm font-bold mb-2">Genre</label>
                                                    <select name="genre_id" id="genre_id"
                                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                        @foreach(\App\Models\Genre::all() as $genre)
                                                        <option value="{{ $genre->id }}"
                                                            {{ $podcast->id_genre == $genre->id ? 'selected' : ''}}>
                                                            {{ $genre->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit"
                                                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="fixed bottom-6 right-6">
                    <a href="{{ route('dashboard.managepodcast.create') }}"
                        class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full text-3xl">+</a>
                </div>
            </section>
        </main>
    </div>


    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-lg">
            <p class="mb-4">Are you sure you want to delete this podcast?</p>
            <div class="flex justify-end">
                <button onclick="hideDeleteModal()"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                    No
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
    function showDeleteModal(url) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteForm').action = url;
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('[data-modal-toggle]');
        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const modalId = this.getAttribute('data-modal-toggle');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.toggle('hidden'); // Toggle class `hidden`
                }
            });
        });


          const closeButtons = document.querySelectorAll('[data-modal-hide]');
        closeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const modalId = this.getAttribute('data-modal-hide');
                const modal = document.getElementById(modalId);
                if (modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    });
    </script>
</x-layout>