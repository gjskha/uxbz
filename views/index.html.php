<?php require 'includes/header.html.php' ?>


<div class="container">
<div class="view-content">
<h2><?php echo $this->get('pageTitle') ?></h2>
<p>
Welcome to <?php echo $this->htmlEncode($this->app->getConfig('siteName')) ?>, an url shortening service.
</p>
</div>
</div>
<?php require 'includes/footer.html.php' ?>
