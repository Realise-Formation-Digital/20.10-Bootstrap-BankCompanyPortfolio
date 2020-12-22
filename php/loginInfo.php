<?php  
    
    $name = $_POST["name"] . "\n";
    $email = $_POST["email"] . "\n";
    $password = $_POST["password"] . "\n";

    function saveFile($_name, $_email, $_password) {
        $fichier = fopen('messages.csv', 'c+b');
        fwrite($fichier, $_separator . 'Name: ' . $_name . 'Email: ' . $_email . 'Password: ' . $_password . $_separator);
        fclose($fichier);
    }

    saveFile($name, $email, $password);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Info account</title>

</head>
<body>
    <!-- Navigation -->
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="../index.html"><img src="../img/happy-bank-gif-logooo.gif"></a>
        </div>
    </div>
    
    <!-- formulaire de contact -->
    <section class="showcase container-fluid">
        <!--Section: Contact v.2-->
        <section class="mb-4">
            <!--Section description-->
            <h2 class="text-center w-responsive mx-auto mb-5">Info account</h2>

            <div class="row justify-content-center">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="createAccount.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="name" class="">Name : <?php echo $name; ?></label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-form mb-0">
                                    <label for="mail" class="">Email : <?php echo $email; ?></label>
                                </div>
                            </div>
                        </div><!--/row-->
                        

                        <div class="row">
                        <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="subject" class="">Password <?php echo $password; ?></label>
                                    
                                </div>
                            </div>
                            
                        </div><!--/row-->

                        <div class="row ">
                            <div class="form-group row">
                                <div class="col-mb-0">
                                    <?php echo "mot de pass avec crypt() : " . crypt($password, "exemple"); ?>
                                </div>
                            </div>
                        </div><!--/row-->

                    </form><!--/contact-form-->
                    <div class="status"></div>
                </div>
            </div>
        </section>
    </section>

<!--Script-->
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>
</html>