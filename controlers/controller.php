
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
    $data          = (array) json_decode($posted['data']);
    $data['image'] = getImageName($data['image']);
    $max           = 20;
    if($data['image'] === 'create') {
      echo $twig->render('partials/message.html', ['message' => 'Hep là,<br> il faut choisir une image', 'emoji' => 'tongue']);
    } else if(empty($data['upText']) && empty($data['downText'])) {
      echo $twig->render('partials/message.html', ['message' => 'Il n\'y a pas de texte', 'emoji' => 'sad']);
    } else if(strlen($data['upText']) > $max || strlen($data['downText']) > $max) {
      $side = strlen($data['upText']) > $max ? 'haut' : 'bas';
      echo $twig->render('partials/message.html', ['message' => 'Texte du '.$side.' trop long', 'emoji' => 'confused']);
    } else {

      $memememe = makeMeme(getArgs($data));
     
      if(!$memememe['valid']) {
        echo $twig->render('partials/message.html', ['message' => 'Désolé,<br> une erreur est survenue', 'emoji' => 'thinking']);
      } else {
        $saveMeme = saveMeme($pdo, $data['image'], $memememe['uniqId']);
        if(!$memememe['valid']) {
          echo $twig->render('partials/message.html', ['message' => 'Désolé,<br> une erreur est survenue', 'emoji' => 'thinking']);
        } else {
          // echo $twig->render('partials/message.html', ['message' => 'Done']);
          echo $twig->render('partials/modal.html', ['memememe' => $saveMeme]);
        }
      }
    }
  }
  function getImageName(string $image): string {
    $slashExplode     = explode('/', $image);
    $end              = end($slashExplode);
    $extensionExplode = explode('.', $end);
    return $extensionExplode[0];
  }
  function getArgs(array $data): array {
    $image     = $data['image'];
    $upText    = $data['upText'];
    $upColor   = $data['upColor'];
    $upSize    = $data['upSize'];
    $downText  = $data['downText'];
    $downColor = $data['downColor'];
    $downSize  = $data['downSize'];
    if(empty($upText)) {
      $args = ['image' => $image, 'downText' => $downText, 'downColor' => $downColor, 'downSize' => $downSize];
    } else if(empty($downText)) {
      $args = ['image' => $image, 'upText' => $upText, 'upColor' => $upColor, 'upSize' => $upSize];
    } else {
      $args = [
        'image'     => $image,
        'upText'    => $upText,
        'upColor'   => $upColor,
        'upSize'    =>$upSize,
        'downText'  => $downText,
        'downColor' => $downColor,
        'downSize'  => $downSize
      ];
    }
    return $args;
  }
  function makeMeme(array $args): array {
    $image    = $args['image'];
    $memememe = Image::make('assets/images/'.$image.'.jpg');
    $font     = 'assets/fonts/Anton-Regular.ttf';
    if(isset($args['upText'])) {
      $upColor = $args['upColor'];
      $upSize  = $args['upSize'];
      $memememe->text($args['upText'], 512, 60, function($details) use($font, $upColor, $upSize) {
        $details->file($font);
        $details->size($upSize * 2);
        $details->color($upColor);
        $details->align('center');
        $details->valign('top');
      });
    }
    if(isset($args['downText'])) {
      $downColor = $args['downColor'];
      $downSize  = $args['downSize'];
      $memememe->text($args['downText'], 512, 650, function($details) use($font, $downColor, $downSize) {
        $details->file($font);
        $details->size($downSize * 2);
        $details->color($downColor);
        $details->align('center');
        $details->valign('top');
      });
    }
    $step     = $image.'_';
    $uniqId = uniqid($step);
    try {
      $saved = $memememe->save('uploads/'.$uniqId.'.jpg');
      return ['valid' => true, 'uniqId' => $uniqId];
    } catch (Exception $e) {
      var_dump($e->getMessage());
      return ['valid' => false];
    }
  }  


  function ctrlListing($twig, $pdo) {

    $listMemes = listingMeme($pdo);

    echo $twig->render('listing.html', array(
      'listing' => $listMemes
    
    ));
  }

  function ctrlMemememe($twig, $get_memememe) {

    $splitted = explode('_', $get_memememe)[0];
  
    echo $twig->render('memememe.html', ['splitted' => $splitted, 'memememe' => $get_memememe]);
  
  }
?>
