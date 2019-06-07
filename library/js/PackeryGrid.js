import imagesLoaded from 'imagesloaded';
import Isotope from 'isotope-layout';
import Packery from 'Packery';
import Draggabilly from 'Draggabilly';

// function PackeryGrid( gridSelector, gridItemSelector, isDraggable, packeryOptions) {
export const packeryGrid = (( draggable, gridClasses, packeryOptions ) => {
  let packery = null;
  let grid = null;
  const getPackery = () => packery;
  const getItems = () =>  packery.getItemElements();

  const updateOptions = (newOptionsObject) => {
    packeryOptions = newOptionsObject;
  };

  /* Creates an empty div for packery to use to size the gutter between grid items
  and attaches  */
  const buildGutter = ( gutterClass ) => {
    console.log( 'Building Gutter...' );
    let spacingElement = document.createElement( 'div' );
    spacingElement.classList.add( gutterClass.replace( /[.#]/g, '' ) );
    grid.appendChild( spacingElement );
  };

  const orderItems = () => {
    // console.log( 'Ordering Items Needs to be Fixed.' );
    packery.getItemElements().forEach( ( el, i ) => {
      // el.textContent = i + 1;
      el.querySelector('.order-label').textContent = i + 1;
    });
  };

  const makeDraggable = (drag) => {
    console.log( 'Making Draggable...' );
    if(drag) {

    }
    packery.getItemElements().forEach( ( el ) => {
      let draggie = new Draggabilly( el );
      packery.bindDraggabillyEvents( draggie );
    });
  };

  const updateItemClasses = () => {
    console.log( 'Updating Grid Item Classes...' );
    packery.getItemElements().forEach( ( el ) => {
      el.classList.add( 'grid-item-' + el.getAttribute( 'data-gridsize' ) );
    });
  };

  const buildGrid = () => {
    if ( document.body.contains( document.querySelector( gridClasses.gridSelector ) ) ) {
      console.log( 'Building Grid...' );

      grid = document.querySelector( gridClasses.gridSelector );

      if( 'gutter' in packeryOptions && typeof packeryOptions.gutter != 'number') {
        buildGutter( packeryOptions.gutter );
      }

      packery = new Packery( grid, packeryOptions );
      // console.log('grid-item-' + packery.getItemElements()[0].getAttribute( 'data-gridsize' ));
      // updateItemClasses( 'grid-item-' + packery.getItemElements()[0].getAttribute( 'data-gridsize' ) );
      updateItemClasses();

      if( draggable ) {
        makeDraggable();
      }

      console.log( 'Building Layout...' );
      imagesLoaded( grid ).on( 'progress', () => {
        packery.layout();
      });
      // packery.layout();
      packery.on( 'layoutComplete', orderItems );
      packery.on( 'dragItemPositioned', orderItems );
    } else {
      console.log('Grid is not present on this page.');
    }
  };

  return { getPackery, getItems, orderItems, makeDraggable, buildGrid };
});
