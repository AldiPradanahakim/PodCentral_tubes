<x-layout>
    <x-sidebar>
        
        <div class="container overflow-y-auto px-6 py-8 bg-gray-800">
            <!-- Main Header -->
            <div class="flex items-center mb-6 py-4">
                <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://via.placeholder.com/112' }}" 
                     alt="Profile Image" 
                     class="w-28 h-28 rounded-full shadow-lg object-cover">
                
                <div class="ml-6 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-white">{{ auth()->user()->nama }}</h1>
                </div>
            
                <button class="ml-auto bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition-all duration-200">
                    Follow
                </button>
            </div>
            <!-- Main Content (Left: Cards, Right: About) -->
            <div class="flex gap-8">
                <!-- Left Section: Episode List -->
                <!-- Episode List -->
                <!-- Episode List -->
                <div class="flex-1">
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-white">Semua Podcast</h2>
                        <select class="bg-gray-700 text-white p-2 rounded-lg shadow-lg">
                            <option value="" disabled selected>Sort By</option>
                            <option value="newest">Newest to Oldest</option>
                            <option value="oldest">Oldest to Newest</option>
                        </select>
                    </div>

                    @foreach($podcasts as $podcast)
                    <div class="bg-gray-800 rounded-lg shadow-lg p-6 flex mb-6">
                        <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/112' }}" 
                            alt="Podcast Image" 
                            class="w-32 h-32 rounded-lg shadow-lg object-cover">
                        <div class="ml-6 flex-1">
                            <h3 class="text-xl font-semibold text-white">{{ $podcast->nama }}</h3>
                            <p class="text-gray-400 text-sm">{{ $podcast->author->nama }}</p>
                            <p class="text-gray-500 text-sm mt-2">{{ Str::limit($podcast->desc, 150) }}</p>
                            <div class="mt-4 flex gap-4">
                                @if($podcast->files)
                                <button class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-play text-xl"></i>
                                </button>
                                @endif
                                <button class="bg-gray-700 hover:bg-gray-600 text-white p-3 rounded-full shadow-lg transition-all duration-200">
                                    <i class="fa fa-heart text-xl"></i>
                                </button>
                            </div>
                            <div class="mt-2 text-sm text-gray-400">
                                <span>{{ $podcast->duration }} min • </span>
                                <span>{{ $podcast->release_date ? date('d M Y', strtotime($podcast->release_date)) : 'No date' }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
