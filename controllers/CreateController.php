
<?php

require 'models/CreateModel.php';

function ctrlCreate($twig, $pdo) {

  echo $twig->render('create.html', ['data' => getBases($pdo)]);

}

function ctrlListing($twig, $pdo) {

  echo $twig->render('listing.html');

}

?>
