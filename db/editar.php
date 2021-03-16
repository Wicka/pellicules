<?php

    include ("conexio_bbdd.php");



  $conn =Connect_BBDD();
  //TAULA AMB LA QUE VULL TREBALLAR
  $taula = "pellicules";

  if($_POST!=null){
      //HI HA POST
      if($_POST["id"]==null or $_POST["titol"]==null or $_POST["director"]==null or $_POST["any"]==null
      or $_POST["pais"]==null or $_POST["puntuacio"]==null  or $_POST["observacions"]==null ){

            //DADES EN BLANC
            echo "DADES EN BLANC .<hr>";

      }else{

            //GENERO CONSULTA INSERT SQL

            $_sql_Update ="UPDATE $taula
                  SET titol='$_POST[titol]',
                  director='$_POST[director]',
                  any='$_POST[any]',
                  pais='$_POST[pais]',
                  ultima_actualizacion= CURRENT_TIMESTAMP ,
                  puntuacio='$_POST[puntuacio]',
                  observacions='$_POST[observacions]'
                  WHERE  id='$_POST[id]';";



           //EXECUTO LA QUERY
           $conn->query($_sql_Update);


           //CANVIO IMATGE SI PUJA DE NOVA

           if($_FILES['userfile']['error']!=0){
             echo $_FILES['userfile']['error'];
           }else{
                 echo "FICHERO SUBIDO CON EXITO<hr>";


                 $_nom_fitxer_ID="../img/movie_covers/".$_POST['id'].".jpg";

                //AQUI TENGO EL ID DEL REGISTRO Y AHORA QUIERO GUARDAR EL FICHERO CON ESTE NOMBRE
                echo "antes verificar nom nuevo fichero : ".$_nom_fitxer_ID."<hr>";
                echo "antes verificar nom tmp fichero : ".$_FILES['userfile']['tmp_name']."<hr>";
                 if(is_uploaded_file($_FILES['userfile']['tmp_name'])){

                     echo "se ha subido un fichero<hr>";


                 move_uploaded_file($_FILES['userfile']['tmp_name'],$_nom_fitxer_ID);
                       echo "MOVIDO CON EXITO A CARPETA <hr>";

                 }else{
                     echo "no subes nada <hr>";
                 }
           }

           header("Location: ../index.php");

      }

  }else{

    //NO ENTRO PER FORM

    header("Location: ../index.php");
  }

  //TANCO CONEXIO AMB LA BBDD
  $conn->close();

?>
