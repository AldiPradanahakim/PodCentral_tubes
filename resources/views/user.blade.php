<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 h-screen bg-gradient-to-b from-blue-600 to-indigo-800 text-white flex flex-col justify-between p-4 fixed">
            <div>
                <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
                <nav class="space-y-4">
                    <a href="welcome" class="flex items-center px-4 py-2 rounded hover:bg-blue-700">
                        <span class="material-icons mr-2">dashboard</span> Data Podcast
                    </a>
                    <a href="user" class="flex items-center px-4 py-2 rounded hover:bg-blue-700">
                        <span class="material-icons mr-2">group</span> Data User
                    </a>
                </nav>
            </div>
            <a href="#" class="flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded">
                <span class="material-icons mr-2">logout</span> Logout
            </a>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 w-full">
            <header class="bg-white shadow-md py-4 px-6">
                <h1 class="text-2xl font-semibold">Edit Data Podcast</h1>
            </header>

            <main class="p-6">
                <!-- Actions -->
                <div class="flex justify-between items-center mb-4">
                    <div class="space-x-4">
                        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Podcast</button>
                        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Unduh Data</button>
                    </div>
                    <div class="relative">
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Search..."
                            class="w-64 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-400"
                        />
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Email User</th>
                                <th class="px-4 py-2">Password</th>
                                <th class="px-4 py-2">Genre Favorit</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-gray-200">
                            <!-- Data rows (example) -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">001</td>
                                <td class="px-4 py-2">Admin@gmail.com</td>
                                <td class="px-4 py-2">Admin123</td>
                                <td class="px-4 py-2">Horror</td>
                                <td class="px-4 py-2">Admin</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Add more data rows here -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">001</td>
                                <td class="px-4 py-2">Akbar@gmail.com</td>
                                <td class="px-4 py-2">Akbar123</td>
                                <td class="px-4 py-2">Horror</td>
                                <td class="px-4 py-2">User</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Add more data rows here -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4 flex justify-center space-x-2">
                    <button class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Previous</button>
                    <button class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">1</button>
                    <button class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">2</button>
                    <button class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">3</button>
                    <button class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Next</button>
                </div>
            </main>

            <footer class="bg-gray-800 text-white text-center py-4 mt-6">
                &copy; 2024 Podcast Dashboard. All Rights Reserved.
            </footer>
        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Edit Data User</h2>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" value="John Doe" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" value="john@example.com" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('flex');
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</body>
</html>
