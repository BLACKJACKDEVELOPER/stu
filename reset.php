<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RESET PASSWORD</title>
	<link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
</head>
<body>
	<?php include 'header.php'; ?>

<!-- PROCESS NEW PASSWORD -->

	<?php 
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$newPassword = $_POST['newPassword'];
			$email = $_POST['email'];
			$token = $_POST['token'];
			//save new Password
			db('UPDATE stu_info SET password = "'.$newPassword.'" WHERE email="'.$email.'";');
			db('DELETE FROM resetpasswords WHERE token="'.$token.'";');
			echo '<script> alert("เปลี่ยนรหัสผ่านใหม่สำเร็จ");window.location.href = "index.php" </script>';
		}
	?>

	<!-- END PROCESS -->

	<?php 
		$token = db('SELECT * FROM resetpasswords WHERE token="'.$_GET['auth'].'";');
		if ($token->num_rows > 0) {
		$token = $token->fetch_assoc(); ?>

			<!-- FORM -->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="max-width: 50%;margin: auto;margin-top: 10%;background-color: #4a4a4a;padding: 2%;">
		<div>
			<h1 class="has-text-white" style="font-size: 20px;margin-bottom: 1%;">
				ใส่รหัสผ่านใหม่สำหรับ <?php echo $token['email']; ?>
			</h1>
			<input required name="newPassword" id="newPassword" class="input" type="text" placeholder="รหัสผ่านใหม่">
			<input type="text" hidden name="email" value="<?php echo $token['email']; ?>">
			<input type="text" hidden name="token" value="<?php echo $token['token']; ?>">
		</div>
		<div style="display: flex;align-items: center;justify-content: flex-end;margin-top: 1%;"><button class="button is-primary" type="submit">ยืนยันรหัสผ่านใหม่</button></div>
	</form>
	<!-- END FORM -->

		<?php }else{ ?>

<div style="max-width: 50%;margin: auto;margin-top: 10%;background-color: #4a4a4a;padding: 2%;">
		<div style="display: flex;justify-content: center;align-items: center;">
			<h1 class="has-text-white" style="font-size: 20px;margin-bottom: 1%;">
				ไม่พบข้อมูลการเปลี่ยนรหัสผ่าน
			</h1>
		</div>
</div>

		<?php }
	?>

	<?php include 'footer.php'; ?>
</body>
</html>