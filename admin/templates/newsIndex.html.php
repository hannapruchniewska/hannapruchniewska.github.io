<?php $domain = $this->get('domain'); ?>
<h2>Zarządzanie aktualnościami</h2>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo $domain; ?>/news/add" class="btn btn-primary btn-flat">Dodaj aktualność</a>
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
							<th>Tytuł</th>
							<th>Data</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach((array)$this->get('newsData') as $row){ ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><a href="<?php echo $domain; ?>/../news/one/<?php echo $row['id'];?>" ><?php echo $row['title']; ?></a></td>
								<td><?php echo $row['created']; ?></td>
								<td>
									<a href="<?php echo $domain; ?>/news/<?php if ($row['active'] == 1) echo 'hide' ; else echo 'unhide';?>/<?php echo $row['id']; ?>" class="btn btn-warning btn-flat"><?php if ($row['active']==1) echo 'Ukryj'; else echo 'Odkryj'; ?></a>
									<a href="<?php echo $domain; ?>/news/edit/<?php echo $row['id']; ?>" class="btn btn-success btn-flat">Edytuj</a>
									<a href="<?php echo $domain; ?>/news/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


