<?php require 'includes/header.html.php' ?>
<div class="container">
<div class="view-content">
<h2 class="form-signin-heading"><?php echo $this->get('pageTitle') ?></h2>
<table class="table table-striped dump">
<thead>
<th>
<i class="icon-chevron-down"></i> 
<strong>Hits</strong>
</th>
<th>
<strong>Redirect</strong>
</th>
<th>
<strong>Original Url</strong>
</th>
<th>
<strong>Created At</strong>
</th>
</thead>
<?php foreach($this->get('dump') as $record) { ?>
<tr>
<td>
num
</td>
<td>
<a href="<?php echo $record["shortUrl"] ?>"><?php echo $record["shortUrl"] ?></a>
</td>
<td>
<?php echo date('Y-M-d h:i:s', $record["time"]->sec) ?>
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
