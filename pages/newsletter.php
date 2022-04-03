<?php
$title = "Subscribe to our newsletter";
require '../includes/header.php';

?>

  <p class="lead">Please fill in the form below to register to our newsletter and be informed each time we publish a new post.</p>
  <div class="row mt-5">
    <div class="col-md-6  mb-5">
      <?= newsletter_submit(); ?>
      <form action="newsletter.php" method="POST">
        <div class="form-group">
          <label for="firstname"><b>Firstname</b></label>
          <input type="text" class="form-control" name="firstname" placeholder="John">
        </div>
        <div class="form-group">
          <label for="email"><b>Email address</b></label>
          <input type="email" class="form-control" name="email" placeholder="johndoe@gmail.com">
          <small id="emailInfo" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary">Subscribe</button>
      </form>
    </div>
  </div>

<?php require '../includes/footer.php'; ?>