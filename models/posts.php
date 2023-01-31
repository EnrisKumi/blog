<?php 

class Posts {
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $body;
    public $thumbnail;
    public $dateTime;


    // public $categoryId;
    // public $userId;

    public function __construct($db){
        $this->conn = $db;
    }

    public function createPost(){

        try{

            $query = "INSERT INTO " . $this->table . '(title, body, thumbnail)';
            $query .= "VALUES(:tl,:bd,:th)"; 

            //Statement
            $stmt = $this->conn->prepare($query);

            //Sanitize Data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->thumbnail = htmlspecialchars(strip_tags($this->thumbnail));

            //Bind Data
            $stmt->bindParam(':tl', $this->title);
            $stmt->bindParam(':bd', $this->body);
            $stmt->bindParam(':th', $this->thumbnail);

            //Execute Query
            $Execute = $stmt->execute();
            return ($Execute ? true : false);

        }catch(Exception $error){
            echo $error;
        }
    }
}

?>