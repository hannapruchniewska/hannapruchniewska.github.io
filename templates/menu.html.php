<?php
$menuData = $this->get('menuData');
if ($menuData != NULL){ ?>
	<nav class="menu--top">
    <div class="wrapper">
      <ul>
<?php
	foreach($menuData as $key=>$element){
		if (isset($element['name'])){ ?>
			<li class="element-<?php echo $key; ?>"><a href="<?php echo $element['url']; ?>" class="active"><?php echo $element['name']; ?></a></li>
		<?php 
		}
	} 
	?>
			</ul>
	  </div>
	</nav>
<?php
}
?>

<?php foreach($menuData['categories'] as $cat){ ?>
	<a href="<?php echo $cat['url']; ?>"><?php echo $cat['name']; ?></a><br />
<?php } ?>