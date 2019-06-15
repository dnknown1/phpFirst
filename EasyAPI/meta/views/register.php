<?php include_once templates.'base.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href=<?php echo statics."/css/master_register.css"?>>
        <script src=<?php echo statics."/js/validator.js";?>></script>
    </head>
    <body>
        <?php if (is_null($data['flag'])): ?>
        <div class="container">
            <form action=<?php echo url_for.'register/landing';?> class="needs-validation" method="POST" novalidate>
                  <div class="form-row">
                      <div class="form-group col-sm-6">
                          <label for="fn">First Name</label>
                          <input type="text" class="form-control" name="fn" placeholder="First Name" required>
                      </div>
                      <div class="form-group col-sm-6">
                          <label for="ln">Last Name</label>
                          <input type="text" class="form-control" name="ln" placeholder="Last Name" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="un">Username</label>
                      <input type="text" class="form-control" name="un" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" class="form-control" name="pwd" placeholder="********" required minlength="8">
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="bal">Balance</label>
                          <input type="text" class="form-control" name="bal" value='0.00'>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck" required>
                          <label class="form-check-label" for="gridCheck">
                              accept terms and conditions
                          </label>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-outline-success">Register</button>
            </form>
        </div>
        <?php else: ?>
            <?php if ($data['flag']): ?>
                <div class="alert alert-success" role="alert">
                    Thank You <?php echo $data['data'][0]['full name'];?> for registering as:-
                    <?php echo $data['data'][0]['username'];?><br>
                    <a href=<?php echo url_for.'login'; ?> class="alert-link">Log in</a> to your account and Start adding your Transactions
                </div>
                <img src=<?php echo statics.'/images/welcome.gif'; ?> class="img-fluid">
            <?php else: ?>
                <div class="alert alert-warning" role="alert">
                    <b>Username Already taken.</b><br>
                    Try <a href=<?php echo url_for.'register';?>>Again</a> with different username.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </body>
</html>
