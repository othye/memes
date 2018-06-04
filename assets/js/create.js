
document.addEventListener('DOMContentLoaded', () => {
  
  const   elems     = document.querySelectorAll('.carousel')
  , options   = {
    
    dist: 0
    , numVisible: 8
    
  }
  , instances = M.Carousel.init(elems, options)
  
})


var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
