<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/app/pages/main.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/navigation.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/table.css">
    <link rel="stylesheet" type="text/css" href="/app/pages/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Raleway:wght@400;600&family=Roboto:wght@300;400;500;700;900&family=Slackside+One&display=swap"
          rel="stylesheet">
    <title>Film Affinity: Production Companies</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">

    <div class="title-container">
        <a href="index.php?action=production&method=add-company">
            <button type="button" class="btn-add">Add Company</button>
        </a>
    </div>

    <h1 class="page-title">Film Affinity</h1>

    <section class="table-container">
        <table class="table">
            <caption class="table-caption">
                Production Companies
            </caption>
            <thead class="table-head">
            <tr class="table-row">
                <th class="table-row_title" scope="col">Name</th>
                <td class="table-row_title">Location</td>
                <td class="table-row_title">Established</td>
                <td class="table-row_title">Active</td>
                <td class="table-row_title">Revenue (2023)</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($production_companies as $company) : ?>
                <tr>
                    <th class="table-row_th" scope="row"><?= htmlspecialchars($company['name']); ?></th>
                    <td class="table-row_td"><?= htmlspecialchars($company['location']); ?></td>
                    <td class="table-row_td"><?= htmlspecialchars($company['established']); ?></td>
                    <td class="table-row_td">
                        <?php if ($company['active'] == 1): ?>
                            &#10003;
                        <?php else: ?>
                            &#10060;
                        <?php endif; ?>
                    <td class="table-row_td">$<?= htmlspecialchars($company['revenue']); ?></td>
                    <td class="table-row_td-btn">
                        <a href="index.php?action=production&method=update-company&id=<?= htmlspecialchars($company['id']); ?>">
                            <button class="btn-delete">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>


    <?php include 'footer.php' ?>
</body>
</html>