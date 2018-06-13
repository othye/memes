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

const   inputUpText   = document.querySelector('#input-up-text')
      , inputDownText = document.querySelector('#input-down-text')
      , pUpText       = document.querySelector('#p-up-text')
      , pDownText     = document.querySelector('#p-down-text')
      , upTextColor   = document.querySelector('#up-text-color')
      , downTextColor = document.querySelector('#down-text-color')
      , upSizeText    = document.querySelector('#up-size-text')
      , downSizeText  = document.querySelector('#down-size-text')

/**** **** **** **** **** **** **** ****
  > EVENTS
**** **** **** **** **** **** **** ****/

const eventCarousel = () => {

  const items = document.querySelectorAll('.carousel-item')

  items.forEach(item => {

    item.addEventListener('click', () => {

      document.querySelector('#user-choice').setAttribute('src', item.childNodes[0].getAttribute('src'))

    })

  })

}

const eventForm = () => {

  inputUpText.addEventListener('keyup', eventUpText, false)
  inputDownText.addEventListener('keyup', eventDownText, false)
  upTextColor.addEventListener('change', eventUpColor, false)
  downTextColor.addEventListener('change', eventDownColor, false)
  upSizeText.addEventListener('change', eventUpSize, false)
  downSizeText.addEventListener('change', eventDownSize, false)

  eventSubmit()

}

const eventUpText = e => {

  const keyCode = e.keyCode

  if (keyCode !== 8) {

    pUpText.innerHTML = inputUpText.value
  } else {

    setTimeout(() => pUpText.innerHTML = inputUpText.value, 25)

  }

  pUpText.style.color    = upTextColor.value
  pUpText.style.fontSize = `${upSizeText.value}px`

}

const eventDownText = e => {

  const keyCode = e.keyCode

  if (keyCode !== 8) {

    pDownText.innerHTML = inputDownText.value
  } else {

    setTimeout(() => pDownText.innerHTML = inputDownText.value, 25)

  }

  pDownText.style.color    = downTextColor.value
  pDownText.style.fontSize = `${downSizeText.value}px`

}

const eventUpColor = () => {

  pUpText.style.color = upTextColor.value

}

const eventDownColor = () => {

  pDownText.style.color = downTextColor.value

}

const eventUpSize = () => {

  pUpText.style.fontSize = `${upSizeText.value}px`

}

const eventDownSize = () => {

  pDownText.style.fontSize = `${downSizeText.value}px`

}

const eventSubmit = () => {

  document.querySelector('.modal-trigger').addEventListener('click', e => {

    e.preventDefault()

    const data = {

        image:      document.querySelector('#user-choice').getAttribute('src')
      , upText:     inputUpText.value
      , upColor:    upTextColor.value
      , upSize:     upSizeText.value
      , downText:   inputDownText.value
      , downColor:  downTextColor.value
      , downSize:   downSizeText.value

    }

    post(data, done)

  })

}

/**** **** **** **** **** **** **** ****
  > FUNCTIONS
**** **** **** **** **** **** **** ****/

const getCarousel = () => {

  const   elems     = document.querySelectorAll('.carousel')
        , options   = {

            dist: 0
          , numVisible: 8

        }
      , instances = M.Carousel.init(elems, options)

}

const getSidenav = () => {

  const elems = document.querySelectorAll('.sidenav')
  , instances = M.Sidenav.init(elems);

}

const getSelects = () => {

  const   elems     = document.querySelectorAll('select')
        , instances = M.FormSelect.init(elems)

}

const post = (data, cb) => {

  const XHR = new XMLHttpRequest()

  XHR.open('POST', '../index.php')

  XHR.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

  XHR.send(`data=${JSON.stringify(data)}`)

  showLoading()

  XHR.onreadystatechange = () => {

    if(XHR.readyState === 4 && XHR.status === 200) {

      const loading = document.querySelector('.meme-loading')

      loading.parentNode.removeChild(loading)

      //cb(JSON.parse(XHR.responseText))
      cb(XHR.responseText)

    }

  }

}


const showLoading = () => {

  const html = `
    <div class="meme-loading">
      <p>MeMeMeMe en préparation</p>
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div><div class="gap-patch">
            <div class="circle"></div>
          </div><div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  `

  document.querySelector('.modal').insertAdjacentHTML('afterbegin', html)

}

const done = back => { //console.log(back)

  const modal = document.querySelector('#modal')

  modal.innerHTML = ''
  modal.insertAdjacentHTML('afterbegin', back)

}


/**** **** **** **** **** **** **** ****
 > INIT
**** **** **** **** **** **** **** ****/

const init = function() {

  getCarousel()
  getSidenav()
  getSelects()
  eventCarousel()
  eventForm()
}()