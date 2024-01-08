<div>
    <div>
        <input type="text" method="_GET" name="search">
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