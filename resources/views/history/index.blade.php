<x-layout>
    <x-sidebar>
    <div class="flex-1 overflow-y-auto bg-[#F5EFE7] p-4">
        <div class="bg-[#F5EFE7] p-4">
            <h2 class="text-2xl font-bold text-[#213555] mb-4">HISTORY</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($historyItems as $item)
                   <a href="{{ route('podcast.show', $item->podcast->id) }}">
                        <div class="bg-[#213555] rounded-lg shadow-lg p-4">
                            <div class="flex items-center mb-4">
                                <div class="w-16 h-16 flex-shrink-0">
                                    <img src="{{ $item->podcast->author->profile_image ? asset('storage/' . $item->podcast->author->profile_image) : 'https://via.placeholder.com/100' }}"
                                         alt="Profile Picture"
                                         class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-white font-bold text-lg truncate">{{ $item->podcast->nama }}</h3>
                                    <p class="text-gray-400 text-sm truncate mt-1">Episode: {{ $item->podcast->nama }}</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <img src="{{ $item->podcast->image ? asset('storage/' . $item->podcast->image) : 'https://via.placeholder.com/600x200' }}"
                                     alt="Thumbnail"
                                     class="w-full h-56 object-cover rounded-lg">
                            </div>

                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <p class="text-gray-300 text-sm truncate">{{ $item->podcast->author->nama }}</p>
                                    <p class="text-gray-500 text-xs mt-2">{{ $item->created_at->format('Y-m-d, H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="col-span-full text-center text-gray-500">
                       <p>No history items found.</p>
                  </div>
                @endforelse
                </div>
        </div>
    </div>
    </x-sidebar>
</x-layout>