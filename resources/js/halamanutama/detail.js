document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const podcontainer = document.getElementById('podcontainer');
    const allSections = document.querySelectorAll('.podcast-section, .podcast-section2');
    const berandaSection = document.getElementById('beranda-section');


    const resetView = () => {
        allSections.forEach(section => {
            section.style.display = 'none';
        });
        if (podcontainer) podcontainer.style.display = 'none';
        if (berandaSection) berandaSection.style.display = 'block';
    };

    resetView(); 

    const showDetail = (card) => {
        const title = card.getAttribute('data-title');
        const description = card.getAttribute('data-description');
        const coverImg = card.querySelector('img').src;

        document.getElementById('podtitle').innerText = title;
        document.getElementById('desctext').innerText = description;
        document.getElementById('podcover').src = coverImg;

        allSections.forEach(section => section.style.display = 'none');
        podcontainer.style.display = 'block';
    };

    if (cards.length > 0) {
        cards.forEach(card => {
            card.addEventListener('click', () => {
                if (berandaSection.style.display === 'block') {
                    showDetail(card);
                }
            });
        });
    }


});
