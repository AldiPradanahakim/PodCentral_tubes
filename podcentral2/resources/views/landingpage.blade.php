<x-layout>
    <!-- Background Image -->
    <div class="min-h-full bg-cover bg-center" style="background-image: url('{{ asset('img/backgroundheader.jpeg') }}');">
        <x-navbar></x-navbar> <!-- Navbar yang sudah dibuat -->

        <!-- Hero Section (Bagian Utama) -->
        <div class="flex items-center justify-center min-h-screen bg-transparent bg-opacity-50">
            <div class="text-center text-white px-6 md:px-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Dengarkan Podcast Tanpa Henti</h1>
                <p class="text-lg md:text-xl mb-6"> Podcast Favoritmu, Setiap Waktu, Dimana Saja dan kapan saja!</p>
                <a href="/login" class="bg-red-500 text-white py-2 px-6 rounded-full font-semibold hover:bg-red-700">Masuk</a>
            </div>
        </div>
        
    </div>
    <!-- Bagian Featured Podcasts -->
    <swiper-container class="mySwiper py-5" pagination="true" pagination-clickable="true" direction="vertical"
    space-between="30" mousewheel="true">
        <swiper-slide>Slide 1</swiper-slide>
        <swiper-slide>Slide 2</swiper-slide>
        <swiper-slide>Slide 3</swiper-slide>
        <swiper-slide>Slide 4</swiper-slide>
        <swiper-slide>Slide 5</swiper-slide>
        <swiper-slide>Slide 6</swiper-slide>
        <swiper-slide>Slide 7</swiper-slide>
        <swiper-slide>Slide 8</swiper-slide>
        <swiper-slide>Slide 9</swiper-slide>
    </swiper-container>

    <section class="py-10 px-4 bg-black">
        <h2 class="text-3xl font-semibold text-white mb-6">Kategori Podcast</h2>
        <!-- Kontainer untuk 3 kolom di desktop dan 1 kolom di mobile -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            
            <!-- Card 1 -->
            <div class="max-w-xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                <a href="/register">
                    <div class="p-4">
                        <!-- Judul Podcast di atas Gambar -->
                        <h3 class="text-xl font-semibold mb-2 text-center">Podcast Title</h3>
                        <!-- Gambar Podcast yang lebih besar -->
                        <img class="w-full h-64 object-cover rounded-lg" src="https://via.placeholder.com/600x400" alt="Podcast Image">
                        
                        <!-- Nama Podcaster dan Foto Profil -->
                        <div class="flex items-center mt-4 mb-4">
                            <!-- Foto Profil Podcaster -->
                            <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/100" alt="Podcaster Image">
                            <div>
                                <p class="text-lg font-semibold">Podcaster Name</p>
                            </div>
                        </div>
                        
                        <!-- Durasi Episode -->
                        <p class="text-gray-400 text-sm mb-4">Duration: 45 minutes</p>
                    </div>
                </a>
            </div>
    
            <!-- Card 2 -->
            <div class="max-w-xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                <a href="/register">
                    <div class="p-4">
                        <!-- Judul Podcast di atas Gambar -->
                        <h3 class="text-xl font-semibold mb-2 text-center">Podcast Title</h3>
                        <!-- Gambar Podcast yang lebih besar -->
                        <img class="w-full h-64 object-cover rounded-lg" src="https://via.placeholder.com/600x400" alt="Podcast Image">
                        
                        <!-- Nama Podcaster dan Foto Profil -->
                        <div class="flex items-center mt-4 mb-4">
                            <!-- Foto Profil Podcaster -->
                            <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/100" alt="Podcaster Image">
                            <div>
                                <p class="text-lg font-semibold">Podcaster Name</p>
                            </div>
                        </div>
                        
                        <!-- Durasi Episode -->
                        <p class="text-gray-400 text-sm mb-4">Duration: 45 minutes</p>
                    </div>
                </a>
            </div>
    
            <!-- Card 3 -->
            <div class="max-w-xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                <a href="/register">
                    <div class="p-4">
                        <!-- Judul Podcast di atas Gambar -->
                        <h3 class="text-xl font-semibold mb-2 text-center">Podcast Title</h3>
                        <!-- Gambar Podcast yang lebih besar -->
                        <img class="w-full h-64 object-cover rounded-lg" src="https://via.placeholder.com/600x400" alt="Podcast Image">
                        
                        <!-- Nama Podcaster dan Foto Profil -->
                        <div class="flex items-center mt-4 mb-4">
                            <!-- Foto Profil Podcaster -->
                            <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/100" alt="Podcaster Image">
                            <div>
                                <p class="text-lg font-semibold">Podcaster Name</p>
                            </div>
                        </div>
                        
                        <!-- Durasi Episode -->
                        <p class="text-gray-400 text-sm mb-4">Duration: 45 minutes</p>
                    </div>
                </a>
            </div>
    
            <!-- Card 4 -->
            <div class="max-w-xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                <a href="/register">
                    <div class="p-4">
                        <!-- Judul Podcast di atas Gambar -->
                        <h3 class="text-xl font-semibold mb-2 text-center">Podcast Title</h3>
                        <!-- Gambar Podcast yang lebih besar -->
                        <img class="w-full h-64 object-cover rounded-lg" src="https://via.placeholder.com/600x400" alt="Podcast Image">
                        
                        <!-- Nama Podcaster dan Foto Profil -->
                        <div class="flex items-center mt-4 mb-4">
                            <!-- Foto Profil Podcaster -->
                            <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/100" alt="Podcaster Image">
                            <div>
                                <p class="text-lg font-semibold">Podcaster Name</p>
                            </div>
                        </div>
                        
                        <!-- Durasi Episode -->
                        <p class="text-gray-400 text-sm mb-4">Duration: 45 minutes</p>
                    </div>
                </a>
            </div>
    
            <!-- Card 5 -->
            <div class="max-w-xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                <a href="/register">
                    <div class="p-4">
                        <!-- Judul Podcast di atas Gambar -->
                        <h3 class="text-xl font-semibold mb-2 text-center">Podcast Title</h3>
                        <!-- Gambar Podcast yang lebih besar -->
                        <img class="w-full h-64 object-cover rounded-lg" src="https://via.placeholder.com/600x400" alt="Podcast Image">
                        
                        <!-- Nama Podcaster dan Foto Profil -->
                        <div class="flex items-center mt-4 mb-4">
                            <!-- Foto Profil Podcaster -->
                            <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/100" alt="Podcaster Image">
                            <div>
                                <p class="text-lg font-semibold">Podcaster Name</p>
                            </div>
                        </div>
                        
                        <!-- Durasi Episode -->
                        <p class="text-gray-400 text-sm mb-4">Duration: 45 minutes</p>
                    </div>
                </a>
            </div>
    
            <!-- Card 6 -->
            <div class="max-w-xl mx-auto bg-gray-800 text-white rounded-lg shadow-lg overflow-hidden">
                <a href="/register">
                    <div class="p-4">
                        <!-- Judul Podcast di atas Gambar -->
                        <h3 class="text-xl font-semibold mb-2 text-center">Podcast Title</h3>
                        <!-- Gambar Podcast yang lebih besar -->
                        <img class="w-full h-64 object-cover rounded-lg" src="https://via.placeholder.com/600x400" alt="Podcast Image">
                        
                        <!-- Nama Podcaster dan Foto Profil -->
                        <div class="flex items-center mt-4 mb-4">
                            <!-- Foto Profil Podcaster -->
                            <img class="w-16 h-16 rounded-full object-cover mr-4" src="https://via.placeholder.com/100" alt="Podcaster Image">
                            <div>
                                <p class="text-lg font-semibold">Podcaster Name</p>
                            </div>
                        </div>
                        
                        <!-- Durasi Episode -->
                        <p class="text-gray-400 text-sm mb-4">Duration: 45 minutes</p>
                    </div>
                </a>
            </div>
    
        </div>
    </section>
    
    
    

</x-layout>

