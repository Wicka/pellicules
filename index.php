<?php

	include ("db/pellicules_list.php");

 ?>
﻿<!doctype html>
<html lang="es">
		<head>

			<meta charset="utf-8"/>
			<meta name="description" content="Exercici proves BBDD SQL">
			<meta name="keywords" content="BBDD, SQL">
			<meta name="author" content="Ester Mesa">

			<!-- Enllaç a l'arxiu CSS Extern -->
			<link rel="stylesheet" href="css/style.css" type="text/css"/>


			<!-- google font -->
			<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">


			<title>kine</title>
</head>
<body>
	<header>

		<div id="header">
					<ul class="nav">
							<li><a href="index.php">Inici</a></li>
							<li><a href="formularis/form_altas.php">Altes</a></li>
							<li><a href="">Ya vere</a></li>
						</ul>
			</div>
			<br><br>

	</header>

	<section>

			<article id ="titulo_pagina">
							<h1>kine</h1>

			</article>

	</section>

	<section>
		<article >
			<?php

					//ARRAY [IMPRESSIO TAULA AL FLEXBOX, REGISTRE ACTUAL, TOTAL REGISTRES, LIMIT]
					 $totes_dades=Imprimir_dades();

					 	//[1] COMPTADOR DEL REGISTRE ACTUAL
						$registre_actual= $totes_dades[1];
						//[2] NUM DEL TOTAL REGISTRES DE LA TAULA
						$num_total_registres =$totes_dades[2]-1;
						//[3] LIMIT QUE INDICO DE REGISTRES PER PAGINA A MOSTRAR
						$num_limit=$totes_dades[3];

						//VALOR PER INCREMENTAR O DECREMENTAR ELS NUMEROS A VEURE PER PAGINATS
						//LES DADES QUE PASO PER EL LINK AMB GETS
						$registre_anterior=$registre_actual-$num_limit;
						$registre_seguent=$registre_actual+$num_limit;

						if ($registre_actual < 0){

								$registre_anterior=0;
						}

						if ($registre_actual > $num_total_registres){

								$registre_seguent = $num_total_registres;
						}

						//MENU PER PASAR PAGINES I FER CRUD
							echo "<p>Mostrant registres del ".$registre_actual." al ".$registre_seguent." de un Total de ".$num_total_registres.".</p>";
							echo "<div class='nav_buttons'><a class ='link_paginacio' href='?num_registre=".$registre_anterior."&limit=".$num_limit."'>Pàgina Anterior</a></div>";
							echo	"<div class='nav_buttons'><a class ='link_paginacio' href='?num_registre=".$registre_seguent."&limit=".$num_limit."'>Pàgina Següent</a></div><br><br><hr>";
					//		echo	"<div class='nav_buttons'><a href='formularis/form_altas.php'>Nueva Entrada</a></div><br><br><hr>";
		 		?>
			</article>

	</section>

	<section>

			<div class="contenedor">

				<?php
						//[0] STRINT AMB LES DADES PER IMPRESSIO AL FLEXBOX
						echo Imprimir_dades()[0];
				 ?>


			</div>
	</section>
	<footer></footer>
</body>
</html>
