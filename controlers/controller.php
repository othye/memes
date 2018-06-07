
<?php

  require './models/model.php';
  use Intervention\Image\ImageManagerStatic as Image;


  function ctrlCreate($twig, $pdo) {
    $pictures = getBases($pdo);

  echo $twig->render('create.html', array(
    'data' => $pictures
  ));

  }

  function ctrlGenerate($twig, $pdo, $posted) {

    $data      = json_decode($posted['data']);
    $image     = getImageName($data->image);
    $upText    = $data->upText;
    $upColor   = $data->upColor;
    $upSize    = $data->upSize;
    $downText  = $data->downText;
    $downColor = $data->downColor;
    $downSize  = $data->downSize;



    $memeGenerator = Image::make('assets/images/'.$image.'.jpg');

    // var_dump($memememe);
    $memeGenerator->text($upText, 512, 60, function($details) use($upColor, $upSize) {

      $details->file('assets/fonts/Anton-Regular.ttf');
      $details->size($upSize * 2);
      $details->color($upColor);
      $details->align('center');
      $details->valign('top');

    });


    $memeGenerator->text($downText, 512, 650, function($details) use($downColor, $downSize) {

      $details->file('assets/fonts/Anton-Regular.ttf');
      $details->size($downSize * 2);
      $details->color($downColor);
      $details->align('center');
      $details->valign('top');

    });

    $path = uniqid();
    $date = date("d-m-Y H:i");   
    var_dump($date);

    $memepath = $image.'_'.$path;

    $memeGenerator->save('uploads/'.$memepath.'.jpg');

    echo $twig->render('modal.html', [

      'memeGenerator' => $memepath,

    ]);

  }

  function getImageName($image): string {

    $slashExplode     = explode('/', $image);
    $end              = end($slashExplode);
    $extensionExplode = explode('.', $end);
    return $extensionExplode[0];
  
  }


  function ctrlListing($twig, $pdo) {

    $listMemes = listingMeme($pdo);

    echo $twig->render('listing.html', array(
      'listing' => $listMemes
    
    ));


  }

?>
