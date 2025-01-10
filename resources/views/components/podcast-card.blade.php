{{-- <a href="{{ route('podcast.show', $podcast->id) }}" class="block">
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
            <div class="absolute bottom-2 right-2">
                <button class="podcast-play bg-yellow-500 rounded-full p-2 hover:bg-yellow-600 transition-colors focus:outline-none">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                          <path d="M5 3v18l15-9L5 3z" />
                      </svg>
                </button>
            </div>
            <audio src="{{ $podcast->files ? asset('storage/' . $podcast->files) : '' }}" class="podcast-audio hidden"></audio>
        </div>
        <div class="p-4">
            <p class="text-gray-300 text-sm truncate">{{ Str::limit($podcast->desc, 100) }}</p>
            <p class="text-gray-500 text-xs mt-2">{{ $podcast->release_date }}</p>
         </div>
             <!-- Audio Player -->
            <div class="podcast-player hidden p-3 bg-gray-800 mt-2">
                <div class="flex items-center justify-between">
                    <button class="podcast-prev text-white focus:outline-none" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    </button>
                     <div class="flex-1 px-2">
                        <div class="bg-gray-600 rounded-full h-1.5 overflow-hidden relative">
                           <div class="podcast-progress bg-yellow-500 h-1.5" style="width: 0;"></div>
                        </div>
                    </div>
                    <button class="podcast-next text-white focus:outline-none" disabled>
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                      </svg>
                    </button>
                    <span class="podcast-time ml-2 text-gray-400 text-xs">0:00 / 0:00</span>
                </div>
                <div class="mt-2 flex items-center">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white mr-1">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <input type="range" min="0" max="1" step="0.01" value="1" class="podcast-volume w-full h-1 cursor-pointer bg-gray-600 rounded-full appearance-none focus:outline-none mx-2" style="background-image: linear-gradient(to right, #EAB308, #EAB308);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-white ml-1">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.287a6 6 0 010 8.486M12.5 10.5a3 3 0 010 4.243m2.512-1.5a2.5 2.5 0 10-1.023-2.433" />
                      </svg>
                </div>
           </div>
    </div>
</a> --}}