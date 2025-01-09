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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 19l-3 3m0 0l3-3m-3 3v-6m14-10l-3 3m0 0l3-3m-3 3v-6m-6-4l3 3m0 0l-3-3m3 3v-6" />
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
            <!-- Footer -->
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

        <main class="flex-1 bg-gray-100 p-6">
            <section>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Users</h2>
                <div class="overflow-x-auto">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            </span>
                        </div>
                    @endif
                    <table class="table-auto w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Username</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Joined</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $user->nama }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->created_at }}</td>
                                    <td class="px-4 py-2">
                                        <div class="flex items-center justify-start space-x-2">
                                            <button type="button"
                                                onclick="showViewModal('view-modal-{{ $user->id }}')"
                                                class="text-blue-500 hover:underline">View</button>
                                            <button type="button"
                                                onclick="showDeleteModal('{{ route('dashboard.pengguna.destroy', $user->id) }}')"
                                                class="text-red-500 hover:underline">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- View Modal -->
                                <div id="view-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Detail User
                                                </h3>
                                                <button type="button"
                                                    onclick="hideViewModal('view-modal-{{ $user->id }}')"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
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
                                                <p class="text-lg font-bold text-gray-900">Username: <span
                                                        class="font-normal text-gray-900">{{ $user->nama }}</span></p>
                                                <p class="text-lg font-bold text-gray-900">Email: <span
                                                        class="font-normal text-gray-900">{{ $user->email }}</span></p>
                                                @if($user->profile_image)
                                                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="User Profile" style="max-width: 150px; max-height: 150px;">
                                                @else
                                                    <p class="text-lg font-bold text-gray-900">No profile image</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow-lg">
            <p class="mb-4">Apakah kamu yakin menghapus data ini?</p>
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

        function showViewModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function hideViewModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

       function showPopup() {
          document.getElementById('logoutPopup').classList.remove('hidden');
       }

       function hidePopup() {
          document.getElementById('logoutPopup').classList.add('hidden');
        }

        function confirmLogout() {
            document.getElementById('logoutForm').submit();
        }
    </script>
</x-layout>