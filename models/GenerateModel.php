
<?php

function saveMeme($pdo, $image, $uniqueId) {

    $prepare = $pdo->getInstance()->prepare('SELECT id FROM bases WHERE path = ?');
    $prepare->execute([$image]);
    $image_id = $prepare->fetch();

    $save = $pdo->getInstance()->prepare("INSERT INTO memes(path, base_id) VALUES(?, ? )");
    $save->execute([$uniqueId, intval($image_id['id'])]);

    return $uniqueId;
}

?>
