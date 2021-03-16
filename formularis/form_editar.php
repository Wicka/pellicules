<?php
		include ("../db/pellicules_get_data_edit.php");
?>

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


			<title>Editar Pellicula</title>
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
		<article >

				<h1>Introdueix les noves dades Pel-licula</h1>

			</article>



			<?php
						if(!isset($_GET['id'])){
							echo "HO HI HA RES ...NO ID .<hr>";

							header("Location: ../index.php");
							die();

						}else{
							$_pellicula=[];
							$_pellicula=get_pellicula_id($_GET['id']);

					}
			 ?>

			<form action='../db/editar.php' method='POST' enctype='multipart/form-data'>

							<input type="hidden" name="id" value='<?php echo $_pellicula[0]['id']; ?>'>

							<label for="titol">Titol Pel.lícula</label><br>
							<input type="text" name="titol" placeholder="titol" value='<?php echo $_pellicula[0]['titol']; ?>'><br>

							<label for="director">Director</label><br>
							<input type="text" name="director" placeholder="director"  value='<?php echo $_pellicula[0]['director']; ?>'><br>

							<label for="any">Any</label><br>
							<input type="number" name="any" placeholder="any"   value='<?php echo $_pellicula[0]['any']; ?>'><br>

							<label for="pais">País</label><br>
							<input type="text" name="pais" placeholder="pais"  value='<?php echo $_pellicula[0]['pais']; ?>' ><br>

							<label for="puntuacio">Puntuació</label><br>
							<input type="number" name="puntuacio" placeholder="puntuacio"  value='<?php echo $_pellicula[0]['puntuacio']; ?>'><br>

							<label for="observacions">Observacions</label><br>
							<input type="text" name="observacions" placeholder="observacions" value='<?php echo $_pellicula[0]['observacions']; ?>' ><br>

						<!--	<input type='hidden' name='MAX_FILE_SIZE' value='100000'> <br> -->
							<br><hr>
							<div class="fitxer">
										<div class="image_caratula_form" id="caratula_edit">
												<img  class='covers' src="../img/movie_covers/<?php
															//DESDE PHP MIRO SI EXISTE CARATULA PARA MOSTRARLA O EN SU DEFECTO MOSTRAR LA COMODIN
																	if(file_exists("../img/movie_covers/".$_pellicula[0]['id'])){
																			echo $_pellicula[0]['id'];
																	}else{
																		echo "0";
																	}

												?>.jpg" alt="Caratula de la pellicula">
										</div>
										<div class="image_caratula_form" id="caratula_text_button">
											<label>Si vols modificar la caratul.la Puja el teu fitxer d'un tamany no superior a 50 KB.
															<hr>
														 <div id="button_file">
														 		<input name='userfile' type='file'>
														 </div>
											</label>

										</div>
							</div>

							<input type='submit' value='Desar'><br>

				</form>

					</form>

	</section>


	<footer></footer>
</body>
</html>
