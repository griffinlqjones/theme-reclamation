console.log('THE THING WORKS!');
//
import {packeryGrid} from './library/js/PackeryGrid';
import {lightboxCarousel} from './library/js/LightboxCarousel';



// let carousel = null;
// if (document.querySelector('#modal-carousel')) {
  // 
  // let lightboxButton = document.querySelector('.light-box-button');
  // lightboxButton.addEventListener('click', () => {
  //   lightbox.classList.toggle('active');
  //   event.stopPropagation();
  //   event.preventDefault();
  // });
  //
  // let lightbox = document.querySelector('#profile-modal-container');
  // lightbox.addEventListener('click', (event) => {
  //   if (event.target == event.currentTarget) {
  //     lightbox.classList.toggle('active');
  //     event.stopPropagation();
  //     event.preventDefault();
  //   }
  // }, true);
//
//   carousel = lightboxCarousel(
//     '#modal-carousel',
//     {
//       cellSelector: '.carousel-cell',
//       cellAling: 'center',
//       setGallerySize: false,
//       percentPosition: true,
//       // draggable: true,
//       // freeScroll: false,
//       // pageDots: true,
//       // prevNextButtons: true,
//       // arrowShape: {
//       //   x0: 10,
//       //   x1: 60, y1: 50,
//       //   x2: 70, y2: 40,
//       //   x3: 30
//       // }
//     }
//   );
//   carousel.buildCarousel();
// }


/* Homepage image Grid */
let staticGrid = null;
if (document.querySelector('.post-grid') && !document.querySelector('.admin-post-grid-editor')) {

  // if(!document.querySelector('.admin-post-grid-editor')) {
    staticGrid = packeryGrid(
      false,
      {
        gridSelector: '.post-grid',
      },
      {
        itemSelector: '.post-grid-item',
        columnWidth: '.grid-item-normal',
        gutter: '.gutter-sizer',
        containerStyle: {
          transitionDuration: '0.2s',
          stagger: 30
        }
      }
    ).buildGrid();
    // staticGrid.getPackery().on( 'layoutComplete', staticGrid.orderItems );
    // staticGrid.getPackery().on( 'dragItemPositioned', staticGrid.orderItems );
  // }
}
