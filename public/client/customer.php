<?php

if (isset($_POST['save'])) {
    $db = mysqli_connect("localhost", "root", "", "cravecart");
    $cus_id = $row['cus_id'];
    $cus_name = $_POST['cus_name'];
    $cus_order = $_POST['cus_order'];
    $pro_price = $_POST['pro_price'];
    $cus_address = $_POST['cus_address'];
    $cus_contact = $_POST['cus_contact'];

     echo $id;

    if ($cus_order == "") {
        $sql = "SELECT cus_id FROM customer ORDER BY cus_id DESC LIMIT 1";
        $result = mysqli_query($db, $sql);

        while ($data = mysqli_fetch_assoc($result)) {
            $cus_id = $data['cus_id'];
        }
    } else {
        $sql = "INSERT INTO customer (cus_order, cus_name, cus_address, cus_contact, pro_price) 
                  VALUES ('$cus_order', '$cus_name', '$cus_address', '$cus_contact', '$pro_price')";
        mysqli_query($db, $sql);

        $sql = "SELECT cus_id FROM customer WHERE cus_id = LAST_INSERT_ID()";
        $result = mysqli_query($db, $sql);

        while ($data = mysqli_fetch_array($result)) {
            $cus_id = $data['cus_id'];
        }
    }

    header("Location: order.php?success=1");
    exit();
}
?>
