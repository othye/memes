
<?php
function getBases($pdo){
    $statement=$pdo->getInstance()->prepare('SELECT * from bases');
    $statement->execute();

    $data = $statement->fetchAll();

    return $data;
}


?>
