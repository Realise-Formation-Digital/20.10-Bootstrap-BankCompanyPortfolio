<?php

session_start();

$success = '';
$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

// Supprime les espaces, antislashs d'une chaîne, Convertit les caractères spéciaux en entités HTML

function clean_text($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

// Détermine si une variable est déclarée et est différente de null

if(isset($_POST["submit"])) {
    if(empty($_POST["name"])) {
        $error .= '<p><label class="text-danger">Entrer votre nom</label></p>';
    }
    // Vérifie que le champs contient seulement des caractères et espaces
    else {
        $name = clean_text($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $error .= '<p><label class="text-danger">Les lettres et les espaces sont uniquement acceptés</label></p>'; 
        }
    }
    if(empty($_POST["email"])) {
        $error .= '<p><label class="text-danger">Entrer votre adresse e-mail</label></p>';
    }
    // Vérifie que l'email est valide
    else {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p><label class="text-danger">Le format du champs e-mail est invalide</label></p>';
        }
    }
    if(empty($_POST["subject"])) {
        $error .= '<p><label class="text-danger">Le champs sujet est requis</label></p>';
    }
    else {
        $subject = clean_text($_POST["subject"]);
    }
    if(empty($_POST["message"])) {
        $error .= '<p><label class="text-danger">Le champs message est requis</label></p>';
    } 
    else {
        $message = clean_text($_POST["message"]);
    }

    
    if($error == '') {
   // Crée ou ouvre un fichier csv
        $file_open = fopen("messages.csv​", "a");
        $no_rows = count(file("messages.csv​"));
        if($no_rows > 1) {
            $no_rows = ($no_rows - 1) + 1;
        }
        $form_data = array (
            //'sr_no' . ";"  => $no_rows,
            'name' . ";" => $name,
            'email'  . ";" => $email,
            'subject' . ";" => $subject,
            'message' . ";" => $message
        );
        
        // Formate une ligne en csv et l'écrit dans un fichier (donneés formulaire de contact)
        $separator = ";";
        fputcsv($file_open, $form_data, $separator);
        $success = '<label class="text-success">Merci de nous contacter.</label>';
        $name = '';
        $email = '';
        $subject = '';
        $message = '';

        fclose($file_open);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Formulaire Contact</title>

   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">


    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css" href="kilian_epargne.css" >

    <!-- Custom styles for this template -->
    <link href="../css/landing-page.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="../img/happy-bank-gif-logooo.gif" alt="forecastr logo"></a>
        <a class="btn btn-primary" href="#">Login</a>
    </div>
</nav>

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">La moins doloureuse!</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="email" class="form-control form-control-lg" placeholder="e-mail ">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary"> Confirmation</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fas fa-home m-auto text-primary"></i>
                    </div>
                    <a href="../hypotheque.html" class= "btn btn-primary btn-round">HYPOTHÈQUE</a>
                    <p></p>
                    <p class="lead mb-0">C'est parce-que la vitesse de la lumière est plus rapide que celle du son, que beaucoup de gens te paraissent brillants avant de te rendre compte qu'ils sont simplement cons !</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fas fa-piggy-bank m-auto text-primary"></i>
                    </div>

                    <a href="../kilian_epargne.html" class= "btn btn-primary btn-round">ÉPARGNE</a>
                    <p></p>
                    <p class="lead mb-0">Salaire misérable ? Ta grosse se tape un riche et tu élèves son fils sans le savoir ? Viens chez nous, on va te remplir les poches (et les notres aussi par la même occasion)</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fas fa-money-check-alt m-auto text-primary"></i>
                    </div>
                    <a href="../comptes-Gaby.html" class= "btn btn-primary btn-round">COMPTES</a>
                    <p></p>
                    <p class="lead mb-0">Ici vous trouverez différentes manière de nous enrichires et n'oublier pas le 1'000'000 pour pouvoir bénéficier de la gestion de votre compte <U><B>Gratuite</B></U>. Vous y trouverez toutes autres informations utiles à ce sujet!" Petit easter egg sur cette page " <span style='font-size:20px;'>&#128514;&#128514;&#128514;</span></p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="fas fa-hand-holding-usd m-auto text-primary"></i>
                    </div>
                    <a href="../assets.html" class= "btn btn-primary btn-round">ASSETS</a>
                    <p></p>
                    <p class="lead mb-0">Envie d'acheter une Ferrari, ou un tigre de compagnie? Avec nos assets votre vie seras plus la même.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- formulaire de contact -->
<section class="showcase container-fluid">
    <!--Section: Contact v.2-->
    <section class="mb-4">
        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Nous contacter</h2>
        <?php echo $error; ?>
                                <?php echo $success; ?>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions ? N'hésitez pas à nous contacter. Notre équipe vous répondra au plus vite.</p>

        <div class="row justify-content-center">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="formulaireContact.php" method="post">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Votre nom</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="mail" class="">Votre email</label>
                                <input type="email" id="mail" name="email" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Sujet</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Votre message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="example-date-input" class="md-form">Date</label>
                                <input class="form-control md-textarea" id="date_du_jour" type="date" value="2011-08-19" id="example-date-input">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" value="Envoyer" onclick="checkCode()">
                            </div>
                        </div>

                    </div>
                    <!--Grid row-->

                </form>
                <div class="status"><?php echo $erreur; ?></div>

            </div>

        </div>

    </section>
    <!--Section: Contact v.2-->
</section>


<!-- INSÉRER NEWS LETTERS - INSÉRER NEWS LETTERS - INSÉRER NEWS LETTERS-->
<!-- Call to Action -->
<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">gravida est, nec dictum nisl. Etiam imperdiet sem non ! !</h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="email" class="form-control form-control-lg" placeholder="Insère ton e-mail ici frère">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-xl btn-primary">Confirmation</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>






<!-- Footer -->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="#">A propos</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="Formulaire_contact.html">Contact</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Termes d'utilisation</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Politique de confidentialité</a>
                    </li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Dream Factory 2020. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fab fa-facebook fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Modal Login-->
<form name="login" method="POST" action="login.php">
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="text" class="form-control" name="user" placeholder="Nom d'utilisateur...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="pwd" placeholder="Mot de passe...">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round" name="gestion" value="Connexion">Connexion</button>
          </form>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Pas encore membre? <a href="register.php" class="text-info"> S'inscrire</a>.</div>
      </div>
  </div>
</div>
</form>


<script>

    function checkCode () {
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const subject = document.getElementById("subject").value;
        const date = document.getElementById("date_du_jour").value;

        console.log("Name", name)
        console.log("Email", email)
        console.log("Subject", subject)
        console.log("Date", date)

    }

        //let flag = true

        //if (!email || !name || !subject || !date) flag = false

</script>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="../kilian_epargne.js"></script>
</body>

</html>