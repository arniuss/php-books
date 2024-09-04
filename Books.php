<?php
class Books
{
    private $dbConn;
    public function __construct($p_dbConn){
        $this->dbConn = $p_dbConn;
    }

    public function getBooks(){
        $query = "SELECT * FROM books";
        $stmt = $this->dbConn->prepare($query);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function filterBooks($p_ISBN, $p_author_name, $p_author_lastname, $p_book_name, $p_description){
        $sql = 'SELECT * FROM books WHERE 1=1';
        $params = [];

        if(!empty($p_ISBN)){
            $sql .= " AND ISBN LIKE :ISBN";
            $params[':ISBN'] = '%' . $p_ISBN . '%';
        }
        if(!empty($p_author_name)){
            $sql .= " AND author_name LIKE :author_name";
            $params[':author_name'] = '%' . $p_author_name . '%';
        }
        if(!empty($p_author_lastname)){
            $sql .= " AND author_lastname LIKE :author_lastname";
            $params[':author_lastname'] = '%' . $p_author_lastname . '%';
        }
        if(!empty($p_book_name)){
            $sql .= " AND author_lastname LIKE :author_lastname";
            $params[':author_lastname'] = '%' . $p_author_lastname . '%';
        }
        if(!empty($p_description)){
            $sql .= " AND description LIKE :description";
            $params[':description'] = '%' . $p_description . '%';
        }

        $stmt = $this->dbConn->prepare($sql);

        foreach($params as $param => $value){
            $stmt->bindValue($param, $value, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBook($p_ISBN, $p_author_name, $p_author_lastname, $p_book_name, $p_description) {
        $sql = 'INSERT INTO books (ISBN, author_name, author_lastname, book_name, description) VALUES (:ISBN, :author_name, :author_lastname, :book_name, :description)';
        $stmt = $this->dbConn->prepare($sql);
        $stmt->bindValue(':ISBN', $p_ISBN, PDO::PARAM_STR);
        $stmt->bindValue(':author_name', $p_author_name, PDO::PARAM_STR);
        $stmt->bindValue(':author_lastname', $p_author_lastname, PDO::PARAM_STR);
        $stmt->bindValue(':book_name', $p_book_name, PDO::PARAM_STR);
        $stmt->bindValue(':description', $p_description, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>