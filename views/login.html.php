<?php require 'includes/header.html.php' ?>

<p>
 <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading"><?php echo $this->get('pageTitle') ?></h2>
        <input type="text" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
</p>

<?php require 'includes/footer.html.php' ?>
