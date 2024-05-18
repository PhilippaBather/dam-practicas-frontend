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
    <title>Film Affinity: Add Production Company</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">

    <h1 class="page-title">Add Production Company</h1>
    <div class="form_container">
        <form class="form" method="post" name="add_company">
            <div class="form_container-input">
                <label for="production-name">Name</label>
                <input type="text" name="production-name" id="production-name" class="form_input"
                       value="<?php if (isset($_POST['production-name'])) echo htmlspecialchars($_POST['production-name']) ?>">
                <?php if (isset($_SESSION['error']['name'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['name']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="production-location">Location</label>
                <input type="text" name="production-location" id="production-location" class="form_input"
                       value="<?php if (isset($_POST['production-location'])) echo htmlspecialchars($_POST['production-location']) ?>">
                <?php if (isset($_SESSION['error']['location'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['location']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <label for="production-est">Established</label>
                <input type="date" name="production-est" id="production-est" class="form_input"
                       value="<?php if (isset($_POST['production-est'])) echo htmlspecialchars($_POST['production-est']) ?>">
                <?php if (isset($_SESSION['error']['established'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['established']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-input">
                <fieldset>
                    <legend>Company Status</legend>
                    <div>
                        <input type="radio" name="production-active" id="active-true" value="active-true" checked>
                        <label for="active-true">Active</label>
                        <input type="radio" name="production-active" id="active-false" value="active-false">
                        <label for="active-false">Defunct</label>
                    </div>
                </fieldset>
            </div>
            <div class="form_container-input">
                <label for="production-revenue">Revenue for 2023</label>
                <input type="text" name="production-revenue" id="production-revenue" class="form_input"
                       value="<?php if(isset($_POST['production-revenue'])) echo htmlspecialchars($_POST['production-revenue'])?>">
                <?php if (isset($_SESSION['error']['revenue'])): ?>
                    <p class="error_msg"><?= $_SESSION['error']['revenue']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form_container-btns">
                <a href="index.php?action=production"><button type="button" class="form_btns">Cancel</button></a>
                <button type="submit" class="form_btns" name="add_company" value="add_company">Submit</button>
            </div>
        </form>
    </div>
</main>

<?php include 'footer.php' ?>

</body>
</html>
