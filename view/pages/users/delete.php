<div class="container">
	<form action="#" method="post">
		<p>Etes-vous sûre de vouloir supprimer le user :</p>
		<p style="color:red"><?= $p ?></p>
		<input type="radio" name="choix" value="oui">
		<label for="oui">Oui</label>
		<input type="radio" name="choix" value="non">
		<label for="non">Non</label>
		<input type="submit" value="Je suis sûr(e)">
	</form>

</div>