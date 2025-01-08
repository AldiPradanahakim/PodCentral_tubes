<x-layout>
    <x-sidebar>        
        <div class="container overflow-y-auto px-6 py-8 bg-gray-800">
            <!-- Main Header -->
            <div class="flex items-center mb-6 py-4">
                <!-- Profile Image -->
                <img src="https://via.placeholder.com/112" alt="Profile Image" class="w-28 h-28 rounded-full shadow-lg">
                
                <!-- Podcast Details -->
                <div class="ml-6 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-white">Nama Podcast</h1>
                    <p class="text-lg text-gray-300">By: Tim Podcast</p>
                </div>

                <!-- Follow Button -->
                <button class="ml-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-all duration-200">
                    Follow
                </button>
            </div>

            <!-- Main Content (Left: Cards, Right: About) -->
            <div class="flex gap-8">
                <!-- Left Section: Episode List -->
                <div class="flex-1">
                    <!-- Sort By Section -->
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-white">Semua Episode</h2>
                        <!-- Sort By dalam Select -->
                        <select class="bg-gray-700 text-white p-2 rounded-lg shadow-lg">
                            <option value="" disabled selected>Sort By</option>
                            <option value="newest">Newest to Oldest</option>
                            <option value="oldest">Oldest to Newest</option>
                        </select>
                    </div>

                    <!-- Episode Card 1 -->
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="https://via.placeholder.com/112" alt="Episode Image" class="w-32 h-32 rounded-lg shadow-lg">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">Episode Title 1</h3>
                            <p class="text-gray-400 text-sm">Nama Podcast</p>
                            <p class="text-gray-500 text-sm mt-2">Sedikit deskripsi episode...</p>
                            <div class="mt-4 flex gap-4">
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Section: About -->
                <div class="w-72 bg-gray-700 text-white rounded-lg p-6 shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">About This Podcast</h3>
                    <p class="text-gray-300 leading-relaxed">
                        This is a brief description of the podcast, what it's about, and the people behind it. 
                        This text can contain more information about the topics covered, the hosts, and the general theme of the podcast.
                    </p>
                    <div class="mt-6">
                        <h4 class="text-xl font-semibold mb-2">Podcast Information</h4>
                        <ul class="space-y-2 text-gray-300">
                            <li>Episodes: 5</li>
                            <li>Language: English</li>
                            <li>Category: Technology</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-sidebar>
</x-layout>
