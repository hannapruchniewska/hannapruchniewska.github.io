<?php
$askNotify = $this->get('askNotify');
$domain = $this->get('domain');
$categories = $this->get('categoriesData');
$articles = $this->get('articlesData');
?>
<form action="<?php echo $domain; ?>/main/insert" method="POST">
	<select name="source">
		<option value="categories">Kategorie</option>
		<option value="articles">Artykuły</option>
	</select>
	<select name="sourceid">
		<!-- zależnie od pierwszego selecta wykonaj tylko odpowiedni forach albo jakoś to rozpracuj -->
		<?php foreach ($categories as $cat){ ?>
			<option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
		<?php } ?>
		<?php foreach ($articles as $art){ ?>
			<option value="<?php echo $art['id']; ?>"><?php echo $art['title']; ?></option>
		<?php } ?>
	</select><br />
	Panel: <label><input type="radio" name="panel" value="left" />Lewy (główny)</label><label><input type="radio" name="panel" value="right" />Prawy (boczny)</label><br />
	<!-- te checkboxy tylko dla kategorii -->
	<label><input type="checkbox" name="showcontent" value="1" />Dołacz opis kategorii</label><br />
	<label><input type="checkbox" name="showlinks" value="1" />Dołacz linki do artykułów z tej kategorii</label><br />
	<input type="submit" value="dodaj" />
</form>
