<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#213555] flex flex-col">
        <!-- Logo dan Nama -->
        <div class="flex items-center px-6 py-4">
            <img src="{{ asset('img/podcast.png') }}" alt="PodCentral Logo" class="h-8 w-8 mr-3">
            <span class="text-xl font-semibold text-white">PodCentral</span>
        </div>
        <!-- Navigation Links -->
        <nav class="flex flex-col px-6 py-4 space-y-4">
            <a href="/home" class="flex items-center text-gray-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="ml-2">Beranda</span>
            </a>
            <a href="/koleksi" class="flex items-center text-gray-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark">
                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                </svg>
                <span class="ml-2">Koleksi</span>
            </a>
            <a href="/history" class="flex items-center text-gray-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                </svg>
                <span class="ml-2">History</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-[#213555] px-6 py-4 flex justify-between items-center">
            <!-- Search Bar dengan Icon Home -->
            <div class="flex items-center  m-auto w-full md:w-1/3 space-x-2">
                <!-- Icon Home -->
                <a href="/home" class="text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>  
                </a>
                <!-- Search Bar -->
                <div class="relative m-auto w-full">
                    <input 
                        type="search" 
                        id="search" 
                        name="search"
                        placeholder="Search" 
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-gray-100 text-gray-800 placeholder-gray-500 focus:ring focus:ring-indigo-500">
                    <div class="absolute top-2 left-3 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="11" cy="11" r="8" stroke-width="2"></circle>
                            <path d="M21 21l-4.35-4.35" stroke-width="2"></path>
                        </svg>
                    </div>
                </div>
            </div>

              <!-- Profile Dropdown -->
              <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center text-white focus:outline-none">
                    @if(Auth::check() && Auth::user()->profile_image)
                        <img class="h-10 w-10 rounded-full" src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="User Image">
                        @else
                         <img class="h-8 w-8 rounded-full" src="https://via.placeholder.com/112" alt="User Image">
                    @endif
                    {{-- <span class="ml-2 text-sm">{{ Auth::check() ? Auth::user()->nama : 'Guest' }}</span> --}}
              </button>
    
                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition 
                     class="absolute right-0 mt-2 w-48 bg-black rounded-md shadow-lg py-1 ring-1 ring-black/5 z-50">
                    <a href="/profile" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Your Profile</a>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post">
                        @csrf
                    <button type="button" onclick="showPopup()" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Sign out</button>
                    </form>
                    <div id="logoutPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50  items-center justify-center z-50">
                        <div class="bg-white p-6 rounded shadow-lg">
                            <p class="mb-4">Are you sure you want to logout?</p>
                            <button onclick="confirmLogout()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Yes
                            </button>
                            <button onclick="hidePopup()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                No
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        
        <!-- Main content -->
            {{ $slot }}

            
    </div>
</div>