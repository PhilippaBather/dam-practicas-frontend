<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/app/pages/main.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/navigation.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/update_company.css">
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

    <h1 class="page-title">Update Production Company Details</h1>
    <div class="form_container">
        <form class="form" method="post" name="update_company">
            <div class="form_container-input">
                <label for="production-name">Name</label>
                <input type="text" name="production-name" id="production-name" class="form_input" value="<?= htmlspecialchars($data->getName()); ?>">
            </div>
            <div class="form_container-input">
                <label for="production-location">Location</label>
                <input type="text" name="production-location" id="production-location" class="form_input" value="<?= htmlspecialchars($data->getLocation()); ?>">
            </div>
            <div class="form_container-input">
                <label for="production-est">Established</label>
                <input type="date" name="production-est" id="production-est" class="form_input" value="<?= htmlspecialchars($data->getEstablished()); ?>">
            </div>
            <div class="form_container-input">
                <fieldset>
                    <legend>Company Status</legend>
                    <div>
                        <input type="radio" name="production-active" id="active-true"
                        <?php if ($data->isActive() == 1) echo 'checked="checked"' ?>
                        >
                        <label for="active-true">Active</label>
                        <input type="radio" name="production-active" id="active-false"
                            <?php if ($data->isActive() == 0) echo 'checked="checked"' ?>
                        >
                        <label for="active-false">Defunct</label>
                    </div>
                </fieldset>
            </div>
            <div class="form_container-input">
                <label for="production-revenue">Revenue for 2023</label>
                <input type="text" name="production-revenue" id="production-revenue" class="form_input" value="$<?= htmlspecialchars($data->getRevenue()); ?>">
            </div>
            <div class="form_container-btns">
                <button type="button" class="form_btns">Cancel</a></button>
                <button type="submit" class="form_btns" name="update_company" value="update_company">Update</button>
                <button type="submit" class="form_btns" name="delete_company" value="delete_company">Delete</button>
            </div>
        </form>
    </div>
</main>

<?php include 'footer.php' ?>

</body>
</html>