<?php

require_once('./models/postManager.php');

$template = './views/posts.php';

$needsPerPost = array();
$commentsPerPost = array();

if(empty($_GET)){
    $users = PostManager::getAllPosts();
}else if(!empty($_GET)){
    $users = PostManager::getPost($_GET['search']);
}
foreach($posts as $post){
    $needsPerPost[$post['id']] = PostManager::getNeeds($post['id']);
    $commentsPerPost[$post['id']] = PostManager::getCommentsOnPost($post['id']);
}