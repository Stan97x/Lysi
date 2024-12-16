<?php
require('action/database.php');

// Obtenez toutes les fiches de vérification
$query = $pdo->prepare("SELECT * FROM fiche_verification");
$query->execute();
$fiches = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/img/logo_lysi.png">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/movie.css">
    <link rel="stylesheet" href="assets/css/container.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche des Fiches de Vérification</title>
</head>
<body>
<section class="nav-wrapper">
    <div class="container">
        <div class="nav">
            <a href="index.html" class="logo">
                <img src="assets/img/logo_lysi.png" style="height:60px;">
            </a>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="index.html">Accueil</a></li>
                <li><a href="login.php">intranet Accueil</a></li>
                <li><a href="LTO.php">LTO</a></li>
                <li><a href="rapport.php">Fiche de vérification</a></li>
                <li><a href="contrat_Emp.php">Contrat d'Engagement</a></li>
                <li><a href="contrat_Aut.php">Contrat de Cession de Droits d'Auteur</a></li>
                <li><a href="contrat_Emp.php">Base de donnée</a></li>
                <li><a href="search_verif.php">Recherche fiche de vérification</a></li>
            </ul>
            <!--Mobile version-->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</section>

<!-- Conteneur pour la recherche et les résultats -->
<div class="content-wrapper">
    <!-- Barre de recherche -->
    <div class="search-wrapper">
        <input type="text" id="searchBar" class="search-input" placeholder="Rechercher..." onkeyup="searchRecords()">
    </div>

    <!-- Table des fiches de vérification avec pagination -->
    <div class="table-wrapper">
        <table class="table" id="dataTable">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Client</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Vérificateur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fiches as $fiche) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($fiche['titre']); ?></td>
                    <td><?php echo htmlspecialchars($fiche['client']); ?></td>
                    <td><?php echo htmlspecialchars($fiche['description']); ?></td>
                    <td><?php echo htmlspecialchars($fiche['date']); ?></td>
                    <td><?php echo htmlspecialchars($fiche['verificateur']); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="">

    </div>

    <!-- Pagination -->
    <div id="pagination" class="pagination"></div>
</div>

<script>
    // Fonction de recherche dynamique
    function searchRecords() {
        let filter = document.getElementById('searchBar').value.toUpperCase();
        let rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(row => {
            let cells = row.querySelectorAll('td');
            let match = false;
            cells.forEach(cell => {
                if (cell.textContent.toUpperCase().indexOf(filter) > -1) {
                    match = true;
                }
            });
            row.style.display = match ? '' : 'none';
        });
    }

    // Variables de pagination
    const rowsPerPage = 10;
    const rows = document.querySelectorAll('#dataTable tbody tr');
    const paginationElement = document.getElementById('pagination');
    let currentPage = 1;

    // Fonction d'affichage de page
    function displayPage(page) {
        currentPage = page;
        let start = (page - 1) * rowsPerPage;
        let end = start + rowsPerPage;

        rows.forEach((row, index) => {
            row.style.display = index >= start && index < end ? '' : 'none';
        });
        updatePagination();
    }

    // Mise à jour de la pagination
    function updatePagination() {
        paginationElement.innerHTML = '';
        let pageCount = Math.ceil(rows.length / rowsPerPage);

        function createPageLink(page) {
            let pageLink = document.createElement('a');
            pageLink.textContent = page;
            pageLink.href = '#';
            pageLink.classList.add('page-link');
            if (page === currentPage) {
                pageLink.classList.add('active');
            }
            pageLink.addEventListener('click', function (event) {
                event.preventDefault();
                displayPage(page);
            });
            return pageLink;
        }

        paginationElement.appendChild(createPageLink(1));

        if (currentPage > 3) {
            let ellipsis = document.createElement('span');
            ellipsis.textContent = '...';
            paginationElement.appendChild(ellipsis);
        }

        let startPage = Math.max(2, currentPage - 2);
        let endPage = Math.min(pageCount - 1, currentPage + 2);

        for (let i = startPage; i <= endPage; i++) {
            paginationElement.appendChild(createPageLink(i));
        }

        if (currentPage < pageCount - 2) {
            let ellipsis = document.createElement('span');
            ellipsis.textContent = '...';
            paginationElement.appendChild(ellipsis);
        }

        if (pageCount > 1) {
            paginationElement.appendChild(createPageLink(pageCount));
        }
    }

    displayPage(1);
</script>

<style>
    .content-wrapper { max-width: 1200px; margin: 0 auto; padding: 20px; text-align: center; }
    .search-wrapper { margin-bottom: 20px; }
    .search-input { width: 80%; max-width: 600px; padding: 10px 20px; font-size: 16px; border: 2px solid #007bff; border-radius: 25px; outline: none; transition: all 0.3s ease; }
    .search-input:focus { box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); }
    .table-wrapper { display: flex; justify-content: center; }
    .table { width: 80%; border-collapse: collapse; margin-top: 30px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); }
    .table th, .table td { padding: 10px 15px; border: 1px solid #ddd; text-align: left; }
    .table th { background-color: blue; color: white; text-transform: uppercase; }
    .table tr:nth-child(even) { background-color: #f9f9f9; }
    .table tr:hover { background-color: #274765; }
    .pagination { display: flex; justify-content: center; margin-top: 20px; }
    .pagination a { margin: 0 5px; padding: 5px 10px; background-color: #f1f1f1; color: #007bff; text-decoration: none; border-radius: 5px; transition: background-color 0.3s; }
    .pagination a:hover { background-color: #007bff; color: white; }
    .pagination a.active { background-color: #007bff; color: white; pointer-events: none; }
</style>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!--App Script-->
  <script src="assets/js/connexion.js"></script>
  <!--JQUERY-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



  <!--JQUERY-->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!--Owl Carousel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--App Script-->
    <script src="assets/js/movie.js"></script>
<script>
    $(document).ready(()=>
{
    $('#hamburger-menu').click(()=>
    {
        $('#hamburger-menu').toggleClass('active')
        $('.nav-menu').toggleClass('active')
    })


    })
</script>

 