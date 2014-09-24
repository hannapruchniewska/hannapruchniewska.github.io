<div class="site-content">
  <div class="wrapper wrapper--site">
    <article class="site-article site-article--subpage">
      <div class="wrapper">
				<h2 class="site-title"><span>Aktualności</span></h2>
				<section class="widget news news--subpage">
					<?php foreach((array)$this->get('newsData') as $row){?>
						<div class="article">
							
								<div class="image"><a href="<?php echo $this->get('domain'); ?>/news/one/<?php echo $row['id'];?>"><img src="<?php echo $domain; ?>/images/news/thumbnails/<?php echo $row['image'];?>" alt="News photo"></a></div>
							
							<div class="content">
								<h4 class="title"><a href="<?php echo $this->get('domain'); ?>/news/one/<?php echo $row['id'];?>"><?php echo $row['title']; ?></a></h4>
		      			<div class="post-date"><p>Data publikacji: <span class="date"><?php echo $row['created']; ?></span></p></div>
								<div class="text">
									<p><?php echo $row['shortcontent']; ?></p>
									<div class="more"><a href="<?php echo $this->get('domain'); ?>/news/one/<?php echo $row['id'];?>">Czytaj dalej</a></div>
								</div>
							</div>
						</div>
					<?php } ?>
				</section>
			</div>
		</article>
	</div>
</div>