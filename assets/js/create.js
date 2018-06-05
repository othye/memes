
/**** **** **** **** **** **** **** ****
 > EVENTS
**** **** **** **** **** **** **** ****/

const getCarousel = () => {

  const   elems     = document.querySelectorAll('.carousel')
        , options   = {

             dist: 0
           , numVisible: 8

         }
       , instances = M.Carousel.init(elems, options)

}

const checkClickCarousel = () => {

  const items = document.querySelectorAll('.carousel-item')

  items.forEach(item => {

    item.addEventListener('click', () => {

      document.querySelector('#user-choice').setAttribute('src', item.childNodes[0].getAttribute('src'))

    })
    
  });

}

const checkForm = () => {

  const   upText   = document.querySelector('#up-text')
        , downText = document.querySelector('#down-text')

  upText.addEventListener('keypress', e => {

    const keyCode = e.keyCode

    let pUpText = document.querySelector('#p-up-text')

    console.log(keyCode);

    if (keyCode !== 8) {

      // let   textColor   = document.querySelector('#up-text-color').value
      //     , borderColor = document.querySelector('#up-border-color').value

      pUpText.innerHTML = upText.value

    } else {

      pUpText.innerHTML = pUpText.innerHTML.slice(0, -1)

    }

  })

  downText.addEventListener('keypress', e => {

    const keyCode = e.keyCode

    let pDownText = document.querySelector('#p-down-text')

    console.log(keyCode);

    if (keyCode !== 8) {

      // let   textColor   = document.querySelector('#up-text-color').value
      //     , borderColor = document.querySelector('#up-border-color').value

      pDownText.innerHTML = downText.value

    } else {

      pDownText.innerHTML = pDownText.innerHTML.slice(0, -1)

    }

  })

}

/**** **** **** **** **** **** **** ****
 > FUNCTIONS
**** **** **** **** **** **** **** ****/

const loadCanvas = path => {

  const img = new Image()

  img.onload = () => context.drawImage(img, 0, 0)

  img.src = path

}

/**** **** **** **** **** **** **** ****
 > INIT
**** **** **** **** **** **** **** ****/

const init = function() {

  getCarousel()
  checkClickCarousel()
  checkForm()

}()

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('select');
  var instances = M.FormSelect.init(elems);
});
