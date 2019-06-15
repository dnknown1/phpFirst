<?php include_once templates.'base.php';?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Home</title>
        <link rel="stylesheet" href=<?php echo statics."/css/master_home.css"?>>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Welcome!</h1>
                <p class="lead">
                    <br>An Online accounting record storage.
                    <br>
                    Sign up for an account and start adding all your financial entries
                    and monitor them 24*7 on the go.<br>
                    <hr width=75% color=white>
                    Register now.
                </p>
                <a class="btn btn-primary btn-lg" href=<?php echo url_for.'register'; ?> role="button">Sign Up</a>
                <pre>Or<a href=<?php echo url_for.'login' ?>> Log in </a>if you already have an account.</pre>
                </div>
    </body>
</html>
