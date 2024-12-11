
export function setupSlider(sliderWrapperId, slideClass, scrollLeftId, scrollRightId) {

    const scrollLeftButton = document.getElementById(scrollLeftId);
    const scrollRightButton = document.getElementById(scrollRightId);
    const sliderWrapper = document.getElementById(sliderWrapperId);
  
    if (!sliderWrapper) {
      console.error(`Elemen dengan ID "${sliderWrapperId}" tidak ditemukan.`);
      return;
    }
  
    if (!scrollLeftButton || !scrollRightButton) {
      console.error(`Tombol dengan ID "${scrollLeftId}" atau "${scrollRightId}" tidak ditemukan.`);
      return;
    }
  
    const firstSlide = document.querySelector(`.${slideClass}`);
  
    if (firstSlide) {

      const slideWidth = firstSlide.offsetWidth;
      const slidesVisible = Math.floor(sliderWrapper.offsetWidth / slideWidth);
  
      scrollLeftButton.addEventListener("click", () => {
        sliderWrapper.scrollBy({
          left: -slidesVisible * slideWidth,
          behavior: "smooth",
        });
      });
  
      scrollRightButton.addEventListener("click", () => {
        sliderWrapper.scrollBy({
          left: slidesVisible * slideWidth,
          behavior: "smooth",
        });
      });
    } else {
      console.error(`Elemen .${slideClass} tidak ditemukan. Pastikan elemen tersebut ada di DOM.`);
    }
  }
  