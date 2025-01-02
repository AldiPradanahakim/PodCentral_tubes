<x-layout>
    <x-sidebar>

        <div class="flex-1 overflow-y-auto p-6 bg-gray-800">
           
            
            <!-- Cover Section -->
            <div class="relative h-64 bg-cover bg-center" style="background-image: url('https://via.placeholder.com/1200x400');">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>
         

            <!-- Profile Section -->
            <div class="flex-1 max-w-7xl mx-auto py-8 px-6">
                <!-- Profile Header -->
                <div class="relative flex items-center space-x-4">
                <!-- Gambar Profile -->
                <div class="flex-shrink-0">
                    <div class="bg-gray-700 rounded-full h-32 w-32 flex items-center justify-center border-4 border-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2a7 7 0 00-5.468 2.57C5.218 15.568 6.82 16 8.5 16h3c1.68 0 3.282-.432 3.968-1.43A7 7 0 0010 12z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            
                <!-- Info Profile -->
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-bold text-white">Neymar.jr</h1>
                    <p class="text-gray-400">5 Playlist Publik · 1 Pengikut · 2 Mengikuti</p>
                </div>
            </div>
  
                <!-- playlist publik -->
            <div class="bg-gray-800 shadow-md p-4">
                <h2 class="text-2xl font-bold text-white mb-4">Playlist Publik</h2>
            
                <!-- Grid Responsif -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Kartu Item -->
                    <a href="">
                        <div class="bg-gray-700 rounded-lg shadow-lg p-4">
                            <!-- Header: Foto Profil & Info -->
                            <div class="flex items-center mb-4">
                                <!-- Foto Profil -->
                                <div class="w-16 h-16 flex-shrink-0">
                                    <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                </div>
                                <!-- Judul dan Episode -->
                                <div class="ml-4 flex-1">
                                    <h3 class="text-white font-bold text-lg truncate">Sleepy Stories</h3>
                                    <p class="text-gray-400 text-sm truncate mt-1">Episode 12: Magical Nights</p>
                                </div>
                            </div>
                    
                            <!-- Gambar (Tidak Full) -->
                            <div class="mb-4">
                                <img src="https://via.placeholder.com/600x200" alt="Thumbnail" class="w-full h-56 object-cover rounded-lg">
                            </div>
                    
                            <!-- Deskripsi & Info -->
                            <div class="flex justify-between items-start">
                                <!-- Deskripsi -->
                                <div class="flex-1">
                                    <p class="text-gray-300 text-sm truncate">Harry Potter, The Lord of the Rings</p>
                                    <p class="text-gray-500 text-xs mt-2">2024-06-01, 18:30</p>
                                </div>
                    
                                <!-- Tombol Play -->
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white p-3 rounded-full shadow-lg transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M5 3v18l15-9L5 3z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </a>

                    <!-- Kartu Duplikat Item  -->
                    <a href="">
                        <div class="bg-gray-700 rounded-lg shadow-lg p-4">
                            <!-- Header: Foto Profil & Info -->
                            <div class="flex items-center mb-4">
                                <!-- Foto Profil -->
                                <div class="w-16 h-16 flex-shrink-0">
                                    <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                </div>
                                <!-- Judul dan Episode -->
                                <div class="ml-4 flex-1">
                                    <h3 class="text-white font-bold text-lg truncate">Sleepy Stories</h3>
                                    <p class="text-gray-400 text-sm truncate mt-1">Episode 12: Magical Nights</p>
                                </div>
                            </div>
                    
                            <!-- Gambar (Tidak Full) -->
                            <div class="mb-4">
                                <img src="https://via.placeholder.com/600x200" alt="Thumbnail" class="w-full h-56 object-cover rounded-lg">
                            </div>
                    
                            <!-- Deskripsi & Info -->
                            <div class="flex justify-between items-start">
                                <!-- Deskripsi -->
                                <div class="flex-1">
                                    <p class="text-gray-300 text-sm truncate">Harry Potter, The Lord of the Rings</p>
                                    <p class="text-gray-500 text-xs mt-2">2024-06-01, 18:30</p>
                                </div>
                    
                                <!-- Tombol Play -->
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white p-3 rounded-full shadow-lg transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M5 3v18l15-9L5 3z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </a>

                    <!-- Kartu duplikat Item -->
                    <a href="">
                        <div class="bg-gray-700 rounded-lg shadow-lg p-4">
                            <!-- Header: Foto Profil & Info -->
                            <div class="flex items-center mb-4">
                                <!-- Foto Profil -->
                                <div class="w-16 h-16 flex-shrink-0">
                                    <img src="https://via.placeholder.com/100" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                </div>
                                <!-- Judul dan Episode -->
                                <div class="ml-4 flex-1">
                                    <h3 class="text-white font-bold text-lg truncate">Sleepy Stories</h3>
                                    <p class="text-gray-400 text-sm truncate mt-1">Episode 12: Magical Nights</p>
                                </div>
                            </div>
                    
                            <!-- Gambar (Tidak Full) -->
                            <div class="mb-4">
                                <img src="https://via.placeholder.com/600x200" alt="Thumbnail" class="w-full h-56 object-cover rounded-lg">
                            </div>
                    
                            <!-- Deskripsi & Info -->
                            <div class="flex justify-between items-start">
                                <!-- Deskripsi -->
                                <div class="flex-1">
                                    <p class="text-gray-300 text-sm truncate">Harry Potter, The Lord of the Rings</p>
                                    <p class="text-gray-500 text-xs mt-2">2024-06-01, 18:30</p>
                                </div>
                    
                                <!-- Tombol Play -->
                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white p-3 rounded-full shadow-lg transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M5 3v18l15-9L5 3z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            </div>
        </div>

    </x-sidebar>
</x-layout>
