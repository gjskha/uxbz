<?php require 'includes/header.html.php' ?>
<div class="container">
      <form class="form-signin" action="index.php?q=link" method="POST">
        <h2 class="form-signin-heading"><?php echo $this->get('pageTitle') ?></h2>
        <input type="text" class="input-block-level" name="longUrl" placeholder="Long URL Here">
        <button class="btn btn-large btn-primary" type="submit">Create</button>
      </form>

    </div> <!-- /container -->
<?php require 'includes/footer.html.php' ?>
