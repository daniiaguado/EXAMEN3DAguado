<?php
require_once "Conexion.php";
class Lamp extends Conexion
{
    private $lamp_id;

    private $lamp_name;
    private $lamp_model;
    private $lamp_zone;

    private $lamp_on;

    public function __construct($confFile)
    {
    
        
        parent::__construct($confFile);

    }

       

    public function getLamp_id()
    {
        return  $this->lamp_id;
    }
    public function getLamp_name()
    {
        return   $this->lamp_name;


    }

    public function getLamp_zone()
    {
        return   $this->lamp_zone;

        
    }
    public function getLamp_on()
    {
        return    $this->lamp_on;

        
    }
    public function getLamp_model()
    {
        return    $this->lamp_zone;

        
    }
    public function setLamp_id($lamp_id)
    {
        
        $this->lamp_id = $lamp_id;
        $this->lamp_name = $lamp_name;
        $this->lamp_zone = $lamp_zone;
        $this->lamp_model = $lamp_model;
        $this->lamp_on = $lamp_on;
        return $this;
    }
    public function setLamp_name($lamp_name)
    {
        
        
        $this->lamp_name = $lamp_name;
        $this->lamp_zone = $lamp_zone;
        $this->lamp_model = $lamp_model;
        $this->lamp_on = $lamp_on;
        return $this;
    }
    public function setLamp_zone($lamp_zone)
    {
        
        
       
        $this->lamp_zone = $lamp_zone;
        $this->lamp_model = $lamp_model;
        $this->lamp_on = $lamp_on;
        return $this;
    }

    public function setLamp_model($lamp_model)
    {
        
        
       
       
        $this->lamp_model = $lamp_model;
        $this->lamp_on = $lamp_on;
        return $this;
    }
    public function setLamp_on($lamp_on)
    {
        
        
       
       

        $this->lamp_on = $lamp_on;
        return $this;
    }


    public function getAllLamps()
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM lamps ORDER BY lamp_id ASC";
        $result = $conn->query($sql);
        $lamps = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lamps[] = $row;
            }
        }
        /*echo "<pre>";
       print_r($peliculas);
       echo "</pre>"; */
        return $lamps;
    }

    public function drawLampsList($lamps)
    {
        echo '<table border="5">';
        echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Name</th>';
        echo '<th>Model</th>';
        echo '<th>Zone</th>';
        echo '<th>On</th>';
        echo '</tr>';
        echo '<tr>';
        foreach ($lamps as $lamp) {

            echo '<td>' . $lamp['lamp_id'] . '</td>';
            echo '<td>' . $lamp['lamp_name'] . '</td>';
            echo '<td>' . $lamp['lamp_model'] . '</td>';
            echo '<td>' . $lamp['lamp_zone'] . '</td>';
            if ($lamp['lamp_on'] == "0") {
                echo "<td> <a href='changeStatus.php?id=" . $lamp['lamp_id'] . "'><img src='./img/bulb-icon-off.png' alt=''></a></td>";
            } else {
                echo "<td> <a href='changeStatus.php?id=" . $lamp['lamp_id'] . "'><img src='./img/bulb-icon-on.png' alt=''></a></td>";
            }

            echo '</td>';
            echo '</tr>';

        }
        echo '</table>';
    }


    public function getLampById($id)
    {
        $sql = "SELECT * FROM lamps ORDER BY lamp_id ASC";
        $conn = $this->connect();
       // echo "$sql";
        $result = $conn->query($sql);
        $lamps = [];
        if ($result->num_rows > 0) {
            $brand = $result->fetch_assoc();
        }
        return $lamps;




        foreach ($lamps as $lamp) {

            // echo '<td>' . $lamp['lamp_id'] . '</td>';
            //echo '<td>' . $lamp['lamp_name'] . '</td>';
            //echo '<td>' . $lamp['lamp_model'] . '</td>';
            //echo '<td>' . $lamp['lamp_zone'] . '</td>';
            if ($lamp['lamp_on'] == "0") {
          
               $sqll = "UPDATE `lamps` SET `lamp_on` = '1' WHERE `lamps`.`lamp_id` = '$id'";
               



            } else {
              $sqll =  "UPDATE `lamps` SET `lamp_on` = '0' WHERE `lamps`.`lamp_id` = '$id'";
                
                
            }
            echo $sql;
            $result = $conn->query($sqll);
            if ($result->num_rows > 0) {
                $brand = $result->fetch_assoc();
            }
           
           
                $conn = $this->connect();
                $result = $conn->query($sqll);
                return $brand;

            //echo '</td>';
            //echo '</tr>';

        }
        //
        // echo '</table>';





        $result = $conn->query($sqll);
        $lamp = [];
        $conn = $this->connect();
        return $lamp;


    }

    // echo '</td>';
    //  echo '</tr>';

}
//echo '</table>';






?>