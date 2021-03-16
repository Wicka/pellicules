
﻿<!doctype html>
<html lang="es">
		<head>

			<meta charset="utf-8"/>
			<meta name="description" content="Exercici proves BBDD SQL">
			<meta name="keywords" content="BBDD, SQL">
			<meta name="author" content="Ester Mesa">

			<!-- Enllaç a l'arxiu CSS Extern -->
			<link rel="stylesheet" href="../css/style.css" type="text/css"/>


			<!-- google font -->
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">


			<title>Nova Pellicula</title>
</head>
<body>
	<header>

		<div id="header">
					<ul class="nav">
							<li><a href="../index.php">Inici</a></li>
							<li><a href="form_altas.php">Altes</a></li>
							<li><a href="">Ya vere</a></li>
						</ul>
			</div>
			<br><br>

	</header>
	<section>

			<article>
							<h2>Nova Pel-licula</h2>
			</article>
	</section>

	<section>
		<article >

				<h1>Introdueix dades nova Pel-licula</h1>

			</article>

			<form action='../db/altas.php' method='POST' enctype='multipart/form-data'>

							<br>
							<label for="titol">Titol Pel.lícula</label><br>
							<input type="text" name="titol" placeholder="titol" ><br>

							<label for="director">Director</label><br>
							<input type="text" name="director" placeholder="director" ><br>

							<label for="any">Any</label><br>
							<input type="number" name="any" placeholder="any"  ><br>

							<label for="pais">País</label><br>
							<input type="text" name="pais" placeholder="pais" ><br>

							<label for="puntuacio">Puntuació</label><br>
							<input type="number" name="puntuacio" placeholder="puntuacio" ><br>

							<label for="observacions">Observacions</label><br>
							<input type="text" name="observacions" placeholder="observacions" ><br>

						<!--	<input type='hidden' name='MAX_FILE_SIZE' value='100000'> <br> -->
							<div class="fitxer">
								<br>
								<label>Si vols pujar una caratul.la Puja el teu fitxer d'un tamany no superior a 50 KB.
											<br><br> <input name='userfile' type='file'> <br><br>
								</label>

							</div>

							<input type='submit' value='Desar'><br>

				</form>

					</form>

	</section>


	<footer></footer>
</body>
</html>
