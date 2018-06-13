
<?php

function getImages($pdo): array {
    $statement = $pdo->getInstance()->prepare("SELECT * FROM images");
    $statement->execute();
    $data = $statement->fetchAll();
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    return $data;
}
function saveMeme($pdo, $image, $uniqueId) {

    $prepare = $pdo->getInstance()->prepare('SELECT id FROM images WHERE path = ?');
    $prepare->execute([$image]);
    $image_id = $prepare->fetch();

    $save = $pdo->getInstance()->prepare("INSERT INTO memes(path, code, base_id) VALUES(?, ?, ?)");
    $save->execute([$uniqueId, 1, intval($image_id['id'])]);

    return $uniqueId;
}

function getAllMemes($pdo) {

    $memes = $pdo->getInstance()->prepare("SELECT * FROM `memes` ORDER BY date DESC");
    $memes->execute();
    $data = $memes->fetchAll();
    return $data;
}
    
function getListMemes($pdo, $code) {
    
    $memes = $pdo->getInstance()->prepare("SELECT * FROM `memes` WHERE code = ? ORDER BY date DESC");
    $memes->execute([$code]);
    $data = $memes->fetchAll();
    return $data;
}
    
?>
