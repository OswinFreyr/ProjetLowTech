<?php

require_once('./models/postManager.php');

$template = './views/partials/cartePost.php';

$post = PostManager::getPostById($id);