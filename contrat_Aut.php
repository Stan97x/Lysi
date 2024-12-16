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
    <h2>Contrat de Cession de Droits d'Auteur</h2>
    <form action="process_contract.php" method="POST">
        <fieldset>
            <legend>Informations sur l'Auteur</legend>
            <label for="author_name">Nom de l'Auteur :</label>
            <input type="text" id="author_name" name="author_name" required><br><br>

            <label for="author_surname">Prénom de l'Auteur :</label>
            <input type="text" id="author_surname" name="author_surname" required><br><br>

            <label for="author_address">Adresse de l'Auteur :</label>
            <input type="text" id="author_address" name="author_address" required><br><br>
        </fieldset>

        <fieldset>
            <legend>Informations sur l’Œuvre</legend>
            <label for="program_name">Nom du programme :</label>
            <input type="text" id="program_name" name="program_name" required><br><br>

            <label for="translated_program_name">Titre traduit :</label>
            <input type="text" id="translated_program_name" name="translated_program_name"><br><br>

            <label for="num_episodes">Nombre d'épisodes :</label>
            <input type="number" id="num_episodes" name="num_episodes" min="1" required><br><br>

            <label for="episode_duration">Durée par épisode (en minutes) :</label>
            <input type="number" id="episode_duration" name="episode_duration" min="1" required><br><br>
        </fieldset>

        <fieldset>
            <legend>Client et Droits</legend>
            <label for="client_name">Nom du client :</label>
            <input type="text" id="client_name" name="client_name" required><br><br>

            <label for="rights_duration">Durée de la cession des droits (en années) :</label>
            <input type="number" id="rights_duration" name="rights_duration" min="1" required><br><br>
        </fieldset>

        <fieldset>
            <legend>Rémunération</legend>
            <label for="remuneration">Rémunération forfaitaire (en euros) :</label>
            <input type="number" id="remuneration" name="remuneration" step="0.01" required><br><br>
        </fieldset>

        <fieldset>
            <legend>Signature</legend>
            <label for="contract_date">Date de signature :</label>
            <input type="date" id="contract_date" name="contract_date" required><br><br>
        </fieldset>

        <input type="submit" value="Générer le Contrat PDF">
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
