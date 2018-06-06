
<?php

require 'models/GenerateModel.php';

function ctrlGenerate($twig, $pdo, $posted) {

  var_dump($posted);

  echo $twig->render('modal.html', []);

}

?>
