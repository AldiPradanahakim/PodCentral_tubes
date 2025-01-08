<x-layout>
    <x-sidebar>
        <div class="max-full h-full p-8 bg-gray-800 rounded-lg shadow-lg">
            <!-- Header -->
            <div class="flex items-center">
                <!-- Podcast Cover Image -->
                <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/112' }}" alt="Podcast Cover" class="w-56 h-40 rounded-lg shadow-lg hover:scale-105 transition-all duration-300 object-cover">
    
                <!-- Podcast Details -->
                <div class="ml-6 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-white">{{ $podcast->nama }}</h1>
                    <p class="text-lg text-gray-300 mt-1">{{ $podcast->author->nama }}</p>
                    <p class="text-sm mt-2 text-gray-400">
                        {{ $podcast->release_date }},
                         @php
                            $hours = floor($podcast->duration / 60);
                            $minutes = $podcast->duration % 60;
                         @endphp
                        {{ $hours > 0 ? $hours . ' jam ' : '' }} {{ $minutes }} menit</p>
                    <p class="text-sm mt-1 text-gray-400"><span class="font-bold text-gray-200">Genre:</span> Motivation, Islamic</p>
                </div>
            </div>
            <!-- Action Buttons (Play & Like) in the same div as podcast details -->
            <div class="mt-6 flex gap-4 justify-start">
                <!-- Play Button -->
                <button class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center transition-all duration-200 transform hover:scale-110">
                    <!-- Font Awesome Play Icon -->
                    <i class="fa fa-play text-white text-2xl"></i>
                </button>

                <!-- Like Button -->
                <button class="bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center transition-all duration-200 transform hover:scale-110">
                    <!-- Font Awesome Heart Icon -->
                    <i class="fa fa-heart text-white text-2xl"></i>
                </button>
            </div>
            <!-- Episode Description -->
            <div class="mt-6 p-4 bg-gray-800 rounded-lg shadow-inner hover:bg-gray-700 transition-all duration-300">
                <h2 class="text-lg font-bold mb-2 text-white">Deskripsi Episode</h2>
                <p class="text-gray-300 leading-relaxed">
                    {{ $podcast->desc }}
                </p>
                <p class="text-gray-400 text-sm mt-4">
                    Support this podcast: 
                    <a href="https://creators.spotify.com/pod/show/syifquran/support" target="_blank" class="text-green-400 underline hover:text-green-500 transition-all duration-300">
                        https://creators.spotify.com/pod/show/syifquran/support
                    </a>
                </p>
            </div>
   
            <!-- See All Episodes -->
             <a href="{{ route('episode.index') }}">
            <div class="mt-8 text-left py-10">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full shadow-lg transition-all duration-200 transform hover:scale-105">
                    Lihat Semua Episode
                </button>
            </div>
        </a>
        </div>
        
        
        </x-sidebar>
    </x-layout>
