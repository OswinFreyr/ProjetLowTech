<div>
    <div>
        <form action="" method="get" >
            <label for="search">Rechercher des bénévoles par leur nom : </label>
            <input type="search" name="search" id="search">
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