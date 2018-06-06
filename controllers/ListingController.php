
<?php

require 'models/ListingModel.php';

function ctrlListing($twig, $pdo) {

  echo $twig->render('listing.html');

}

?>
