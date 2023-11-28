<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "services";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $ass = $_POST["assignment_id"];
        $employee_id = $_POST["employee_id"];
        $role_id = $_POST["role_id"];
        $S_date = $_POST["start_date"];
        $end_d = $_POST["end_date"];

        $query = "INSERT INTO employeeassignments (assignment_id,employee_id,role_id, start_date1,end_date) VALUES (:ass,:employee_id,:role_id,:S_date,:end_d)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':ass', $ass);
        $statement->bindParam(':employee_id', $employee_id);
        $statement->bindParam(':role_id', $role_id);
        $statement->bindParam(':S_date', $S_date);
        $statement->bindParam(':end_d', $end_d);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>