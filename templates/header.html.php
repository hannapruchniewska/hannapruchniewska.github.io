<!doctype html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->get('siteTitle'); ?></title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="196x196" href="images/touch/chrome-touch-icon-196x196.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="<?php echo $this->get('domain'); ?>/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">


    <link rel="stylesheet" href="<?php echo $this->get('domain'); ?>/styles/animate.css">
    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- build:css styles/components/main.min.css -->
    <link rel="stylesheet" href="<?php echo $this->get('domain'); ?>/styles/h5bp.css">
    <link rel="stylesheet" href="<?php echo $this->get('domain'); ?>/styles/components/components.css">
    <link rel="stylesheet" href="<?php echo $this->get('domain'); ?>/styles/main.css">
    <!-- endbuild -->
  </head>
  <body>
    <div id="site">
      <?php
      	$menuData = $this->get('menuData');
        $breadcumbs = $this->get('breadcumbs');
        $domain = $this->get('domain');
        $infos = $this->get('infos');
        $url = $_SERVER['REQUEST_URI'];

        if ($domain != '/'){
          if($domain != "")
            $url = str_replace($domain.'/','',$url);
          else
            $url = ltrim ($url,'/');
        }
				if ($menuData != NULL){ ?>
					<nav class="menu--top">
				    <div class="wrapper">
              <div class="logo">
                <a href="/"><img src="<?php echo $this->get('domain'); ?>/images/logo.png" alt=""></a>
              </div>
				      <ul>
        				<?php
        					foreach($menuData as $key=>$element){
        						if (isset($element['name'])){ 
                      if($element['url'] == $url){ 
                      ?>
                        <li class="element-<?php echo $key; ?>"><a href="<?php echo $this->get('domain').'/'.$element['url']; ?>" class="active"><?php echo $element['name']; ?></a></li>
                      <?php
                      }else{ ?>
                        <li class="element-<?php echo $key; ?>"><a href="<?php echo $this->get('domain').'/'.$element['url']; ?>" ><?php echo $element['name']; ?></a></li>			
              				<?php
                      }
        						}
        					} 
        				?>
							</ul>
					  </div>
					</nav>
				<?php
				}
			?>


      <header class="site-header">
        <div class="site-header__content">
          <div class="wrapper">
            <div class="header-title">
              <h1><?php echo $infos['header']; ?></h1>
              <h2><?php echo $infos['subheader']; ?></h2>
            </div>
            <aside class="breadcrumbs">
              <ul>
              <?php
                if($url){
                  foreach($breadcumbs as $breadcumb){
              ?>
                <li><a href="<?php echo $breadcumb['url']; ?>"><?php echo $breadcumb['title']; ?></a></li>
              <?php
                  }
                }
              ?>
              </ul>
            </aside>
          </div>
        </div>
      </header>

<!-- <pre>
     <?php 
    print_r(get_defined_vars());
?>
</pre> -->