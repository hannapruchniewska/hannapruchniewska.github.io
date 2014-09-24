<?php
$menuData = $this->get('menuData'); 
$domain = $this->get('domain');
?>

<div class="row">
  <div class="col-md-10">
    <!-- Navy tile -->
    <div class="box box-solid">
      <div class="box-header">
        <h3 class="box-title">Ustawienia podstron</h3>
      </div>
      <div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nazwa wyświetlana</th>
							<th>Przesuń</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($menuData as $row){ ?>
							<tr>
								<form action="<?php echo $domain; ?>/menu/update" method="POST" role="form">
									<td>
											<div class="form-group">
												<input type="hidden" value="<?php echo $row['id'];?>" name="id"/>
												<input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" />
											</div>
									</td>
									<td>
											<div class="form-group">
												<a href="<?php echo $domain; ?>/menu/move/<?php echo $row['position']; ?>/up" class="btn btn-primary btn-flat"> 
													Do góry
												</a>
												<a href="<?php echo $domain; ?>/menu/move/<?php echo $row['position']; ?>/down" class="btn btn-primary btn-flat">
													W dół
												</a>
											</div>
									</td>
									<td>
										<div class="form-group">
											<a href="<?php echo $domain; ?>/menu/<?php if($row['active'] == 1) echo 'hide'; else echo 'unhide'; ?>/<?php echo $row['id']; ?>" class="btn btn-warning btn-flat">
											<?php if ($row['active'] == 1) echo 'Ukryj'; else echo 'Odkryj'; ?></a>
											<?php if($row['protected'] == 0){ ?>
												<a href="<?php echo $domain; ?>/menu/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-flat">Usuń</a>
											<?php } ?>
											<input type="submit" value="Zapisz" class="btn btn-success btn-flat" />
										</div>
									</td>
								</form>
							</tr>
						<?php } ?>
					</tbody>
				</table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div>
