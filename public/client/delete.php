<?php
$connect = new mysqli("localhost", "root", "", "cravecart");

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_GET['d'])) {
    $cus_id = $connect->real_escape_string($_GET['d']);

    $result = $connect->query("SELECT cus_contact FROM customer WHERE cus_id = '$cus_id'");
    $row = $result->fetch_assoc();

    if ($row) {
        $filePath = "uploads/" . $row['cus_contact'];

        $deleteQuery = "DELETE FROM customer WHERE cus_id = '$cus_id'";
        if ($connect->query($deleteQuery) === TRUE) {
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            header("Location: home.php"); 
            exit();
        } else {
            echo "Error deleting record: " . $connect->error;
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "No ID provided.";
}
?>