<?php
	$info = $this->get('contactData');
  $infos = $this->get('infos');
	$domain = $this->get('domain');
?>

<div class="site-content">
  <div class="wrapper wrapper--site">
    <article class="site-article site-article--subpage">
      <div class="wrapper">
				<h2 class="site-title"><span>Kontakt</span></h2>
				<div class="TXT">
					<p><?php echo $info['content']; ?></p>
				</div>
				<section class="contact contact--site wow fadeIn" data-wow-offset="100">
          <div class="overlay">
            <div class="wrapper">
              <div class="section-title"><h2>Formularz kontaktowy</h2></div>
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
		</article>
	</div>
</div>
