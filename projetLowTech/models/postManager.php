<?php

require_once './config/database.php';

class PostManager {
    public function createPost($title,$description,$date,$place,$user_id,$status, $userId) {
        $user = User::getUserById($userId);
        $isMod = $user->getDetail("isMod");
        if ($user && $isMod) {
            $post = new Post($title,$description,$date,$place,$user_id,$status);
            $post->savePost();
            return "Votre annonce a été publiée.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour créer une annonce.";
        }
    }

    public function updatePost($detail,$value,$postId,$userId) {
        $user = User::getUserById($userId);
        $isMod = $user->getDetail("isMod");
        if ($user && $isMod) {
            Post::setDetail($detail,$value,$postId);
            return "Votre annonce a été modifiée.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour moodifier une annonce.";
        }
    }

    public function deletePostCreated($postId, $moderatorId) {
        $post = Post::getPostById($postId);
        $user_id = $post->getDetail("user_id");
        if ($post && $user_id === $moderatorId) {
            Post::deletePost($postId);
            return "Le post a été supprimé avec succès.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour supprimer ce post.";
        }
    }

    public static function getAllPosts(): array{
        $sql = "SELECT * FROM posts ORDER BY id ASC";
        $query = dbConnect()->prepare($sql);
        $query->execute();
        $posts = $query->fetchAll();
        return $posts;
    }

    public static function getPost($title): array {
        $sql = "SELECT * FROM posts WHERE title = :title";
        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':title' => $title
        ]);
        $post = $query->fetchAll();
        return $post;
    }

    public static function getPostByID($id): array {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $query = dbConnect()->prepare($sql);
        $query->execute([
            ':id' => $id
        ]);
        $post = $query->fetchAll();
        return $post;
    }

    public static function getCommentsOnPost($postId): array{
        $sql = "SELECT *, users.name, users.username FROM comments INNER JOIN posts ON comments.posts_id = posts.$postId INNER JOIN users ON comments.users_id = users.id";
        $query = dbConnect()->prepare($sql);
        $query->execute();
        $comments = $query->fetchAll();
        return $comments;
    }

    public static function getNeeds($postId): array{
        $sql = "SELECT * FROM posts_needs ORDER BY id ASC WHERE posts_id = $postId";
        $query = dbConnect()->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        $listId = $list['id'];
        $sql2 = "SELECT * FROM needs ORDER BY id ASC WHERE $listId = id";
        $query2 = dbConnect()->prepare($sql2);
        $query2->execute();
        $needs = $query2->fetchAll();
        return $needs;
    }
}