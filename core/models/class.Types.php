<?php
  /**
   * creado por Ulises J. Cornejo Fandos  in 4/11/2016
   */

  class Types
  {
    private $db;
    private $id;
    private $type;

    public function __construct()
    {
      $this->db = new Connection();
    }

    private function Errors($url,$add_mode = false)
    {
      try {
        if (empty($_GET['id']) && empty($_POST['type'])) {
          throw new Exception("Error Processing Request", 1);
        } else {
          $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;
          $this->type = isset($_POST['type']) ? $this->db->real_escape_string($_POST['type']) : null;
          if ($this->type != null) {
            $this->type = str_replace(array('<script>','</script>','<script src','<script type='),
                                         '',
                                         $this->type
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
        $sql = $this->db->query("SELECT * FROM Tipos WHERE Tipo='$this->type';");
        if ($this->db->rows($sql) > 0) {
          throw new Exception("The entered type already exists");
        } else {
          $this->db->query("INSERT INTO Tipos (Tipo) VALUES ('$this->type');");
          header('location: ?view=management&success=true');
        }
      } catch (Exception $error) {
        header('location: ?view=management&error=' . $error->getMessage());
      }
    }

    public function Edit()
    {
      $this->Errors('?view=management&error=');
      $this->db->query("UPDATE Tipos SET Tipo='$this->type' WHERE idTipo='$this->id';");
      header('location: ?view=management&success=true');
    }

    public function Delete()
    {
      try {
        $this->Errors('?view=management&error=');
        $sql = $this->db->query("SELECT * FROM Vehiculos WHERE idTipo='$this->id';");
        if($this->db->rows($sql) > 0) {
          throw new Exception("The selected type can not be deleted",2);
        } else {
          $sql = $this->db->query("DELETE FROM Tipos WHERE idTipo='$this->id';");
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
