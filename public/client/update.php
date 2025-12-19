<?php

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "cravecart";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$statusMsg = '';
$targetDir = "uploads/";

if (isset($_GET['u'])) {
    $cus_id = $db->real_escape_string($_GET['u']);  

    $result = $db->query("SELECT * FROM customer WHERE cus_id = '$cus_id'");
    $row = $result->fetch_assoc();

    if (!$row) {
        die("Record not found.");
    }
} else {
    die("No ID specified.");
}

if (isset($_POST["submit"])) {
 
    $cus_id = $_POST['cus_id'];
    $cus_name = $_POST['cus_name'];
    $cus_order = $_POST['cus_order'];
    $pro_price = $_POST['pro_price'];
    $cus_address = $_POST['cus_address'];
    $cus_contact = $_POST['cus_contact'];

    if (!$statusMsg) {
        $stmt = $db->prepare("UPDATE customer SET cus_name=?, cus_order=?, pro_price=?, cus_address=?, cus_contact=? WHERE cus_id=?");
        $stmt->bind_param("ssssss", $cus_name, $cus_order, $pro_price, $cus_address, $cus_contact, $cus_id);

        if ($stmt->execute()) {
            $statusMsg = "Record updated successfully.";
            $result = $db->query("SELECT * FROM customer WHERE cus_id = '$cus_id'");
            $row = $result->fetch_assoc();
        } else {
            $statusMsg = "Database update failed: " . $stmt->error;
        }
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html>

<style>
   body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    margin: 0;
    padding: 0;
   }

    h1 {
    text-align: center;
    margin-top: 30px;
    color: #333;
    }

    form {
    width: 400px;
    margin: 30px auto;
    background: #fff;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
    display: block;
    margin-bottom: 12px;
    font-weight: bold;
    color: #333;
    }

    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="password"] {
    width: 95%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    }

    input[type="submit"],
    button {
    padding: 10px 20px;
    border: none;
    margin-top: 20px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    }

    input[type="submit"] {
    background:   #4CAF50;;
    color: white;
    width: 100%;
    }

    input[type="submit"]:hover {
    background: #00b2f8ff  ;
    }

    button {
    background: #6c757d;
    color: white;
    margin-top: 10px;
    }

    button:hover {
    background: #545b62;
    }

    p {
    text-align: center;
    color: black;
    font-weight: bold;
    margin-top: 15px;
    }
</style>

<head>
    <title>Update Customer Info</title>
    
</head>
<body>
    
    <?php if (!empty($statusMsg)) : ?>
<script>
    alert("<?php echo $statusMsg; ?>");
</script>
<?php endif; ?>

    <h1>Update Customer Info</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>ID:
            <input type="text" name="cus_id" value="<?php echo htmlspecialchars($row['cus_id']); ?>" readonly>
        </label><br>
        <label>Email:
            <input type="text" name="cus_name" value="<?php echo htmlspecialchars($row['cus_name']); ?>" readonly>
        </label><br>
        <label>Order:
            <input type="text" name="cus_order" value="<?php echo htmlspecialchars($row['cus_order']); ?>"readonly>
        </label><br>
        <label>Price:
            <input type="text" name="pro_price" value="<?php echo htmlspecialchars($row['pro_price']); ?>" readonly>
        </label><br>
        <label>Address:
            <input type="text" name="cus_address" value="<?php echo htmlspecialchars($row['cus_address']); ?>" required>
        </label><br> <br>
        <label>Contact:
            <input type="text" name="cus_contact" value="<?php echo htmlspecialchars($row['cus_contact']); ?>" required>
        </label><br>

        <br>

        <br>
        <input type="submit" name="submit" value="UPDATE">
        <button type="button" onclick="location.href='home.php'">BACK</button>
    </form>

    <p><?php echo $statusMsg; ?></p>
</body>
</html>
