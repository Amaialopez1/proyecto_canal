<!-- Ponemos bs5 quitamos el header, el main y el footer-->

<!doctype html>
<html lang="en">
    <head>
        <title>gestion</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
<!-- ABRIMOS PHP EN EL HEAD-->
        <?php include("conexion/conexionProfe.php");
            // Sí está establecido con el metodo POST -->
            if(isset($_POST['video_upload'])){ 
                $maxsize =524288000;  //52MB 
                $nombre_file =$_FILES['file_video']['name'];
                //Ahora la información de las imágenes
                $image_info = explode(".", $nombre_file);
                //Ahora el formato
                $nombre = format_uri($image_info[0]);
                //Tipo de información de la imagen
                $image_type = end($image_info);
                //La configuración del vídeo(resolución del vídeo y el tipo de vídeo)
                $file_video = $nombre."-".rand(10,999).".".$image_type;
                   
                    //El directorio donde va el vídeo, tenemos que nombrar la carpeta
                    $target_dir = "videos/";
                    $target_file = $target_dir.$target_video;

                $videoFileType = strtolower(pathinfo($nombre_file,PATHINFO_EXTENSION));
                
                $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

                //Dentro de esta condición del if, tenemos que tener otra
                    //Revisar el tamaño del array
                    if(in_array($videoFileType, $extensions_arr)){
                        
                        
                        //revisar el tamaño del archivo
                        if(($_FILES['file_video']['size']>= $maxsize) || ($_FILES['file_video']['size']==0)){
                            $error="El archivo es demasiado grande. El archivo debe ser menor de 5MB";
                        }else{ //vamos a subir el vídeo
                            if(move_uploaded_file($_FILES['file_video']['tmp_name'], $target_file)){
                                //insertamos los registros
                                $nombre = htmlentities($_POST['nombre']);

                                //Ahora hacemos el query
                                $query = $db->prepare("INSERT INTO `video`(`nombre`,`ubicacion`) VALUES(:nombre,:ubicacion)");
                                //Este es para el parametro del query
                                $query->bindparam(":nombre", $nombre);
                                $query->bindparam(":ubicacion", $file_video);
                                //Ahora que se ejecute en el query
                                $query->execute();

                                //Para que lo coloque donde le digamos nosotros 
                                if($query->rowCount()>0){
                                    header("location: index2.php?estado=ok");
                                }
                            }

                            }
                    }else{
                        $error="La extensión del archivo es invalida!!";
                    }


                }

        ?>

    </head>

    <body>
<!-- VAMOS A CONFIGURAR LOS VÍDEOS..
 1 Buscamos en google configuración de vídeos para reducir el tamaño-comprimir video
 2 Abrimos el php con el include de la página de configuración
 3 de momento comentamos el php para que no nos de error
 4 Creamos un main
 -->
        <main role="main" class="flex-shrink-0">
            <div class="container">
                <div class="row">
                    <h3>Subir vídeos</h3>
                </div>
                <hr>
                    <?php
                    
                        if(isset($error)){
                            //al imprimir
                            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';//ponemos las comillas para poner una clase
                        }
                    ?>
                    
                    <?php
                        //para el get
                        if(isset($_GET["estado"])){
                            echo '<div class="alert alert-success" role="alert"> vídeo subido correctamente </div>';
                        }
                    ?>
                <!-- 5 Ahora vamos a hacer el formulario  (Vamos a crear un javaScript)-->
                 <div class="row">
                    <form method="post" action="" enctype="multipart/form-data"><!-- Nos permite subir los archicos -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre del vídeo</label>
                                <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Ingrese nombre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Vídeo</label>
                                <div class="custom-file mt-3 mb-3">
                                <input name="file_video" type="file" class="custo,-file-input" id="customFile" required>
                                <label name="custom-file-label selected"for="customFile"></label>
                                </div>
                                <!--Para que funcione el botón que tenemos abajo hacemos el script para hacer una función anonima-->
                                <script>
                                    $(".custom-file-input").on("change",function () {
                                        var fileName = $(this).val().split("\\").pop();
                                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                    });
                                </script>
                        </div>
                        <button type="submit" class="btn btn-primary" name="video_upload">Subir vídeo</button>
                    </form>

                 </div>

            </div>

        </main>


        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
