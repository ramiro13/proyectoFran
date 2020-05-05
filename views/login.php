<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <p>
            <label for="username">Username</label>
            <input id="username" name="username" value="" type="text" required="required">
        </p>
        <p>
            <label for="password">Password</label>
            <input id="password" name="password" value="" type="password" required="required">

        </p>
        <p>
        <button type="submit">Login</button>
        <button type="reset">Cancel</button>
        </p>
    </form>
</body>

</html> -->

<?php
ini_set('display_errors', '1');

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Test PHP</title>

    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/onokumus/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./vendor/bootstrap/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!-- <link href="./vendor/morrisjs/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="./vendor/fortawesome/font-awesome/css/fontawesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style='background-image: url("./vendor/Images/index.jpg");background-size: cover;background-repeat: no-repeat;background-color: #59C6C0;'>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><img src="./vendor/Images/phptestclub.png" alt="Test PHP"></h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <fieldset>
                                <div class="form-group input-group <?php if(isset($email_err[0])) echo $email_err[0]; ?>">
                                    <span class="input-group-addon"></span>    
                                    <input class="form-control" placeholder="Usuario" name="username" id="username" type="text" autofocus  required='true'>
                                </div>
                                <div class="form-group  <?php if(isset($password_err[0])) echo $password_err[0]; ?>">
                                    <input class="form-control" placeholder="Password" id="password" name="password" value="" type="password" required="required">
                                </div>
                                <?php if(isset($ErrorMsg)){ ?>
                                <div class="alert alert-danger">
                                    <strong>Alerta</strong> correo no registrado o clave incorrecta.
                                </div>
                                <?php }?>
                                <button type="submit" class="btn btn-lg btn-success btn-block" name = "submit" value = "submit">Ingresar test  php</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="./vendor/components/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/onokumus/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./vendor/bootstrap/js/sb-admin-2.js"></script>

</body>

</html>

