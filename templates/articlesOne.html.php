<?php
$data = $this->get('articlesData');
?>
<div class="site-content">
  <div class="wrapper wrapper--site">
    <article class="site-article site-article--subpage">
      <div class="wrapper">
				<h2 class="site-title"><span><?php echo $data['title']; ?></span></h2>
				<div class="TXT">
					<?php echo $data['longcontent']; ?>
				</div>
			</div>
		</article>
	</div>
</div>
