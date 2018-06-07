
<?php

function saveMeme($pdo, $image, $uniqueId) {

  $statement = $pdo->getInstance()->prepare('SELECT id FROM bases WHERE path = ?');
  $statement->execute([$image]);
  $image_id = $statement->fetch();

  $save = $pdo->getInstance()->prepare("INSERT INTO memes(path, base_id) VALUES(?, ?)");
  $save->execute([$uniqueId, intval($image_id['id'])]);

  return $uniqueId;

}

?>
