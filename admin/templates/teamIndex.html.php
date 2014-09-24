<?php $domain = $this->get('domain'); ?>
<h2>Moduł team</h2>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo $domain; ?>/team/add" class="btn btn-primary btn-flat">Dodaj osobę</a>
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
							<th>Zdjęcie</th>
							<th>Imię i nazwisko</th>
							<th>Opis</th>
							<th>Adres e-mail</th>
							<th>Numer telefonu</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach((array)$this->get('teamData') as $row){ ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><img src="../images/team/thumbnails/<?php echo $row['image']; ?>" alt=""></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['content']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['phone']; ?></td>
								<td>
									<a href="<?php echo $domain; ?>/team/edit/<?php echo $row['id']; ?>" class="btn btn-success btn-flat">Edytuj</a>
									<a href="<?php echo $domain; ?>/team/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
