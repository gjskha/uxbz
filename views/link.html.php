<?php require 'includes/header.html.php' ?>
<h1><?php echo $this->get('pageTitle') ?></h1>
<p>Your long URL <a href="<?php echo $this->get('longUrl') ?>"><?php echo $this->get('longUrl') ?></a>
is now reachable via <a href="http://<?php echo $this->app->getRootPath() . $this->get('shortUrl') . "\">http://" . $this->app->getRootPath() . $this->get('shortUrl') ?></a>
</p>
<?php require 'includes/footer.html.php' ?>
