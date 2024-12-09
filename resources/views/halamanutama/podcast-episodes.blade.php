<section class="podcast-section" id="episode-section" style="display: none;">
    <div class="podcast-header">
      <img src="{{ asset('img/Top-selling Stock Images_ Happy, portrait podcast man, speaker audio presenter in online talk show.jpeg') }}" alt="Podcast Banner" class="podcast-banner">
      <div class="podcast-title">
        <p class="podcast-category">Podcast</p>
        <h1 class="podcast-name">Dedy Corbuzier</h1>
      </div>
    </div>
  
    <div class="podcast-episodes">
      <button class="episode-toggle" id="episode-toggle">
        Semua Episode <span>&#9662;</span>
      </button>
  
      <div class="episode-list" id="episode-list">
        @foreach(range(1, 24) as $i)
          <div class="episode-item" id="episode-{{ $i }}" data-audio="audio-url-{{ $i }}.mp3">
            <img src="{{ asset('img/Screenshot 2024-11-29 at 00.31.32.png') }}" alt="Episode Thumbnail" class="episode-thumbnail">
            <div class="episode-details">
              <div class="episode-title">Seniman dan Kreator (Episode {{ $i }})</div>
              <div class="episode-description">
                Seniman dan Kreator adalah individu yang menciptakan karya seni atau konten kreatif untuk mengekspresikan ide, emosi, atau pesan tertentu. Mereka berkontribusi di berbagai bidang, mulai dari seni visual hingga konten.
              </div>
              <div class="play-button"></div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>