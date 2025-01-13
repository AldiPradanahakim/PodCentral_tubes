<x-layout>
    <x-sidebar>
        <div class="flex-1 overflow-y-auto bg-[#F5EFE7] p-4">
            <!-- Navigation Tabs -->
            <h2 class="text-2xl font-bold text-[#213555] mb-4">KOLEKSI ANDA</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($koleksis as $koleksi)
                    @foreach($koleksi->koleksi_items as $item)
                        <a href="{{ route('podcast.show', $item->podcast->id) }}" class="block">
                            <div class="bg-[#213555] rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200 ease-in-out">
                                <div class="p-4">
                                   <div class="mb-2">
                                        <div class="flex items-center">
                                            
                                            <h3 class="font-bold text-white text-sm truncate">{{ $item->podcast->nama }}</h3>
                                        </div>
                                        @if ($item->podcast->genre)
                                            <p class="text-gray-400 text-xs italic mt-1">{{ $item->podcast->genre->nama }}</p>
                                        @endif
                                    </div>
                                    <img src="{{ $item->podcast->image ? asset('storage/' . $item->podcast->image) : 'https://via.placeholder.com/600x200' }}" alt="Thumbnail" class="w-full h-40 object-cover object-center rounded-md mb-2">
                                    <p class="text-[#F5EFE7] text-sm truncate">{{ Str::limit($item->podcast->desc, 100) }}</p>
                                    <p class="text-gray-500 text-xs mt-2">{{ $item->podcast->release_date }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @empty
                    <p class="text-white">Tidak ada koleksi yang dibuat.</p>
                @endforelse
            </div>
        </div>
    </x-sidebar>
</x-layout>