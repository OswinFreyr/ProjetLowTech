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
            <?php foreach($competences as $competence) { ?>
            <li>
                <?= $needs['name'] ?>
            </li>
            <?php } ?>
        </ul>
    </div>
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
    <div>
        <div>
            <?= $post['place'] ?>
        </div>
        <div>
            <?= $post['date'] ?>
        </div>
    </div>
</div>