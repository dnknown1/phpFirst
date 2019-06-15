<?php
    $dts = array();
    $amts = array();
    $a = 0.00;
    foreach ($data['all']['data'] as $key) {
        array_push($dts,$key['t_dt']);
    };
    foreach (array_reverse($data['all']['data']) as $key) {
        if ($key['t_type'] == 'credit') {
                $a +=  $key['t_amt'];
                array_push($amts , $a);
        } else {
            $a -=  $key['t_amt'];
            array_push($amts , $a);
        }
    };
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $data['username'] ?></title>
        <link rel="shortcut icon" href=<?php echo statics.'images/favicon.ico'; ?>>
        <link rel="stylesheet" href=<?php echo statics."bs4\bootstrap.min.css"?> />
        <script src=<?php echo statics."bs4\Chart.min.js"?>></script>
        <script src=<?php echo statics."bs4\jquery-3.3.1.min.js"?>></script>
        <script src=<?php echo statics."bs4\popper.min.js"?>></script>
        <script src=<?php echo statics."bs4\bootstrap.min.js" ?>></script>
        <link rel="stylesheet" href=<?php echo statics."\css\master_profile.css" ?>>
        <script src=<?php echo statics."/js/validator.js";?>></script>
        <script src=<?php echo statics."/js/line.js";?>></script>
    </head>
    <body>
        <nav class="navbar sticky-top navbar-dark bg-dark px-1 py-0">
            <!-- Nav Brand -->
            <a class="navbar-brand" href=<?php echo url_for.'home';?>>
                <img src=<?php echo statics.'images/e2.png'; ?> width="50" height="40" alt="">e-Ledger
            </a>
            <span id='fn'><?php echo $data['username']; ?></span>
            <!-- Always visible options-->
            <div class="navbar-nav ml-auto">
                <ul class="nav">
                    <li class="nav-item mr-1">
                        <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            +Entry
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body container">
                                <form action=<?php echo url_for.'profile/' ?> class="needs-validation" method="POST" novalidate>
                                        <div class="form-row">
                                            <input type="text" class="form-control" name='amt' placeholder="amount" required>
                                        </div>
                                        <div class="form-row">
                                            <select class="form-control" name="type">
                                                <option>credit</option>
                                                <option>debit</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <button type="submit" class="btn btn-outline-primary mt-1">Add</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </li>
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
                    <li>
                        <a class="nav-link" href=<?php echo url_for.'login/out';?>>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php if ($data['error']): ?>
            <div class="alert alert-warning" role="alert">
                <b>Insufficient Balance!</b><br>
                Go to <a href=<?php echo url_for.'profile';?>>Profile</a> and try again.
            </div>
        <?php else: ?>
            <div class="container">
                <div class="row upper">
                    <div class="col-12 border border-success ">
                        <h1 class="display-4">Hello <?php echo $data['full name']; ?></h1>
                        <p class="lead tip">
                            <?php if ($data['ratio'] == 'nan%'): ?>
                                You should have some fun more often, life is once to live.
                            <?php endif; ?>
                        </p>
                        <p class="lead tip">
                            <?php if ($data['ratio'] < '25.00%'): ?>
                                Nice! No matter what happens you should always celebrate.
                            <?php endif; ?>
                        </p>
                        <p class="lead tip">
                            <?php if ($data['ratio'] > '25.00%' && $data['ratio'] < '50.00%'): ?>
                                Good Job! I think you are planning for something really big.
                            <?php endif; ?>
                        </p>
                        <p class="lead tip">
                            <?php if ($data['ratio'] > '50.00%' && $data['ratio'] < '75.00%'): ?>
                                Great going! people should learn from you that how deep they should dig.
                            <?php endif; ?>
                        </p>
                        <p class="lead tip">
                            <?php if ($data['ratio'] > '75.00%' && $data['ratio'] != 'nan%' ): ?>
                                 Umm! it seems you love spending your money, But you know you should alyaws cut your coat according to your pocket.
                                 <br>Well, no one knows the future.
                             <?php endif; ?>
                        </p>
                        Keep on adding entries and enjoy life to the fullest.
                        <p class="lead text-center">
                            Your Current Balance is (Rs): <?php echo $data['amount']; ?>
                        </p>
                        <canvas id="myChart" height="4%" width="10%"></canvas>
                        <script>
                            plot("myChart",'Balance',<?php echo json_encode(array_reverse($dts)); ?>,<?php echo json_encode($amts); ?>);
                        </script>
                    </div>
                </div>
                <div class="row text-center lower">
                    <div class="col-4 p-1 m-0 sm">
                        <button class="btn btn-outline-success" type="button" data-toggle="collapse" data-target="#allreporte" aria-expanded="false" aria-controls="allreporte">
                            View all transactions
                        </button>
                        <div class="collapse" id="allreporte">
                            <p class='lead'><?php print_r($data['all']['message']); ?></p>
                            <table class="table sm text-center border border-alert" >
                                <thead>
                                    <tr>
                                        <th scope="col">T.id</th>
                                        <th scope="col">T.typr</th>
                                        <th scope="col">T.amount</th>
                                        <th scope="col">T.date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['all']['data'] as $key): ?>
                                    <tr>
                                        <td><?php echo $key['t_id'] ?></td>
                                        <td><?php echo $key['t_type'] ?></td>
                                        <td><?php echo $key['t_amt'] ?></td>
                                        <td><?php echo $key['t_dt'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4 p-1 m-0 sm ">
                        <button class="btn btn-outline-success" type="button" data-toggle="collapse" data-target="#wkreport" aria-expanded="false" aria-controls="wkreport">
                            Last week reports
                        </button>
                        <div class="collapse" id="wkreport">
                            <p class='lead'>
                                <?php print_r($data['week']['message']); ?>
                            </p>
                            <table class="table sm text-center  border border-alert " >
                                <thead>
                                    <tr>
                                        <th scope="col">T.id</th>
                                        <th scope="col">T.typr</th>
                                        <th scope="col">T.amount</th>
                                        <th scope="col">T.date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['week']['data'] as $key): ?>
                                    <tr>
                                        <td><?php echo $key['t_id'] ?></td>
                                        <td><?php echo $key['t_type'] ?></td>
                                        <td><?php echo $key['t_amt'] ?></td>
                                        <td><?php echo $key['t_dt'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4 p-1 m-0 sm">
                        <button class="btn btn-outline-success" type="button" data-toggle="collapse" data-target="#ratio" aria-expanded="false" aria-controls="ratio">
                        debit/credit ratio
                        </button>
                        <div class="collapse" id="ratio">
                            <div class="card card-body container">
                                <?php echo $data['ratio'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="footer">
            © 2019 Copyright:
            <a href="#">dnknown1</a>
        </div>
    </body>
</html>
