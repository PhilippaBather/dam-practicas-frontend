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
            <tr>
                <th class="table-row_th" scope="row">The Lego Batman Movie</th>
                <td class="table-row_td">Comedy</td>
                <td class="table-row_td">Yes</td>
                <td class="table-row_td">10/02/2017</td>
                <td class="table-row_td">$312,000,000</td>
            </tr>
            <tr>
                <th class="table-row_th" scope="row">This is England</th>
                <td class="table-row_td">Drama</td>
                <td class="table-row_td">No</td>
                <td class="table-row_td">04/01/2008</td>
                <td class="table-row_td">$5,000,000</td>
            </tr>
            <tr>
                <th class="table-row_th" scope="row">Pulp Fiction</th>
                <td class="table-row_td">Drama</td>
                <td class="table-row_td">No</td>
                <td class="table-row_td">14/10/1994</td>
                <td class="table-row_td">$107,000,000</td>
            </tr>
            </tbody>
        </table>

    </section>

    <section class="table-container">
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
            <tr>
                <th class="table-row_th" scope="row">Stanley Kubrick</th>
                <td class="table-row_td">26/07/1928</td>
                <td class="table-row_td">4</td>
                <td class="table-row_td">Yes</td>
            </tr>
            <tr>
                <th class="table-row_th" scope="row">Spike Lee</th>
                <td class="table-row_td">20/03/1957</td>
                <td class="table-row_td">3</td>
                <td class="table-row_td">Yes</td>
            </tr>
            </tbody>
        </table>
    </section>
</main>


<?php include 'footer.php' ?>

</body>
</html>