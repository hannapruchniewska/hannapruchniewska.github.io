<div class="site-content">
  <article class="site-article site-article--subpage">
    <div class="wrapper">
			<h2 class="site-title"><span>Zadaj mi pytanie</span></h2>
      <section class="TXT">
        <p>
          Wychodząc z założenia, że bezproblemowa komunikacja oraz kontakt międzyludzki jest głównym sposobem rozwiązywania problemów zachęcam bardzo do zadawania mi pytań.
        </p>
        </section>
    </div>
    <section class="questions">
      <div class="wrapper">
        <form action="<?php echo $this->get('domain'); ?>/ask/insert" id="question" class="questions__form question" method="POST">
          <fieldset>
            <label for="question__text" class="question__label">Wpisz treść zapytania</label>
            <textarea name="question" id="question" class="question__text" placeholder="Wpisz treść zapytania..."></textarea>
          </fieldset>
          <fieldset class="g--half">
            <input type="text" name="name" class="question__nick" placeholder="Anonimowe">
            <label for="nick">Przedstaw się</label>
          </fieldset>
          <fieldset class="g--half g--last">
            <input type="submit" value="Zapytaj">
          </fieldset>
        </form>
      </div>
      <div id="answers">
        <div class="wrapper">
          <p class="answers__title">Odpowiedzi</p>
          <?php 
  					$data = $this->get('askData');
  					if ($data != NULL){
  						foreach($this->get('askData') as $row){ ?>
  	            <div class="answer">
  	              <div class="answer__question">
  	                <p class="question__text"><?php echo $row['question']; ?></p>
  	                <p class="question__date"><?php echo $row['name'].' ('.$row['created'].')'; ?></span>
  	              </div>
  	              <div class="answer__answer">
  	                <p class="answer__text"><?php echo $row['answer']; ?></p>
  	               <p class="answer__date"><?php echo $row['answered']; ?></p>
                  </div>
  	            </div>
  	          <?php }
  					} 
  				?>
        </div>
      </div>
    </section>
  </article>
</div>
