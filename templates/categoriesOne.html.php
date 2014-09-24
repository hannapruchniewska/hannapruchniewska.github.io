<?php
	$data = $this->get('categoriesData'); 
?>
<div class="site-content">
  <div class="wrapper wrapper--site">
    <article class="site-article site-article--subpage">
      <div class="wrapper">
				<h2 class="site-title"><span><?php echo $data['name']; ?></span></h2>
					<?php
						$data2 = $this->get('articlesData');
						if($data2 != NULL){ ?>
							<nav class="subsites">
								<p>Podzagadnienia:</p>
								<?php foreach($data2 as $row){ ?>
									<a href="/articles/one/<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
									<?php echo $row['shortcontent']; ?> 
								<?php } ?>
							</nav>
						<?php } ?>
				<div class="TXT">
					<?php echo $data['content']; ?>
				</div>
			</div>
		</article>
	</div>
</div>