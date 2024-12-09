<section class="podcast-section" id="beranda-section">
    <div class="category">
      <h2>SENI</h2>
      <div class="grid">
        @foreach(range(1, 24) as $i)
          <div class="card" data-podcast="seni" onclick="showDetail(this)">
            <img src="{{ asset('img/Screenshot 2024-11-28 at 22.04.25.png') }}" alt="Sleepy Stories">
            <div class="card-info">
              <p>sleepy stories Harry Potter, The Lord of the Rings</p>
              <span>budi nutomo</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>