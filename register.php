<?php
    session_start();
    include("includes/header.php");
    include("functions/notification.php");

    display_notification_messages();
    display_notification_messages_sucesses();
?>

<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">

            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">Sign up for free</h1>
            </div>

            <div class="modal-body p-5 pt-0">
                <form action="functions/register_process.php" method="POST">

                    <div class="form-floating mb-3">
                        <input name="fullname" type="text" class="form-control rounded-3" placeholder="Full Name"
                               value="<?php echo isset($_SESSION['old']['fullname']) ? htmlspecialchars($_SESSION['old']['fullname']) : ''; ?>">
                        <label>Full Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control rounded-3" placeholder="User Name"
                               value="<?php echo isset($_SESSION['old']['username']) ? htmlspecialchars($_SESSION['old']['username']) : ''; ?>">
                        <label>User Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control rounded-3" placeholder="Password">
                        <label>Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="confirm_password" type="password" class="form-control rounded-3" placeholder="Confirm Password">
                        <label>Confirm Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="contact_number" type="text" class="form-control rounded-3" placeholder="Contact Number"
                               value="<?php echo isset($_SESSION['old']['contact_number']) ? htmlspecialchars($_SESSION['old']['contact_number']) : ''; ?>">
                        <label>Contact Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control rounded-3" placeholder="E-Mail"
                               value="<?php echo isset($_SESSION['old']['email']) ? htmlspecialchars($_SESSION['old']['email']) : ''; ?>">
                        <label>E-Mail</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Security Question</label>
                        <select name="question" class="form-select" required>
                            <option value="Which is your Favourite Movie?" 
                                <?php echo (isset($_SESSION['old']['question']) && $_SESSION['old']['question'] == "Which is your Favourite Movie?") ? 'selected' : ''; ?>>
                                Which is your Favourite Movie?
                            </option>
                            <option value="Which is your Favourite Actress?" 
                                <?php echo (isset($_SESSION['old']['question']) && $_SESSION['old']['question'] == "Which is your Favourite Actress?") ? 'selected' : ''; ?>>
                                Which is your Favourite Actress?
                            </option>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input name="answer" type="text" class="form-control rounded-3" placeholder="Security Answer"
                               value="<?php echo isset($_SESSION['old']['answer']) ? htmlspecialchars($_SESSION['old']['answer']) : ''; ?>">
                        <label>Security Answer</label>
                    </div>

                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-info btn-sm" type="submit">Sign up</button>
                    <a href="login.php" class="w-100 mb-2 btn btn-lg rounded-3 btn-outline-info btn-sm">Sign in</a>

                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    include("includes/footer.php"); 
    unset($_SESSION['old']); 
?>