<section class="podcontainer" id="podcontainer">
  <header class="podheader">
      <!-- Menyertakan gambar dengan URL relatif -->
      <img src="{{ asset('img/Top-selling Stock Images_ Happy, portrait podcast man, speaker audio presenter in online talk show.jpeg') }}" alt="Podcast Cover" class="podcover" id="podcover">
      <div class="podinfo" id="podinfo">
          <span class="podtype" id="podtype">podcast</span>
          <h1 class="podtitle" id="podtitle">dedy corbuzier</h1>
          <div class="scroll-container" id="scroll-container">
            <button class="scrolbutton" onclick="toggleDescription()" id="scrolbutton">&#x25BC;</button>
            <span class="scroll-text" id="scroll-text">Deskripsi dan Episode</span>
          </div>
      </div>
  </header>
  <div class="poddescription" id="description">
      <p class="desctext" id="desctext">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias 
          incidunt explicabo et adipisci architecto cum quasi minima officiis 
          consequatur. Reprehenderit quam pariatur eligendi cumque! Iusto quas 
          reiciendis sequi magnam aliquid.
      </p>
      <button class="backbutton" onclick="toggleDescription()" id="backbutton">KEMBALI</button>
      <article class="episode" id="episode">
          <!-- Menyertakan gambar dengan URL relatif -->
          <img src="{{ asset('img/Screenshot 2024-11-29 at 00.36.49.png') }}" alt="Episode Cover" class="epicover" id="epicover">
          <div class="epidetails" id="epidetails">
              <h3 id="episode-title">seniman dan kreator.</h3>
              <p id="episode-description">
                  Seniman dan Kreator adalah individu yang menciptakan karya seni atau konten 
                  kreatif untuk mengekspresikan ide, emosi, atau pesan tertentu. Mereka berkontribusi 
                  di berbagai bidang, mulai dari seni visual hingga konten.
              </p>
              <button class="playbutton" id="playbutton">&#9658;</button>
          </div>
      </article>
  </div>
</section>
