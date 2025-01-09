<x-layout>
    <div class="flex">
     <!-- Sidebar -->
     <aside class="w-64 bg-black flex flex-col h-screen">
         <!-- Logo dan Nama -->
         <div class="flex items-center px-6 py-4 border-b border-gray-700">
             <img src="{{ asset('img/podcast.png') }}" alt="PodCentral Logo" class="h-8 w-8 mr-3">
             <span class="text-xl font-semibold text-white">PodCentral</span>
         </div>
         <!-- Navigation Links -->
         <nav class="flex flex-col flex-grow px-6 py-4 space-y-2">
             <a href="/dashboard"
                 class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                     <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                     <polyline points="9 22 9 12 15 12 15 22"></polyline>
                 </svg>
                 <span class="ml-3">Dashboard</span>
             </a>
             <a href="{{ url('dashboard/managepodcast') }}"
                 class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                     <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                 </svg>
                 <span class="ml-3">Podcast</span>
             </a>
              <a href="{{ url('dashboard/managegenre') }}"
                 class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M5 19l-3 3m0 0l3-3m-3 3v-6m14-10l-3 3m0 0l3-3m-3 3v-6m-6-4l3 3m0 0l-3-3m3 3v-6" />
                     </svg>
                 <span class="ml-3">Genre</span>
             </a>
             <a href="{{ url('dashboard/pengguna') }}"
                 class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                     <path
                         d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6v2h12v-2c0-3.31-2.69-6-6-6z">
                     </path>
                 </svg>
                 <span class="ml-3">Pengguna</span>
             </a>
         </nav>
          <div class="px-6 py-4 border-t border-gray-700">
              <form id="logoutForm" action="{{ route('logout') }}" method="post">
                 @csrf
                 <button type="button" onclick="showPopup()"
                    class="block px-4 py-2 text-sm text-white hover:bg-gray-600">log out</button>
             </form>
               <div id="logoutPopup"
                    class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
                     <div class="bg-white p-6 rounded shadow-lg">
                         <p class="mb-4">Are you sure you want to logout?</p>
                         <button onclick="confirmLogout()"
                             class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2">
                             Yes
                         </button>
                         <button onclick="hidePopup()"
                             class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                              No
                         </button>
                    </div>
                </div>
           </div>
    </aside>
        <main class="flex-1 bg-gray-100 p-6 relative">
         <section>
           <h2 class="text-xl font-semibold text-gray-700 mb-4">Create New Genre</h2>
             <form action="{{ route('dashboard.managegenre.store') }}" method="POST">
                 @csrf
                   <div class="mb-4">
                     <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                      <input type="text" name="nama" id="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                     @error('nama')
                       <p class="text-red-500 text-xs italic">{{ $message }}</p>
                      @enderror
                    </div>
                    <button type="submit"
                         class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Genre</button>
               </form>
          </section>
      </main>
     </div>
</x-layout>