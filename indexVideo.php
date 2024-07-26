<!-- Este index es para descargar los vídeos.
 Se van a ver los vídeos en el index normal-->
<!-- Vamos a hacer un php -->
 <?php include ("conexion/conexionProfe.php");
 ?>

 <?php 
    $query = $db->prepare("SELECT * FROM video ORDER BY id DESC");
    $query->execute;
    $data = $query->fetchAll();
        foreach($data as $row):
            $ubicacion = $row['ubicacion'];
            echo "<div class='col-md-3'>";
            echo "<video src='videos/".$ubicacion."'controls width='100%' height='200px'>";
            echo "</div>";
        endforeach;
 ?>