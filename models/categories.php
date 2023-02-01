<?php 

class Categories {
    private $conn;
    private $table = 'categories';

    public $id;
    public $title;
    public $description;

    public function __construct($db){
        $this->conn = $db;
    }

    //create Categorie
    public function createCategories(){
        try{

            $query = "INSERT INTO " . $this->table . '(title, description)';
            $query .= "VALUES(:tl, :dsc)";


            //Statement
            $stmt = $this->conn->prepare($query);

            //Sanitize Data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));

            //Bind Data
            $stmt->bindParam(':tl', $this->title);
            $stmt->bindParam(':dsc', $this->description);


            //Execute Query
            $Execute = $stmt->execute();
            return ($Execute ? true : false);

        }catch(Exception $error){
            echo $error;
        }
    }

    public function getCategories(){
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getCategoriesById(){
        $query = "SELECT * FROM " . $this->table;
        $query .= " WHERE id = ? ";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->description = $data["description"];
    }

    public function updateCategory(){
        try {
            $query = "UPDATE " . $this->table . ' SET 
            title = :tt,
            description = :desc
            WHERE 
            id = :i';

            $stmt = $this->conn->prepare($query);
            
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));

            $stmt->bindParam(':tt', $this->title);
            $stmt->bindParam(':desc', $this->description);
            $stmt->bindParam(':i', $this->id);

            $Execute = $stmt->execute();
            return ($Execute ? true : false);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function deleteCategory(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :i';

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':i', $this->id);

        $Execute = $stmt->execute();
        return ($Execute ? true : false);

    }
}
