<?php include_once templates.'base.php';?>
<DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>OOPS! Wrong Address</title>
    </head>
    <body>
        <div class="container my-2"  style="color:red; text-align:center">
            <div class="alert alert-danger my-3" role="alert">
                <b>404!Content Not Found</b>
            </div>
            <p class="lead">
                You are here because we have encountered that you don't have
                authorization to view contents of given address.<br>
            </p>
            <hr width=80% color=red>
            <hr width=60% color=red>
            <hr width=40% color=red>
            <img src=<?php echo statics.'/images/BadReq.png'; ?> class="img-fluid">
        </div>
        <span style="color:white;">Click <a href=<?php echo url_for; ?>>here</a> to go to Home page or
        <a href=<?php echo url_for.'login'; ?>> Log in</a> to your account.</span>
        <br>
        <div class="container" style="color:yellow; text-align:center"><b>Have a nice day.</b></div>
        <br>
    </body>
</html>
