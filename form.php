<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db_host = "localhost";
    $db_name = "services";
    $db_user = "root";
    $db_pass = "";

    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $em = $_POST["employee_id"];
        $f_name = $_POST["f_name"];
        $l_name = $_POST["l_name"];
        $e_mail = $_POST["email"];
        $p_n = $_POST["p_number"];
        $hire_d = $_POST["hire_date"];

        $query = "INSERT INTO employees (employee_id,first_name,last_name, email,phone_number, hire_date) VALUES (:em,:f_name,:l_name,:e_mail,:p_n,:hire_d)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':em', $em);
        $statement->bindParam(':f_name', $f_name);
        $statement->bindParam(':l_name', $l_name);
        $statement->bindParam(':e_mail', $e_mail);
        $statement->bindParam(':p_n', $p_n);
        $statement->bindParam(':hire_d', $hire_d);
        $statement->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>