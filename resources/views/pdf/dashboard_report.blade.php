<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Report</title>
    <style>
        body { font-family: sans-serif; }
        .container { margin: 20px; }
        h1, h2, h3 { color: #333; }
        .stats-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .stats-table th, .stats-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .stats-table th { background-color: #f2f2f2; }
        .section-title { margin-top: 20px; margin-bottom: 10px; font-size: 1.2em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PODCENTRAL</h1>

         <section>
            <h2 class="section-title">Statistik</h2>
            <table class="stats-table">
              <thead>
                <tr>
                    <th>Total Podcasts</th>
                    <th>Total Users</th>
                    <th>Total Genres</th>
                 </tr>
              </thead>
                <tbody>
                     <tr>
                        <td>{{ $totalPodcasts }}</td>
                        <td>{{ $totalUsers }}</td>
                         <td>{{ $totalGenres }}</td>
                    </tr>
               </tbody>
             </table>
        </section>

          <section>
            <h2 class="section-title">Podcast Per Genre</h2>
                <table class="stats-table">
                <thead>
                     <tr>
                            <th>Genre</th>
                             <th>Total Podcasts</th>
                     </tr>
                  </thead>
                 <tbody>
                    @foreach($podcastsPerGenre as $podcastGenre)
                        <tr>
                          <td>{{ \App\Models\Genre::find($podcastGenre->id_genre)->nama }}</td>
                           <td>{{ $podcastGenre->total }}</td>
                         </tr>
                     @endforeach
               </tbody>
                </table>
       </section>

        <section>
            <h2 class="section-title">Popular Podcasts (Based on Collections)</h2>
               <table class="stats-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Total Collections</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($popularPodcasts as $podcast)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $podcast->nama }}</td>
                                <td>{{ $podcast->koleksi_items_count }}</td>
                            </tr>
                       @endforeach
                   </tbody>
               </table>
        </section>
          <section>
                <h2 class="section-title">Latest Episodes</h2>
                <table class="stats-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Author</th>
                             <th>Uploaded At</th>
                        </tr>
                    </thead>
                   <tbody>
                        @foreach($latestEpisodes as $episode)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $episode->nama }}</td>
                                <td>{{ $episode->author->nama }}</td>
                                 <td>{{ $episode->created_at }}</td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
           </section>
             <section>
                 <h2 class="section-title">Manage Podcasts</h2>
                 <table class="stats-table">
                    <thead>
                          <tr>
                             <th>No</th>
                             <th>Title</th>
                              <th>Author</th>
                         </tr>
                    </thead>
                  <tbody>
                        @foreach($podcasts as $podcast)
                           <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $podcast->nama }}</td>
                                <td>{{ $podcast->author->nama }}</td>
                             </tr>
                        @endforeach
                   </tbody>
                </table>
              </section>
                <section>
                 <h2 class="section-title">Manage Users</h2>
                <table class="stats-table">
                    <thead>
                        <tr>
                             <th>No</th>
                             <th>Username</th>
                              <th>Email</th>
                             <th>Joined</th>
                        </tr>
                   </thead>
                 <tbody>
                        @foreach($users as $user)
                            <tr>
                               <td>{{ $loop->iteration }}</td>
                              <td>{{ $user->nama }}</td>
                              <td>{{ $user->email }}</td>
                               <td>{{ $user->created_at }}</td>
                             </tr>
                         @endforeach
                 </tbody>
                </table>
             </section>
    </div>
</body>
</html>