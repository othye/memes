document.addEventListener('DOMContentLoaded', () => {
  
    const   modal        = document.querySelectorAll('.modal')
          , initModal    = M.Modal.init(modal)
          , dropdown     = document.querySelectorAll('.dropdown-trigger')
          , initDropdown = M.Dropdown.init(dropdown)
          , sidenav      = document.querySelectorAll('.sidenav')
          , initSidenav  = M.Sidenav.init(sidenav)
          , select       = document.querySelectorAll('select')
          , instances    = M.FormSelect.init(select)
  })


var toCopy  = document.getElementById( 'to-copy' ),
btnCopy = document.getElementById( 'copy' ),
paste   = document.getElementById( 'cleared' );

btnCopy.addEventListener( 'click', function(){
toCopy.select();
paste.value = '';
    
    if ( document.execCommand( 'copy' ) ) {
        btnCopy.classList.add( 'copied' );
    paste.focus();

        var temp = setInterval( function(){
        btnCopy.classList.remove( 'copied' );
        clearInterval(temp);
        }, 600 );

    } else {
    console.info( 'document.execCommand went wrong…' )
    }

    return false;
    } );