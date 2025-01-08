<x-layout>
    <x-sidebar>
        <div class="flex-1 overflow-y-auto bg-gray-800 p-4">
            <!-- Navigation Tabs -->
            <div class="p-6">
                <div class="bg-gray-800 shadow-md p-4 rounded-lg">
                    <h2 class="text-2xl font-bold text-white mb-4">KOLEKSI ANDA</h2>
                    
                    <div class="p-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @forelse ($koleksis as $koleksi)
                            @foreach($koleksi->koleksi_items as $item)
                                <div class="bg-gray-800 p-4 w-64 rounded-lg flex flex-col items-center text-center hover:bg-gray-700 transform hover:scale-105 transition duration-300">
                                    <a href="#" class="w-16 h-16 rounded-full flex justify-center items-center mb-4 cursor-pointer">
                                       <img src="{{ $item->podcast->image ? asset('storage/' . $item->podcast->image) : 'https://via.placeholder.com/100'}}" alt="{{ $item->podcast->nama }}" class="w-full h-full rounded-full object-cover">
                                    </a>
                                    <a href="#" class="mt-4 text-sm font-bold text-white hover:underline cursor-pointer truncate">{{ $item->podcast->nama }}</a>
                                    <p class="text-xs text-gray-400 truncate">
                                       {{ $item->podcast->author->nama }} ·
                                        @php
                                            $hours = floor($item->podcast->duration / 60);
                                            $minutes = $item->podcast->duration % 60;
                                        @endphp
                                        {{ $hours > 0 ? $hours . ' jam ' : '' }} {{ $minutes }} menit
                                    </p>
                                </div>
                            @endforeach
                        @empty
                            <p class="text-white">Tidak ada koleksi yang dibuat.</p>
                        @endforelse
                    </div>
                    
                    <!-- End of Content Grid -->
                </div>
            </div>
        </div>
    </x-sidebar>
</x-layout>
