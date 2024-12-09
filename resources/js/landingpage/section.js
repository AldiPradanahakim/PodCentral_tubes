
const scrollContainer = document.querySelector('.scroll-container');
const navButtons = document.querySelectorAll('.nav-btn');

export function initializeNavigation() {
  navButtons.forEach((button, index) => {
    button.addEventListener('click', () => {

      const scrollPosition = index * scrollContainer.clientWidth;

      scrollContainer.scrollTo({
        left: scrollPosition,
        behavior: 'smooth',
      });

      navButtons.forEach((btn) => btn.classList.remove('active'));
      button.classList.add('active');
    });
  });

  navButtons[0].classList.add('active');
}
