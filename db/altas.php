<?php

    include ("conexio_bbdd.php");

    $conn=Connect_BBDD();
    $taula="pellicules";


    if($_POST!=null){
      //REBO ALGUNA COSA  I COMPROVO CAMPS

          if($_POST["titol"]==null or $_POST["director"]==null or $_POST["any"]==null
          or $_POST["pais"]==null or $_POST["puntuacio"]==null or $_POST["observacions"]==null ){

                  echo "FALTEN CAMPS<hr>";

          }else{

                  //TOTS ELS CAMPS OMPLERTS
                  echo "TOTS ELS CAMPS OMPLERTS<hr>";

                  //GENERO CONSULTA SQL
                  //CONSULTA INSERT

                  $SQL_insert="INSERT INTO $taula
                  (`titol`, `director`, `any`, `pais`, `puntuacio`, `observacions`)
                  VALUES ( '$_POST[titol]', '$_POST[director]', '$_POST[any]', '$_POST[pais]', '$_POST[puntuacio]', '$_POST[observacions]');";

                  //EXCUTO LA QUERY
                  $res_Insert_QUERY = $conn->query($SQL_insert);

                  $sql = "SELECT * FROM $taula ORDER BY ultima_actualizacion DESC";
                  //EXCUTO LA QUERY
                  $res_QUERY = $conn->query($sql);

                    $total_registres=[];


                  if ($res_QUERY->num_rows > 0) {

                      while($fila = $res_QUERY->fetch_assoc()) {

                          array_push($total_registres,$fila);
                    }

                      }else{
                            //NO HI HA VALORS A MOSTRAR
                            echo "<hr>No hi ha resultats...<hr>";
                      }


                      $_ultimo_ID=$total_registres[0]['id'];
                      echo "EL ID ULTIMO ES : ".$_ultimo_ID."<hr>";


                      if ($_FILES['userfile']['error']!=0){

                            echo "NO ERROR EN LA SUBIDA <hr>";
                            echo $_FILES['userfile']['error']."<hr>";

                    //    header("Location: ../form_altas.php");
                      }else {

                            echo "FICHERO SUBIDO CON EXITO<hr>";

                            //AQUI TENGO EL ID DEL REGISTRO Y AHORA QUIERO GUARDAR EL FICHERO CON ESTE NOMBRE
                            echo "antes verificar fichero<hr>";

                            $_nom_fitxer_ID="../img/movie_covers/".$_ultimo_ID.".jpg";

                            if(is_uploaded_file($_FILES['userfile']['tmp_name'])){

                                echo "se ha subido un fichero<hr>";


                            move_uploaded_file($_FILES['userfile']['tmp_name'],$_nom_fitxer_ID);
                                  echo "MOVIDO CON EXITO A CARPETA <hr>";

                            }else{
                                echo "no subes nada <hr>";
                            }
                      }
              }

              header("Location: ../index.php");

            }else{
                //NO VINC PER EL FORMULARI NO HI RES PER POST

                die();
                header("Location: ../form_altas.php");

              }
                $conn->close();
?>
