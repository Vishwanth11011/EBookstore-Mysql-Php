<?php
    session_start();
    include("includes/header.php");
    include("includes/connection.php");

    // Check if user is logged in
    if (!isset($_SESSION['client']['id'])) {
        echo "<div class='alert alert-danger text-center'>Please login to view your orders.</div>";
        include("includes/footer.php");
        exit();
    }

    $user_id = $_SESSION['client']['id'];

    // Fetch orders for the logged-in user
    $query = "SELECT * FROM order_table WHERE order_register_id = ?";
    $stmt = $connection_database->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<div class="container mt-4">
    <h2 class="text-center">My Orders</h2>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Books</th>
                    <th>Total Price (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_name']; ?></td>
                        <td>
                            <?php echo $row['order_address'] . ', ' . $row['order_city'] . ', ' . $row['order_state'] . ' - ' . $row['order_pincode']; ?>
                        </td>
                        <td><?php echo $row['order_mobile']; ?></td>
                        <td><?php echo htmlspecialchars($row['order_list_books']); ?></td>
                        <td>₹ <?php echo number_format($row['order_total_price'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">No orders found.</div>
    <?php endif; ?>
</div>

<?php
    include("includes/footer.php");
?>