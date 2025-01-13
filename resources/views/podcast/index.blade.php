<x-layout>
    <x-sidebar>
        <div class="max-full h-full p-8 bg-[#F5EFE7] shadow-lg">
            <!-- Header -->
            <div class="flex items-center">
                <!-- Podcast Cover Image -->
                <img src="{{ $podcast->image ? asset('storage/' . $podcast->image) : 'https://via.placeholder.com/112' }}"
                     alt="Podcast Cover"
                     class="w-56 h-40 rounded-lg shadow-lg hover:scale-105 transition-all duration-300 object-cover">

                <!-- Podcast Details -->
                <div class="ml-6 flex flex-col justify-center">
                    <h1 class="text-3xl font-bold text-[#213555]">{{ $podcast->nama }}</h1>
                    <p class="text-lg text-[#213555] mt-1">{{ $podcast->author->nama }}</p>
                    <p class="text-sm mt-2 text-[#213555]">
                        {{ $podcast->release_date }},
                        @php
                            $hours = floor($podcast->duration / 60);
                            $minutes = $podcast->duration % 60;
                        @endphp
                        {{ $hours > 0 ? $hours . ' jam ' : '' }} {{ $minutes }} menit
                    </p>
                    <p class="text-sm mt-1 text-gray-400"><span
                            class="font-bold text-[#213555]">Genre:</span> {{ $podcast->genre->nama }}</p>
                </div>
            </div>

             <!-- Action Buttons (Play & Like) in the same div as podcast details -->
            <div class="mt-6 flex gap-4 justify-start">
                <!-- Play Button -->
                <button id="detail-play-button"
                        class="text-green flex items-center justify-center transition-all duration-200 transform hover:scale-110 focus:outline-none bg-green-600 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                         fill="currentColor">
                        <path d="M7 4v16l13-8z"/>
                    </svg>
                </button>

                <!-- Like Button -->
                 <button id="detail-like-button"
                         class="text-white  flex items-center justify-center transition-all duration-200 transform hover:scale-110 focus:outline-none">
                        <i id="like-icon" class="fa fa-heart text-white text-2xl {{ $podcast->isInUserCollection(Auth::id()) ? 'text-red-500' : ''}}"></i>
                    </button>

            </div>

           <!-- Audio Player -->
        <div id="audio-player-container" class="fixed bottom-0 left-0 w-full bg-gray-800 p-2 z-50 hidden">
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <img id="audio-player-image" src="" alt="Now Playing" class="w-10 h-10 rounded-md object-cover mr-2">
                    <div>
                         <h3 id="audio-player-title" class="font-semibold text-white text-sm truncate"></h3>
                            <p id="audio-player-author" class="text-gray-400 text-xs truncate"></p>
                         </div>
                        </div>

                            <div class="flex items-center">
                             <button id="audio-prev" class="text-gray-400 focus:outline-none" disabled>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                    </svg>
                               </button>
                             <button id="audio-play" class=" text-white p-2 rounded-full shadow-lg focus:outline-none flex items-center justify-center transition-all duration-200 transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>
                                </button>
                             <button id="audio-next" class="text-gray-400 focus:outline-none" disabled>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                 </button>
                          </div>
                   </div>
                        <div class="mt-1 flex items-center">
                          <div class="flex-1 px-2">
                             <div class="bg-gray-600 rounded-full h-1 overflow-hidden relative">
                                     <div id="audio-progress" class="bg-[#EAB308] h-1" style="width: 0;"></div>
                             </div>
                         </div>
                               <span id="audio-player-time" class="ml-2 text-gray-400 text-xs">0:00 / 0:00</span>
                             </div>
                              <div class="mt-1 flex items-center justify-between">
                                  <div class="flex items-center">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 mr-1">
                                         <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                       </svg>
                                         <input type="range" min="0" max="1" step="0.01" value="1" class="audio-volume w-24 h-1 cursor-pointer bg-gray-600 rounded-full appearance-none focus:outline-none mx-2" style="background-image: linear-gradient(to right, #gray-600, #EAB308);">
                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400 ml-1">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 010 12.728M16.463 8.287a6 6 0 010 8.486M12.5 10.5a3 3 0 010 4.243m2.512-1.5a2.5 2.5 0 10-1.023-2.433" />
                                         </svg>
                                       </div>
                                          <button id="audio-expand" class="text-gray-400 focus:outline-none">
                                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 15.75v4.5m0-4.5h4.5m-4.5 0L9 15M15 15h2.25m-2.25 0l1.5 1.5M15 9h2.25m-2.25 0l1.5-1.5M15 15.75v4.5m0-4.5h4.5m-4.5 0L21 21M15 3.75v4.5m0-4.5h4.5m-4.5 0L21 9" />
                                                 </svg>
                                             </button>
                              </div>
               </div>
            <audio src="{{ $podcast->files ? asset('storage/' . $podcast->files) : '' }}" class="detail-audio hidden"></audio>

            <!-- Episode Description -->
            <div class="mt-6 p-4 bg-[#F5EFE7] transition-all duration-300">
                <h2 class="text-lg font-bold mb-2 text-[#213555]">Deskripsi Episode</h2>
                <p class="text-[#213555] leading-relaxed">
                    {{ $podcast->desc }}
                </p>
            </div>
            <a href="{{ route('podcasts.author', $podcast->author->id) }}">
                <div class="mt-8 text-left py-10">
                    <button
                        class="bg-[#F5EFE7] hover:bg-[#F5EFE7] text-[#213555] font-bold py-3 px-6 rounded-full shadow-lg transition-all duration-200 transform hover:scale-105">
                        Lihat Semua Podcast
                    </button>
                 </div>
             </a>
        </div>
    </x-sidebar>
     <style>
        #detail-play-button {
             background-color: #22C55E; /* Warna hijau */
            padding: 0.5rem; /* Sesuaikan padding jika perlu */
             border-radius: 50%; /* Buat bulat */
            box-shadow: none; /* Hilangkan shadow jika ada */
         }

        #detail-play-button:hover {
              transform: scale(1.1); /* Efek hover */
            background-color: #16A34A; /* Warna hijau lebih gelap saat hover */
          }
        #detail-play-button svg {
           width: 1.5rem;
           height: 1.5rem;
        }
        #detail-play-button, #detail-like-button {
              background-color: transparent;
              box-shadow: none;
             padding: 0.5rem;
         }

         #detail-play-button svg, #detail-like-button svg {
           width: 1.5rem;
             height: 1.5rem;
           }

        #detail-play-button:hover, #detail-like-button:hover {
              transform: scale(1.1);
           }
        #audio-play{
             background-color: transparent;
               box-shadow: none;
         }
        #audio-play:hover {
               background-color: #22C55E !important; /* Warna hijau saat hover */
           }
     </style>
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

        document.addEventListener('DOMContentLoaded', function () {
            const playButton = document.getElementById('detail-play-button');
            const audioElement = document.querySelector('.detail-audio');
           const playerElement = document.querySelector('.podcast-detail-player');
           const prevButton = document.getElementById('audio-prev');
             const nextButton = document.getElementById('audio-next');
            const progressBar = document.getElementById('audio-progress');
            const volumeControl = document.querySelector('.audio-volume');
            const timeDisplay = document.getElementById('audio-player-time');
            let isPlaying = false;
            const podcastId = {{ $podcast->id }}; // Get podcast ID from Blade template
            const likeButton = document.getElementById('detail-like-button');
            const likeIcon = document.getElementById('like-icon');
            const audioPlay = document.getElementById('audio-play');
            let isAudioPlaying = false;
            let isLiked = false;

           const updateLikeIcon = () => {
             if (isLiked) {
                likeIcon.classList.add('text-red-500');
                console.log('updateLikeIcon: isLiked is TRUE, setting color to red');
                } else {
                   likeIcon.classList.remove('text-red-500');
                   console.log('updateLikeIcon: isLiked is FALSE, setting color to white');
                }
          };

           const checkLike = async () => {
             try {
                  const response = await fetch('{{ route('podcasts.addToKoleksi', ['podcast' => $podcast->id]) }}', {
                        method: 'POST',
                         headers: {
                            'Content-Type': 'application/json',
                             'X-CSRF-TOKEN': '{{ csrf_token() }}'
                           }
                      });
                    const data = await response.json();
                      console.log('checkLike: Response from server:', data);
                     if (data.message === "Removed from koleksi successfully") {
                        isLiked = false;
                    } else if (data.message === "Added to koleksi successfully") {
                        isLiked = true;
                     }
                    updateLikeIcon();
                 } catch (error) {
                  console.error('checkLike: Error:', error);
                 }
          };
        

            if (likeIcon.classList.contains('text-red-500')) {
                isLiked = true;
             }
            updateLikeIcon();


              playButton.addEventListener('click', function (event) {
                    event.preventDefault();
                    console.log('play button clicked');
                     if (currentAudio && currentAudio !== audioElement) {
                        currentAudio.pause();
                        audioPlayerContainer.classList.add('hidden');
                         audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                    }
                  if (isPlaying) {
                    audioElement.pause();
                    audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                    audioPlayerContainer.classList.add('hidden');
                  } else {
                    audioElement.play();
                   audioPlayerContainer.classList.remove('hidden');
                    audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
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
                        progressBar.style.width = `${progress}%`;
                        timeDisplay.textContent = `${formatTime(audioElement.currentTime)} / ${formatTime(audioElement.duration)}`;
                    });
                     audioElement.addEventListener('play', function() {
                            console.log('audio play event triggered');
                            fetch('{{ route('podcasts.addToHistory', ['podcast' => $podcast->id]) }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                              .then(response => response.json())
                              .then(data => console.log('response data from history', data))
                           .catch(error => console.error('Error adding to history:', error));
                       });

                    audioElement.addEventListener('ended', () => {
                       isPlaying = false;
                        audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
                         fetch('{{ route('podcasts.addToHistory', ['podcast' => $podcast->id]) }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                           })
                             .then(response => response.json())
                              .then(data => console.log('response data from history when ended', data))
                              .catch(error => console.error('Error adding to history when ended:', error));
                  });
                });

               progressBar.closest('.bg-gray-600').addEventListener('click', function (e) {
                    const clickPosition = e.offsetX;
                   const progressBarWidth = this.offsetWidth;
                   const seekTime = (clickPosition / progressBarWidth) * audioElement.duration;
                    audioElement.currentTime = seekTime;
              });

            volumeControl.addEventListener('input', function () {
                  audioElement.volume = volumeControl.value;
              });

               audioExpand.addEventListener('click', function(){
                     if(currentAudio){
                        sessionStorage.setItem('currentAudioSrc', currentAudio.src);
                        window.location.href = `/podcast/${document.querySelector('h1.text-3xl').textContent}`;
                      }
                  });
            likeButton.addEventListener('click', function(e) {
                       e.preventDefault();
                       checkLike();
                    });



    audioPlay.addEventListener('click', function() {
      if (isAudioPlaying) {
        audioElement.pause();
       audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
        } else {
        audioElement.play();
        audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/></svg>`;
      }
        isAudioPlaying = !isAudioPlaying;
    });

  audioElement.addEventListener('ended', () => {
    isAudioPlaying = false;
   audioPlay.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M7 4v16l13-8z" /></svg>`;
  });
        });
    </script>
</x-layout>     