<?php

require_once('action/database.php');
$user = new user($pdo);
$alertMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){  
  $user = filter_input(INPUT_POST, "email"  );
$password = filter_input(INPUT_POST, "password");   
  $resultat = $User->Password($user,$password);   
    if ($resultat) {
      $_SESSION['Nom']=$resultat['Nom'];
      $_SESSION['Compte']=$resultat['Compte'];
      echo "sa marche de fou";
    header('location:login.php');


    }
  else 
  {
    $alertMessage = "Email ou mot de passe incorrect!";
  }
    
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
<?php $txtHeader="Post-production audiovisuelle, doublage."; ?>
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
                <li><a href="projet.php">Projet</a></li>
                <li><a href="index.html#testimonials">Ils Nous Font Confiance</a></li>
                <li><a href="index.html#chefs">Equipes</a></li>
                <li><a href="index.html#contact">Contact</a></li>
                <li><a href="conn.php">Connexion</a></li>
            </ul>
            <!--Mobile version-->
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger"></div>
            </div>
        </div>
    </div>
</section>

<style>
/* Conteneur principal */
.login-container {
    position: relative;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    background-color: black;
}

/* Vidéo en arrière-plan */
.background-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    object-fit: cover;
    z-index: -1; /* Derrière le formulaire */
    filter: brightness(60%); /* Ajoute un effet d'assombrissement sur la vidéo */
}

/* Formulaire de connexion */
.login-form {
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent */
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    text-align: center;
    width: 300px;
}

h2 {
    margin-bottom: 20px;
    font-size: 1.8em;
    color: #333;
}

/* Style des champs de texte */
.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 0.9em;
    color: #333;
}

.input-group input {
    width: 100%;
    padding: 10px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Bouton de connexion */
.login-button {
    background-color: #007bff;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.login-button:hover {
    background-color: #0056b3;
}

/* Texte du bas */
.login-text {
    margin-top: 15px;
    font-size: 0.9em;
}

.login-text a {
    color: #007bff;
    text-decoration: none;
}

.login-text a:hover {
    text-decoration: underline;
}

/* Style de l'alerte */
.alert {
    margin-top: 20px;
    padding: 15px;
    border-radius: 5px;
    font-size: 0.9em;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
}

.alert-danger {
    color: white;
    background-color: #ff4d4d;
    border: 1px solid #ff1a1a;
}

/* Ajouter un léger effet d'apparition pour l'alerte */
.alert {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

</style>

<div class="login-container">
    <video autoplay loop muted class="background-video">
        <source src="assets/img/lysi-conn.mp4" type="video/mp4" />
        Votre navigateur ne supporte pas les vidéos HTML5.
    </video>

    <div class="login-form">
        <h2>Connexion</h2>
        <form method="post" action="">
            <div class="input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required />
            </div>
            <div class="input-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required />
            </div>
            <button type="submit" class="login-button">Se connecter</button>
        </form>
        <!-- Conteneur pour afficher l'alerte -->
        <?php if ($alertMessage): ?>
            <div class="alert alert-danger"><?php echo $alertMessage; ?></div>
        <?php endif; ?>
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
