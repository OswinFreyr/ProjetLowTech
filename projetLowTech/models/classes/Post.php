<?php
class Post {
    private $id;
    private $title;
    private $description;
    private $date;
    private $place;
    private $users_id;
    private $status;
    private $createdAt;

    public function __construct($title,$description,$date,$place,$user_id,$status) {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->place = $place;
        $this->users_id = $user_id;
        $this->status = $status;
        $this->createdAt = new DateTime();
    }

    public function savePost() {
        $pdo = dbConnect();
        $statement = $pdo->prepare("INSERT INTO posts (title, description, date, place, users_id, status, created_at) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([$this->title, $this->description, $this->date, $this->place, $this->users_id, $this->status, $this->createdAt]);
    }

    public function setDetail($detail,$value,$postId){
        $pdo = dbConnect();
        $statement = $pdo->prepare("UPDATE posts SET $detail = ? WHERE id = ?");
        $statement->execute([$value,$postId]);
    }

    public function getDetail($detail){
        return $this->$detail;
    }
    public static function deletePost($postId) {
        $pdo = dbConnect();
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$postId]);
    }

    public static function getPostById($postId) {
        $pdo = dbConnect();
        $statement = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $statement->execute([$postId]);
        $post = $statement->fetch(PDO::FETCH_ASSOC);
        if ($post) {
            return new self(
                $post['title'],
                $post['description'],
                $post['date'],
                $post['place'],
                $post['users_id'],
                $post['status']
            );
        }
        return null; 
    }
}
