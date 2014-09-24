<section class="widget news news--main wow fadeIn" data-wow-offset="100">
  <h3 class="widget-title">Aktualności</h3>
  <div class="article">
    <div class="image"><a href=""><img src="<?php echo $domain; ?>/images/news/thumbnails/<?php echo $widget['image']; ?>" alt="News photo" /></a></div>
    <div class="content">
      <h4 class="title"><a href="<?php echo $widget['url']; ?>"><?php echo $widget['newsTitle']; ?></a></h4>
      <div class="post-date"><p>Data publikacji: <span class="date"><?php echo $widget['date']; ?></span></p></div>
      <div class="text">
        <p><?php echo $widget['content']; ?></p>
        <div class="more"><a href="<?php echo $widget['url']; ?>">czytaj więcej...</a></div>
      </div>
    </div>
  </div>
  <div class="show-all"><a href="news/">Zobacz wszystkie wpisy</a></div>
</section>