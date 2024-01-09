<div>
    <div>
        <form action="" method="get" name="search">
            <input type="text">
            <button type="submit" value="Rechercher">
        </form>
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