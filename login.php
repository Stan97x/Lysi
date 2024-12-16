<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/img/logo_lysi.png">
    <!--Caroussel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--BoxIcons-->
    <link href='htt                                                                                                                                                                                                                                                                                                                                                                                                                                                 ps://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>    
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                    <li><a href="index.html#specials">Service</a></li>
                    <li><a href="./projet.php">Projet</a></li>
                    <li><a href="index.html#testimonials">Ils Nous Font Confiance</a></li>
                    <li><a href="index.html#chefs">Equipes</a></li>
                    <li><a href="index.html#contact">Contact</a></li>
                    <li><a href="conn.php">Connexion</a></li>
                </ul>
                <!--Mobile version-->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger">                     
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<head>
    <style>
.container_entete
{
    top:30%;
    background-color: #16537e;
    width: 100%; 
    display: flex;
    flex-wrap: wrap-reverse;
    justify-content: space-around;
    align-items: center;
    padding: 2em 1em;
    margin-top: 2em;
}
.item_header{
    width: 45%;
    max-width: 45em;
    min-width: 18em;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: flex-start;
    
}
.txt_header{
    max-width: 150em;
    font-size: 1.2em;
    color:white;
    margin-top: 3em;
}
.colored_txt_header,.colored_txt{
    font-size: 1em;
    font-weight: bold;
}
.colored_txt_header{    
    color: white;
}
.colored_txt{
    color: white;
}
.image_entete{
    width: 38px;
    max-width: 15em;
    min-width: 10em;
    align-self: center;
    border-radius:50%;
}
    .items-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 2em 0;
    }

    .items-content img {
        width: 100%;
    }

    .item_actu1, .item_actu2 {
        width: 30%;
        min-width: 18em;
        text-align: center;
        border-radius: 2em;
        padding: 1em 0.5em;
        margin: 0.5em;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: transform 0.3s ease;
    }

    .item_actu1 {
        background-color: #16537e;
        border: 1px solid black;
        color: white;
    }

    .item_actu1 img, .item_actu2 img {
        border: 1px solid black;
        width: 100%;
    }

    .item_actu1 button, .item_actu2 button {
        color: white;
        border-color: white;
        background-color: #16537e;
    }

    .item_actu2 {
        background-color: white;
        border: 1px solid black;
        color:black;
        text-decoration: black;
    }

    .item_actu1:hover, .item_actu2:hover {
        transform: scale(1.05);
    }

     @media (max-width: 768px) {
        .item_actu1, .item_actu2 {
            width: 45%;
        }
    }
    </style>
</head>

<body>
<div class="container_entete">
        <div class="item_header">
            <p class="txt_header">Bienvenue sur l'intranet de lysi média, tu pourras retrouver différente fonctionnalité tel que la fiche de vérification, renseignement de qualité des personnes,les LTO,etc.... .</p>
        </div>
        <img class="image_entete" src="assets/img/logo_lysi.png" alt="Lysi Média">
    </div>
    <div class="items-content">
        <div class="item_actu1">
            <h3>Fiche de vérification</h3>
            <img src="assets/img/connect/fiche.jpg" alt="Image for Item 1">
            <p>Clique sur le button pour allez sur le lien</p>
            <button class="btn btn-outline-success"><a href="rapport.php">Découvrir</button>
        </div>
        <div class="item_actu2">
        <h3>LTO</h3>
            <img src="assets/img/connect/fiche.jpg" alt="Image for Item 1">
            <p>Clique sur le button pour allez sur le lien</p>
            <button class="btn btn-outline-success"><a href="LTO.php">Découvrir</button>
        </div>
        <div class="item_actu1">
        <h3>Contrat d'Engagement </h3>
            <img src="assets/img/connect/fiche.jpg" alt="Image for Item 1">
            <p>Clique sur le button pour allez sur le lien</p>
            <button class="btn btn-outline-success"><a href="contrat_Emp.php">Découvrir</button>
        </div>
        <div class="item_actu2">
        <h3>Contrat de Cession de Droits d'Auteur</h3>
            <img src="assets/img/connect/fiche.jpg" alt="Image for Item 1">
            <p>Clique sur le button pour allez sur le lien</p>
            <button class="btn btn-outline-success"><a href="contrat_Aut.php">Découvrir</button>
        </div>
        <div class="item_actu1">
        <h3>Base de donnée</h3>
            <img src="assets/img/connect/fiche.jpg" alt="Image for Item 1">
            <p>Clique sur le button pour allez sur le lien</p>
            <button class="btn btn-outline-success"><a href="contrat_Emp.php">Découvrir</button>
        </div>
        <div class="item_actu2">
        <h3>Recherche fiche de vérification</h3>
            <img src="assets/img/connect/fiche.jpg" alt="Image for Item 1">
            <p>Clique sur le button pour allez sur le lien</p>
            <button class="btn btn-outline-success"><a href="search_verif.php">Découvrir</button>
        </div>
    </div>

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
