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
                <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
                <a href="dashboard/managepodcast" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                <a href="dashboard/pengguna" class="flex items-center px-4 py-2 text-gray-300 hover:bg-indigo-600 hover:text-white rounded-lg transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6v2h12v-2c0-3.31-2.69-6-6-6z"></path>
                    </svg>
                    <span class="ml-3">User</span>
                </a>
            </nav>
            <!-- Footer -->
           <div class="px-6 py-4 border-t border-gray-700 overflow-y-auto">
                <form id="logoutForm" action="{{ route('logout') }}" method="post">
                    @csrf
                <button type="button" onclick="showPopup()" class="block px-4 py-2 text-sm text-white hover:bg-gray-600">log out</button>
                </form>
                <div id="logoutPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
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
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6 h-screen overflow-y-auto">
            <header class="mb-6">
                <h1 class="text-2xl font-bold text-gray-700">Dashboard</h1>
                <a href="{{ route('dashboard.pdf', ['sort' => request('sort'), 'direction' => request('direction'), 'sort_user' => request('sort_user'), 'direction_user' => request('direction_user')]) }}" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mt-4">
                    Download PDF
                </a>
            </header>

            <!-- Statistik -->
            <section class="grid grid-cols-4 gap-4 mb-8 mta">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Podcasts</h3>
                    <p class="text-2xl font-bold text-indigo-500">{{ $totalPodcasts }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <p class="text-2xl font-bold text-indigo-500">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg font-semibold text-gray-700">Total Genres</h3>
                    <p class="text-2xl font-bold text-indigo-500">{{ $totalGenres }}</p>
                </div>
            </section>

            <!-- Podcast Per Genre -->
            <section class="mb-8">
                 <h2 class="text-xl font-semibold text-gray-700 mb-4">Podcast Per Genre</h2>
                 <div class="bg-white p-4 shadow-md rounded-lg overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                           <th class="px-4 py-2 text-left">Genre</th>
                           <th class="px-4 py-2 text-left">Total Podcasts</th>
                        </tr>
                    </thead>
                     <tbody>
                        @foreach($podcastsPerGenre as $podcastGenre)
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2"> {{ \App\Models\Genre::find($podcastGenre->id_genre)->nama }}</td>
                             <td class="px-4 py-2">{{ $podcastGenre->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
            </section>
                <!-- Popular Podcasts -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Popular Podcasts (Based on Collections)</h2>
               <div class="bg-white p-4 shadow-md rounded-lg overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left"> No </th>
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Total Collections</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($popularPodcasts as $podcast)
                             <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $podcast->nama }}</td>
                                    <td class="px-4 py-2">{{ $podcast->koleksi_items_count }}</td>
                             </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
            </section>

              <!-- Latest Episodes -->
            <section class="mb-8">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Latest Episodes</h2>
                 <div class="bg-white p-4 shadow-md rounded-lg overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left">No</th>
                                <th class="px-4 py-2 text-left">Title</th>
                                <th class="px-4 py-2 text-left">Author</th>
                                <th class="px-4 py-2 text-left">Uploaded At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestEpisodes as $episode)
                            <tr class="border-t border-gray-200">
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $episode->nama }}</td>
                                    <td class="px-4 py-2">{{ $episode->author->nama }}</td>
                                     <td class="px-4 py-2">{{ $episode->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
           </section>

           <section class="mb-8">
              <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Podcasts</h2>
                <div class="overflow-x-auto">
                  <table class="table-auto w-full table-fixed bg-white shadow-md rounded-lg">
                      <thead class="bg-indigo-600 text-white">
                          <tr>
                            <th class="px-4 py-2 text-left">
                               <a href="{{ route('dashboard', ['sort' => 'id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">No</a>
                            </th>
                             <th class="px-4 py-2 text-left">
                                 <a href="{{ route('dashboard', ['sort' => 'nama', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Title</a>
                            </th>
                             <th class="px-4 py-2 text-left">
                               <a href="{{ route('dashboard', ['sort' => 'author_id', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Author</a>
                             </th>
                         </tr>
                     </thead>
                      <tbody>
                         @foreach($podcasts as $podcast)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $podcast->nama }}</td>
                                <td class="px-4 py-2">{{ $podcast->author->nama }}</td>
                            </tr>
                          @endforeach
                     </tbody>
                 </table>
                </div>
             <div class="mt-4">
            {{ $podcasts->appends(request()->except('page'))->links() }}
             </div>
           </section>
           
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Users</h2>
               <div class="overflow-x-auto">
                   <table class="table-auto w-full table-fixed bg-white shadow-md rounded-lg">
                       <thead class="bg-indigo-600 text-white">
                           <tr>
                                <th class="px-4 py-2 text-left">
                                     <a href="{{ route('dashboard', ['sort_user' => 'id', 'direction_user' => request('direction_user') == 'asc' ? 'desc' : 'asc']) }}">No</a>
                               </th>
                               <th  class="px-4 py-2 text-left">
                                 <a href="{{ route('dashboard', ['sort_user' => 'nama', 'direction_user' => request('direction_user') == 'asc' ? 'desc' : 'asc']) }}">Username</a>
                             </th>
                              <th class="px-4 py-2 text-left">Email</th>
                             <th  class="px-4 py-2 text-left">
                                  <a href="{{ route('dashboard', ['sort_user' => 'created_at', 'direction_user' => request('direction_user') == 'asc' ? 'desc' : 'asc']) }}">Joined</a>
                               </th>
                            </tr>
                       </thead>
                         <tbody>
                             @foreach($users as $user)
                                <tr class="border-t border-gray-200">
                                  <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                  <td class="px-4 py-2">{{ $user->nama }}</td>
                                  <td class="px-4 py-2">{{ $user->email }}</td>
                                 <td class="px-4 py-2">{{ $user->created_at }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                   </table>
              </div>
               <div class="mt-4">
                 {{ $users->appends(request()->except('page', 'users'))->links() }}
               </div>
          </section>
        </main>
    </div>
</x-layout>