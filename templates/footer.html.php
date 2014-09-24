			<footer class="site-footer">
        <div class="wrapper">

          <?php
		      	$menuData = $this->get('menuData');
						if ($menuData != NULL){ ?>
							<nav class="menu--bottom">
						    <ul>
						<?php
							foreach($menuData as $key=>$element){
								if (isset($element['name'])){ ?>
									<li class="element-<?php echo $key; ?>"><a href="<?php echo $this->get('domain').'/'.$element['url']; ?>" class="active"><?php echo $element['name']; ?></a></li>
								<?php 
								}
							} 
							?>
								</ul>
							</nav>
						<?php
						}
					?>

          <div class="copyright">
            <p>Copyright 2014 - Hanna Pruchniewska</p>
            <!-- <a href="mailto:">hannapruchniewska@gmail.com</a> -->
            <p>All Rights Reserved.</p>
          </div>
        </div>
      </footer>
    </div>
    <script src="scripts//vendor/jquery/jquery-1.11.1.min.js"></script>
    <script data-main="scripts/main" src="scripts/vendor/requirejs/require.js"></script>
    <script>
    	$(window).load(function(){
	      $('.overlay-banner').delay(1500).fadeOut('500');
	      $('.overlay-banner .image').delay(1000).addClass('closed');
	    });
    </script>
    <!-- build:js scripts/main.min.js -->
    <!-- <script src="scripts/main.js"></script> -->
    <!-- endbuild -->
  </body>
</html>
