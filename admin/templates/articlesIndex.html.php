<?php
$articles = $this->get('articlesData');
$categories = $this->get('categoriesData');
$domain = $this->get('domain');
?>
<h2>Artykuły</h2>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo $domain; ?>/articles/add" class="btn btn-primary btn-flat">Dodaj artykuł</a>
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
						<?php foreach ((array)$categories as $cat){ ?>
							<tr>
								<td colspan="3" style="padding: 3px 10px;"><strong><?php echo $cat['name']; ?></strong></td>
							</tr>
							<?php foreach((array)$articles as $art){ ?>
								<?php if ($art['category'] == $cat['id']){ ?>
								<tr>
									<td><?php echo $art['id']; ?></td>
									<td><a href="<?php echo $domain; ?>/../articles/one/<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a></td>
									<td>
										<a href="<?php echo $domain; ?>/menu/insert/article/<?php echo $art['id']; ?>" class="btn btn-primary btn-flat">Dołącz do menu</a>
										<a href="<?php echo $domain; ?>/articles/edit/<?php echo $art['id']; ?>" class="btn btn-success btn-flat">Edytuj</a>
										<a href="<?php echo $domain; ?>/articles/delete/<?php echo $art['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
									</td>
								</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						<tr>
							<td colspan="3" style="padding: 0 10px;"><strong>Bez kategorii</strong></td>
						</tr>
						<?php foreach((array)$articles as $art){ ?>
							<?php if ($art['category'] == 0){ ?>
							<tr>
								<td><?php echo $art['id']; ?></td>
								<td><a href="<?php echo $domain; ?>/../articles/one/<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a></td>
								<td>
									<a href="<?php echo $domain; ?>/menu/insert/article/<?php echo $art['id']; ?>" class="btn btn-primary btn-flat">Dołącz do menu</a>
									<a href="<?php echo $domain; ?>/articles/edit/<?php echo $art['id']; ?>" class="btn btn-success btn-flat">Edytuj</a>
									<a href="<?php echo $domain; ?>/articles/delete/<?php echo $art['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
								</td>
							</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>