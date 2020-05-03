<?php
  class Conexion
  {
    private $host = "localhost";
    private $db = "sao";
    private $user = "root";
    private $password = "";
    private $conect;

    function __construct()
    {
      $this->conect = new mysqli($this->host, $this->user, $this->password, $this->db);

      if ($this->conect->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $this->conect->connect_errno . ") " . $this->conect->connect_error;
      }
      //$conecctionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";
      //try {
      //    $this->conect = new PDO($conecctionString, $this->user, $this->password);
      //    $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //} catch (Exception $e) {
      //  $this->conect = 'error de conexion';
      //  echo "Error: ". $e->getMessage();
      //}
    }//end function construct

    public function connect()
    {
      $this->conect->set_charset('utf8');
      return $this->conect;
    }
  }
 ?>
