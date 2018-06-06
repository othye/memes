
<?php

require 'models/CreateModel.php';

function ctrlCreate($twig, $pdo) {

  echo $twig->render('create.html', ['data' => getBases($pdo)]);

}

?>
