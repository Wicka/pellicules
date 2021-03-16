<?php
    include ("conexio_bbdd.php");


    function get_pellicula_id($_id){
        //BUSCA REGISTRE PER ID $_id
        $conn =Connect_BBDD();

        //TAULA AMB LA QUE VULL TREBALLAR
        $taula = "pellicules";

        //CONSULTA TOTS REGISTRES
        $sql = "SELECT * FROM $taula WHERE id='$_id'";
        //EXCUTO LA QUERY I GUARDO A VARIABLE
        $registre = $conn->query($sql);

        $_registre=[];

        if ($registre->num_rows > 0) {

            while($fila = $registre->fetch_assoc()) {
                  array_push($_registre, $fila);
            }

        }else{
                  //NO HI HA VALORS A MOSTRAR
                  echo "<hr>No hi ha resultats...<hr>";
        }

        //TANCO CONEXIO AMB LA BBDD
        $conn->close();
        
        return $_registre;
    }
 ?>
