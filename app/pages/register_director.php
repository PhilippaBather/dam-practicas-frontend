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
    <title>Film Affinity: Add Director</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">

    <h1 class="page-title">Add Director</h1>
    <div class="form_container">
        <form class="form" method="post" name="add_director">
            <div class="form_container-input">
                <label for="director-name">Name</label>
                <input type="text" name="director-name" id="director-name" class="form_input"
                       value="<?php if (isset($_POST['director-name'])) echo htmlspecialchars($_POST['director-name']) ?>">
                <?php if (isset($_SESSION['error']['name'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['name']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="director-surname">Surname</label>
                <input type="text" name="director-surname" id="director-surname" class="form_input"
                       value="<?php if (isset($_POST['director-surname'])) echo htmlspecialchars($_POST['director-surname']) ?>">
                <?php if (isset($_SESSION['error']['surname'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['surname']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="director-dob">Birthdate</label>
                <input type="date" name="director-dob" id="director-dob" class="form_input"
                       value="<?php if (isset($_POST['director-dob'])) echo htmlspecialchars($_POST['director-dob']) ?>">
                <?php if (isset($_SESSION['error']['dob'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['dob']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <fieldset>
                    <legend>Oscar Winner</legend>
                    <div>
                        <input type="radio" name="director-oscar" id="oscar-true" value="oscar-true" checked>
                        <label for="oscar-true">Yes</label>
                        <input type="radio" name="director-oscar" id="oscar-false" value="oscar-false">
                        <label for="oscar-false">No</label>
                    </div>
                </fieldset>
            </div>
            <div class="form_container-input">
                <label for="director-accolades">Number of Accolades</label>
                <input type="text" name="director-accolades" id="director-accolades" class="form_input"
                       value="<?php if(isset($_POST['director-accolades'])) echo htmlspecialchars($_POST['director-accolades'])?>">
                <?php if (isset($_SESSION['error']['accolades'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['accolades']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-btns">
                <a href="index.php?action=film"><button type="button" class="form_btns">Cancel</button></a>
                <button type="submit" class="form_btns" name="add_director" value="add_company">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php include 'footer.php' ?>

</body>
</html>
