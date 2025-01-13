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
    <section class="py-10 px-4 bg-black">
        <h2 class="text-3xl font-semibold text-white mb-6">Kategori Podcast</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            {{-- Remove the isset() check since we know $podcasts is always set --}}
            @if($podcasts->count() > 0)  {{-- Changed to use count() method --}}
                @foreach($podcasts as $podcast)
                    <a href="/login" class="block">
                        <div class="podcast-card relative bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200 ease-in-out">
                            <div class="relative">
                                <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/600x200' }}" alt="Thumbnail" class="w-full h-56 object-cover object-center">
                                <div class="absolute inset-0 bg-black opacity-10"></div>
                                <div class="absolute bottom-2 left-2 text-white">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 flex-shrink-0">
                                            <img src="{{ $podcast->author->profile_image ? asset('storage/' . $podcast->author->profile_image) : 'https://via.placeholder.com/100'}}" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                        </div>
                                        <div class="ml-2 text-sm">
                                            <h3 class="font-bold truncate">{{ $podcast->nama }}</h3>
                                            <p class="text-gray-300 text-xs truncate mt-1">By: {{ $podcast->author->nama }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <p class="text-gray-300 text-sm truncate">{{ Str::limit($podcast->desc, 100) }}</p>
                                <p class="text-gray-500 text-xs mt-2">{{ $podcast->release_date }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p class="text-white text-center">Tidak ada podcast yang tersedia.</p>
            @endif
        </div>
    </section>
    
    

</x-layout>