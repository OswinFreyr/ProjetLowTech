<div>
    <div>
        <img src="" alt="">
    </div>
    <div>
        <?= $user['name'] . " " . $user['firstname']?>
    </div>
    <div>
        <?= $user['useranme'] ?>
    </div>
    <div>
        <ul>
            <?php foreach($competences as $competence) { ?>
            <li>
                <?= $competence['name'] ?>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div>
        <div>
            <?= $user['city'] ?>
        </div>
        <div>
            <button><a href="">Voir profil</a></button>
        </div>
    </div>
</div>