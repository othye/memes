
<?php

    function getBases($pdo) {

        $list = $pdo->getInstance()->prepare('SELECT * FROM bases');

        $list->execute();

        $datas =$list->fetchAll();
        
        return $datas;
    }

    
?>
