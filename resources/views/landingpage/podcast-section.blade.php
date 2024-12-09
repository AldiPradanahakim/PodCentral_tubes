<section class="podcast-section">
    <h2>Trending on PodCentral</h2>
    <div class="scroll-container">
        @foreach(range(1, 24) as $i)
            <div class="card">
                <a href="#" class="card-link" onclick="handleClick('Sleepy Stories')">
                    <img src="{{ asset('img/Screenshot 2024-11-28 at 22.04.25.png') }}" alt="Sleepy Stories">
                </a>
                <h3>Sleepy Stories</h3>
                <p>To help you sleep</p>
            </div>
        @endforeach
    </div>
            <!-- tombol -->
            <div class="navigation">
                <button class="nav-btn" data-index="0"></button>
                <button class="nav-btn" data-index="1"></button>
                <button class="nav-btn" data-index="2"></button>
                <button class="nav-btn" data-index="3"></button>
            </div>
        </section>