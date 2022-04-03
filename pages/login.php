<?php

require_once '../includes/functions/login.php';
$alert_message = $alert_color = '';
if(isset($_GET['action'])) {
  if ($_GET['action'] === 'logout') { 
  // This condition must be before the credentials check (for the case the user logged out, then try to connect again and made a mistake in credentials)
  $alert_message = 'You have been successfully logged out';
  $alert_color = 'success';
  }
}
if (!empty($_POST)) {
  if(login_verify() === false) {
    $alert_message = 'Incorrect username and/or password';
    $alert_color = 'danger';
  }
}

$title = "Sign in";
require_once '../includes/header.php';
?>

  <p class="lead mb-4">You must be signed in to access the admin dashboard.</p>

  <div class="row">
    <div class="col-md-6">
      <?php if($alert_message): ?>
        <div class="alert alert-<?= $alert_color ?>"><?= $alert_message ?></div>
      <?php endif; ?>
        
      <form action="" method="POST">
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
      <br>
      <p class="small">
        
      </p>
    </div>
    <div class="col-md-6">
      <ul>To try the admin panel, use these credentials to connect:
        <li>username: <b>admin</b></li>
        <li>password: <b>1234</b></li>
      </ul>
    </div>
  </div>
<?php require '../includes/footer.php'; 
?>