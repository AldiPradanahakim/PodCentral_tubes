<section class="podcast-slider-container3">
    <h2>Our Best Podcasts</h2>
    <button class="slider-btn left" id="scroll-left-6">&#8249;</button>
    <div class="podcast-slider-wrapper3" id="podcast-slider-wrapper3">
        @foreach(range(1, 24) as $i)
            <div class="podcast-slide3">
                <a href="#" onclick="handleClick('Podcast {{ $i }}')">
                    <img src="{{ asset('img/Screenshot 2024-11-28 at 22.04.25.png') }}" alt="Sleepy Stories">
                </a>
            </div>
        @endforeach
    </div>
    <button class="slider-btn right" id="scroll-right-6">&#8250;</button>
</section>