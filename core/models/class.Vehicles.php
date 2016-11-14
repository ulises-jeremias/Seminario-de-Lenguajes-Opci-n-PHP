<?php

/**
 * created by Ulises Jeremias Cornejo Fandos in 8/9/2016
 */

class Vehicles
{
  private $db;
  private $id;
  private $idModel;
  private $idType;
  private $idCharact;
  private $domain;
  private $price;
  private $year;
  private $bytesIMG;
  private $typeIMG;

  public function __construct()
  {
    $this->db = new Connection();

  }

  private function getFileData($url)
  {
    try {
      if (isset($_FILES['image'])) {
        $tmp = $_FILES['image']['tmp_name']; //temporal files' ubication
        $type = $_FILES['image']['type']; //image's type
        $type = substr($type, 6); //recorto string a partir de la posicion 6
        $size = $_FILES["image"]["size"]; //image's size

        $fp = fopen($tmp, "rb");	//open image's file
        $bytes = fread($fp, $size);	//
        $bytes = addslashes($bytes);	//Adds backslashes to the bytes of the image

        $this->typeIMG = $type;
        $this->bytesIMG = $bytes;
      } else {
        $this->typeIMG = null;
        $this->bytesIMG = null;
      }
    } catch (Exception $error) {
        header('location: ' . $url . $error->getMessage());
    }
  }

  private function Errors($url,$add_mode = false)
  {
    try {
      if (empty($_GET['veh']) && empty($_POST['idModel']) && empty($_POST['idType']) && empty($_POST['idCharact']) && empty($_POST['price']) && empty($_POST['domain']) && empty($_POST['year'])) {
        throw new Exception("Error Processing Request", 1);
      } else {
        $this->id = is_numeric($_GET['veh']) ? intval($_GET['veh']) : null;
        $this->idModel = isset($_POST['idModel']) ? intval($_POST['idModel']) : null;
        $this->idType = isset($_POST['idType']) ? intval($_POST['idType']) : null;
        $this->idCharact = isset($_POST['idCharact']) ? $_POST['idCharact'] : null;
        $this->price = isset($_POST['price']) ? floatval($_POST['price']) : null;
        $this->year = isset($_POST['year']) ? intval($_POST['year']) : null;
        $this->domain = isset($_POST['domain']) ? $this->db->real_escape_string($_POST['domain']) : null;
        if ($this->domain != null) {
          $this->domain = str_replace(array('<script>','</script>','<script src','<script type='),
                                       '',
                                       $this->domain
                                      );
        }
        $this->getFileData($url);
      }
    } catch (Exception $error) {
        header('location: ' . $url . $error->getMessage());
    }
  }

  public function Add()
  {
    $this->Errors('?view=vehicles&error=',true);
    $this->db->query("INSERT INTO Vehiculos (idTipo, idModelo, Dominio, Precio, Anio, contenidoImagen, tipoImagen)
                      VALUES ('$this->idType', '$this->idModel', '$this->domain', '$this->price', '$this->year', '$this->bytesIMG', '$this->typeIMG');");
    $query = $this->db->query("SELECT MAX(idVehiculo) AS idVehiculo FROM Vehiculos;");
    $data = $this->db->get_array($query);
    $this->id = $data['idVehiculo'];
    $query = "";
    foreach ($this->idCharact as $idCharacteristic) {
      $query .= "INSERT INTO Vehiculos_Caracteristicas (idVehiculo, idCaracteristica)
               VALUES ('$this->id', '$idCharacteristic');";
    }
    $this->db->multi_query($query);
    header('location: ?view=vehicles&success=true');
  }

  public function Edit()
  {
    $this->Errors('?view=vehicles&error=');
    $_set = "";
    $_set .= ($this->idType != null) ? ", idTipo='$this->idType'" : "";
    $_set .= ($this->idModel != null) ? ", idModelo='$this->idModel'" : "";
    $_set .= ($this->domain != null) ? ", Dominio='$this->domain'" : "";
    $_set .= ($this->price != null) ? ", Precio='$this->price'" : "";
    $_set .= ($this->year != null) ? ", Anio='$this->year'" : "";
    $_set .= ($this->bytesIMG != null) ? ", contenidoImagen='$this->bytesIMG'" : "";
    $_set .= ($this->typeIMG != null) ? ", tipoImagen='$this->typeIMG'" : "";

    $this->db->query("UPDATE Vehiculos
                      SET idVehiculo='$this->id' $_set
                      WHERE idVehiculo='$this->id'");
    $this->db->query("DELETE FROM Vehiculos_Caracteristicas WHERE idVehiculo='$this->id';");
    $query = "";
    foreach ($this->idCharact as $idCharacteristic) {
      $query .= "INSERT INTO Vehiculos_Caracteristicas (idVehiculo, idCaracteristica)
               VALUES ('$this->id', '$idCharacteristic');";
    }
    $this->db->multi_query($query);
    header('location: ?view=vehicles&success=true');
  }

  public function Delete()
  {
    $this->Errors('?view=vehicles&error=');
    $query = "DELETE FROM Vehiculos_Caracteristicas WHERE idVehiculo='$this->id';";
    $query .= "DELETE FROM Vehiculos WHERE idVehiculo='$this->id';";
    $this->db->multi_query($query);
    header('location: ?view=vehicles&success=true');
  }

  public function __destruct()
  {
    $this->db->close();
  }
}

?>
