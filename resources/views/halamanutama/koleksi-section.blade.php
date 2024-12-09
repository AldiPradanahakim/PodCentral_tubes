<section class="podcast-section2" id="koleksi-section" style="display: none;">
    <div class="category">
      <h2>Koleksi</h2>
      <div class="grid">
        @foreach(range(1, 10) as $i)
          <div class="card">
            <img src="{{ asset('img/Screenshot 2024-11-28 at 22.04.25.png') }}" alt="Koleksi Podcast {{ $i }}">
            <div class="card-info">
              <p>Sejarah dunia di abad pertengahan</p>
              <span>John Doe</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>