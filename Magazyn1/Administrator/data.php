<?php 
    session_start();
    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_error) {
        die("Connection failed: " . $polaczenie->connect_error);
    } 
    
    $sql = "SELECT * FROM produkty";
    $result = $polaczenie->query($sql);
    
    echo $result->num_rows;
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["Nazwa"]. " - Notification: " . $row["Ilość"];
        }
    } else {
        echo "0 results";
    }
    
  

$polaczenie->close();
?>