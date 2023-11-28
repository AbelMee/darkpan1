<?php
/**
 * Summary of fetchDataFromDatabase
 * @param mixed $table
 * @return array
 */
function fetchDataFromDatabase($table) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "services";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM 'employees'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return array(); // Return an empty array if no records are found
    }

    $conn->close();
}
?>
