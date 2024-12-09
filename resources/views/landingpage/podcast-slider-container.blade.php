<section class="podcast-slider-container">
    <h2>Our Best Podcasts</h2>
    <button class="slider-btn left" id="scroll-left-4">&#8249;</button>
    <div class="podcast-slider-wrapper" id="podcast-slider-wrapper">
        @foreach(range(1, 24) as $i)
            <div class="podcast-slide">
                <a href="#" onclick="handleClick('Podcast {{ $i }}')">
                    <img src="{{ asset('img/Screenshot 2024-11-28 at 22.04.25.png') }}" alt="Sleepy Stories">
                </a>
            </div>
        @endforeach
    </div>
    <button class="slider-btn right" id="scroll-right-4">&#8250;</button>
</section>