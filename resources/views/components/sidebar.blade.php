<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-black flex flex-col">
        <!-- Logo dan Nama -->
        <div class="flex items-center px-6 py-4">
            <img src="{{ asset('img/podcast.png') }}" alt="PodCentral Logo" class="h-8 w-8 mr-3">
            <span class="text-xl font-semibold text-white">PodCentral</span>
        </div>
        <!-- Navigation Links -->
        <nav class="flex flex-col px-6 py-4 space-y-4">
            <a href="#" class="flex items-center text-gray-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21v-9m-6 0V6h9m2 2v4m0 0H5m4 0H3m6 4H5" />
                </svg>
                Beranda
            </a>
            <a href="#" class="flex items-center text-gray-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l2-2m0 0l2-2m-2 2l2 2m-2-2v8" />
                </svg>
                Koleksi Saya
            </a>
            <a href="#" class="flex items-center text-gray-300 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15h11M9 3v9m-6 0V6h9m4 9v-4m0 0H5m6 0H3" />
                </svg>
                History
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-black px-6 py-4 flex justify-between items-center">
            <!-- Search Bar dengan Icon Home -->
            <div class="flex items-center  m-auto w-full md:w-1/3 space-x-2">
                <!-- Icon Home -->
                <a href="#" class="text-white hover:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9m0 0l9 9M4.5 12H19.5M12 21V12" />
                    </svg>
                </a>
                <!-- Search Bar -->
                <div class="relative m-auto w-full">
                    <input 
                        type="text" 
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
                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User Image">
                    <span class="ml-2 text-sm">{{ Auth::user()->name }}</span>
                </button>
                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition 
                     class="absolute right-0 mt-2 w-48 bg-black rounded-md shadow-lg py-1 ring-1 ring-black/5">
                    <a href="/profile" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Your Profile</a>
                    <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Settings</a>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post">
                        @csrf
                    <button type="button" onclick="showPopup()" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">Sign out</button>
                    </form>
                    <div id="logoutPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
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
