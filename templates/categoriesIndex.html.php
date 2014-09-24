<?php
	$data = $this->get('categoriesData');
	if ($data != NULL){
		foreach($data as $row){ ?>
			<a href="?task=categories&action=one&id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a><br />
		<?php }
	}
	$data = $this->get('articlesData');
	if($data != NULL){ 
		foreach ($data as $row ){ ?>
			<a href="?task=articles&action=one&id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a><br />
	<?php }
	}
?>
