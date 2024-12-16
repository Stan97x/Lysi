<?php
require('fpdf186/fpdf.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $author_name = htmlspecialchars($_POST['author_name']);
    $author_surname = htmlspecialchars($_POST['author_surname']);
    $author_address = htmlspecialchars($_POST['author_address']);
    $program_name = htmlspecialchars($_POST['program_name']);
    $translated_program_name = htmlspecialchars($_POST['translated_program_name']);
    $num_episodes = htmlspecialchars($_POST['num_episodes']);
    $episode_duration = htmlspecialchars($_POST['episode_duration']);
    $client_name = htmlspecialchars($_POST['client_name']);
    $rights_duration = htmlspecialchars($_POST['rights_duration']);
    $remuneration = htmlspecialchars($_POST['remuneration']);
    $contract_date = htmlspecialchars($_POST['contract_date']);

    // Création du PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);

    // Titre
    $pdf->Cell(0, 10, utf8_decode('CONTRAT DE CESSION DE DROITS D\'AUTEUR'), 0, 1, 'C');
    $pdf->Ln(10);

    // Contenu du contrat
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 10, utf8_decode("Entre la société LYSI MEDIA SAS inscrite au registre du commerce et des Sociétés de Paris sous le numéro de Siret 819 551 292 000 33, représentée par Madame Ioanna Miens dont le siège social est au 15, avenue Jean Jaurès, 94340 Joinville-le-Pont agissant en qualité d'employeur pour ce qui est de la relation de travail et en qualité de mandataire pour ce qui est des droits ci-dessous, appelée la Société, d'une part."), 0, 'L');
    $pdf->Ln(5);

    $pdf->MultiCell(0, 10, utf8_decode("Et $author_surname $author_name, demeurant au $author_address, ci-dessous appelé(e) l'auteur, d'autre part."), 0, 'L');
    $pdf->Ln(10);

    // Articles du contrat
    $sections = [
        "Il est préalablement rappelé que :" => "Le client de la Société a commandé à la société l'établissement de la version française de l'oeuvre audiovisuelle intitulée « $program_name » et pour titre traduit « $translated_program_name », composée de $num_episodes épisodes d'une durée unitaire de $episode_duration minutes, destinée à une exploitation vidéographique et/ou télévisuelle et/ou cinématographique.",
        
        "Article I - Objet du contrat" => "L'auteur établira « L'oeuvre » en vue de son doublage. Ce travail devra être remis au plus tard 48h avant l'enregistrement. La Société pourra demander d'apporter toute modification qu'lle jugera nécessaire au travail fourni. L'auteur s'engage à tenir compte de ses indications.",
        
        "Article II - Cession des Droits" => "Sous réserve du parfait paiement des sommes dues au titre de la présente convention, l'auteur cède à la Société pour le compte de $client_name, à titre exclusif, pour le monde entier et pour la durée précisée à l'article III ci-dessous, les droits d'xploitation ci-après définis, découlant de sa collaboration à « l'oeuvre ». Ces droits comprennent les droits de reproduction, de représentation ainsi que les droits d'xploitation dérivés de l'daptation.",
        
        "A - Le droit de reproduction" => "Le droit de reproduction comporte notamment :\n1. Le droit d'nregistrer ou de faire enregistrer par tous procédés techniques connus (notamment procédés chimiques, analogiques, numériques, optiques et/ou magnétiques), ou inconnus à ce jour :\n- Les sons de « l'oeuvre », originaux et doublages,\n- Les titres ou sous-titres de « l'oeuvre ».\n2. Le droit de reproduire l'oeuvre sous forme sonore et/ou visuelle sur tous supports connus, notamment magnétiques (vidéocassettes, vidéodisques, etc.), optiques (films, pellicules), électroniques, numériques ou opto-numériques (notamment de type CDI, DVD, DVD-Rom, CD-Rom, Blu-ray disc, formats dématérialisés), ou inconnus à ce jour, en tous formats, en utilisant tous rapports de cadrage.\n3. Le droit de numériser, moduler, compresser et décompresser, digitaliser ou reproduire « l'oeuvre », éventuellement adaptée sous forme d'une œuvre multimédia.",
        
        "B - Le droit de représentation" => "Le droit de représentation comporte notamment :\n1. Le droit de représenter ou de faire représenter publiquement « l'oeuvre » en version doublée ou sous-titrée dans la version adaptée sur tous supports, par tous modes et procédés connus ou inconnus à ce jour.\n2. Le droit d'utoriser la télédiffusion de « l'oeuvre », en version doublée dans la version adaptée par l'auteur et ce, par tous procédés inhérents à ce mode d'xploitation.",
        
        "C - Les droits d'exploitation dérivés" => "Le droit d'xploitation dérivée comporte notamment :\n1. Le droit d'utoriser la reproduction et la représentation de la version doublée adaptée par l'auteur pour sous-titrée, par extraits de « L'oeuvre ». Pour la publicité ou la promotion de « L'oeuvre ».",
        
        "Article III - Durée" => "Les droits énumérés à l'article II ci-dessus sont cédés à la Société à dater de la signature de la présente convention, pour la durée légale de protection du droit d'auteur telle qu'lle résulte de la législation en vigueur en France.",
        
        "Article IV - Rémunération" => "En rémunération de son travail et de la cession de ses droits d'auteur telle que cette cession est définie par les présentes, l'auteur percevra une rémunération forfaitaire de $remuneration €. Seront déduits les prélèvements sociaux et contributions en vigueur lui incombant au titre de l'gessa, RDS et CSG.",
        
        "Article V - Publicité" => "Le nom de l'auteur sera obligatoirement mentionné au générique de doublage de « l'oeuvre ». La Société prend la responsabilité de l'xécution des présentes dispositions pour la mention faite par elle-même.",
        
        "Article VI - Garanties" => "L'auteur garantit à la société ou ses cessionnaires l'xercice paisible des droits cédés.",
        
        "Article VII - Protection des droits cédés" => "La Société aura, par le fait du présent accord, le droit de poursuivre toute contrefaçon, imitation ou exploitation, sous quelque forme que ce soit, de « l'oeuvre », dans la limite des droits cédés aux termes du présent accord, mais à ses frais, risques et périls.",
        
        "Article VIII - Cession à un tiers" => "La société rétrocédera à son client, pour le compte de qui le doublage est établi, le bénéfice et les charges de la présente convention.",
        
        "Article IX - Loi Applicable et Attribution de Compétence" => "Les parties sont convenues expressément de faire attribution de compétence aux juridictions de Paris, la loi applicable étant la loi française."
    ];

    foreach ($sections as $title => $content) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode($title), 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 10, utf8_decode($content), 0, 'L');
        $pdf->Ln(5);
    }

    // Date et signatures
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, utf8_decode("Fait à Paris, le $contract_date"), 0, 1);
    $pdf->Ln(20);
    $pdf->Cell(0, 10, utf8_decode("LYSI MEDIA"), 0, 1);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, utf8_decode("L'auteur"), 0, 1);

    // Générer le PDF
    $pdf->Output('D', 'Contrat_Cession_Droits_Auteur.pdf');
}
?>
