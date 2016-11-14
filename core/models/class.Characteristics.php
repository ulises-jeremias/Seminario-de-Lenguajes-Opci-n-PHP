<?php
  /**
   * creado por Ulises J. Cornejo Fandos  in 8/9/2016
   */

  class Characteristics
  {
    private $db;
    private $id;
    private $charact;

    public function __construct()
    {
      $this->db = new Connection();
    }

    private function Errors($url,$add_mode = false)
    {
      try {
        if (empty($_GET['id']) && empty($_POST['charact'])) {
          throw new Exception("Error Processing Request", 1);
        } else {
          $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;
          $this->charact = isset($_POST['charact']) ? $this->db->real_escape_string($_POST['charact']) : null;
          if ($this->charact != null) {
            $this->charact = str_replace(array('<script>','</script>','<script src','<script type='),
                                         '',
                                         $this->charact
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
        $sql = $this->db->query("SELECT * FROM Caracteristicas WHERE Caracteristica='$this->charact';");
        if ($this->db->rows($sql) > 0) {
          throw new Exception("The entered characteristic already exists");
        } else {
          $this->db->query("INSERT INTO Caracteristicas (Caracteristica) VALUES ('$this->charact');");
          header('location: ?view=management&success=true');
        }
      } catch (Exception $error) {
        header('location: ?view=management&error=' . $error->getMessage());
      }
    }

    public function Edit()
    {
      $this->Errors('?view=management&error=');
      $this->db->query("UPDATE Caracteristicas SET Caracteristica='$this->charact' WHERE idCaracteristica='$this->id';");
      header('location: ?view=management&success=true');
    }

    public function Delete()
    {
      try {
        $this->Errors('?view=management&error=');
        $sql = $this->db->query("SELECT * FROM Vehiculos_Caracteristicas WHERE idCaracteristica='$this->id';");
        if($this->db->rows($sql) > 0) {
          throw new Exception("The selected characteristic can not be deleted",2);
        } else {
          $sql = $this->db->query("DELETE FROM Caracteristicas WHERE idCaracteristica='$this->id';");
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
