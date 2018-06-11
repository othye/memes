
<?php

    function getBases($pdo) {

        $list = $pdo->getInstance()->prepare('SELECT * FROM bases');

        $list->execute();

        $datas =$list->fetchAll();
        
        return $datas;
    }

    function saveMeme($pdo, $image, $uniqueId) {
        
        $prepare = $pdo->getInstance()->prepare('SELECT id FROM bases WHERE path = ?');
        $prepare->execute([$image]);
        $image_id = $prepare->fetch();

        $save = $pdo->getInstance()->prepare("INSERT INTO memes(path, base_id) VALUES(?, ? )");
        $save->execute([$uniqueId, intval($image_id['id'])]);
        
        return $uniqueId;
    }

    function listingMeme($pdo) {

        $list = $pdo->getInstance()->prepare('SELECT * FROM memes ');

        $list->execute();

        $datas =$list->fetchAll();
        
        return $datas;
    }
    
?>
