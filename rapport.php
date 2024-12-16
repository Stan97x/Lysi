<?php
require('action/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $charge_projet = $_POST['charge_projet'];
    $client = $_POST['client'];
    $ctt = $_POST['ctt'];
    $version = $_POST['version'];
    $sous_titres = $_POST['sous_titres'];
    $mix = $_POST['mix'];
    $verificateur = $_POST['verificateur'];
    $date = $_POST['date'];
    $poids_dcp = $_POST['poids_dcp'];
    $resolution = $_POST['resolution'];
    $norme_dcp = $_POST['norme_dcp'];
    $duree_film = $_POST['duree_film'];
    $nombre_bob = $_POST['nombre_bob'];
    $ratio = $_POST['ratio'];
    $cadence = $_POST['cadence'];
    $dcp_crypte = $_POST['dcp_crypte'];
    $bob = $_POST['bob'];
    $tc_in = $_POST['tc_in'];
    $tc_out = $_POST['tc_out'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    $query = $pdo->prepare("
        INSERT INTO fiche_verification 
        (titre, charge_projet, client, ctt, version, sous_titres, mix, verificateur, date, poids_dcp, 
        resolution, norme_dcp, duree_film, nombre_bob, ratio, cadence, dcp_crypte, bob, tc_in, tc_out, 
        type, description) 
        VALUES 
        (:titre, :charge_projet, :client, :ctt, :version, :sous_titres, :mix, :verificateur, :date, 
        :poids_dcp, :resolution, :norme_dcp, :duree_film, :nombre_bob, :ratio, :cadence, :dcp_crypte, 
        :bob, :tc_in, :tc_out, :type, :description)
    ");
    
    $query->execute([
        ':titre' => $titre,
        ':charge_projet' => $charge_projet,
        ':client' => $client,
        ':ctt' => $ctt,
        ':version' => $version,
        ':sous_titres' => $sous_titres,
        ':mix' => $mix,
        ':verificateur' => $verificateur,
        ':date' => $date,
        ':poids_dcp' => $poids_dcp,
        ':resolution' => $resolution,
        ':norme_dcp' => $norme_dcp,
        ':duree_film' => $duree_film,
        ':nombre_bob' => $nombre_bob,
        ':ratio' => $ratio,
        ':cadence' => $cadence,
        ':dcp_crypte' => $dcp_crypte,
        ':bob' => $bob,
        ':tc_in' => $tc_in,
        ':tc_out' => $tc_out,
        ':type' => $type,
        ':description' => $description
    ]);

    echo "<p>Rapport de vérification DCP enregistré avec succès.</p>";
}
?>


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
    
    <title>Rapport de Vérification DCP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h1, h3 {
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td,select {
            border: 1px solid #ccc;
        }
        th, td,select {
            padding: 8px 12px;
            text-align: left;
        }
        select
        {
            padding: auto;
            width: 100%;
        }
        th {
            background-color: black;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<h1>Rapport de Vérification DCP</h1>

<form method="POST" action="">
    <!-- General Information Table -->
    <h3>Informations Générales</h3>
    <table>
        <tr>
            <th>Titre :</th>
            <td><input type="text" id="titre" name="titre"></td>
        </tr>
        <tr>
            <th>Chargé de Projet :</th>
            <td><input type="text" id="charge_projet" name="charge_projet"></td>
        </tr>
        <tr>
            <th>Client :</th>
            <td><input type="text" id="client" name="client"></td>
        </tr>
        <tr>
            <th>CTT :</th>
            <td><input type="text" id="ctt" name="ctt"></td>
        </tr>
        <tr>
            <th>Version :</th>
            <td><select name="version"><option value=""></option>
  <option value="francais">FR</option>
  <option value="anglais">ENG</option>
  <option value="allemand">ALL</option>

</select></td>
        </tr>
        <tr>
            <th>Sous-Titres :</th>
            <td><input type="text" id="sous_titres" name="sous_titres"></td>
        </tr>
        <tr>
            <th>Mix :</th>
            <td><select name="mix">
    <option value=""></option>
    <option value="francais">FR</option>
    <option value="anglais">ENG</option>
    <option value="allemand">ALL</option>
</select></td>
        </tr>
        <tr>
            <th>Vérificateur :</th>
            <td><input type="text" id="verificateur" name="verificateur"></td>
        </tr>
        <tr>
            <th>Date :</th>
            <td><input type="date" id="date" name="date"></td>
        </tr>
        <tr>
            <th>Poids DCP :</th>
            <td><input type="text" id="poids_dcp" name="poids_dcp"></td>
        </tr>
    </table>

    <!-- Resolution and Norm Table -->
    <h3>Résolution et Norme</h3>
    <table>
        <tr>
            <th>Résolution :</th>
            <td><input type="text" id="resolution" name="resolution"></td>
        </tr>
        <tr>
            <th>Norme DCP :</th>
            <td><input type="text" id="norme_dcp" name="norme_dcp"></td>
        </tr>
        <tr>
            <th>Durée du Film :</th>
            <td><input type="text" id="duree_film" name="duree_film"></td>
        </tr>
        <tr>
            <th>Nombre de Bob :</th>
            <td><input type="number" id="nombre_bob" name="nombre_bob"></td>
        </tr>
        <tr>
            <th>Ratio :</th>
            <td><input type="text" id="ratio" name="ratio"></td>
        </tr>
        <tr>
            <th>Cadence :</th>
            <td><input type="text" id="cadence" name="cadence"></td>
        </tr>
        <tr>
            <th>DCP Crypté :</th>
            <td><input type="text" id="dcp_crypte" name="dcp_crypte"></td>
        </tr>
    </table>

    <!-- Fiche de Vérification Table -->
    <h3>Fiche de Vérification</h3>
    <table>
        <tr>
            <th>Bob :</th>
            <td><input type="number" id="bob" name="bob"></td>
        </tr>
        <tr>
            <th>TC In :</th>
            <td><input type="text" id="tc_in" name="tc_in"></td>
        </tr>
        <tr>
            <th>TC Out :</th>
            <td><input type="text" id="tc_out" name="tc_out"></td>
        </tr>
        <tr>
            <th>Type :</th>
            <td><input type="text" id="type" name="type"></td>
        </tr>
        <tr>
            <th>Description :</th>
            <td><input type="text" id="description" name="description"></td>
        </tr>
    </table>

    <input type="submit" value="Envoyer">
</form>


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
