<?php

echo 'fff';
// Vérifier si le formulaire est soumis
if ( isset( $_POST['submit'] ) ) {
    /* récupérer les données du formulaire en utilisant
       la valeur des attributs name comme clé
      */
    $nom = $_POST['name'];
    $mail = $_POST['email'];
    $subjet = $_POST['subject'];
    $date = $_POST['date_du_jour'];
    // afficher le message au client
    echo '<h3>Votre formulaire à été ransmis avec succèes</h3>';
    echo 'Nom : ' . $nom . ' mail : ' . $mail . ' sujet : ' . $subjet. ' date : ' . $date;
    exit;
} else {
    echo '<h3>Veuillez remplir le formulaire completement svp</h3>';
}
?>