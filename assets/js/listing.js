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