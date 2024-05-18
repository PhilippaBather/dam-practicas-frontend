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
    <title>Film Affinity: Add Film</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">

    <h1 class="page-title">Add Film</h1>
    <div class="form_container">
        <form class="form" method="post" name="add_film">
            <div class="form_container-input">
                <label for="film-title">Title</label>
                <input type="text" name="film-title" id="film-title" class="form_input"
                       value="<?php if (isset($_POST['film-title'])) echo htmlspecialchars($_POST['film-title']) ?>">
                <?php if (isset($_SESSION['error']['title'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['title']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="film-genre">Genre</label>
                <input type="text" name="film-genre" id="film-genre" class="form_input"
                       value="<?php if (isset($_POST['film-genre'])) echo htmlspecialchars($_POST['film-genre']) ?>">
                <?php if (isset($_SESSION['error']['genre'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['genre']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="film-release-date">Release Date</label>
                <input type="date" name="film-release-date" id="film-release-date" class="form_input"
                       value="<?php if (isset($_POST['film-release-date'])) echo htmlspecialchars($_POST['film-release-date']) ?>">
                <?php if (isset($_SESSION['error']['release'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['release']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <fieldset>
                    <legend>Family Friendly</legend>
                    <div>
                        <input type="radio" name="film-family-friendly" id="friendly-true" value="friendly-true" checked>
                        <label for="friendly-true">Yes</label>
                        <input type="radio" name="film-family-friendly" id="friendly-false" value="friendly-false">
                        <label for="friendly-false">No</label>
                    </div>
                </fieldset>
            </div>
            <div class="form_container-input">
                <label for="film-revenue">Revenue</label>
                <input type="text" name="film-revenue" id="film-revenue" class="form_input"
                       value="<?php if(isset($_POST['film-revenue'])) echo htmlspecialchars($_POST['film-revenue'])?>">
                <?php if (isset($_SESSION['error']['revenue'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['revenue']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="film-director-id">Director ID</label>
                <input type="text" name="film-director-id" id="film-director-id" class="form_input"
                       value="<?php if(isset($_POST['film-director-id'])) echo htmlspecialchars($_POST['film-director-id'])?>">
                <?php if (isset($_SESSION['error']['director-id'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['director-id']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="film-company-id">Production Company ID</label>
                <input type="text" name="film-company-id" id="film-company-id" class="form_input"
                       value="<?php if(isset($_POST['film-company-id'])) echo htmlspecialchars($_POST['film-company-id'])?>">
                <?php if (isset($_SESSION['error']['company-id'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['company-id']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-btns">
                <button type="button" class="form_btns">Cancel</a></button>
                <button type="submit" class="form_btns" name="add_film" value="add_film">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php include 'footer.php' ?>

</body>
</html>
