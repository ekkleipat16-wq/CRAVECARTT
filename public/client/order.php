<?php
if (isset($_GET['success'])) {
    echo "<script>alert('Order successfully placed!');</script>";
}
?>

<!-- Button to go back to home page -->
 <br><br> <br><br><br>
<center><button onclick="window.location.href='home.php';" class="order-more-btn">ORDER MORE</button>

<style>
    .order-more-btn {
        background-color: #28a745; /* Green color */
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .order-more-btn:hover {
        background-color: #218838; /* Darker green on hover */
        transform: scale(1.05); /* Slightly enlarge button on hover */
    }

    .order-more-btn:active {
        background-color: #1e7e34; /* Even darker green on click */
        transform: scale(1); /* Reset size when clicked */
    }

    .order-more-btn:focus {
        outline: none; /* Remove default outline when focused */
    }
</style>
