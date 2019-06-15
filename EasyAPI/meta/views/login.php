<?php include_once templates.'base.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script src=<?php echo statics."/js/validator.js";?>></script>
    </head>
    </head>
    <body>
        <?php if (is_null($data['flag']) || true):?>
            <div class="container">
            <form action=<?php echo url_for.'login/verf';?> class="needs-validation" method="POST" novalidate>
                  <div class="form-group">
                      <label for="un">Username</label>
                      <input type="text" class="form-control" name="un" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" class="form-control" name="pwd" placeholder="********" required minlength="8">
                  </div>
                  <button type="submit" class="btn btn-outline-success">Log in</button>
            </form>
        </div>
        <?php else: ?>
            <?php if (! $data['flag']): ?>
                <div class="alert alert-warning" role="alert">
                    <b>Username/Password invalid.</b><br>
                    Try <a href=<?php echo url_for.'login';?>>Again</a> with correct username/password.
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </body>
</html>
