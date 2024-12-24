<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                                <th class="px-4 py-2">Judul Podcast</th>
                                <th class="px-4 py-2">Channel</th>
                                <th class="px-4 py-2">Genre Podcast</th>
                                <th class="px-4 py-2">Tahun Rilis</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-gray-200">
                            <!-- Data Podcast 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">001</td>
                                <td class="px-4 py-2">Don't Judge Yourself</td>
                                <td class="px-4 py-2">Akbar</td>
                                <td class="px-4 py-2">Horror</td>
                                <td class="px-4 py-2">2024</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 2 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">002</td>
                                <td class="px-4 py-2">You Can Be Happy</td>
                                <td class="px-4 py-2">Akbar</td>
                                <td class="px-4 py-2">Horror</td>
                                <td class="px-4 py-2">2024</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 3 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">003</td>
                                <td class="px-4 py-2">Sleepy Stories</td>
                                <td class="px-4 py-2">Akbar</td>
                                <td class="px-4 py-2">Horror</td>
                                <td class="px-4 py-2">2023</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 4 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">004</td>
                                <td class="px-4 py-2">Podcast Dunia</td>
                                <td class="px-4 py-2">Channel ID</td>
                                <td class="px-4 py-2">Comedy</td>
                                <td class="px-4 py-2">2022</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 5 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">005</td>
                                <td class="px-4 py-2">Chill Talks</td>
                                <td class="px-4 py-2">Fahri</td>
                                <td class="px-4 py-2">Science</td>
                                <td class="px-4 py-2">2021</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 6 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">006</td>
                                <td class="px-4 py-2">Daily Motivation</td>
                                <td class="px-4 py-2">InspireTalks</td>
                                <td class="px-4 py-2">Motivation</td>
                                <td class="px-4 py-2">2020</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 7 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">007</td>
                                <td class="px-4 py-2">Tech Talks</td>
                                <td class="px-4 py-2">Tech Channel</td>
                                <td class="px-4 py-2">Technology</td>
                                <td class="px-4 py-2">2024</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 8 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">008</td>
                                <td class="px-4 py-2">Health Matters</td>
                                <td class="px-4 py-2">Wellness</td>
                                <td class="px-4 py-2">Health</td>
                                <td class="px-4 py-2">2023</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 9 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">009</td>
                                <td class="px-4 py-2">Future Vision</td>
                                <td class="px-4 py-2">Innovators</td>
                                <td class="px-4 py-2">Innovation</td>
                                <td class="px-4 py-2">2024</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                                </td>
                            </tr>
                            <!-- Data Podcast 10 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">010</td>
                                <td class="px-4 py-2">Life Stories</td>
                                <td class="px-4 py-2">Storytellers</td>
                                <td class="px-4 py-2">Lifestyle</td>
                                <td class="px-4 py-2">2022</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Ubah</button>
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
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

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            
            rows.forEach(row => {
                const columns = row.querySelectorAll('td');
                const match = Array.from(columns).some(column => 
                    column.textContent.toLowerCase().includes(filter)
                );
                row.style.display = match ? '' : 'none';
            });
        });
    </script>
</body>
</html>
