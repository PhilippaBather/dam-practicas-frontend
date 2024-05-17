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
            <tr>
                <th class="table-row_th" scope="row">Universal Studios</th>
                <td class="table-row_td">Los Angeles</td>
                <td class="table-row_td">30/04/1912</td>
                <td class="table-row_td">Yes</td>
                <td class="table-row_td">$1,900,000,000</td>
            </tr>
            <tr>
                <th class="table-row_th" scope="row">20th Century Studios</th>
                <td class="table-row_td">Los Angeles</td>
                <td class="table-row_td">31/05/1935</td>
                <td class="table-row_td">Yes</td>
                <td class="table-row_td">$1,890,000,000</td>
            </tr>
            <tr>
                <th class="table-row_th" scope="row">Yash Raj Films</th>
                <td class="table-row_td">Mumbai</td>
                <td class="table-row_td">1970</td>
                <td class="table-row_td">Yes</td>
                <td class="table-row_td">$180,935,000</td>
            </tr>
            </tbody>
        </table>

    </section>


<?php include 'footer.php' ?>
</body>
</html>