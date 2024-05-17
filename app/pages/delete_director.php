<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/app/pages/main.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/navigation.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/form.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Raleway:wght@400;600&family=Roboto:wght@300;400;500;700;900&family=Slackside+One&display=swap"
          rel="stylesheet">
    <title>Film Affinity: Update Production Company</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">
    <h1 class="page-title">Update Director Details</h1>
    <div class="form_container">
        <form class="form" method="post" name="delete_director">
            <div class="form_container-input">
                <label for="director-name">Name</label>
                <input type="text" name="director-name" id="director-name" class="form_input" value="<?= htmlspecialchars($data->getName()); ?>">
            </div>
            <div class="form_container-input">
                <label for="director-surname">Surname</label>
                <input type="text" name="director-surname" id="director-surname" class="form_input"  value="<?= htmlspecialchars($data->getSurname()); ?>">
            </div>
            <div class="form_container-input">
                <label for="director-accolades">Accolades</label>
                <input type="number" name="director-accolades" id="director-accolades" class="form_input"  value="<?= htmlspecialchars($data->getAccolades()); ?>">
            </div>
            <div class="form_container-input">
                <label for="production-est">Birthdate</label>
                <input type="date" name="production-est" id="production-est" class="form_input"  value="<?= htmlspecialchars($data->getBirthdate()); ?>">
            </div>
            <div class="form_container-input">
                <fieldset>
                    <legend>Oscar Winner</legend>
                    <div>
                        <input type="radio" name="director-oscar" id="oscar-true"
                            <?php if ($data->getOscar() == 1) echo 'checked="checked"' ?>
                        >
                        <label for="oscar-true">Yes</label>
                        <input type="radio" name="director-oscar" id="oscar-false"
                            <?php if ($data->getOscar() == 0) echo 'checked="checked"' ?>
                        >
                        <label for="oscar-false">No</label>
                    </div>
                </fieldset>
            </div>
            <div class="form_container-btns">
                <button type="button" class="form_btns">Cancel</a></button>
                <button type="submit" class="form_btns" name="delete_director">Delete</button>
            </div>
        </form>
    </div>

</main>

<?php include 'footer.php' ?>

</body>
</html>