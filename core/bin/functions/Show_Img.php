<?php

// se imprime la imagen y se le avisa al navegador que lo que se está
// enviando no es texto, sino que es una imagen de un tipo en particular

function show_img($id) {
    $db = new Connection();
		$sql = $db->query("SELECT contenidoimagen, tipoimagen FROM Vehiculos WHERE idVehiculo='$id';");
		$row = $db->get_array($sql);
		$tipo = $row['tipoimagen'];
    $db->break_free($sql);
    $db->close();
		header("Content-type: image/".$tipo);
		echo $row['contenidoimagen'];
}

?>
