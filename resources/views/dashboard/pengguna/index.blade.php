<x-layout>
    <div class="flex">
        <aside class="w-64 bg-black flex flex-col h-screen">
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
                <a href="{{ url('dashboard/podcast') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://wwd/podcasw.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="ml-3">Podcast</span>
                </a>
                <a href="{{ url('dashboard/pengguna') }}" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
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

        <main class="flex-1 bg-gray-100 p-6">
            <section>
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Users</h2>
                <table class="table-auto w-full bg-white shadow-md rounded-lg">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Username</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Joined</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2">1</td>
                            <td class="px-4 py-2">JohnDoe</td>
                            <td class="px-4 py-2">johndoe@example.com</td>
                            <td class="px-4 py-2">2024-10-15</td>
                            <td class="px-4 py-2">
                                <a href="/users/1" class="text-blue-500 hover:underline">View</a> |
                                <form action="/users/1" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </main>
     
    </div>
    
</x-layout>