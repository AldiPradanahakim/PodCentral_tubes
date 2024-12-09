<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Selection</title>
    @vite(['resources/css/genre.css', 'resources/js/genre.js'])
</head>
<body>
    <section class="container" id="genre-selection">
        <div class="title">Pilih 3 Genre Favorit Kamu</div>
        <div class="categories">
            <div class="category">
                <img src="{{ asset('img/paint-palette.png') }}" alt="Seni">
                <span>Seni</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/cinema.png') }}" alt="Komedi">
                <span>Komedi</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/jogging.png') }}" alt="Olahraga">
                <span>Olahraga</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/—Pngtree—religion cross christian icon vector_3652516.png') }}" alt="Agama & Spiritualitas">
                <span>Spiritual<br>itas</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/education.png') }}" alt="Sains">
                <span>Sains</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/teamwork.png') }}" alt="Budaya">
                <span>Budaya</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/analytics.png') }}" alt="Pemerintahan">
                <span>Pemerint<br>ahan</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/investment.png') }}" alt="Bisnis">
                <span>Bisnis</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/pendidikan (1).png') }}" alt="Pendidikan">
                <span>Pendidikan</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/criminal-in-jail-silhouette.png') }}" alt="Kejahatan Nyata">
                <span>Kejahatan</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/family.png') }}" alt="Anak & Keluarga">
                <span>Family</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/technology.png') }}" alt="Teknologi">
                <span>Teknologi</span>
            </div>
            <div class="category">
                <img src="{{ asset('img/evolution.png') }}" alt="Sejarah">
                <span>Sejarah</span>
            </div>
        </div>
        
        <button class="next-button">Next</button>
    </section>
</body>
</html>
