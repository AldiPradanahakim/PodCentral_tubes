document.addEventListener('DOMContentLoaded', () => {
    const historyButton = document.getElementById('history-btn');
    const koleksiButton = document.getElementById('koleksi-btn');
    const berandaButton = document.getElementById('beranda-btn');
    const backButton = document.getElementById('backbutton'); 
    const podcontainer = document.getElementById('podcontainer'); 
    const allSections = document.querySelectorAll('.podcast-section, .podcast-section2');
    const detailSection = document.getElementById('podcontainer');
    const historySection = document.getElementById('history-section');
    const koleksiSection = document.getElementById('koleksi-section');
    const berandaSection = document.getElementById('beranda-section');
    const toggleDescriptionButton = document.querySelector('.scrolbutton');

    const showSection = (sectionToShow) => {
        allSections.forEach(section => section.style.display = 'none');
        if (detailSection) {
            detailSection.style.display = 'none';
        }
        if (sectionToShow) {
            sectionToShow.style.display = 'block';
        }
    };

    if (historyButton) {
        historyButton.addEventListener('click', () => {
            showSection(historySection);
        });
    }
    if (koleksiButton) {
        koleksiButton.addEventListener('click', () => {
            showSection(koleksiSection);
        });
    }
    if (berandaButton) {
        berandaButton.addEventListener('click', () => {
            showSection(berandaSection);
        });
    }

    if (backButton) {
        backButton.addEventListener('click', () => {
            podcontainer.style.display = 'none';
            berandaSection.style.display = 'block';
        });
    }

        // Fungsi untuk toggle deskripsi
        const toggleDescription = () => {
            const description = document.getElementById('description');
            const isActive = description.classList.toggle('active');
            if (isActive) {
                description.scrollIntoView({ behavior: 'smooth' });
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        };
    
        if (toggleDescriptionButton) {
            toggleDescriptionButton.addEventListener('click', toggleDescription);
        }
});
