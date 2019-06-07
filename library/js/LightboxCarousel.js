import Flickity from 'Flickity';
// import imagesLoaded from 'imagesloaded';

export const lightboxCarousel = ((carouselSelector, flickityOptions) => {
  let flickity = null;

  const buildCarousel = () => {
    try {
      flickity = new Flickity(carouselSelector, flickityOptions);
      console.log("It happened: " + flickity.cells.length);
    } catch (e) {
      console.log(e);
      return null;
    }
  };
  return { buildCarousel };
});
