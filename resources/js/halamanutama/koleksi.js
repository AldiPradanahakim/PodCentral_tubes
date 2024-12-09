document.addEventListener('DOMContentLoaded', () => {
    const koleksiSection = document.getElementById('koleksi-section');
    const episodeSection = document.getElementById('episode-section');
    const cards = document.querySelectorAll('#koleksi-section .card');
    const episodeToggleButton = document.getElementById('episode-toggle');
    const episodeList = document.getElementById('episode-list');

    cards.forEach(card => {
        card.addEventListener('click', () => {
            koleksiSection.style.display = 'none';
            episodeSection.style.display = 'block';
        });
    });

    episodeToggleButton.addEventListener('click', () => {
        if (episodeList.style.display === 'none') {
            episodeList.style.display = 'block';
        } else {
            episodeList.style.display = 'none';
        }
    });
});
