<?php
    include("includes/header.php");

    // Optional: show error message from session
    $error = "";
    if (!empty($_SESSION['error']['category'])) {
        $error = $_SESSION['error']['category'];
        unset($_SESSION['error']['category']); // clear after showing
    }
?>

<div class="container-fluid px-4 mt-4">
    <form action="functions/process_category_add.php" method="POST">
        <div class="mb-4">
            <div class="card-header">New category</div>
            <div class="card-body">

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <div class="form-floating mb-3">
                    <input name="category" type="text" class="form-control rounded-3" placeholder="Category Name" required>
                    <label>Category Name</label>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Add Category</button>
                <a href="category_view.php" class="btn btn-primary btn-sm">Exit</a>

            </div> <!-- card-body -->
        </div> <!-- mb-4 -->
    </form>
</div>

<?php
    include("includes/footer.php");
?>