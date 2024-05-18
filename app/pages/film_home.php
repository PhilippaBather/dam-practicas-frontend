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
    <title>Film Affinity: Home</title>
</head>
<body>

<?php include 'navigation.php' ?>

<main class="main-container">

    <div class="title-container">
        <a href="index.php?action=film&method=add-film">
            <button type="button" class="btn-add">Add Film</button>
        </a>
        <a href="index.php?action=film&method=add-director">
            <button type="button" class="btn-add">Add Director</button>
        </a>
    </div>

    <h1 class="page-title">Film Affinity</h1>

    <h2 class="page-title_subheading">All you need to know about films</h2>

    <section class="table-container">
        <table class="table">
            <caption class="table-caption">
                Films
            </caption>
            <thead class="table-head">
            <tr class="table-row">
                <th class="table-row_title" scope="col">Title</th>
                <td class="table-row_title">Genre</td>
                <td class="table-row_title">Family Friendly</td>
                <td class="table-row_title">Release Date</td>
                <td class="table-row_title">Revenue</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($films as $film) : ?>
                <tr>
                    <th class="table-row_th" scope="row"><?= htmlspecialchars($film['title']); ?></th>
                    <td class="table-row_td"><?= htmlspecialchars($film['genre']); ?></td>
                    <td class="table-row_td">
                        <?php if ($film['family_friendly'] == 1): ?>
                            &#10003;
                        <?php else: ?>
                            &#10060;
                        <?php endif; ?>
                    </td>
                    <td class="table-row_td"><?= htmlspecialchars($film['release_date']); ?></td>
                    <td class="table-row_td"><?= htmlspecialchars($film['revenue']); ?></td>
                    <td class="table-row_td-btn">
                        <a href="index.php?action=film&method=delete-film&id=<?= htmlspecialchars($film['id']); ?>">
                            <button class="btn-delete">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section class="table-container_director">
        <table class="table">
            <caption class="table-caption">
                Directors
            </caption>
            <thead class="table-head">
            <tr class="table-row">
                <th class="table-row_title" scope="col">Name</th>
                <td class="table-row_title">Birthdate</td>
                <td class="table-row_title">Accolades</td>
                <td class="table-row_title">Oscar Winner</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($directors as $director) : ?>
                <tr>
                    <th class="table-row_th"
                        scope="row"><?= htmlspecialchars($director['name']); ?> <?= htmlspecialchars($director['surname']); ?></th>
                    <td class="table-row_td"><?= htmlspecialchars($director['birthdate']); ?></td>
                    <td class="table-row_td"><?= htmlspecialchars($director['accolades']); ?></td>
                    <td class="table-row_td">
                        <?php if ($director['oscar'] == 1): ?>
                            &#10003;
                        <?php else: ?>
                        &#10060;
                    </td>
                    <?php endif; ?>
                    <td class="table-row_td-btn">
                        <a href="index.php?action=film&method=delete-director&id=<?= htmlspecialchars($director['id']); ?>">
                            <button class="btn-delete">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>


<?php include 'footer.php' ?>

</body>
</html>