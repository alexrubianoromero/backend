<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>

  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
  <style>
        #fondo_ciudad{
          width: 200px;
          height: 50px;
          /*background-color: red;     */  
          color:black;
          z-index: 0;
          }
          #selectCiudad{
            display:inline;
          }
  #fondo_ciudad{
          width: 200px;
          height: 50px;
          /*background-color: red;     */  
          color:black;
          z-index: 0;
          }
          #selectTipo{

             display:inline;
          }
          #resultados_nuevos{
            width: 100%;
            position:relative;
            display: block;
          }
  </style>
</head>
<?php
include('ciudadesytipos.php');
?>
<body>
 
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Buscador</h1>
           </div>
    <div class="colFiltros">

     <!-- <form action="buscador.php" method="post" id="formulario">-->

        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Realiza una búsqueda personalizada</h5>
          </div>
          <div class="filtroCiudad input-field">

            <label for="selectCiudad">Ciudad
                   <div id="fondo_ciudad">
                          <select name="ciudad" id="selectCiudad">
                          <option value="" >Elige una ciudad...</option>
                          <?php
                              foreach ($ciudadades_unicas as $clave=>$valor) {
                                echo '<option value="'.$valor.'">'.$valor.'</option>';
                              }
                          ?>
                        </select>
                    </div>
            </label>

            </div>
          <div class="filtroTipo input-field">
            <label for="selecTipo">Tipo:</label><br><br>
            <select name="tipo" id="selectTipo">
              <option value="" selected>Elige un tipo</option>
               <?php
                  foreach ($tipos_unicos as $clave=>$valor) {
                    echo '<option value="'.$valor.'">'.$valor.'</option>';
                  }
              ?>


            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="123submitButton">
          </div>
        </div>
      <!--</form>-->
    </div>

    <div class="colContenido">
      <div class="tituloContenido card">
        <h5>Resultados de la búsqueda:</h5>
        <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
        <br>
        <div id="resultados_nuevos"></div>
        <div class="divider"></div>

        
      </div>

    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
  <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>

<script language="JavaScript" type="text/JavaScript">
            
      $(document).ready(function(){
               
          
          /////////////////////////
          $("#mostrarTodos").click(function(){
              var data =  'nombre=' + $("#nombre").val();
              //data += '&cedula=' + $("#cedula").val();
              
              $.post('muestra_total.php',data,function(a){
              //$(window).attr('location', '../index.php);
              $("#resultados_nuevos").html(a);
                //alert(data);
              }); 
             });
          ////////////////////////
           $("#123submitButton").click(function(){
              var data =  'ciudad=' + $("#selectCiudad").val();
              data += '&tipo=' + $("#selectTipo").val();
               data += '&precio=' + $("#rangoPrecio").val();
              
              $.post('buscador.php',data,function(a){
              //$(window).attr('location', '../index.php);
              $("#resultados_nuevos").html(a);
                //alert(data);
              }); 
             });
           //////////////////////////////////////////
          
      
      });   ////finde la funcion principal de script
      
      
      
      
      
</script>

  

