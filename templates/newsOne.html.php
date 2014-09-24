<?php $row = $this->get('newsData');
if ($row['active']==1){ ?>
<div class="site-content">
  <div class="wrapper wrapper--site">
    <article class="site-article site-article--subpage">
      <div class="wrapper">
				<h2 class="site-title"><span><?php echo $row['title']; ?></span></h2>
				<p class="post-date">Utworzono: <?php echo $row['created']; ?></p>
				<div class="TXT">
					<?php echo $row['longcontent']; ?>
				</div>
				<a href="<?php echo $this->get('domain'); ?>/news" class="back">Wróć</a>
			</div>
		</article>
	</div>
</div>
<?php } ?>
