<?php
    include("includes/header.php");
    include("functions/book_detail_process.php");
?>

        <header class="d-flex justify-content-center py-3">
            <h3 class="nav-item"><?php $book_row['book_category']; ?></h3>
        </header>

        <div class="container text-center">
            <div class="d-flex justify-content-center py-3">
                <div class="col-md-12"> 
                    <div class="card flex-md-row mb-4 box-shadow h-md-550"> 
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary"><?php echo $book_row['book_name']; ?></strong>
                            <h3 class="mb-0">
                                ₹ <?php echo $book_row['book_price']; ?> 
                            </h3>
                            <p class="card-text mb-auto">
                                <?php echo $book_row['book_description']; ?>
                                <br>
                                <p><strong>Author:</strong><?php echo $book_row['book_author']; ?>
                                <!-- Average rating -->
                                <p><strong>Average Rating:</strong> <?php echo number_format($avg_rating, 1); ?> / 5</p>

                                <!-- Show all previous ratings count -->
                                <p><strong>Total Ratings:</strong> <?php echo mysqli_num_rows($all_ratings_result); ?></p>

                                <!-- Show logged-in user's rating or a form to rate -->
                                <?php if (isset($_SESSION['client']['status'])): ?>
                                    <?php if ($user_rating): ?>
                                        <p><strong>Your Rating:</strong> <?php echo $user_rating; ?> / 5</p>
                                    <?php else: ?>
                                        <form method="POST" action="functions/rate_book.php">
                                            <label for="rating">Rate this book (1 to 5):</label>
                                            <select name="rating" id="rating" required>
                                                <?php for ($i = 5; $i >= 1; $i--): ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                            <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                                            <button type="submit" class="btn btn-outline-primary btn-sm">Submit Rating</button>
                                        </form>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <p><a href="login.php">Login to rate this book</a></p>
                                <?php endif; ?>
                            </p>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <?php
                                        show_details($book_row);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" style="width: 500px; height: 550px;" src="<?php echo $book_row['book_img']; ?>" data-holder-rendered="true">
                    </div>
                </div>
            </div>
        </div>

<?php
    include("includes/footer.php");
?>
