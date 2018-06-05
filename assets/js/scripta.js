document.addEventListener('DOMContentLoaded', function() {
    var options = {
        dist:0,
        numVisible:8,

    }
    
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems, options);
  });
  

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






(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));