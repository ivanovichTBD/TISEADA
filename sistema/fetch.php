
<?php session_start();
include('../conexion.php');
if (isset($_POST['view'])) {
    
    if ($_POST["view"] != '') {
    	echo $_POST["view"];
        $update_query = "UPDATE carta SET ESTADO_NOTIFICACION = 1 WHERE ESTADO_NOTIFICACION=0";
        mysqli_query($conection, $update_query);
    }
    
    $query  = "SELECT * FROM carta ORDER BY ID_CARTA DESC LIMIT 5";
    $result = mysqli_query($conection, $query);
    $output = '';
    
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_array($result)) {
            
            $output .= '
  <li>
  <a href="lista_cartas.php?id=' . $row["ID_CARTA"] . '">
  <strong>' . $row["TITULO"] . '</strong><br />
  <small><em>' . $row["ASUNTO"] . '</em></small>
  </a>
  </li>

  ';
        }
    }
    
    else {
        $output .= '<li><a href="#" class="text-bold text-italic">No hay notificaciones</a></li>';
    }
    
    $status_query = "SELECT * FROM carta WHERE ESTADO_NOTIFICACION=0";
    $result_query = mysqli_query($conection, $status_query);
    $count        = mysqli_num_rows($result_query);
    
    $data = array(
        'notification' => $output,
        'unseen_notification' => $count
    );
    
    echo json_encode($data);
}
?>