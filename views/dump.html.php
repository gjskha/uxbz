<?php require 'includes/header.html.php' ?>
<div class="container">
<div class="view-content">
<h2 class="form-signin-heading"><?php echo $this->get('pageTitle') ?></h2>
<table class="table table-striped dump">
<thead>
<th>
<strong>Redirect</strong>
</th>
<th>
<strong>Original Url</strong>
</th>
</thead>
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
<?php $pages = $this->get('pages'); ?>
<?php if ($pages['prevPage'] > 0 ) { ?>
<a href="?pg=
<?php echo $pages['prevPage'] ?>
">&larr;</a>
<?php } ?>
page 
<?php echo $pages['wantedPage'] . " of " . $pages['totalPages']; ?>

<?php if ($pages['nextPage'] < $pages['totalPages'] ) { ?>
<a href="?pg=
<?php echo $pages['nextPage'] ?>
">&rarr;</a>
<?php } ?>

</div>
</div>
<?php require 'includes/footer.html.php' ?>
