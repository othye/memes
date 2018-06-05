
const   inputUpText   = document.querySelector('#input-up-text')
      , inputDownText = document.querySelector('#input-down-text')
      , pUpText       = document.querySelector('#p-up-text')
      , pDownText     = document.querySelector('#p-down-text')
      , upTextColor   = document.querySelector('#up-text-color')
      , upBgColor     = document.querySelector('#up-bg-color')
      , downTextColor = document.querySelector('#down-text-color')
      , downBgColor   = document.querySelector('#down-bg-color')

/**** **** **** **** **** **** **** ****
 > EVENTS
**** **** **** **** **** **** **** ****/

const eventCarousel = () => {

  const items = document.querySelectorAll('.carousel-item')

  items.forEach(item => {

    item.addEventListener('click', () => {

      const path = item.childNodes[0].getAttribute('src')

      document.querySelector('#user-choice').setAttribute('src', path)

      const step = path.split('/', path)

      console.log(step);

      // document.querySelector('#input-image').setAttribute('value', item.childNodes[0].getAttribute('src'))

    })
    
  });

}

const eventForm = () => {

  inputUpText.addEventListener('keypress', eventUpText, false)
  inputDownText.addEventListener('keypress', eventDownText, false)

}

const eventUpText = e => {

  const keyCode = e.keyCode

  if (keyCode !== 8) {

    pUpText.innerHTML = inputUpText.value


  } else {

    pUpText.innerHTML = pUpText.innerHTML.slice(0, -1)

  }

  pUpText.style.color      = upTextColor.value
  pUpText.style.background = upBgColor.value

}

const eventDownText = e => {

  const keyCode = e.keyCode

  if (keyCode !== 8) {

    pDownText.innerHTML = inputDownText.value

  } else {

    pDownText.innerHTML = pDownText.innerHTML.slice(0, -1)

  }

  pDownText.style.color = downTextColor.value

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

const getBgColor = el => {



}

const getTextColor = el => {



}


/**** **** **** **** **** **** **** ****
 > INIT
**** **** **** **** **** **** **** ****/

const init = function() {

  getCarousel()
  eventCarousel()
  eventForm()

}()

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);
});
