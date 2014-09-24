<?php
$askNotify = $this->get('askNotify');
$domain = $this->get('domain');
$categories = $this->get('categoriesData');
$articles = $this->get('articlesData');
$mainData = $this->get('mainData');
$mainConfigData = $this->get('mainConfigData');
?>

<h2>Konfiguracja</h2>
<form action="<?php echo $domain; ?>/main/updateInfo" method="POST">
	<div class='row'>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Nagłówek pierwszy</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<input type="text" name="header" value="<?php echo $mainConfigData['header']; ?>" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Nagłówek drugi</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<input type="text" name="subheader" value="<?php echo $mainConfigData['subheader']; ?>" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Adres e-mail</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<input type="email" name="email" value="<?php echo $mainConfigData['email']; ?>" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Numer telefonu</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<input type="text" name="phone" value="<?php echo $mainConfigData['phone']; ?>" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Treść główna na stronie startowej</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<textarea name="content" id="editor1"><?php echo $mainConfigData['content']; ?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Treść "w kilku słowach"</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<textarea name="shortContent" class="ckeditor" id="editor2"><?php echo $mainConfigData['shortContent']; ?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
			<input type="submit" value="zapisz" class="btn btn-success btn-flat"/>
		</div>
		</div>
	</div>
</form>


<h2>Zarządzanie widgetami na stronie głównej</h2>
<div class='row'>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Lewy panel</h3>
			</div>
			<div class="box-body pad">
				<table class="table table-hover">
					<tbody>
						<?php foreach((array)$mainData['left'] as $row){ ?>
							<tr>
								<form action="<?php echo $domain; ?>/main/update" method="POST">
									<td>
										<div class="form-group">
											<input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" />
											<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
										</div>
									</td>
									<td>
										<div class="form-group">
											<a href="<?php echo $domain; ?>/main/move/<?php echo $row['id']; ?>/up" class="btn btn-primary btn-flat">Do góry</a>
											<a href="<?php echo $domain; ?>/main/move/<?php echo $row['id']; ?>/down" class="btn btn-primary btn-flat">W dół</a>
											<a href="<?php echo $domain; ?>/main/changePanel/<?php echo $row['id']; ?>" class="btn btn-primary btn-flat">Na prawo</a>
											<a href="<?php echo $domain; ?>/main/<?php if ($row['active'] == 1) echo 'hide'; else echo 'unhide'; ?>/<?php echo $row['id']; ?>" class="btn btn-warning btn-flat"><?php if ($row['active'] == 1) echo 'Ukryj'; else echo 'Odkryj'; ?></a>
											<a href="<?php echo $domain; ?>/main/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
										</div>
									</td>
									<td>
										<?php if ($row['source'] == 'categories'){ ?>
											<div class="form-group">
												<label>Treść</label><input type="checkbox" name="showcontent" value="1" <?php if($row['showcontent'] == 1) echo 'checked'; ?> />
												<label>Linki</label><input type="checkbox" name="showlinks" value="1" <?php if($row['showlinks'] == 1) echo 'checked'; ?> />
											</div>
										<?php } ?>
									</td>
									<td>
										<div class="form-group">
											<input type="submit" value="zapisz" class="btn btn-success btn-flat"/>
										</div>
									</td>
								</form>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Prawy panel</h3>
			</div>
			<div class="box-body pad">
				<table class="table table-hover">
					<tbody>
						<?php foreach((array)$mainData['right'] as $row){ ?>
							<tr>
								<form action="<?php echo $domain; ?>/main/update" method="POST">
									<td>
										<div class="form-group">
											<input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" />
											<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
										</div>
									</td>
									<td>
										<div class="form-group">
											<a href="<?php echo $domain; ?>/main/move/<?php echo $row['id']; ?>/up" class="btn btn-primary btn-flat">Do góry</a>
											<a href="<?php echo $domain; ?>/main/move/<?php echo $row['id']; ?>/down" class="btn btn-primary btn-flat">W dół</a>
											<a href="<?php echo $domain; ?>/main/changePanel/<?php echo $row['id']; ?>" class="btn btn-primary btn-flat">Na lewo</a>
											<a href="<?php echo $domain; ?>/main/<?php if ($row['active'] == 1) echo 'hide'; else echo 'unhide'; ?>/<?php echo $row['id']; ?>" class="btn btn-warning btn-flat"><?php if ($row['active'] == 1) echo 'Ukryj'; else echo 'Odkryj'; ?></a>
											<a href="<?php echo $domain; ?>/main/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
										</div>
									</td>
									<td>
										<?php if ($row['source'] == 'categories'){ ?>
											<div class="form-group">
												<label>Treść</label>
												<input type="checkbox" name="showcontent" value="1" <?php if($row['showcontent'] == 1) echo 'checked'; ?> />
												<label>Linki</label>
												<input type="checkbox" name="showlinks" value="1" <?php if($row['showlinks'] == 1) echo 'checked'; ?> />
											</div>
										<?php } ?>
									</td>
									<td>
										<input type="submit" value="zapisz" class="btn btn-success btn-flat"/>
									</td>
								</form>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
