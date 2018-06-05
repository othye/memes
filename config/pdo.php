
<?php

class Database {

  private $pdo;

  function __construct() {

    $this->connect();

  }

  public function getInstance() {

    return $this->pdo;

  }

  private function connect() {

    require 'config.php';

    $host       = $config['host'];
    $db         = $config['database'];
    $user       = $config['user'];
    $password   = $config['password'];

    try {

      // data source name
      $dsn     = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';
      $options = [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

      ];

      $this->pdo = new PDO($dsn, $user, $password, $options);

    } catch(PDOException $e) {

      $this->pdo = null;

    }

  }

}

?>
