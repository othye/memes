
<?php

    function getBases($pdo) {

        $list = $pdo->getInstance()->prepare('SELECT * FROM bases');

        $list->execute();

        $datas =$list->fetchAll();
        
        return $datas;
    }

    function saveMeme($pdo, $image) {
     
            
    }

    function listingMeme($pdo) {

        $list = $pdo->getInstance()->prepare('SELECT * FROM memes ');

        $list->execute();

        $datas =$list->fetchAll();
        
        return $datas;
    }
    
?>
