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
}

?>