<?php $domain = $this->get('domain'); ?>

<h2>Zarządzanie kategoriami</h2>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo $domain; ?>/categories/add" class="btn btn-primary btn-flat">Dodaj kategorię</a>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-10">
		<div class="box box-primary">
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nazwa</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach((array)$this->get('categoriesData') as $row){ ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><a href="<?php echo $domain; ?>/../categories/one/<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></td>
								<td>
									<a href="<?php echo $domain; ?>/menu/insert/categorie/<?php echo $row['id']; ?>" class="btn btn-primary btn-flat">Dołącz do menu</a>
									<a href="<?php echo $domain; ?>/menu/insert/categorie/<?php echo $row['id']; ?>/1" class="btn btn-primary btn-flat">Dołącz do submenu</a>
									<a href="<?php echo $domain; ?>/categories/edit/<?php echo $row['id']; ?>" class="btn btn-success btn-flat">Edytuj</a>
									<a href="<?php echo $domain; ?>/categories/delete/<?php echo $row['id']; ?>/1" class="btn btn-danger btn-flat">Usuń 1</a>
									<a href="<?php echo $domain; ?>/categories/delete/<?php echo $row['id']; ?>/2" class="btn btn-danger btn-flat">Usuń 2</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
