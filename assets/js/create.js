
document.addEventListener('DOMContentLoaded', () => {

  const   elems     = document.querySelectorAll('.carousel')
        , options   = {

             dist: 0
           , numVisible: 8

         }
       , instances = M.Carousel.init(elems, options)

})

const canvas = document.getElementById('canvas')

if (canvas.getContext) {

  const items = document.querySelectorAll('.carousel-item')

  items.forEach(function(item) {

    item.addEventListener('click', () => {

      let src = item.childNodes[0].getAttribute('src')

      var context = canvas.getContext('2d');
      var imageObj = new Image();

      imageObj.onload = function() {
        context.drawImage(imageObj, 0, 0);
      };
      imageObj.src = src;

    })

  });

  var context = canvas.getContext('2d');
  var imageObj = new Image();

  imageObj.onload = function() {
    context.drawImage(imageObj, 0, 0);
  };
  imageObj.src = 'assets/bases/grumpy.jpg';

} else {

 console.log(`No Canvas Context`)

}
