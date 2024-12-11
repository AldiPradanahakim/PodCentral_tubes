document.addEventListener('DOMContentLoaded', function () {
    const profileContainer = document.querySelector('.profile-container');
    const profileIcon = document.querySelector('.profile-icon');

    if (profileContainer && profileIcon) {
        profileIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            profileContainer.classList.toggle('active');
        });

        document.addEventListener('click', (e) => {
            if (!profileContainer.contains(e.target) && !profileIcon.contains(e.target)) {
                profileContainer.classList.remove('active');
            }
        });
    }

    document.querySelector('.profile-dropdown').addEventListener('click', (e) => {
        if (e.target.tagName === 'LI') {
            const item = e.target;
            console.log(`${item.textContent.trim()} clicked!`);

            if (item.textContent.trim() === 'Setting') {
                window.location.href = '/settings';
            }
            if (item.textContent.trim() === 'Logout') {
                alert('Logging out...');
                window.location.href = 'home';
            }
        }
    });
});