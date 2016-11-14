<?php
  /**
   * creado por Ulises J. Cornejo Fandos  in 9/11/2016
   */

  class Models
  {
    private $db;
    private $id;
    private $model;
    private $idBrand;

    public function __construct()
    {
      $this->db = new Connection();
    }

    private function Errors($url,$add_mode = false)
    {
      try {
        if (empty($_GET['id']) && empty($_POST['model']) && empty($_POST['idBrand'])) {
          throw new Exception("Error Processing Request", 1);
        } else {
          $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;
          $this->idBrand = isset($_POST['idBrand']) ? intval($_POST['idBrand']) : null;
          $this->model = isset($_POST['model']) ? $this->db->real_escape_string($_POST['model']) : null;
          if ($this->model != null) {
            $this->model = str_replace(array('<script>','</script>','<script src','<script type='),
                                         '',
                                         $this->model
                                        );
          }
        }
      } catch (Exception $error) {
        header('location: ' . $url . $error->getMessage());
      }
    }

    public function Add()
    {
      try {
        $this->Errors('?view=management&error=',true);
        $sql = $this->db->query("SELECT * FROM Modelos WHERE Modelo='$this->model' AND idMarca='$this->idBrand';");
        if ($this->db->rows($sql) > 0) {
          throw new Exception("The entered model already exists");
        } else {
          $this->db->query("INSERT INTO Modelos (Modelo, idMarca) VALUES ('$this->model', '$this->idBrand');");
          header('location: ?view=management&success=true');
        }
      } catch (Exception $error) {
        header('location: ?view=management&error=' . $error->getMessage());
      }
    }

    public function Edit()
    {
      $this->Errors('?view=management&error=');
      $this->db->query("UPDATE Modelos SET Modelo='$this->model', idMarca='$this->idBrand' WHERE idModelo='$this->id';");
      header('location: ?view=management&success=true');
    }

    public function Delete()
    {
      try {
        $this->Errors('?view=management&error=');
        $sql = $this->db->query("SELECT * FROM Vehiculos WHERE idModelo='$this->id';");
        if($this->db->rows($sql) > 0) {
          throw new Exception("The selected model can not be deleted",2);
        } else {
          $sql = $this->db->query("DELETE FROM Modelos WHERE idModelo='$this->id';");
          $this->db->break_free($sql);
          header('location: ?view=management&success=true');
        }
      } catch (Exception $error) {
        header('location: ?view=management&error=' . $error->getMessage());
      }
    }


    public function __destruct()
    {
      $this->db->close();
    }
  }

?>
