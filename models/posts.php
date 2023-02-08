<?php 

class Posts {
    private $conn;
    private $table = 'posts';

    public $id;
    public $title;
    public $body;
    public $thumbnail;
    public $dateTime;

    public $categoryId;
    public $userId;

    public function __construct($db){
        $this->conn = $db;
    }

    public function createPost(){

        try{

            $query = "INSERT INTO " . $this->table . '(title, body, thumbnail, categoryId, userId)';
            $query .= "VALUES(:tl,:bd,:th, :cid ,:uid)"; 

            //Statement
            $stmt = $this->conn->prepare($query);

            //Sanitize Data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->thumbnail = htmlspecialchars(strip_tags($this->thumbnail));
            $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
            $this->userId = htmlspecialchars(strip_tags($this->userId));

            //Bind Data
            $stmt->bindParam(':tl', $this->title);
            $stmt->bindParam(':bd', $this->body);
            $stmt->bindParam(':th', $this->thumbnail);
            $stmt->bindParam(':cid', $this->categoryId);
            $stmt->bindParam(':uid', $this->userId);


            //Execute Query
            $Execute = $stmt->execute();
            return ($Execute ? true : false);

        }catch(Exception $error){
            echo $error;
        }
    }

    public function getPosts(){
        $query = "SELECT * FROM " . $this->table. ' ORDER BY id DESC';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getPostById(){
        $query = "SELECT * FROM " . $this->table;
        $query .= " WHERE id = ? ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->body = $data["body"];
        $this->thumbnail = $data["thumbnail"];
        $this->dateTime = $data["dateTime"];
        $this->categoryId = $data["categoryId"];
        $this->userId = $data["userId"];
    }

    public function updatePost(){
        try {
            $query = "UPDATE " . $this->table . ' SET 
            title = :tt,
            body = :bo,
            thumbnail = :thn
            WHERE 
            id = :i';

            // dateTime= :dt,
            // categoryId = :cid,
            // userId = :uid,

            $stmt = $this->conn->prepare($query);

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->body));
            $this->thumbnail = htmlspecialchars(strip_tags($this->thumbnail));
            // $this->dateTime = htmlspecialchars(strip_tags($this->dateTime));
            // $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));
            // $this->userId = htmlspecialchars(strip_tags($this->userId));
            
            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':tt', $this->title);
            $stmt->bindParam(':bo', $this->body);
            $stmt->bindParam(':thn', $this->thumbnail);
            // $stmt->bindParam(':dt', $this->dateTime);
            // $stmt->bindParam(':cid', $this->categoryId);
            // $stmt->bindParam(':uid', $this->userId);
            $stmt->bindParam(':i', $this->id);

            $Execute = $stmt->execute();
            return ($Execute ? true : false);

        } catch (Exception $e) {
            echo $e;
        }
    }

    public function deletePost(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :i';
        
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':i', $this->id);

        $Execute = $stmt->execute();
        return ($Execute ? true : false);
    }

    public function getAllPostsById() {    //TODO getAllPostsById

        $query = "SELECT * FROM " . $this->table;
        $query .= " WHERE userId = ? ";

        $stmt = $this->conn->prepare($query);

        //$idUser = $this->userId = $userIdT; 

        $stmt->bindParam(1, $this->userId);

        $stmt->execute();

        // $data = $stmt->fetch(PDO::FETCH_ASSOC);

        // $this->id = $data["id"];
        // $this->title = $data["title"];
        // $this->body = $data["body"];
        // $this->thumbnail = $data["thumbnail"];
        // $this->dateTime = $data["dateTime"];
        // $this->categoryId = $data["categoryId"];
        // $this->userId = $data["userId"];

        //todo check
        return $stmt;

    }

    public function getPostsBySearch($Search){
        $query = "SELECT * FROM posts WHERE
        title LIKE :search";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':search', '%' . $Search . '%');

        $stmt->execute();

        return $stmt;
    }

}

?>