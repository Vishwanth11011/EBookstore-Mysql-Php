<?php
    session_start();
    include("includes/header.php");
    include("functions/cart_process.php");
?>

<div class="container">
    <div class="post">
        <br>
        <h2 class="title text-center">Cart</h2>

        <!-- Form for Recalculate and Submit -->
        <form action="functions/add_to_cart.php" method="POST">
            <table class="table" cellspacing="0" border="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Rate</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody>
                    <?php display(); ?>
                </tbody>
            </table>

            <div align="center" style="margin-top: 20px">
                <input type="submit" value="Re-calculate" class="btn btn-outline-info btn-sm">
            </div>
        </form>

        <!-- Separate form just for submitting order -->
        <form action="order.php" method="POST">
            <div align="center" style="margin-top: 10px">
                <input type="submit" value="Confirm & Submit Order" class="btn btn-outline-success btn-sm">
            </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>