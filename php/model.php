
<?php

function getBases($pdo): array {

  $statement = $pdo->getInstance()->prepare("SELECT * FROM bases");
  $statement->execute();

  $data = $statement->fetchAll();

  // echo '<pre>';
  // var_dump($data);
  // echo '</pre>';

  return $data;

}

?>