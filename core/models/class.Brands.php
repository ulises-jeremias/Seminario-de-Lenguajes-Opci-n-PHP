<?php
  /**
   * creado por Ulises J. Cornejo Fandos  in 9/11/2016
   */

  class Brands
  {
    private $db;
    private $id;
    private $brand;

    public function __construct()
    {
      $this->db = new Connection();
    }

    private function Errors($url,$add_mode = false)
    {
      try {
        if (empty($_GET['id']) && empty($_POST['brand'])) {
          throw new Exception("Error Processing Request", 1);
        } else {
          $this->id = isset($_GET['id']) ? intval($_GET['id']) : null;
          $this->brand = isset($_POST['brand']) ? $this->db->real_escape_string($_POST['brand']) : null;
          if ($this->brand != null) {
            $this->brand = str_replace(array('<script>','</script>','<script src','<script brand='),
                                         '',
                                         $this->brand
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
        $sql = $this->db->query("SELECT * FROM Marcas WHERE Marca='$this->brand';");
        if ($this->db->rows($sql) > 0) {
          throw new Exception("The entered brand already exists");
        } else {
          $this->db->query("INSERT INTO Marcas (Marca) VALUES ('$this->brand');");
          header('location: ?view=management&success=true');
        }
      } catch (Exception $error) {
        header('location: ?view=management&error=' . $error->getMessage());
      }
    }

    public function Edit()
    {
      $this->Errors('?view=management&error=');
      $this->db->query("UPDATE Marcas SET Marca='$this->brand' WHERE idMarca='$this->id';");
      header('location: ?view=management&success=true');
    }

    public function Delete()
    {
      try {
        $this->Errors('?view=management&error=');
        $sql = $this->db->query("SELECT * FROM Modelos WHERE idMarca='$this->id';");
        if($this->db->rows($sql) > 0) {
          throw new Exception("The selected brand can not be deleted",2);
        } else {
          $sql = $this->db->query("DELETE FROM Marcas WHERE idMarca='$this->id';");
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
