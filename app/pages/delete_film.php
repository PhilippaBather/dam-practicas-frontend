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
    <title>Film Affinity: Delete Film</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">
    <h1 class="page-title">Delete Film</h1>
    <div class="form_container">
        <form class="form" method="post" name="delete_film">
            <div class="form_container-input">
                <label for="film-title">Title</label>
                <input type="text" name="film-title" id="film-title" class="form_input" value="<?= htmlspecialchars($data->getTitle()); ?>" disabled>
            </div>
            <div class="form_container-input">
                <label for="film-genre">Genre</label>
                <input type="text" name="film-genre" id="film-genre" class="form_input" value="<?= htmlspecialchars($data->getGenre()); ?>" disabled>
            </div>
            <div class="form_container-input">
                <label for="film-release">Release Date</label>
                <input type="date" name="film-release" id="film-release" class="form_input" value="<?= htmlspecialchars($data->getReleaseDate()); ?>" disabled>
            </div>
            <div class="form_container-input">
                <fieldset>
                    <legend>Family Friendly</legend>
                    <div>
                        <input type="radio" name="film-friendly" id="friendly-true"
                            <?php if ($data->isFamilyFriendly() == 1) echo 'checked="checked"' ?>
                        >
                        <label for="friendly-true">Yes</label>
                        <input type="radio" name="production-active" id="friendly-false"
                            <?php if ($data->isFamilyFriendly() == 0) echo 'checked="checked"' ?>
                        >
                        <label for="friendly-false">No</label>
                    </div>
                </fieldset>
            </div>
            <div class="form_container-btns">
                <a href="index.php?action=film"><button type="button" class="form_btns">Cancel</button></a>
                <button type="submit" class="form_btns" name="delete_film" value="delete_film">Delete</button>
            </div>
        </form>
    </div>

</main>

<?php include 'footer.php' ?>

</body>
</html>