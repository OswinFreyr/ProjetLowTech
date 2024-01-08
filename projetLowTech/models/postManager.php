<?php


class postManager {
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
}