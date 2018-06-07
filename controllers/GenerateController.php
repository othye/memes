
<?php

use Intervention\Image\ImageManagerStatic as Image;

require 'models/GenerateModel.php';

function ctrlGenerate($twig, $pdo, $posted) {

  // var_dump($posted);

  $data      = json_decode($posted['data']);
  $image     = getImageName($data->image);
  $upText    = $data->upText;
  $upColor   = $data->upColor;
  $upSize    = $data->upSize;
  $downText  = $data->downText;
  $downColor = $data->downColor;
  $downSize  = $data->downSize;

  $memememe = Image::make('assets/images/'.$image.'.jpg');

  // var_dump($memememe);

  $memememe->text($upText, 512, 60, function($details) use($upColor, $upSize) {

    $details->file('assets/fonts/impact.ttf');
    $details->size($upSize * 2);
    $details->color($upColor);
    $details->align('center');
    $details->valign('top');

  });

  $memememe->text($downText, 512, 650, function($details) use($downColor, $downSize) {

    $details->file('assets/fonts/impact.ttf');
    $details->size($downSize * 2);
    $details->color($downColor);
    $details->align('center');
    $details->valign('top');

  });

  $step = $image.'_';
  $uniqueId = uniqid($step);

  $memememe->save('uploads/'.$uniqueId.'.jpg');

  echo $twig->render('modal.html', ['memememe' => saveMeme($pdo, $image, $uniqueId)]);


}

function getImageName($image): string {

  $slashExplode     = explode('/', $image);
  $end              = end($slashExplode);
  $extensionExplode = explode('.', $end);

  return $extensionExplode[0];

}

?>
