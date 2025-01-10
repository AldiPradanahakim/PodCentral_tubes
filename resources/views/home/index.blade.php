<x-layout>
    <x-sidebar>
        <div class="flex-1 overflow-y-auto bg-gray-800 p-4">
            @foreach($genres as $genre)
                <div class="bg-gray-800 shadow-md p-4 mb-6">
                    <h2 class="text-2xl font-bold text-white mb-4 border-b border-gray-600 pb-2">{{ $genre->nama }}</h2>
                    <!-- Grid Responsif -->
                     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="podcastList-{{ $genre->id }}">
                        @if(count($genre->podcasts) > 0)
                            @foreach($genre->podcasts as $podcast)
                                 <a href="{{ route('podcast.show', $podcast->id) }}" class="block">
                                    <div class="podcast-card relative bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200 ease-in-out">
                                        <div class="relative">
                                            <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/600x200' }}" alt="Thumbnail" class="w-full h-56 object-cover object-center">
                                            <div class="absolute inset-0 bg-black opacity-10"></div>
                                            <div class="absolute bottom-2 left-2 text-white">
                                                <div class="flex items-center">
                                                    <div class="w-8 h-8 flex-shrink-0">
                                                        <img src="{{ $podcast->author->profile_image ? asset('storage/' . $podcast->author->profile_image) : 'https://via.placeholder.com/100'}}" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                                    </div>
                                                    <div class="ml-2 text-sm">
                                                        <h3 class="font-bold truncate">{{ $podcast->nama }}</h3>
                                                        <p class="text-gray-300 text-xs truncate mt-1">By: {{ $podcast->author->nama }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                             <audio src="{{ $podcast->files ? asset('storage/' . $podcast->files) : '' }}" class="podcast-audio hidden"></audio>
                                        </div>
                                        <div class="p-4">
                                            <p class="text-gray-300 text-sm truncate">{{ Str::limit($podcast->desc, 100) }}</p>
                                            <p class="text-gray-500 text-xs mt-2">{{ $podcast->release_date }}</p>
                                        </div>

                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class="text-white text-center">Tidak ada podcast untuk kategori ini.</p>
                        @endif
                    </div>
                    <div id="loadingIndicator-{{ $genre->id }}" class="hidden text-white text-center mt-4">Loading...</div>
                    <div id="noResultsMessage-{{ $genre->id }}" class="hidden text-white text-center mt-4">Tidak ada hasil pencarian.</div>
                </div>
            @endforeach
        </div>
    </x-sidebar>

      <!-- Mini Audio Player -->
      <div id="audio-player-container" class="fixed bottom-0 left-0 w-full bg-gray-900 p-4 border-t border-gray-700 z-50 hidden">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                  <img id="audio-player-image" src="" alt="Podcast Cover" class="w-12 h-12 rounded-md mr-4 object-cover">
                   <div class="flex flex-col">
                       <span id="audio-player-title" class="text-white font-semibold text-sm truncate max-w-[200px]"></span>
                       <span id="audio-player-author" class="text-gray-400 text-xs truncate max-w-[200px]"></span>
                   </div>
             </div>
           
         <div class="flex items-center">
             <button id="audio-prev" class="text-gray-400 focus:outline-none" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                  </button>
                 <button id="audio-play" class="bg-gray-700 text-white rounded-full p-1 mx-2 focus:outline-none">
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                     <path d="M7 4v16l13-8z" />
                  </svg>
                </button>
                <button id="audio-next" class="text-gray-400 focus:outline-none" disabled>
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                      </svg>
                </button>
                <span id="audio-player-time" class="text-gray-400 text-xs ml-2 mr-3">0:00 / 0:00</span>
                 <input type="range" min="0" max="1" step="0.01" value="1" class="audio-volume w-24 h-1 cursor-pointer bg-gray-600 rounded-full appearance-none focus:outline-none mx-2" style="background-image: linear-gradient(to right, #EAB308, #EAB308);">
                   <button class="text-gray-400 ml-2" id="audio-expand">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                       </svg>
                   </button>
              </div>
          </div>
            <div class="bg-gray-600 rounded-full h-1.5 overflow-hidden relative mt-1">
                <div id="audio-progress" class="bg-yellow-500 h-1.5" style="width: 0;"></div>
            </div>
        </div>
    
     <script>
         const placeholderImage = 'https://via.placeholder.com/600x200';
         const searchInput = document.getElementById('searchInput');
        let searchTimeout;
         let currentAudio = null;
         const audioPlayerContainer = document.getElementById('audio-player-container');
         const audioPlayerImage = document.getElementById('audio-player-image');
         const audioPlayerTitle = document.getElementById('audio-player-title');
         const audioPlayerAuthor = document.getElementById('audio-player-author');
        const audioPlay = document.getElementById('audio-play');
        const audioPrev = document.getElementById('audio-prev');
        const audioNext = document.getElementById('audio-next');
         const audioProgress = document.getElementById('audio-progress');
       const audioTime = document.getElementById('audio-player-time');
       const audioVolume = document.querySelector('.audio-volume');
      const audioExpand = document.getElementById('audio-expand');
      function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const remainingSeconds = Math.floor(seconds % 60);
            return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
         }
         searchInput.addEventListener('input', function(e) {
            clearTimeout(searchTimeout);
            const search = e.target.value.trim();
            searchTimeout = setTimeout(function() {
                if (search) {
                    performSearch(search);
                } else {
                    @foreach($genres as $genre)
                        const podcastList = document.getElementById('podcastList-{{ $genre->id }}');
                        podcastList.innerHTML = '';
                        const noResultsMessage = document.getElementById('noResultsMessage-{{ $genre->id }}');
                        noResultsMessage.classList.add('hidden');
                        @if(count($genre->podcasts) > 0)
                            @foreach($genre->podcasts as $podcast)
                                podcastList.innerHTML += `
                                    <a href="/podcast/${podcast.id}" class="block">
                                        <div class="podcast-card relative bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200 ease-in-out">
                                            <div class="relative">
                                                <img src="${podcast.image ? '/storage/' + podcast.image : 'https://via.placeholder.com/600x200'}" alt="Thumbnail" class="w-full h-56 object-cover object-center">
                                                <div class="absolute inset-0 bg-black opacity-10"></div>
                                                <div class="absolute bottom-2 left-2 text-white">
                                                    <div class="flex items-center">
                                                        <div class="w-8 h-8 flex-shrink-0">
                                                            <img src="${podcast.author.profile_image ? '/storage/' + podcast.author.profile_image : 'https://via.placeholder.com/100'}" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                                        </div>
                                                        <div class="ml-2 text-sm">
                                                            <h3 class="font-bold truncate">${podcast.nama}</h3>
                                                            <p class="text-gray-300 text-xs truncate mt-1">By: ${podcast.author.nama}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <audio src="${podcast.files ? asset('storage/' + podcast.files) : '' }" class="podcast-audio hidden"></audio>
                                            </div>
                                            <div class="p-4">
                                                <p class="text-gray-300 text-sm truncate">{{ Str::limit($podcast->desc, 100) }}</p>
                                                <p class="text-gray-500 text-xs mt-2">{{ $podcast->release_date }}</p>
                                            </div>
                                        </div>
                                    </a>
                                `;
                            @endforeach
                        @else
                            podcastList.innerHTML = '<p class="text-white text-center">Tidak ada podcast untuk kategori ini.</p>';
                        @endif
                    @endforeach
                }
            }, 300);
         });
        function performSearch(search) {
            @foreach($genres as $genre)
                 const podcastList = document.getElementById('podcastList-{{ $genre->id }}');
                 const loadingIndicator = document.getElementById('loadingIndicator-{{ $genre->id }}');
                 const noResultsMessage = document.getElementById('noResultsMessage-{{ $genre->id }}');
                 loadingIndicator.classList.remove('hidden');
                 noResultsMessage.classList.add('hidden');
                 podcastList.innerHTML = '';
            @endforeach

            fetch(`/search?search=${search}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                     @foreach($genres as $genre)
                        const podcastList = document.getElementById('podcastList-{{ $genre->id }}');
                        const loadingIndicator = document.getElementById('loadingIndicator-{{ $genre->id }}');
                        const noResultsMessage = document.getElementById('noResultsMessage-{{ $genre->id }}');
                        loadingIndicator.classList.add('hidden');
                        let filteredData = data.filter(podcast => podcast.genre_id === {{ $genre->id }});

                        if (filteredData && filteredData.length > 0) {
                             filteredData.forEach(podcast => {
                                podcastList.innerHTML += `
                                   <a href="/podcast/${podcast.id}" class="block">
                                        <div class="podcast-card relative bg-gray-700 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200 ease-in-out">
                                            <div class="relative">
                                                <img src="${podcast.image ? '/storage/' + podcast.image : 'https://via.placeholder.com/600x200'}" alt="Thumbnail" class="w-full h-56 object-cover object-center">
                                                <div class="absolute inset-0 bg-black opacity-10"></div>
                                                <div class="absolute bottom-2 left-2 text-white">
                                                    <div class="flex items-center">
                                                        <div class="w-8 h-8 flex-shrink-0">
                                                            <img src="${podcast.author.profile_image ? '/storage/' + podcast.author.profile_image : 'https://via.placeholder.com/100'}" alt="Profile Picture" class="w-full h-full rounded-full border-2 border-yellow-500 shadow-md object-cover">
                                                        </div>
                                                        <div class="ml-2 text-sm">
                                                            <h3 class="font-bold truncate">${podcast.nama}</h3>
                                                            <p class="text-gray-300 text-xs truncate mt-1">By: ${podcast.author.nama}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <audio src="${podcast.files ? asset('storage/' + podcast.files) : '' }" class="podcast-audio hidden"></audio>
                                            </div>
                                            <div class="p-4">
                                                <p class="text-gray-300 text-sm truncate">${podcast.desc.length > 100 ? podcast.desc.substring(0, 100) + '...' : podcast.desc}</p>
                                                <p class="text-gray-500 text-xs mt-2">{{ $podcast->release_date }}</p>
                                            </div>
                                        </div>
                                    </a>
                                `;
                            });
                        } else {
                            noResultsMessage.classList.remove('hidden');
                        }
                    @endforeach
                })
                .catch(error => {
                      @foreach($genres as $genre)
                         const loadingIndicator = document.getElementById('loadingIndicator-{{ $genre->id }}');
                         const podcastList = document.getElementById('podcastList-{{ $genre->id }}');
                         loadingIndicator.classList.add('hidden');
                        podcastList.innerHTML = '<p class="text-white text-center">Terjadi kesalahan saat melakukan pencarian.</p>';
                     @endforeach
                    console.error('Error during search:', error);
                });
         }
            document.addEventListener('DOMContentLoaded', function() {
                 const podcastCards = document.querySelectorAll('.podcast-card');
                let isPlaying = false;
               podcastCards.forEach(card => {
                    const playButton = card.querySelector('.podcast-play');
                    const audioElement = card.querySelector('.podcast-audio');
                   const podcastImage = card.querySelector('img');
                     playButton.addEventListener('click', function(event) {
                         event.preventDefault();
                          audioPlayerImage.src = podcastImage.src;
                          audioPlayerTitle.textContent = card.querySelector('.font-bold').textContent;
                             audioPlayerAuthor.textContent = card.querySelector('.text-gray-300').textContent;
                           if (currentAudio && currentAudio !== audioElement) {
                                currentAudio.pause();
                                 audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                            }
                         if (isPlaying) {
                             audioElement.pause();
                              audioPlay.innerHTML =  `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                             audioPlayerContainer.classList.add('hidden');
                         } else {
                            audioElement.play();
                            audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
                             audioPlayerContainer.classList.remove('hidden');
                       }
                       isPlaying = !isPlaying;
                       currentAudio = audioElement;
                         currentAudio.addEventListener('loadedmetadata', () => {
                            audioTime.textContent = `${formatTime(currentAudio.currentTime)} / ${formatTime(currentAudio.duration)}`;
                        });
                       currentAudio.addEventListener('timeupdate', () => {
                         const progress = (currentAudio.currentTime / currentAudio.duration) * 100;
                            audioProgress.style.width = `${progress}%`;
                           audioTime.textContent = `${formatTime(currentAudio.currentTime)} / ${formatTime(currentAudio.duration)}`;
                      });

                     currentAudio.addEventListener('ended', () => {
                           isPlaying = false;
                             audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                        });
                   });
             });
                   audioProgress.closest('.bg-gray-600').addEventListener('click', function(e) {
                    if(currentAudio) {
                      const clickPosition = e.offsetX;
                    const progressBarWidth = this.offsetWidth;
                     const seekTime = (clickPosition / progressBarWidth) * currentAudio.duration;
                        currentAudio.currentTime = seekTime;
                 }
                 });
                 audioVolume.addEventListener('input', function() {
                      if(currentAudio)
                          currentAudio.volume = audioVolume.value;
                     });
                audioExpand.addEventListener('click', function(){
                    if(currentAudio){
                     sessionStorage.setItem('currentAudioSrc', currentAudio.src);
                        window.location.href = `/podcast/${currentAudio.closest('.podcast-card').querySelector('a').getAttribute('href').split('/').pop()}`;
                     }
                   });
             let storedAudioSrc = sessionStorage.getItem('currentAudioSrc');
                if (storedAudioSrc) {
                  podcastCards.forEach(card => {
                    const audioElement = card.querySelector('.podcast-audio');
                  const podcastImage = card.querySelector('img');
                        if (audioElement && audioElement.src === storedAudioSrc) {
                            audioPlayerImage.src = podcastImage.src;
                            audioPlayerTitle.textContent = card.querySelector('.font-bold').textContent;
                             audioPlayerAuthor.textContent = card.querySelector('.text-gray-300').textContent;
                             audioElement.play();
                           audioPlayerContainer.classList.remove('hidden');
                            audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
                              currentAudio = audioElement;
                              currentAudio.addEventListener('loadedmetadata', () => {
                                 audioTime.textContent = `${formatTime(currentAudio.currentTime)} / ${formatTime(currentAudio.duration)}`;
                               });
                                currentAudio.addEventListener('timeupdate', () => {
                                const progress = (currentAudio.currentTime / currentAudio.duration) * 100;
                                   audioProgress.style.width = `${progress}%`;
                                     audioTime.textContent = `${formatTime(currentAudio.currentTime)} / ${formatTime(currentAudio.duration)}`;
                                });

                         }
                  });
           }
        });
    </script>
</x-layout>