<?php

class PostController {
    public function createPost($title,$description, $date,$place,$user_id,$status,$createdAt, $userId) {
        $pdo = dbConnect();
        $user = User::getUserById($userId, $pdo);
        $isMod = $user->getDetail("isMod");
        if ($user && $isMod) {
            $post = new Post($title,$description,$date,$place,$user_id,$status,$createdAt);
            $post->savePost($pdo);
            return "Votre annonce a été publiée.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour créer une annonce.";
        }
    }

    public function updatePost($detail,$value,$postId,$userId) {
        $pdo = dbConnect();
        $user = User::getUserById($userId, $pdo);
        $isMod = $user->getDetail("isMod");
        if ($user && $isMod) {
            $post = Post::getPostById($postId,$pdo);
            $post->setDetail($detail,$value,$pdo,$postId);
            return "Votre annonce a été modifiée.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour moodifier une annonce.";
        }
    }

    public function deletePostCreated($postId, $moderatorId) {
        $pdo = dbConnect();
        $post = Post::getPostById($postId, $pdo);
        $user_id = $post->getDetail("user_id");
        if ($post && $user_id === $moderatorId) {
            Post::deletePost($postId, $pdo);
            return "Le post a été supprimé avec succès.";
        } else {
            return "Vous n'avez pas les autorisations nécessaires pour supprimer ce post.";
        }
    }
}
