<?php $domain = $this->get('domain'); $row = $this->get('newsData'); ?>
<h2>Edytuj newsa: <small>"<?php echo $row['title']; ?>"</small></h2>

<form action="<?php echo $domain; ?>/news/update" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" /><br />
	<div class='row'>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Tytuł news'a</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $row['title']; ?>" class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Treść zajawki</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<textarea name="shortcontent" class="form-control"><?php echo $row['shortcontent']; ?></textarea>
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
	          <textarea id="editor1" name="longcontent" rows="10" cols="80">
	            <?php echo $row['longcontent']; ?>
	          </textarea>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-12 text-right">
	  	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
	  	<input type="submit" class="btn btn-primary" value="Zapisz" />
	  </div>
	</div>
</form>
