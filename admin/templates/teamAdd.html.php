<?php $domain = $this->get('domain'); ?>
<h2>Dodaj osobę</h2>

<form action="<?php echo $domain; ?>/team/insert" method="POST" enctype="multipart/form-data">
	
	<div class='row'>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Dane osobowe</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<label for="title">Zdjęcie prezentacyjne</label>
						<input type="file" name="image" class="form-control" />
					</div>
					<div class="form-group">
						<label for="title">Imię i nazwisko</label>
						<input type="text" name="name" class="form-control" />
					</div>
					<div class="form-group">
						<label for="email">Adres e-mail</label>
						<input type="email" name="email" class="form-control" />
					</div>
					<div class="form-group">
						<label for="title">Numer telefonu</label>
						<input type="text" name="phone" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Opis danej osoby</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<textarea name="content" class="ckeditor"></textarea>
					</div>
				</div>
			</div>
		</div>
	  <div class="col-md-12">
	  	<input type="submit" class="btn btn-primary" value="Dodaj tę osobę" />
	  </div>
	</div>
</form>
