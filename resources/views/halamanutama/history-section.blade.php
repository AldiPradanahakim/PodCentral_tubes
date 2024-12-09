<section class="podcast-section" id="history-section" style="display: none;">
    <div class="category">
      <h2>History</h2>
      <div class="grid">
        @foreach(range(1, 24) as $i)
          <div class="card" onclick="showDetail()">
            <img src="{{ asset('img/Screenshot 2024-11-28 at 22.04.25.png') }}" alt="History Podcast {{ $i }}">
            <div class="card-info">
              <p>Sejarah dunia di abad pertengahan</p>
              <span>John Doe</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>