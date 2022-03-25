<?php
  // set execution time.
  ini_set('max_execution_time', 36000);
  // set memory limit ulimited.
  ini_set('memory_limit', '-1');
    // Check if file exists
    if (file_exists('smiley_xml.xml')) {
        // load file with simplexml_load_file
        $xml = simplexml_load_file('smiley_xml.xml');
    }
    include "connect.php";

         // Check for children
         foreach ($xml->children() as $child) {

            $navn = htmlspecialchars((string)$child->navn1);
            $adresse = htmlspecialchars((string)$child->adresse1);
            $postnummer = htmlspecialchars((string)$child->postnr);
            $bynavn = htmlspecialchars((string)$child->By);
            $kontrolRapport = htmlspecialchars((string)$child->URL);
            $geo_længde = htmlspecialchars((float)$child->Geo_Lng);
            $geo_bredde = htmlspecialchars((float)$child->Geo_Lat);
            $branchekode = htmlspecialchars((string)$child->brancheKode);

            if($branchekode == "DD.56.10.99"){
                
             // If element has children, traverse
            $sql =
            "INSERT INTO restaurant(navn, adresse, postnummer, bynavn,
            kontrolRapport, geo_længde, geo_bredde) VALUES 
            ('" . $navn . "', '" . $adresse . "', '" .$postnummer . "', '" . $bynavn . "',
            '" . $kontrolRapport . "', '" . $geo_længde . "', '" . $geo_bredde . "'); ";
            $connect->query($sql);
        }
            }
            $connect->close();

?>