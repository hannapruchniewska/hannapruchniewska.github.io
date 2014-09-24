<?php
	$info = $this->get('mainData');
  $infos = $this->get('infos');
?>

<div class="overlay-banner">
  <div class="wrapper">
    <div class="image">
      <img src="<?php echo $domain; ?>/images/hanna.jpg" alt="">
      <div id="status">
        <img src="<?php echo $domain; ?>/images/loader.svg" alt="">
      </div>
      <!-- <div class="close"><i class="fa fa-times"></i></div> -->
    </div>
  </div>
</div>

<div class="site-content">
  <div class="wrapper wrapper--site">
    <aside class="submenu">
      <div class="wrapper">
        <section>
          <h3 class="subtitle">W kilku słowach</h3>
          <div class="submenu__avatar">
            <img src="images/avatar.jpg" alt="Hanna Pruchniewska">
          </div>
          <div class="submenu__description">
            <?php echo $infos['shortContent']; ?>
            <div class="more"><a href="/">czytaj więcej...</a></div>
          </div>
        </section>
        <section>
          <h3 class="subtitle">Moja działalność</h3>
          <a href="<?php echo $domain; ?>/articles/one/1" class="item wow flipInX"><div>Nauczyciel geografii w puckim LO</div></a>
          <a href="<?php echo $domain; ?>/articles/one/2" class="item wow flipInX"><div>Przewodnicząca Rady Miasta Pucka</div></a>
          <a href="<?php echo $domain; ?>/articles/one/3" class="item wow flipInX"><div>Biuro turystyczne "Kwak"</div></a>
        </section>
      </div>
    </aside>
    <article class="site-article">
      <div class="wrapper">
        <h2 class="site-title"><span>Strona główna</span></h2>
        <section class="TXT">
          <?php echo $infos['mainContent']; ?>
        </section>
        <?php
          foreach($info['left'] as $widget)
            if($widget['content'])
              include("widgets/".$widget['source'].".html.php");
        ?>
      </div>
    </article>
  </div>
 
  <section class="contact">
    <video autoplay loop id="bgvid">
      <source src="images/contact.webm" type="video/webm">
      <source src="images/contact.mp4" type="video/mp4">
    </video>
    <div class="overlay">
      <div class="wrapper">
        <div class="section-title"><h2>Kontakt</h2></div>
        <div class="icons">
          <p class="icon mail"><i class="fa fa-envelope-o"></i><span><?php echo $infos['email']; ?></span></p>
          <p class="icon phone"><i class="fa fa-phone"></i><span><?php echo $infos['phone']; ?></span></p>
        </div>
        <form action="<?php echo $domain; ?>/contact/send" id="form--contact" method="POST" novalidate>
          <div class="contact__inputs">
            <fieldset>
              <input type="text" name="name" placeholder="Imię i nazwisko">
            </fieldset>
            <fieldset>
              <input type="email" name="email" placeholder="Adres e-mail">
            </fieldset>
          </div>
          <div class="contact__text">
            <fieldset>
              <textarea name="message" id="message" placeholder="Treść wiadomości"></textarea>
            </fieldset>
          </div>
          <div class="submit">
            <fieldset>
              <input type="submit" value="Wyślij">
            </fieldset>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>