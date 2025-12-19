<?php
session_start();    
?>  

<!DOCTYPE html>
<html>
<head>
    <title>Order Page</title>

<style>
    body {

        background-image: url("https://static.vecteezy.com/system/resources/previews/037/236/648/non_2x/ai-generated-beautuful-fast-food-background-with-copy-space-free-photo.jpg");
        background-size: cover;
        background-repeat: no-repeat;
    

    h1 {
        text-align: center;
        color: #000000ff;
        margin-bottom: 30px;
        border: 2px solid white;
        display: inline-block;

    }

    form {
        background: white;
        padding: 20px;
        width: 500px;
        margin: 20px auto;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    select, input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0 15px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
    }

    button {
        background: #28a745;
        color: white;
        padding: 12px 18px;
        border: none;
        font-size: 15px;
        cursor: pointer;
        border-radius: 5px;
        transition: .2s;
    }
    button:hover {
        background: #218838;
    }

    /* Table styling */
    table {
        width: 90%;
        margin: 30px auto;
        border-collapse: collapse;
        background: white;
        font-size: 14px;
    }

    th {
        background: #343a40;
        color: white;
        padding: 12px;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    tr:hover {
        background: #f1f1f1;
    }

    .search-box {
        width: 90%;
        margin: 20px auto;
        display: flex;
        gap: 10px;
    }

    .search-box input {
        flex: 1;
    }

    .delete-btn {
        background: #dc3545;
    }
    .delete-btn:hover {
        background: #c82333;
    }
    }

</style>
</head>
<body>

<center><h1>ORDER PAGE</h1></center>

<?php
$con = mysqli_connect("localhost","root","","cravecart");
$sql = "SELECT * FROM product";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) > 0 ){
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>      

<form method="GET">
    <label><strong>Select Item:</strong></label>
    <select name="pro_name">
        <?php foreach ($options as $option) { ?>
            <option value="<?php echo $option['pro_name']; ?>">
                <?php echo $option['pro_name']; ?>
            </option>
        <?php } ?> 
    </select>

    <button type="submit" name="confirm">Confirm</button>

</form>


<?php 
if(isset($_GET['confirm'])) {
    $con = mysqli_connect("localhost","root","","cravecart");
    $gpro_name = $_GET['pro_name'];
    $sql = "SELECT pro_price, pro_name FROM product WHERE pro_name='$gpro_name'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0)
        while($row = mysqli_fetch_array($result)){
?>

<form method="POST" action="customer.php">

    <label>Customer:</label>
    <input type="text" name="cus_name" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>

    <label>Order:</label>
    <input type="text" name="cus_order" value="<?php echo $row['pro_name']; ?>" readonly>

    <label>Price:</label>
    <input type="text" name="pro_price" value="<?php echo $row['pro_price']; ?>" readonly>

    <label>Address:</label>
    <input type="text" name="cus_address" id="cus_address" placeholder="Enter your address">

    <label>Contact:</label>
    <input type="text" name="cus_contact" id="cus_contact" placeholder="Enter your contact number">

    <button type="submit" name="save" onclick="return validateForm()">Confirm</button>
</form>



<script>
function validateForm() {
    let address = document.getElementById("cus_address").value.trim();

    if (address === "" || contact === "") {
        alert("Please fill out both Address and Contact before confirming.");
        return false; 
    }

    if (confirm("Are you sure you want to confirm this order?")) {
      
        setTimeout(function() {
            window.location.href = 'order.php'; 
        }, 1000); 

        return true;
    }

    return false; 
}
</script>


<?php 
        }
    }
?>

<?php
$connection = mysqli_connect("localhost", "root", "", "cravecart");
$search = "";
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($connection, $_POST['search']);
}

$sql = "
SELECT * FROM customer WHERE 
    cus_id LIKE '%$search%' OR
    cus_name LIKE '%$search%' OR 
    cus_order LIKE '%$search%' OR 
    pro_price LIKE '%$search%' OR
    cus_address LIKE '%$search%' OR
    cus_contact LIKE '%$search%'    
ORDER BY cus_id ASC";

$result = mysqli_query($connection, $sql);
?>

<form method="POST" action="" class="search-box">
    <input type="text" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
    <button type="submit">Search</button>
</form>

<table border="1" cellpadding="11" cellspacing="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Order</th>
            <th>Price</th>
            <th>Address</th>
            <th>Contact #</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $cus_id = $row['cus_id'];
        $cus_name = $row['cus_name'];
        $cus_order = $row['cus_order'];
        $pro_price = $row['pro_price'];
        $cus_address = $row['cus_address'];
        $cus_contact = $row['cus_contact'];
        $status = $row['status'];
?>
    <tr>
        <td><?php echo $cus_id; ?></td>
        <td><?php echo $cus_name; ?></td>
        <td><?php echo $cus_order; ?></td>
        <td><?php echo $pro_price; ?></td>
        <td><?php echo $cus_address; ?></td>
        <td><?php echo $cus_contact; ?></td>
        <td><?php echo $status; ?></td>
        <td>
            <a href="update.php?u=<?php echo urlencode($cus_id); ?>">
                <button>EDIT</button>
            </a>

            <a href="delete.php?d=<?php echo urlencode($cus_id); ?>" 
               onclick="return confirm('Are you sure you want to delete this record?');">
                <button class="delete-btn">DELETE</button>
            </a>
        </td>
    </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7'>NO ORDER's FOUND......</td></tr>";
}
?>
</table>

<?php mysqli_close($connection); ?>

</body>
</html>
