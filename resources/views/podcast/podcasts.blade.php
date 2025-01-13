<x-layout>
    <x-sidebar>
        
        <div class="container overflow-y-auto px-6 py-8 bg-[#F5EFE7] ">
            <!-- Main Header -->
            <div class="flex items-center mb-6 py-4">
                 @if (isset($podcasts[0]))
                    <img src="{{ $podcasts[0]->author->profile_image ? asset('storage/' . $podcasts[0]->author->profile_image) : 'https://via.placeholder.com/112' }}" 
                        alt="Profile Image" 
                        class="w-28 h-28 rounded-full shadow-lg object-cover">
                    <div class="ml-6 flex flex-col justify-center">
                        <h1 class="text-3xl font-bold text-[#213555]">{{ $podcasts[0]->author->nama }}</h1>
                    </div>
                @else
                    <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://via.placeholder.com/112' }}" 
                        alt="Profile Image" 
                        class="w-28 h-28 rounded-full shadow-lg object-cover">
                    <div class="ml-6 flex flex-col justify-center">
                        <h1 class="text-3xl font-bold text-[#213555]">{{ auth()->user()->nama }}</h1>
                    </div>
                @endif
                
                
            
                {{-- <button class="ml-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-all duration-200">
                    Follow
                </button> --}}
            </div>
            <!-- Main Content (Left: Cards, Right: About) -->
            <div class="flex gap-8">
                <!-- Left Section: Episode List -->
                <!-- Episode List -->
                <!-- Episode List -->
                <div class="flex-1">
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-[#213555]">Semua Podcast</h2>
                        <select class="bg-[#213555] text-white p-2 rounded-lg shadow-lg">
                            <option value="" disabled selected>Sort By</option>
                            <option value="newest">Newest to Oldest</option>
                            <option value="oldest">Oldest to Newest</option>
                        </select>
                    </div>

                    @foreach($podcasts as $podcast)
                    <a href="{{ route('podcast.show', $podcast->id) }}" class="block">
                        <div class="bg-[#213555] rounded-lg shadow-lg p-6 flex mb-6 hover:bg-[#213555] transition-colors duration-200">
                            <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/112' }}" 
                                alt="Podcast Image" 
                                class="w-32 h-32 rounded-lg shadow-lg object-cover">
                            <div class="ml-6 flex-1">
                                <h3 class="text-xl font-semibold text-white">{{ $podcast->nama }}</h3>
                                <p class="text-white text-sm">{{ $podcast->author->nama }}</p>
                                <p class="text-white text-sm mt-2">{{ Str::limit($podcast->desc, 150) }}</p>
                                
                                <div class="mt-2 text-sm text-white">
                                    <span>{{ $podcast->duration }} min • </span>
                                    <span>{{ $podcast->release_date ? date('d M Y', strtotime($podcast->release_date)) : 'No date' }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                
            </div>
        </div>
        
    </x-sidebar>
</x-layout>