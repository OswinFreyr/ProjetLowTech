<?php

class Comment {
    private $id;
    private $comment;
    private $date;
    private $likes;
    private $users_id;
    private $posts_id;

    public function __construct($comment,$date,$likes,$users_id,$posts_id) {
        $this->comment = $comment;
        $this->date = $date;
        $this->likes = $likes;
        $this->users_id = $users_id;
        $this->posts_id = $posts_id;
    }

    public function saveComment(PDO $pdo) {
        $statement = $pdo->prepare("INSERT INTO comments (comment,date,likes,users_id,posts_id) VALUES (?,?,?,?,?)");
        $statement->execute([$this->comment,$this->date,$this->likes,$this->users_id,$this->posts_id]);
    }
}
