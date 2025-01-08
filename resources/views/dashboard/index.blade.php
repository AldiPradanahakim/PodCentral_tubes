<x-layout>
    <div class="flex">
        <!-- Sidebar -->
        <<aside class="w-64 bg-black flex flex-col h-screen">
            <!-- Logo dan Nama -->
            <div class="flex items-center px-6 py-4 border-b border-gray-700">
                <img src="{{ asset('img/podcast.png') }}" alt="PodCentral Logo" class="h-8 w-8 mr-3">
                <span class="text-xl font-semibold text-white">PodCentral</span>
            </div>
            <!-- Navigation Links -->
            <nav class="flex flex-col flex-grow px-6 py-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="dashboard/podcast" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="ml-3">Podcast</span>
                </a>
                <a href="dashboard/pengguna" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6v2h12v-2c0-3.31-2.69-6-6-6z"></path>
                    </svg>
                    <span class="ml-3">Pengguna</span>
                </a>
                {{-- <a href="/settings" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM12 14c-2.21 0-4 1.79-4 4v2h8v-2c0-2.21-1.79-4-4-4z"></path>
                    </svg>
                    <span class="ml-3">Pengaturan</span>
                </a> --}}
            </nav>
            <!-- Footer -->
            <div class="px-6 py-4 border-t border-gray-700">
                <form id="logoutForm" action="{{ route('logout') }}" method="post">
                    @csrf
                <button type="button" onclick="showPopup()" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">log out</button>
                </form>
                <div id="logoutPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-6 rounded shadow-lg">
                        <p class="mb-4">Are you sure you want to logout?</p>
                        <button onclick="confirmLogout()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Yes
                        </button>
                        <button onclick="hidePopup()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            No
                        </button>
                    </div>
                </div>
            </div>
        </aside>
        

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6">
            <header class="mb-6">
                <h1 class="text-2xl font-bold text-gray-700">Dashboard</h1>
            </header>

            <!-- Statistik -->
            <section class="grid grid-cols-3 gap-4 mb-8">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Podcasts</h3>
                    <p class="text-2xl font-bold text-indigo-500">50</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <p class="text-2xl font-bold text-indigo-500">120</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Episodes</h3>
                    <p class="text-2xl font-bold text-indigo-500">200</p>
                </div>
            </section>

            <!-- Tabel Podcast -->
            <section>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Podcasts</h2>
                <table class="table-auto bg-white w-full shadow-md rounded-lg">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">Tech Talks</td>
                            <td class="px-4 py-2">Technology</td>
                            <td class="px-4 py-2">
                                <a href="/podcasts/1/edit" class="text-blue-500 hover:underline">Edit</a> |
                                <button class="text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-2">2</td>
                            <td class="px-4 py-2">Health Matters</td>
                            <td class="px-4 py-2">Health</td>
                            <td class="px-4 py-2">
                                <a href="/podcasts/2/edit" class="text-blue-500 hover:underline">Edit</a> |
                                <button class="text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-2">3</td>
                            <td class="px-4 py-2">Daily News</td>
                            <td class="px-4 py-2">News</td>
                            <td class="px-4 py-2">
                                <a href="/podcasts/3/edit" class="text-blue-500 hover:underline">Edit</a> |
                                <button class="text-red-500 hover:underline">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</x-layout>
