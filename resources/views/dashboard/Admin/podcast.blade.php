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
                    <a href="podcast" class="flex items-center px-4 py-2 rounded hover:bg-blue-700">
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
                <h1 class="text-2xl font-semibold">Data Podcast</h1>
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
                                <th class="px-4 py-2">Judul Podcast</th>
                                <th class="px-4 py-2">Channel</th>
                                <th class="px-4 py-2">Genre</th>
                                <th class="px-4 py-2">Tahun Rilis</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-gray-200">
                            <!-- Data rows -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">001</td>
                                <td class="px-4 py-2">Podcast A</td>
                                <td class="px-4 py-2">Channel A</td>
                                <td class="px-4 py-2">Horror</td>
                                <td class="px-4 py-2">2021</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">002</td>
                                <td class="px-4 py-2">Podcast B</td>
                                <td class="px-4 py-2">Channel B</td>
                                <td class="px-4 py-2">Komedi</td>
                                <td class="px-4 py-2">2020</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">003</td>
                                <td class="px-4 py-2">Podcast C</td>
                                <td class="px-4 py-2">Channel C</td>
                                <td class="px-4 py-2">Drama</td>
                                <td class="px-4 py-2">2019</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <!-- Add more data rows -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">004</td>
                                <td class="px-4 py-2">Podcast D</td>
                                <td class="px-4 py-2">Channel D</td>
                                <td class="px-4 py-2">Teknologi</td>
                                <td class="px-4 py-2">2023</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">005</td>
                                <td class="px-4 py-2">Podcast E</td>
                                <td class="px-4 py-2">Channel E</td>
                                <td class="px-4 py-2">Edukasi</td>
                                <td class="px-4 py-2">2022</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">006</td>
                                <td class="px-4 py-2">Podcast F</td>
                                <td class="px-4 py-2">Channel F</td>
                                <td class="px-4 py-2">Kesehatan</td>
                                <td class="px-4 py-2">2021</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">007</td>
                                <td class="px-4 py-2">Podcast G</td>
                                <td class="px-4 py-2">Channel G</td>
                                <td class="px-4 py-2">Musik</td>
                                <td class="px-4 py-2">2020</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">008</td>
                                <td class="px-4 py-2">Podcast H</td>
                                <td class="px-4 py-2">Channel H</td>
                                <td class="px-4 py-2">Sejarah</td>
                                <td class="px-4 py-2">2018</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">009</td>
                                <td class="px-4 py-2">Podcast I</td>
                                <td class="px-4 py-2">Channel I</td>
                                <td class="px-4 py-2">Berita</td>
                                <td class="px-4 py-2">2021</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">010</td>
                                <td class="px-4 py-2">Podcast J</td>
                                <td class="px-4 py-2">Channel J</td>
                                <td class="px-4 py-2">Olahraga</td>
                                <td class="px-4 py-2">2017</td>
                                <td class="px-4 py-2 flex space-x-2">
                                     <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600" onclick="openEditModal()">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700" onclick="openDeleteModal()">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>

            <footer class="bg-gray-800 text-white text-center py-4 mt-6">
                &copy; 2024 Podcast Dashboard. All Rights Reserved.
            </footer>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Edit Data Podcast</h2>
            <form>
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul Podcast</label>
                    <input type="text" id="judul" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="channel" class="block text-sm font-medium text-gray-700">Channel</label>
                    <input type="text" id="channel" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                    <input type="text" id="genre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="mb-4">
                    <label for="tahun_rilis" class="block text-sm font-medium text-gray-700">Tahun Rilis</label>
                    <input type="text" id="tahun_rilis" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Konfirmasi Hapus Podcast</h2>
            <p>Apakah Anda yakin ingin menghapus podcast ini?</p>
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
            </div>
        </div>
    </div>

    <script>
        // Modal Edit
        function openEditModal() {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('flex');
            document.getElementById('editModal').classList.add('hidden');
        }

        // Modal Hapus
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('flex');
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</body>
</html>
