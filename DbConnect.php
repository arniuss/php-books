<?php
class DbConnect 
{ 
    private $server = 'sql8.endora.cz'; 
    private $dbname = 'dominiksdb';
    private $user = 'arnius';
    private $pass = 'Abcd1234.'; 
    private $options = array( 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_EMULATE_PREPARES => false, 
    ); 
    public function connect() 
    { 
        try { 
            $conn = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->dbname . ';charset=utf8',  
            $this->user, $this->pass, $this->options ); 
            return $conn; 
        } catch (PDOException $e) { 
            echo "Database Error: " . $e->getMessage(); 
        } 
    } 
}
?>
