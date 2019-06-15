<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href=<?php echo statics.'images/favicon.ico'; ?>>
        <link rel="stylesheet" href=<?php echo statics."bs4\bootstrap.min.css"?> />
        <script src=<?php echo statics."bs4\jquery-3.3.1.min.js"?>></script>
        <script src=<?php echo statics."bs4\popper.min.js"?>></script>
        <script src=<?php echo statics."bs4\bootstrap.min.js" ?>></script>
        <link rel="stylesheet" href=<?php echo statics."\css\master_base.css" ?>>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-dark bg-dark px-2 py-0">
            <!-- Nav Brand -->
            <a class="navbar-brand" href=<?php echo url_for.'home';?>>
                <img src=<?php echo statics.'images/e2.png'; ?> width="50" height="40" alt="">e-Ledger
            </a>
            <!-- Always visible options-->
            <div class="navbar-nav ml-auto">
                <ul class="nav">
                    <li class="nav-item mr-1"><a class="nav-link" href=<?php echo url_for.'register'?>>Sign up</a></li>
                    <li class="nav-item mr-1"><a class="nav-link" href=<?php echo url_for.'login'; ?>>Log in</a></li>
                </ul>
            </div>
            <!-- Hamburger Buttton -->
            <button
                class="navbar-toggler ml-2"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"  >
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Hamburger menu-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                        <a class="nav-link" href=<?php echo url_for.'home';?>>Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo url_for.'about';?>>About</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="footer">
            © 2019 Copyright:
            <a href="#">dnknown1</a>
        </div>
    </body>
</html>
