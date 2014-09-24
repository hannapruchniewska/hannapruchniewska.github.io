<?php
	$info = $this->get('contactData');
	$domain = $this->get('domain');
?>
	<div class='row'>
		<div class="col-md-10">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Dane kontaktowe</h3>
				</div>
				<div class="box-body pad">
					<form action="<?php echo $domain; ?>/contact/update" method="POST">
						<div class="row">

							<!-- <div class="col-md-6">
								<div class="form-group">
		              <label>Adres e-mail</label>
		              <input type="email" value="<?php echo $info['email']; ?>" name="email" class="form-control" placeholder="Enter ...">
		            </div>
		          </div>
		          <div class="col-md-6">
								<div class="form-group">
		              <label>Numer telefonu</label>
		              <input type="text" value="<?php echo $info['phone']; ?>" name="phone" class="form-control" placeholder="Enter ...">
		            </div>
		          </div> -->
							<div class="col-md-12">
								<div class="form-group">
									<label>Krótka treść o kontakcie na stronie</label>
									<textarea id="editor1" class="form-control" name="content"><?php echo $info['content']; ?></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Zapisz" class="btn btn-primary btn-flat" />
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
