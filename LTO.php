<?php

require('action/database.php');
$txtHeader = "Post-production audiovisuelle, doublage.";
$fonction = new Utilisateur($pdo);
$result = $fonction->getLTO();
?>
<link href="assets/css/Login.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/img/logo_lysi.png">
    <!--Caroussel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--BoxIcons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>    
    <!--CSS-->
    <link rel="stylesheet" href="assets/css/movie.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/container.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lysi média</title>
</head>
<body>
<? $txtHeader="Post-production audiovisuelle, doublage.";?>
<!--Nav Section-->
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
                    <div class="hamburger">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Conteneur pour centrer tout le contenu -->
<div class="content-wrapper">
    <!-- Barre de recherche -->
    <div class="search-wrapper">
        <input type="text" id="searchBar" class="search-input" placeholder="Rechercher...">
    </div>

    <!-- Table avec pagination -->
    <div class="table-wrapper">
        <table class="table th-8" id="dataTable">
            <thead>
                <tr>
                    <th>CARTOUCHE</th>
                    <th>N°serie</th>
                    <th>Fichier</th>
                    <th>TailleOctet</th>
                    <th>TailleGo</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>statut</th>
                    <th>PROD/DISTRI</th>
                    <th>Projet</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['CARTOUCHE'] ?></td>
                    <td><?php echo $r['N° DE SERIE'] ?></td>
                    <td><?php echo $r['FICHIER'] ?></td>
                    <td><?php echo $r['TAILLE octets'] ?></td>
                    <td><?php echo $r['TAILLE Go'] ?></td>
                    <td><?php echo $r['DATE'] ?></td>
                    <td><?php echo $r['TYPE'] ?></td>
                    <td><?php echo $r['STATUT'] ?></td>
                    <td><?php echo $r['PROD/DISTRI'] ?></td>
                    <td><?php echo $r['PROJET'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div id="pagination" class="pagination"></div>
</div>

<script>
    document.getElementById('searchBar').addEventListener('keyup', function() {
        let filter = this.value.toUpperCase();
        let rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(row => {
            let cells = row.querySelectorAll('td');
            let match = false;

            cells.forEach(cell => {
                if (cell.textContent.toUpperCase().indexOf(filter) > -1) {
                    match = true;
                }
            });

            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Pagination variables
    const rowsPerPage = 10; // Number of rows to show per page
    const rows = document.querySelectorAll('#dataTable tbody tr');
    const paginationElement = document.getElementById('pagination');
    let currentPage = 1;

    // Function to create pagination
    function displayPage(page) {
        currentPage = page;
        let start = (page - 1) * rowsPerPage;
        let end = start + rowsPerPage;

        rows.forEach((row, index) => {
            if (index >= start && index < end) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        updatePagination();
    }

    function updatePagination() {
        paginationElement.innerHTML = '';
        let pageCount = Math.ceil(rows.length / rowsPerPage);
        let maxVisibleButtons = 5; // Maximum number of buttons to show

        // Function to create a pagination button
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

        // Always show the first page
        paginationElement.appendChild(createPageLink(1));

        // Show ellipsis (...) if needed before the current page
        if (currentPage > 3) {
            let ellipsis = document.createElement('span');
            ellipsis.textContent = '...';
            paginationElement.appendChild(ellipsis);
        }

        // Calculate the start and end of the visible page range
        let startPage = Math.max(2, currentPage - 2);
        let endPage = Math.min(pageCount - 1, currentPage + 2);

        // Generate the pagination buttons for the visible range
        for (let i = startPage; i <= endPage; i++) {
            paginationElement.appendChild(createPageLink(i));
        }

        // Show ellipsis (...) if needed after the current page
        if (currentPage < pageCount - 2) {
            let ellipsis = document.createElement('span');
            ellipsis.textContent = '...';
            paginationElement.appendChild(ellipsis);
        }

        // Always show the last page
        if (pageCount > 1) {
            paginationElement.appendChild(createPageLink(pageCount));
        }
    }

    // Initial call to display the first page
    displayPage(1);
</script>


<!-- CSS pour améliorer le style global de la page et la pagination centrée -->
<style>
    /* Conteneur principal centré */
    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        text-align: center;
    }

    /* Barre de recherche centrée avec design */
    .search-wrapper {
        margin-bottom: 20px;
    }

    .search-input {
        width: 80%;
        max-width: 600px;
        padding: 10px 20px;
        font-size: 16px;
        border: 2px solid #007bff;
        border-radius: 25px;
        outline: none;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    /* Table centrée avec un style moderne */
    .table-wrapper {
        display: flex;
        justify-content: center;
    }

    .table {
        width: 15%;
        border-collapse: collapse;
        margin-top: 30px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 5px 5px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table th {
        background-color: blue;
        color: white;
        text-transform: uppercase;
    }

    .table tr:nth-child(even) {
        background-color: black;
    }

    .table tr:hover {
        background-color: #274765;
    }

    /* Pagination centrée avec un style moderne */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        margin: 0 5px;
        padding: 5px 5px;
        background-color: #f1f1f1;
        color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination a:hover {
        background-color: #007bff;
        color: white;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
        pointer-events: none;
    }
</style>
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
