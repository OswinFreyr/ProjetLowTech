<div>
    <div>
        <form action="" method="get" name="search">
            <input type="text">
            <button type="submit" value="Rechercher">
        </form>
    </div>
    <div>
        <?php foreach($users as $user) { ?>
            <div>
                <?php $competences = $competencesPerUser[$user['id']]; ?>
                <?= require './views/partials/carteProfil.php';?>
            </div>
        <?php } ?>
    </div>
</div>