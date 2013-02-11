<?php require 'includes/header.html.php' ?>
<div class="container">
<div class="view-content">
<h2><?php echo $this->get('pageTitle') ?></h2>
<p>Your long URL <a href="<?php echo $this->get('longUrl') ?>"><?php echo $this->get('longUrl') ?></a>
is now reachable via <a href="http://<?php echo $this->app->getRootPath() . $this->get('shortUrl') . "\">http://" . $this->app->getRootPath() . $this->get('shortUrl') ?></a>
</p>
</div>
</div>
<?php require 'includes/footer.html.php' ?>
