<x-layout>
    <x-sidebar>
        <div class="max-full h-full p-8 bg-gray-800 rounded-lg shadow-lg">
            <!-- Header -->
            <div class="flex items-center">
                <!-- Podcast Cover Image -->
                <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/112' }}" alt="Podcast Cover" class="w-56 h-40 rounded-lg shadow-lg hover:scale-105 transition-all duration-300 object-cover">

                <!-- Podcast Details -->
                <div class="ml-6 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-white">{{ $podcast->nama }}</h1>
                    <p class="text-lg text-gray-300 mt-1">{{ $podcast->author->nama }}</p>
                    <p class="text-sm mt-2 text-gray-400">
                        {{ $podcast->release_date }},
                        @php
                            $hours = floor($podcast->duration / 60);
                            $minutes = $podcast->duration % 60;
                         @endphp
                        {{ $hours > 0 ? $hours . ' jam ' : '' }} {{ $minutes }} menit</p>
                    <p class="text-sm mt-1 text-gray-400"><span class="font-bold text-gray-200">Genre:</span> Motivation, Islamic</p>
                </div>
            </div>

           <!-- Action Buttons (Play & Like) in the same div as podcast details -->
           <div class="mt-6 flex gap-4 justify-start">
                <!-- Play Button -->
                 <button id="detail-play-button" class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center transition-all duration-200 transform hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 4v16l13-8z" />
                    </svg>
                </button>

                <!-- Like Button -->
                <button class="bg-gray-700 hover:bg-gray-600 text-white p-4 rounded-full shadow-lg flex items-center justify-center transition-all duration-200 transform hover:scale-110">
                    <!-- Font Awesome Heart Icon -->
                    <i class="fa fa-heart text-white text-2xl"></i>
                </button>
            </div>
              <!-- Audio Player -->
               <div class="podcast-detail-player hidden p-3 bg-gray-800 mt-2">
                      <div class="flex items-center justify-between">
                         <button class="podcast-prev text-white focus:outline-none" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                             </svg>
                         </button>
                         <div class="flex-1 px-2">
                            <div class="bg-gray-600 rounded-full h-1 overflow-hidden relative">
                                <div class="podcast-progress bg-yellow-500 h-1" style="width: 0;"></div>
                             </div>
                          </div>
                         <button class="podcast-next text-white focus:outline-none" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                        <span class="podcast-time ml-2 text-gray-400 text-xs">0:00 / 0:00</span>
                   </div>
                     <div class="mt-2 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white mr-1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                         </svg>
                        <input type="range" min="0" max="1" step="0.01" value="1" class="podcast-volume w-24 h-1 cursor-pointer bg-gray-600 rounded-full appearance-none focus:outline-none mx-2" style="background-image: linear-gradient(to right, #EAB308, #EAB308);">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white ml-1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.287a6 6 0 010 8.486M12.5 10.5a3 3 0 010 4.243m2.512-1.5a2.5 2.5 0 10-1.023-2.433" />
                           </svg>
                     </div>
                </div>
                <audio src="{{ $podcast->files ? asset('storage/' . $podcast->files) : '' }}" class="detail-audio hidden"></audio>

            <!-- Episode Description -->
            <div class="mt-6 p-4 bg-gray-800 rounded-lg shadow-inner hover:bg-gray-700 transition-all duration-300">
                <h2 class="text-lg font-bold mb-2 text-white">Deskripsi Episode</h2>
                <p class="text-gray-300 leading-relaxed">
                    {{ $podcast->desc }}
                </p>
                <p class="text-gray-400 text-sm mt-4">
                    Support this podcast:
                    <a href="https://creators.spotify.com/pod/show/syifquran/support" target="_blank" class="text-green-400 underline hover:text-green-500 transition-all duration-300">
                        https://creators.spotify.com/pod/show/syifquran/support
                    </a>
                </p>
            </div>
             <a href="{{ route('podcasts.author', $podcast->author->id) }}">
                <div class="mt-8 text-left py-10">
                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-full shadow-lg transition-all duration-200 transform hover:scale-105">
                        Lihat Semua Podcast
                    </button>
                 </div>
             </a>
        </div>
    </x-sidebar>
     <script>
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
             let currentAudio = null;
            function formatTime(seconds) {
               const minutes = Math.floor(seconds / 60);
             const remainingSeconds = Math.floor(seconds % 60);
                 return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
             }
            document.addEventListener('DOMContentLoaded', function() {
             const playButton = document.getElementById('detail-play-button');
               const audioElement = document.querySelector('.detail-audio');
               const playerElement = document.querySelector('.podcast-detail-player');
              const prevButton = document.querySelector('.podcast-prev');
              const nextButton = document.querySelector('.podcast-next');
               const progressBar = document.querySelector('.podcast-progress');
             const volumeControl = document.querySelector('.podcast-volume');
              const timeDisplay = document.querySelector('.podcast-time');
               let isPlaying = false;

                playButton.addEventListener('click', function(event) {
                    event.preventDefault();
                     if (currentAudio && currentAudio !== audioElement) {
                            currentAudio.pause();
                             audioPlayerContainer.classList.add('hidden');
                            audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                         }
                      if (isPlaying) {
                           audioElement.pause();
                           playButton.innerHTML =  `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3v18l15-9L5 3z" /></svg>`;
                            playerElement.classList.add('hidden');
                       } else {
                           audioElement.play();
                           playerElement.classList.remove('hidden');
                             playButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
                       }
                        isPlaying = !isPlaying;
                        currentAudio = audioElement;
                        audioPlayerImage.src = document.querySelector('img').src;
                         audioPlayerTitle.textContent = document.querySelector('h1.text-3xl').textContent;
                       audioPlayerAuthor.textContent = document.querySelector('p.text-lg').textContent;
                           audioElement.addEventListener('loadedmetadata', () => {
                                 timeDisplay.textContent = `${formatTime(audioElement.currentTime)} / ${formatTime(audioElement.duration)}`;
                           });
                        audioElement.addEventListener('timeupdate', () => {
                          const progress = (audioElement.currentTime / audioElement.duration) * 100;
                             progressBar.style.width = `${progress}%timeDisplay.textContent =${formatTime(audioElement.currentTime)} / ${formatTime(audioElement.duration)}; }); audioElement.addEventListener('ended', () => { isPlaying = false; playButton.innerHTML =<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3v18l15-9L5 3z" /></svg>`;
                            });
                            });
                            progressBar.closest('.bg-gray-600').addEventListener('click', function(e) {
                                            const clickPosition = e.offsetX;
                                            const progressBarWidth = this.offsetWidth;
                                            const seekTime = (clickPosition / progressBarWidth) * audioElement.duration;
                                            audioElement.currentTime = seekTime;
                                        });

                                        volumeControl.addEventListener('input', function() {
                                            audioElement.volume = volumeControl.value;
                                        });
                                        audioExpand.addEventListener('click', function(){
                                            if(currentAudio){
                                            sessionStorage.setItem('currentAudioSrc', currentAudio.src);
                                            window.location.href = `/podcast/${document.querySelector('h1.text-3xl').textContent}`;
                                            }
                                        });
                                    });
    </script>
</x-layout>