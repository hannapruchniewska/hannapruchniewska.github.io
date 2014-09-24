<?php
$categories = $this->get('categoriesData');
$domain = $this->get('domain');
?>
<h2>Dodaj artykuł</h2>
<div class="row">
	<div class="col-md-10">
		<form action="<?php echo $domain; ?>/articles/insert" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" /><br />
			<div class='row'>
				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Tytuł artykułu</h3>
						</div>
						<div class="box-body pad">
							<div class="form-group">
								<input type="text" name="title" class="form-control" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Kategoria artykułu</h3>
						</div>
						<div class="box-body pad">
							<div class="form-group">
								<select name='category' class="form-control">
									<option value="0">Bez kategorii</option>
									<?php foreach($categories as $row){ ?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Treść zajawki</h3>
						</div>
						<div class="box-body pad">
							<div class="form-group">
								<textarea name="shortcontent" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
			  <div class='col-md-12'>
			    <div class='box box-primary'>
			      <div class='box-header'>
			        <h3 class='box-title'>Treść</h3>
			      </div>
			      <!-- /.box-header -->
			      <div class='box-body pad'>
			        <div class="form-group">
			          <textarea id="editor1" name="longcontent" rows="10" cols="80"></textarea>
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="col-md-12 text-right">
			  	<input type="submit" class="btn btn-primary" value="Zapisz" />
			  </div>
			</div>
		</form>
	</div>
</div>
