<?php

require_once('./models/postManager.php');

$template = './views/carteAnnonce.php';

$post = PostManager::getPostById($id);
$comments = PostManager::getCommentsOnPost($post['id']);
$needs = postManager::getNeeds($post['id']);