<?php $domain = $this->get('domain'); ?>
<h2>Dodaj newsa</h2>

<form action="<?php echo $domain; ?>/news/insert" method="POST" enctype="multipart/form-data">
	<input type="file" name="image" /><br />
	<div class='row'>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Tytuł nowego news'a</h3>
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
					<h3 class="box-title">Treść zajawki</h3>
				</div>
				<div class="box-body pad">
					<div class="form-group">
						<textarea name="shortcontent" class="form-control" maxlength="170"></textarea>
					</div>
				</div>
			</div>
		</div>
	  <div class='col-md-12'>
	    <div class='box box-primary'>
	      <div class='box-header'>
	        <h3 class='box-title'>Treść nowego news'a</h3>
	      </div>
	      <!-- /.box-header -->
	      <div class='box-body pad'>
	        <form>
	          <textarea id="editor1" name="longcontent" rows="10" cols="80">
	            Podaj treść artykułu
	          </textarea>
	        </form>
	      </div>
	    </div>
	  </div>
	  <div class="col-md-12 text-right">
	  	<input type="submit" class="btn btn-primary" value="dodaj" />
	  </div>
	</div>
</form>
