<?php

  include ("conexio_bbdd.php");


//*******************************************************************
//*******************************************************************
//FUNCION PER IMPRIMIR DADES
//*******************************************************************
//*******************************************************************

  function Imprimir_dades(){

        //CONNEXIO A BBDD
        $conn =Connect_BBDD();

        //TAULA AMB LA QUE VULL TREBALLAR
        $taula = "pellicules";

        //CONSULTA TOTS REGISTRES
        $sql = "SELECT * FROM $taula";
        //EXCUTO LA QUERY I GUARDO A VARIABLE
        $total_registres = $conn->query($sql);


        //CONTROL QUE PASSI UN LIMIT SI NO REP ALGUN VALOR
        //DADES QUE VENEN PER GET

        if(!isset($_GET["limit"])){

            $_GET["limit"]=25;
            $_limit=$_GET["limit"];

        }else{

            $_limit=$_GET["limit"];
        }

        //CONTROL DEL GET PER SI NO REP CAP VALOR SETEO A 0 COM PRIMER REGISTRE
        if (!isset($_GET["num_registre"])){

            $_GET["num_registre"] = 0;
            $_registre_actual = $_GET["num_registre"];

        }else{
            //VERIFICO NUM QUE VE PER GET QUE ESTIGUI ENTRE 0 I MAXIM REGISTRES
            //PER ENVIARLO A LA QUERY
             if(intval($_GET["num_registre"]) < 0){

                 $_registre_actual = 0;

             }else if(intval($_GET["num_registre"]) >= mysqli_num_rows($total_registres)){

                 $_registre_actual=mysqli_num_rows($total_registres)-1;

             }else{
                  $_registre_actual = $_GET["num_registre"];
             }
        }

      //ELS REGISTRES PAGINATS....
      //AMB PARAMETRES REBUTS PER AL GETS CONTRUEIXO LA QUERY
        $sql_registres_paginats ="SELECT * FROM $taula ORDER BY ultima_actualizacion DESC, titol ASC  LIMIT $_registre_actual ,$_limit ";
      //EXECUTO LA QUERY
        $resultat = $conn->query($sql_registres_paginats);

        //MONTO LA IMPRESIO HTML
      if ($resultat->num_rows > 0) {

                $str_QUERY="";

                while($fila = $resultat->fetch_assoc()) {

                      $str_QUERY =
                            $str_QUERY."<article class='pelis'>
                            <div class='titol'>".$fila['titol']."</div>
                            <hr>
                            <div class ='descripcio_peli'>".$fila['director']."<br>
                            ".$fila['any']."<br>
                            ".$fila['pais']."</div><br>
                            ".imatge_pellicula($fila['id'])."<br>
                            ".calificacion_estels($fila['puntuacio'])."<br>
                            <p>
                            <a href = 'formularis/form_editar.php?id=".$fila['id']."'><img class='estels' src='img/icons/editar.png' alt='editar pellicula'></a>

                            <a href = ".link_mes_info($fila['titol'], $fila['director'])." target='_blank'><img class='estels' src='img/icons/google.png'  alt='Mes Informació'></a>
                            </p>
                            <br></article>";
                }

          }else{
                //NO HI HA VALORS A MOSTRAR
                echo "<hr>No hi ha resultats...<hr>";
          }

          //TANCO CONEXIO AMB LA BBDD
          $conn->close();

          //RETORNO A INDEX ARRAY AMB ELS VALOR DE
          //TAULA HTML, REGISTRE ACTUAL, TOTAL REGISTRES, LIMIT PER PAGINA
          return [$str_QUERY,  $_registre_actual, mysqli_num_rows($total_registres), $_limit];
  }


//*******************************************************************
//*******************************************************************
//FUNCION PER PINTAR ESTELS
//*******************************************************************
//*******************************************************************

  function calificacion_estels($_calificacion){

          $_estels="";
          $image1 = "<img class='estels' src='img/icons/1.png'>";
          $image2 = "<img class='estels' src='img/icons/2.png'>";
          $image3 = "<img class='estels' src='img/icons/3.png'>";

          if($_calificacion % 2 !=0){

                //HI HA MITJA ESTEL
                for ($i=1; $i<($_calificacion/2); $i++){
                    $_estels= $_estels.$image1;
                }
                    $_estels= $_estels.$image2;

                for ($i=0; $i>(($_calificacion/2)-4);$i--){
                      $_estels= $_estels.$image3;
                }

          }else{

              //NOMES ESTELL SENCERA
                for ($i=1; $i<=($_calificacion/2); $i++){
                  $_estels= $_estels.$image1;
                }

                for ($i=0; $i>(($_calificacion/2)-5);$i--){
                      $_estels= $_estels.$image3;
                }
            }

            return $_estels;
    }



    //*******************************************************************
    //*******************************************************************
    //FUNCION PER TROBAR LA CARATULA
    //*******************************************************************
    //*******************************************************************

  function imatge_pellicula($id){

      if (file_exists("img/movie_covers/".$id.".jpg")){
        $image_cover = "<img class='covers' src='img/movie_covers/".$id.".jpg'>";
      }else{
        $image_cover = "<img class='covers' src='img/movie_covers/0.jpg'>";
      }
        return $image_cover;
   }




   //*******************************************************************
   //*******************************************************************
   //FUNCION PER ENVIAR INFO A BUSCAR A GOOGLE
   //*******************************************************************
   //*******************************************************************

  function link_mes_info($_titol, $_director){

      $_arry_titol = explode(" ", $_titol);
      $_query_titol="";
      $_arry_director = explode(" ", $_director);
      $_query_director="";

      foreach ($_arry_titol as $key => $value) {
          $_query_titol=$_query_titol."+".$value;
      }

      foreach ($_arry_director as $key => $value) {
        $_query_director=$_query_director."+".$value;
      }

      $_url_1="http://www.google.com.co/search?q=";

      return   str_replace("&" , "and", ($_url_1.$_query_titol.$_query_director));
   }

 ?>
