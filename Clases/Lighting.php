<?php

require_once "Conexion.php";

class Lighting extends Conexion
{

    public function __construct($confFile)
    {
        parent::__construct($confFile);
    }
    

   


            public function importLamps($file)
            {
                $conn = $this->connect();
                if (($handle = fopen($file, "r")) !== false) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $lamp_id = $data[0];
                    $lamp_name = $data[1];
                    $lamp_model = $data[2];
                    $lamp_zone = $data[3];
                    $lamp_on = $data[4];

                    
                    $sql = "INSERT INTO `lamps` (`lamp_name`, `lamp_model`, `lamp_zone`, `lamp_on`)  VALUES ('$lamp_name', '$lamp_model', '$lamp_zone', '$lamp_on')";
                    /*    
                    echo "<br>";
                        echo $sql;
                        echo "<br>";*/
                    
                        if (!$conn->query($sql)) {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    fclose($handle);
                }
                $result = $conn->query($sql);
                if ($result) {
                    return "File imported successfully";
                } else {
                    return "Error importing file";
                }
            }



        }

    




?>