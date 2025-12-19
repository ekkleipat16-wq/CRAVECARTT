


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
?>
    <tr>
        <td><?php echo $cus_id; ?></td>
        <td><?php echo $cus_name; ?></td>
        <td><?php echo $cus_order; ?></td>
        <td><?php echo $pro_price; ?></td>
        <td><?php echo $cus_address; ?></td>
        <td><?php echo $cus_contact; ?></td>
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
