<div>
    <div>
        <div>
            <?= $post['status'] ?>
        </div>
        <img src="" alt="">
    </div>
    <div>
        <div>
            <?= $post['title'] ?>
        </div>
        <div>
            <?= $post['description'] ?>
        </div>
    </div>
    <div>
        NomUtilisateurCréateur
    </div>
    <div>
        <ul>
            <?php foreach($needs as $need) { ?>
            <li>
                <?= $need['name'] ?>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php if(isset($comments)) { ?>
    <div>
        <?php foreach($comments as $comment) { ?>
            <div>
                <?= $comment['users.name'] . " (" . $comment['users.username'] . ") - " . $comment['date'] ?>
            </div>
            <div>
                <?= $comment['content'] ?>
            </div>
            <div>
                <?= $comment['nb_likes'] ?>
            </div>
        <?php } ?>
    </div>
    <?php } else { ?>
    <div>
        <p>Pas encore de commentaires.</p>
    </div>
    <?php } ?>
    <div>
        <div>
            <?= $post['place'] ?>
        </div>
        <div>
            <?= $post['date'] ?>
        </div>
    </div>
</div>