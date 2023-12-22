<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
</head>
<body>
    <?php require './views/partials/_header.php'; ?>
        <main>
            <?php require($template); ?>
        </main>
    <?php require './views/partials/_footer.php'; ?>
</body>
</html>