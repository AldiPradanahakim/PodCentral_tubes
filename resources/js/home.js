
import { initializeNavigation } from './landingpage/section.js';
import { setupSlider } from './landingpage/slide.js';
import { fetchDataFromAPI } from './landingpage/api.js';

initializeNavigation();

setupSlider("slider-wrapper", "slide", "scroll-left-3", "scroll-right-3");
setupSlider("podcast-slider-wrapper", "podcast-slide", "scroll-left-4", "scroll-right-4");
setupSlider("podcast-slider-wrapper2", "podcast-slide2", "scroll-left-5", "scroll-right-5");
setupSlider("podcast-slider-wrapper3", "podcast-slide3", "scroll-left-6", "scroll-right-6");

fetchDataFromAPI('/api/podcasts').then(data => {
  console.log('Data podcast:', data);
});
