
<?php

  require 'models/GenerateModel.php';
  // import the Intervention Image Manager Class
  use Intervention\Image\ImageManagerStatic as Image;

function ctrlGenerate($twig, $pdo, $posted) {

  //var_dump($posted);

  $data      = json_decode($posted['data']);
  $image     = $data->image;
  $upText    = $data->upText;
  $upColor   = $data->upColor;
  $upSize    = $data->upSize;
  $downText  = $data->downText;
  $downColor = $data->downColor;
  $downSize  = $data->downSize;
  $path      = 'assets/images/'.explode(".", basename($image))[0].'.jpg';
  
  var_dump($path);
  var_dump($upText);
  var_dump($upColor);
  var_dump($upSize);
  var_dump($downText);
  var_dump($downColor);
  var_dump($downSize);

  
  $img = Image::make($path);

  $img->text($upText, 256, 20, function($details) use($upColor,$upSize) {
    
    $details->size($upSize);
    $details->color($upColor);
});

  $img->save('uploads/tamere.jpg');
  
  
  echo $twig->render('modal.html', []);

}

?>