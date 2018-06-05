
<?php

require './models/model.php';

function ctrlCreate($twig, $pdo) {
  $pictures = getBases($pdo);

  echo $twig->render('create.html', array(
    'data' => $pictures
  ));

}

function ctrlListing($twig, $pdo) {

  echo $twig->render('listing.html');


}

?>
