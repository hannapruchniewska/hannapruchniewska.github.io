<div class="site-content">
  <div class="wrapper wrapper--site">
    <article class="site-article site-article--subpage">
      <div class="wrapper">
				<h2 class="site-title"><span>Moja drużyna</span></h2>
				<section class="widget team">
          <div class="team__persons">
          	<?php foreach((array)$this->get('teamData') as $row){?>
            <div class="person">
              <div class="person__image"><img src="<?php echo $domain; ?>/images/team/fullsize/<?php echo $row['image'];?>" alt="<?php echo $row['name']; ?>"></div>
              <div class="person__text">
                <div class="person__name">
                  <p><?php echo $row['name']; ?></p>
                </div>
                <div class="person__description">
                  <?php echo $row['content']; ?>
                </div>
                <div class="person__contact">
                  <a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a>
                  <p><?php echo $row['phone']; ?></p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </section>
			</div>
		</article>
	</div>
</div>