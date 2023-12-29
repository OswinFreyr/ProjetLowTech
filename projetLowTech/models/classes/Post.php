<?php
class Post {
    private $id;
    private $title;
    private $description;
    private $date;
    private $place;
    private $user_id;
    private $status;
    private $createdAt;

    public function __construct($title,$description,$date,$place,$user_id,$status,$createdAt) {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->place = $place;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    public function savePost(PDO $pdo) {
        $statement = $pdo->prepare("INSERT INTO posts (title, description, date, place, user_id, status, created_at) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute([$this->title, $this->description, $this->date, $this->place, $this->user_id, $this->status, $this->createdAt]);
    }

    public function setDetail($detail,$value,$pdo,$postId){
        $statement = $pdo->prepare("UPDATE posts SET $detail = ? WHERE id = ?");
        $statement->execute([$value,$postId]);
    }
    public static function deletePost($postId, $pdo) {
        $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
        $statement->execute([$postId]);
    }

    public static function getPostById($postId, PDO $pdo) {
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$postId]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($post) {
            return new self(
                $post['title'],
                $post['description'],
                $post['date'],
                $post['place'],
                $post['user_id'],
                $post['status'],
                $post['createdAt']
            );
        }
        return null; 
    }
}
