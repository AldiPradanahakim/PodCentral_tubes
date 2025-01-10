<x-layout>
    <x-sidebar>

        <div class="flex-1 overflow-y-auto p-6 bg-gray-800">

            <!-- Cover Section -->
            <div class="relative h-64 bg-cover bg-center"
                 style="background-image: url('https://via.placeholder.com/1200x400');">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>

            <!-- Profile Section -->
            <div class="flex-1 max-w-5xl mx-auto py-8 px-6">
                 @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                 @endif
                  @if(session('error'))
                    <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                  @endif
                <!-- Profile Header -->
                <div class="relative flex items-center space-x-6 mb-8">
                    <!-- Gambar Profile -->
                    <div class="flex-shrink-0">
                      @if($user->profile_image)
                        <div class="bg-gray-700 rounded-full h-24 w-24 flex items-center justify-center border-4 border-gray-800 overflow-hidden">
                           <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-full h-full object-cover">
                         </div>
                        @else
                        <div class="bg-gray-700 rounded-full h-24 w-24 flex items-center justify-center border-4 border-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2a7 7 0 00-5.468 2.57C5.218 15.568 6.82 16 8.5 16h3c1.68 0 3.282-.432 3.968-1.43A7 7 0 0010 12z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                         @endif
                    </div>

                    <!-- Info Profile -->
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-bold text-white">{{ $user->nama }}</h1>
                        <p class="text-gray-400 text-sm mt-1">
                            {{ $user->collections->count() }} Playlist Publik
                        </p>
                          <div class="mt-4 flex gap-2">
                             <form action="{{ route('profile.update-picture') }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="file" name="profile_image" id="profile_image" class="hidden" accept="image/*"
                                       onchange="this.form.submit()"/>
                                  <label for="profile_image" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-md cursor-pointer">
                                       Edit Picture
                                   </label>
                             </form>
                               @if($user->profile_image)
                                    <form action="{{ route('profile.delete-picture') }}" method="post">
                                           @csrf
                                          <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md">Delete Picture</button>
                                    </form>
                               @endif
                         </div>
                    </div>
                </div>

                <!-- Playlist Publik -->
                 <div class="bg-gray-700 rounded-lg shadow-md p-4">
                    <h2 class="text-2xl font-semibold text-white mb-4">Playlist Publik</h2>

                    <!-- Grid Responsif -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($user->collections as $collection)
                           @foreach($collection->koleksi_items as $koleksi_item)
                                @php
                                   $podcast = $koleksi_item->podcast;
                                @endphp
                             <a href="{{ route('podcast.show', $podcast->id) }}" class="block">
                                <div class="bg-gray-800 rounded-lg shadow-md p-4 hover:bg-gray-700 transition-colors duration-200">
                                    <!-- Header: Judul dan Episode -->
                                    <div class="mb-2">
                                        <h3 class="text-white font-semibold text-lg truncate">{{$podcast->nama}}</h3>
                                        <p class="text-gray-400 text-sm truncate mt-1">Episode 12: Magical Nights</p>
                                    </div>

                                    <!-- Gambar (Tidak Full) -->
                                     <div class="mb-2 rounded-md overflow-hidden">
                                          <img src="{{ asset('storage/' . $podcast->image) }}" alt="Thumbnail"
                                                class="w-full h-44 object-cover">
                                      </div>

                                    <!-- Deskripsi & Info -->
                                    <div class="flex justify-between items-start">
                                        <!-- Deskripsi -->
                                        <div class="flex-1">
                                            <p class="text-gray-300 text-sm truncate">{{ Str::limit($podcast->desc, 150) }}</p>
                                             <p class="text-gray-500 text-xs mt-2">
                                             {{$podcast->release_date}}</p>
                                          </div>

                                        <!-- Tombol Play -->
                                        <button
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-full shadow-md transition transform hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                                 fill="currentColor">
                                                <path d="M5 3v18l15-9L5 3z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                         @empty
                            <p class="text-gray-400">No public playlists yet.</p>
                        @endforelse
                    </div>
                 </div>
            </div>
        </div>
        <!-- Include the necessary JS scripts for the player and other functionality -->
    </x-sidebar>
</x-layout>