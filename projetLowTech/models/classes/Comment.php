<?php
// fichier non utilisé mais gardé dans le cas d'une poursuite de projet 
class Comment {
    private $id;
    private $comment;
    private $date;
    private $likes;
    private $users_id;
    private $posts_id;

    public function __construct($comment,$users_id,$posts_id) {
        $this->comment = $comment;
        $this->date = new DateTime();
        $this->likes = 0;
        $this->users_id = $users_id;
        $this->posts_id = $posts_id;
    }

    public function saveComment() {
        $pdo = dbConnect();
        $statement = $pdo->prepare("INSERT INTO comments (comment,date,likes,users_id,posts_id) VALUES (?,?,?,?,?)");
        $statement->execute([$this->comment,$this->date,$this->likes,$this->users_id,$this->posts_id]);
    }

    public function getDetail($detail){
        return $this->$detail;
    }

    public static function setDetail($detail,$value,$commentId){
        $pdo = dbConnect();
        $statement = $pdo->prepare("UPDATE comments SET $detail = ? WHERE id = ?");
        $statement->execute([$value,$commentId]);
    }

    public static function deleteComment($commentId) {
        $pdo = dbConnect();
        $statement = $pdo->prepare("DELETE FROM comment WHERE id = ?");
        $statement->execute([$commentId]);
    }

    public static function getCommentById($commentId) {
        $pdo = dbConnect();
        $statement = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
        $statement->execute([$commentId]);
        $comment = $statement->fetch(PDO::FETCH_ASSOC);
        if ($comment) {
            return new self(
                $comment['comment'],
                $comment['users_id'],
                $comment['posts_id']
            );
        }
        return null; 
    }
}
