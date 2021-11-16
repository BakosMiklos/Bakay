<?php
require("kapcs.inc.php");

$sql = "SELECT * FROM idoj";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Város</th>";
                echo "<th>Dátum: </th>";
                echo "<th>Hőfok: </th>";
                echo "<th>Pára: </th>";
                echo "<th>Szél: </th>";
                echo "<th>Szélirány: </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
              echo"<form action='' method='GET'>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['varos'] . "</td>";
                echo "<td>" . $row['datum'] . "</td>";
                echo "<td>" . $row['hofok'] . "</td>";
                echo "<td>" . $row['para'] . "</td>";
                echo "<td>" . $row['szel'] . "</td>";
                echo "<td>" . $row['szelirany'] . "</td>";
                echo"</form>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>