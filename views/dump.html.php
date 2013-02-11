<?php require 'includes/header.html.php' ?>
<div class="container">
<div class="view-content">
<h2 class="form-signin-heading"><?php echo $this->get('pageTitle') ?></h2>
<table class="dump">
<tr>
<td>
<strong>Redirect</strong>
</td>
<td>
<strong>Original Url</strong>
</td>
<tr>
<?php foreach($this->get('dump') as $record) { ?>
<tr>
<td>
<a href="<?php echo $record["shortUrl"] ?>"><?php echo $record["shortUrl"] ?></a>
</td>
<td>
<?php echo $record["longUrl"] ?>
</td>
</tr>      
<?php } ?>
</table>
</div>
</div>
<?php require 'includes/footer.html.php' ?>
