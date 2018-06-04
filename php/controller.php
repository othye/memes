
<?php

require 'model.php';

function ctrlCreate($twig, $pdo) {

  echo $twig->render('create.html');

}

function ctrlListing($twig, $pdo) {

  echo $twig->render('listing.html');

}

?>
