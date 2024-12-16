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
<body>
<?    
require('fpdf186/fpdf.php'); // Inclure la bibliothèque FPDF pour générer le PDF

ob_start(); // Démarre la capture de la sortie pour éviter les erreurs de sortie

// Variables pour stocker les valeurs du formulaire et les erreurs potentielles
$nom = $prenom = $adresse = $num_securite_sociale = $date_debut = $date_fin = $nb_heures = $remuneration = "";
$nom_err = $prenom_err = $adresse_err = $num_securite_sociale_err = $date_debut_err = $date_fin_err = $nb_heures_err = $remuneration_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider le nom
    if (empty(trim($_POST["nom"]))) {
        $nom_err = "Veuillez entrer le nom.";
    } else {
        $nom = trim($_POST["nom"]);
    }   

    // Valider le prénom
    if (empty(trim($_POST["prenom"]))) {
        $prenom_err = "Veuillez entrer le prénom.";
    } else {
        $prenom = trim($_POST["prenom"]);
    }

    // Valider l'adresse
    if (empty(trim($_POST["adresse"]))) {
        $adresse_err = "Veuillez entrer l'adresse.";
    } else {
        
        $adresse = trim($_POST["adresse"]);
    }

    // Valider le numéro de sécurité sociale
    if (empty(trim($_POST["num_securite_sociale"]))) {
        $num_securite_sociale_err = "Veuillez entrer le numéro de sécurité sociale.";
    } else {
        $num_securite_sociale = trim($_POST["num_securite_sociale"]);
    }

    // Valider la date de début
    if (empty(trim($_POST["date_debut"]))) {
        $date_debut_err = "Veuillez entrer la date de début.";
    } else {
        $date_debut = trim($_POST["date_debut"]);
    }

    // Valider la date de fin
    if (empty(trim($_POST["date_fin"]))) {
        $date_fin_err = "Veuillez entrer la date de fin.";
    } else {
        $date_fin = trim($_POST["date_fin"]);
    }

    // Valider le nombre d'heures
    if (empty(trim($_POST["nb_heures"])) || !is_numeric($_POST["nb_heures"])) {
        $nb_heures_err = "Veuillez entrer un nombre d'heures valide.";
    } else {
        $nb_heures = trim($_POST["nb_heures"]);
    }

    // Valider la rémunération
    if (empty(trim($_POST["remuneration"])) || !is_numeric($_POST["remuneration"])) {
        $remuneration_err = "Veuillez entrer une rémunération valide.";
    } else {
        $remuneration = trim($_POST["remuneration"]);
    }

    // Si toutes les validations sont passées
    if (empty($nom_err) && empty($prenom_err) && empty($adresse_err) && empty($num_securite_sociale_err) && empty($date_debut_err) && empty($date_fin_err) && empty($nb_heures_err) && empty($remuneration_err)) {
        // Insérer les données du contrat dans la base de données
        $sql = "INSERT INTO contrats (nom, prenom, adresse, num_securite_sociale, date_debut, date_fin, nb_heures, remuneration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->execute([$nom, $prenom, $adresse, $num_securite_sociale, $date_debut, $date_fin, $nb_heures, $remuneration]);

            // Générer le contrat en PDF
            $pdf = new FPDF();
            $pdf->AddPage();

            // Définir la police
            $pdf->SetFont('Arial', 'B', 16);

            // Titre
            $pdf->Cell(0, 10, 'Contrat d\'Engagement', 0, 1, 'C');
            $pdf->Ln(10);

            // Détails du contrat
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, "Nom du salarié : $prenom $nom", 0, 1);
            $pdf->Cell(0, 10, "Adresse : $adresse", 0, 1);
            $pdf->Cell(0, 10, "Numéro de Sécurité Sociale : $num_securite_sociale", 0, 1);
            $pdf->Cell(0, 10, "Date de début : $date_debut", 0, 1);
            $pdf->Cell(0, 10, "Date de fin : $date_fin", 0, 1);
            $pdf->Cell(0, 10, "Nombre d'heures : $nb_heures", 0, 1);
            $pdf->Cell(0, 10, "Rémunération : $remuneration €", 0, 1);
            $pdf->Ln(10);

            // Ajouter des sections supplémentaires du contrat
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, "Article 1 - Objet", 0, 1);
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, "Le SALARIE est engage en qualite d'operateur du son pour l'enregistrement de la serie documentaire.");

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, "Article 2 - Duree de l'engagement", 0, 1);
            $pdf->SetFont('Arial', '', 12);
            $pdf->MultiCell(0, 10, "Le contrat est conclu du $date_debut au $date_fin pour une duree de $nb_heures heures.");

            // Générer et afficher le PDF dans le navigateur
            ob_end_clean(); // Nettoyer le buffer de sortie pour éviter toute erreur avant la sortie du PDF
            $pdf->Output('Contrat_'.$nom.'_'.$prenom.'.pdf', 'I');
            exit;
        } else {
            echo "<p>Erreur lors de l'enregistrement du contrat.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Contrat d'Engagement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-top: 40px;
        }
        .error { color: red; }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Formulaire de Contrat d'Engagement</h2>
<br>
<form action="generate_contract.php" method="post">
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?php echo $nom; ?>">
        <span class="error"><?php echo $nom_err; ?></span>
    </div>
    
    <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?php echo $prenom; ?>">
        <span class="error"><?php echo $prenom_err; ?></span>
    </div>

    <div>
        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" value="<?php echo $adresse; ?>">
        <span class="error"><?php echo $adresse_err; ?></span>
    </div>

    <div>
        <label for="num_securite_sociale">Numéro de sécurité sociale</label>
        <input type="text" name="num_securite_sociale" value="<?php echo $num_securite_sociale; ?>">
        <span class="error"><?php echo $num_securite_sociale_err; ?></span>
    </div>

    <div>
        <label for="date_debut">Date de début (jj/mm/aaaa)</label>
        <input type="date" name="date_debut" value="<?php echo $date_debut; ?>">
        <span class="error"><?php echo $date_debut_err; ?></span>
    </div>

    <div>
        <label for="date_fin">Date de fin (jj/mm/aaaa)</label>
        <input type="date" name="date_fin" value="<?php echo $date_fin; ?>">
        <span class="error"><?php echo $date_fin_err; ?></span>
    </div>

    <div>
        <label for="nb_heures">Nombre d'heures</label>
        <input type="text" name="nb_heures" value="<?php echo $nb_heures; ?>">
        <span class="error"><?php echo $nb_heures_err; ?></span>
    </div>

    <div>
        <label for="remuneration">Rémunération en €</label>
        <input type="text" name="remuneration" value="<?php echo $remuneration; ?>">
        <span class="error"><?php echo $remuneration_err; ?></span>
    </div>

    <button type="submit">Enregistrer le contrat</button>
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
