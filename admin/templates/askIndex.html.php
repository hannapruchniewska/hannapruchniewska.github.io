<?php 
	$waiting = $this->get('waitingData');
	$domain = $this->get('domain');
	$answered = $this->get('answeredData');
	// $answered = $this->get('text');
?>
	<!-- <h2>Krótki opis</h2>
	<div class='row'>
		<form action="<?php echo $domain; ?>/ask/updateText" method="POST">
			<div class="col-md-10">
				<div class="box box-primary">
					<div class="box-body pad">
						<div class="form-group">
							<textarea name="text" placeholder="Przykładowa treść" class="form-control"><?php echo $row['text']; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div> -->

	<h2>Zadane pytania</h2>
	<?php if ($waiting != NULL){  ?>
		<div class='row'>
			<div class="col-md-10">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Oczekujące</h3>
					</div>
					<div class="box-body pad">
						<?php foreach ($waiting as $row){ ?>
							<p><strong>Nick:</strong> <?php echo $row['name'].'  - <i>'.$row['created'].'</i>'; ?></p>
							<p><strong>Pytanie: <i><?php echo $row['question']; ?></i></strong></p>
							<form action="<?php echo $domain; ?>/ask/answer" method="POST">
								<div class="form-group">
									<textarea name="answer" placeholder="Odpowiedź" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
									<input type="submit" class="btn btn-primary btn-flat" value="Odpowiedz" />
									<a href="<?php echo $domain; ?>/ask/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
								</div>
							</form>
							<hr>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<br>

	<?php if($answered != NULL){ ?>
		<div class='row'>
			<div class="col-md-10">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Zatwierdzone</h3>
					</div>
					<div class="box-body pad">
						<?php foreach ($answered as $row){ ?>
							<p><strong>Nick:</strong> <?php echo $row['name'].'  - <i>'.$row['created'].'</i>'; ?></p>
							<p><strong>Pytanie: <i><?php echo $row['question']; ?></i></strong></p>
							<form action="<?php echo $domain; ?>/ask/update" method="POST">
								<div class="form-group">
									<textarea name="answer" class="form-control"><?php echo $row['answer']; ?></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
									<input type="submit" class="btn btn-primary btn-flat" value="Zmień" />
									<a href="<?php echo $domain; ?>/ask/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
								</div>
							</form>
							<hr>
						<?php	} ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
