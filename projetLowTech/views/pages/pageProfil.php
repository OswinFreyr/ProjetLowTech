<?php

session_start();

if (isset($_SESSION['idUser'])) {
    ?>

    <div>
        MENU (afaire)
    </div>
    <div>
        <div>
            <img src="" alt="">
        </div>
        <div>
            <?= $user['name'] . " " . $user['firstname']?>
        </div>
        <div>
            <?= $user['username'] ?>
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
            <?= $user['city'] ?>
        </div>
    </div>

    <?php
} else {
    header("Location: index.php?page=connexion"); 
    var_dump("hiuhiuhu");
    exit();
}
require_once 'projetLowTech\controllers\profilController.php';

?>


