<?php
	include("includes/header.php");
	include("includes/connection.php");
	include("functions/notification.php");

	display_notification_messages();
?>

		<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content rounded-4 shadow">
					<div class="modal-header p-5 pb-4 border-bottom-0">
						<h1 class="fw-bold mb-0 fs-2">Forget Password</h1>
					</div>

					<div class="modal-body p-5 pt-0">

						<form action="functions/forget_password_process.php" method="POST">
							<div class="form-floating mb-3">
								<input name="username" type="text" class="form-control rounded-3" placeholder="Full Name">
								<label>User Name</label>
							</div>

							<select class="form-select mb-3" name="question" aria-label="Default select example">
								<option>Which is your Favourite Movie?</option>
								<option>Which is your Favourite Actress?</option>
							</select>

							<div class="form-floating mb-3">
								<input name="answer" type="text" class="form-control rounded-3" placeholder="Security answer">
								<label>Security answer</label>
							</div>

							<div class="form-floating mb-3">
								<input name="password" type="password" class="form-control rounded-3" placeholder="New Password">
								<label>New Password</label>
							</div>

							<div class="form-floating mb-3">
								<input name="confirm_password" type="password" class="form-control rounded-3" placeholder="Confirm Password">
								<label>Confirm Password</label>
							</div>

							<input type="submit" class="w-100 mb-2 btn btn-sm rounded-3 btn-outline-info" value="Change Password">
							
						</form>
					</div>
				</div>
			</div>
		</div>

<?php
	include("includes/footer.php");
?>