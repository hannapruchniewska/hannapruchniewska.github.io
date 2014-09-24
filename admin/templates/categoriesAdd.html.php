<?php $domain = $this->get('domain'); ?>
	<div class='row'>
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Dodaj kategorię</h3>
				</div>
				<div class="box-body pad">
					<form action="<?php echo $domain; ?>/categories/insert" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" name="name" placeholder="nazwa" class="form-control" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea id="editor1" name="content" placeholder="Opis kaegorii"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Dodaj" class="btn btn-primary btn-flat" />
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

