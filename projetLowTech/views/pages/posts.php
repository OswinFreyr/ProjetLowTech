<div>
    <div>
        <input type="text" method="_GET" name="search">
    </div>
    <div>
        <?php foreach($posts as $post) { ?>
            <div>
                <?php 
                    $needs = $needsPerPosts[$post['id']]; 
                    $comments = $commentsPerPosts[$posts['id']];
                ?>
                <?= require './views/partials/cartePost.php';?>
            </div>
        <?php } ?>
    </div>
</div>