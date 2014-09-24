<?php $row = $this->get('categoriesData');
$domain = $this->get('domain');
 ?>
	<div class='row'>
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Dodaj kategorię</h3>
				</div>
				<div class="box-body pad">
					<form action="<?php echo $domain; ?>/categories/update" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" placeholder="nazwa" value="<?php echo $row['name']; ?>" class="form-control" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea id="editor1" name="content" placeholder="Opis kaegorii"><?php echo $row['content']; ?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
									<input type="submit" value="Zapisz" class="btn btn-primary btn-flat" />
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

