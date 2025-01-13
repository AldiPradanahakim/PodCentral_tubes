<x-layout>
    <x-sidebar>

        <div class="flex-1 overflow-y-auto p-6 bg-[#F5EFE7]">

            <!-- Cover Section -->
            <div class="relative h-64 bg-cover bg-center flex items-center justify-center"
                style="background-color: #ddd;">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                <img src="{{ asset('storage/podcast/000.png') }} " alt="Podcast Banner" class="w-full h-full object-contain">
            </div>


            <!-- Profile Section -->
            <div class="flex-1 max-w-5xl mx-auto py-8 px-6">
                 @if(session('success'))
                    <div class="bg-green-500 text-[#213555] p-4 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                 @endif
                  @if(session('error'))
                    <div class="bg-red-500 text-[#213555] p-4 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                  @endif
                <!-- Profile Header -->
                <div class="relative flex items-center space-x-6 mb-8">
                    <!-- Gambar Profile -->
                    <div class="flex-shrink-0">
                      @if($user->profile_image)
                        <div class="bg-[#213555] rounded-full h-24 w-24 flex items-center justify-center border-4 border-gray-800 overflow-hidden">
                           <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-full h-full object-cover">
                         </div>
                        @else
                        <div class="bg-black rounded-full h-24 w-24 flex items-center justify-center border-4 border-black">
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
                        <h1 class="text-3xl font-bold text-[#213555]">{{ $user->nama }}</h1>
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
                <h2 class="text-2xl font-semibold text-[#213555] mb-4">Podcast Anda</h2>
                    <!-- Grid Responsif -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($podcasts as $podcast)
                            <a href="{{ route('podcast.show', $podcast->id) }}" class="block">
                                <div class="bg-[#213555] rounded-lg shadow-md p-4 hover:bg-gray-700 transition-colors duration-200">
                                    <!-- Header: Judul dan Episode -->
                                    <div class="mb-2">
                                        <h3 class="text-white font-semibold text-lg truncate">{{ $podcast->nama }}</h3>
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
                                            <p class="text-gray-300 text-sm truncate">{{ Str::limit($podcast->desc, 20) }}</p>
                                            <p class="text-gray-500 text-xs mt-2">{{ $podcast->release_date }}</p>
                                        </div>
                
                                        
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-gray-400">Anda belum mengunggah podcast.</p>
                        @endforelse
                    </div>
            </div>
        </div>
        <!-- Include the necessary JS scripts for the player and other functionality -->
    </x-sidebar>
</x-layout>