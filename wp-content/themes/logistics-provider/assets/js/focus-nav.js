( function( window, document ) {
  function logistics_provider_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const logistics_provider_nav = document.querySelector( '.sidenav' );
      if ( ! logistics_provider_nav || ! logistics_provider_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...logistics_provider_nav.querySelectorAll( 'input, a, button' )],
        logistics_provider_lastEl = elements[ elements.length - 1 ],
        logistics_provider_firstEl = elements[0],
        logistics_provider_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && logistics_provider_lastEl === logistics_provider_activeEl ) {
        e.preventDefault();
        logistics_provider_firstEl.focus();
      }
      if ( shiftKey && tabKey && logistics_provider_firstEl === logistics_provider_activeEl ) {
        e.preventDefault();
        logistics_provider_lastEl.focus();
      }
    } );
  }
  logistics_provider_keepFocusInMenu();
} )( window, document );