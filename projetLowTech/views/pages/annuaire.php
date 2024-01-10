<div>
    <div>
        <form action="" method="get" >
            <label for="search"></label>
            <input type="text" name="search" id="search">
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