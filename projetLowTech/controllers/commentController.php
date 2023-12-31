<?php

class CommentController {
    public function addComment($comment,$users_id,$posts_id) {
        $comment = new Comment($comment,$users_id,$posts_id);
        $comment->saveComment();
        return "Votre commentaire a bien été enregistré";
    }

    public function likeComment($commentId) {
        $comment = Comment::getCommentById($commentId);
        $likes = $comment->getDetail("likes");
        $likes+=1;
        $comment->setDetail("likes",$likes,$commentId);
        return "Liké";
    }

    public function replyToComment($commentId) {
        // pour l'instant pas de réponse directe à un commentaire, ce sera comme une conv
    }
}
