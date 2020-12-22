<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Create account</title>
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
        <h2 class="text-center w-responsive mx-auto mb-5">Create account</h2>

        <div class="row justify-content-center">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="loginInfo.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="mail" class="">Email</label>
                                <input type="email" id="mail" name="email" class="form-control">
                            </div>
                        </div>
                    </div><!--/row-->
                    

                    <div class="row">
                       <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Password</label>
                                <input type="password" id="subject" name="password" class="form-control">
                            </div>
                        </div>
                        
                    </div><!--/row-->

                    <div class="row ">
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" value="Valider" >
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