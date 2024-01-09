<div>
    <div>
        <form action="" method="get">
            <label for="search"></label>
            <input type="text" name="search">
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