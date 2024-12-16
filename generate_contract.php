<?php
require('fpdf186/fpdf.php'); // Include FPDF library
require('action/database.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
    $num_securite_sociale = isset($_POST['num_securite_sociale']) ? $_POST['num_securite_sociale'] : '';
    $date_debut = isset($_POST['date_debut']) ? $_POST['date_debut'] : '';
    $date_fin = isset($_POST['date_fin']) ? $_POST['date_fin'] : '';
    $nb_heures = isset($_POST['nb_heures']) ? $_POST['nb_heures'] : '';
    $remuneration = isset($_POST['remuneration']) ? $_POST['remuneration'] : '';

    // Insert the data into the database
    $sql = "INSERT INTO contrats (nom, prenom, adresse, num_securite_sociale, date_debut, date_fin, nb_heures, remuneration) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement and execute the query
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->execute([$nom, $prenom, $adresse, $num_securite_sociale, $date_debut, $date_fin, $nb_heures, $remuneration]);
    } else {
        die("Erreur lors de l'insertion dans la base de données.");
    }

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set title and headers
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('Contrat d\'Engagement Artiste ou Technicien Intermittent en CDD D\'USAGE'), 0, 1, 'C');
    $pdf->Ln(10);

    // Add the contract text with dynamic data and utf8_decode to handle accents
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, utf8_decode("

Entre les soussignés :

LYSI MEDIA S.A.S, dont le siège social est situé au 15, avenue Jean Jaurès, 94340 Joinville-le-Pont - Siret 819 551 292 00033 - APE : 5912Z
Numéro de licence d'entrepreneur du spectacle - 2° catégorie. Représentée par Madame Ioanna Miens en sa qualité de Présidente,
Ci-après dénommée l'EMPLOYEUR d'une part,

et

Mr ou Mme $prenom $nom, demeurant au $adresse 
Immatriculé à la Sécurité Sociale sous le n° $num_securite_sociale,
Ci-après dénommé le SALARIE d'autre part.

Préambule :
Le présent contrat est conclu dans le cadre de la législation du travail, des usages en vigueur dans la profession, de l'article L. 122-1-1-3° du Code du travail et de l'accord interbranche sur le recours au contrat à durée déterminée d'usage dans le spectacle du 12/10/1998. Il est en outre régi par les dispositions de la convention collective nationale des entreprises techniques au service de la création et de l\'événement du 21 février 2008.

Il a été convenu et arrêté ce qui suit :

Article 1 - Objet :
Le SALARIE est engagé en qualité d'opérateur du son. Le présent contrat est conclu pour l\'enregistrement de la série documentaire en version française « Nom du programme » et le numéro du ou des épisodes.

Article 2 - Qualification du Contrat :
Le présent contrat est un contrat de travail à durée déterminée intermittent non-cadre du spectacle. Ce contrat n\'est pas renouvelable par tacite reconduction. Toute collaboration cesse de plein droit au terme fixé pour son expiration, sans préavis ni indemnités, en application de l\'article L122.1.1 du code du travail.
Les cotisations afférentes au présent contrat seront versées à l\'URSSAF – 3, rue Franklin – 93518 Montreuil. Conformément aux dispositions légales en vigueur, le présent engagement fait l\'objet d\'une déclaration unique d\'embauche.

Article 3 - Durée de l'engagement :
Le présent contrat est conclu pour la journée du $date_debut au $date_fin, pour une journée de $nb_heures heures.

Article 4 - Lieu d'exécution de l'engagement :
15, avenue Jean Jaurès, 94340 Joinville-le-Pont. Le contractant devra signer la feuille de présence.

Article 5 - Rémunération :
L'employeur s'engage à verser au SALARIE à titre de salaire la somme de $remuneration € bruts, payable en fin de mois.

Article 9 - Congés payés :
Le SALARIE aura droit aux congés payés prévus par les articles D. 762-1 et suivants du code du travail, qui lui seront versés directement par la Caisse des Congés Spectacles selon les modalités en vigueur. À ce titre, l'EMPLOYEUR acquittera ses contributions à la Caisse des Congés Spectacles conformément à la législation.

Article 10 - Absence - Maladie :
En cas de maladie, le SALARIE doit prévenir immédiatement l\'EMPLOYEUR afin de permettre à la Société de procéder éventuellement à son remplacement.

Article 11 - Droit de priorité et d'exclusivité :
Le présent contrat donne à l'EMPLOYEUR une priorité absolue sur tous les autres engagements que pourrait conclure par ailleurs le SALARIE, sur la période de l'engagement.

Article 12 - Publicité :
Le nom du salarié figurera au générique de fin dans des caractères laissés à la discrétion de l\'employeur.

Article 13 – Clauses Particulières :
Le SALARIE déclare formellement avoir pris connaissance que l\'utilisation de son véhicule personnel pour le travail n\'est pas couverte par les assurances de l'employeur.

Article 14 – Transport :
Le SALARIE se rendra à ses frais au studio ou au bureau de production ainsi qu\'en extérieur dans Paris et la banlieue.

Article 15 - Annulation du contrat :
La société se réserve le droit de résilier les engagements sans préavis ni indemnités en cas de faute grave du SALARIE.

Article 16 - Médecine du travail :
Le SALARIE déclare avoir été reconnu apte lors de la visite médicale effectuée dans les douze mois précédant le présent engagement.

Article 17 - Assurances :
Le SALARIE est responsable des objets ou documents qui lui sont confiés. En cas de perte ou de détérioration, il peut être demandé au SALARIE de rembourser les coûts.

Article 18 - Confidentialité :
Le SALARIE s'engage à ne faire aucune communication relative aux programmes audiovisuels sans l\'accord préalable de l\'EMPLOYEUR.

Fait en deux exemplaires, à Paris, le $date_debut.

Le Salarié : $prenom $nom         LYSI MEDIA"));

    // Output the PDF to the browser
    $pdf->Output('Contrat_'.$nom.'_'.$prenom.'.pdf', 'I');
}
?>
