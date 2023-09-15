<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ระบบบันทึกการเรียนรู้สหกิจศึกษา ( STU_KRPH )</title>
	<link rel="icon" type="image/x-icon" href="assets/images/icon.ico">
	
</head>


<body>
	<?php include "header.php"; ?>
	<!-- FORM INCOMING... -->
	<?php
	include "db.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$email = $_POST['email'];
		$password = $_POST['password'];

		// CHECK LOGIN MATCHING EMAIL AND PASSWORD
		$login = db('SELECT * FROM stu_info WHERE email="' . $email . '" AND password="' . $password . '";');
		$control = db('SELECT * FROM controler WHERE email="' . $email . '" AND password="' . $password . '";');
		if ($login->num_rows > 0 || $control->num_rows > 0) {
			$data = $login->num_rows > 0 ? $login->fetch_assoc() : $control->fetch_assoc();
			// SAVE NECCESSARY DATA INTO SESSION
			$_SESSION['id'] = $data['id'];
			$_SESSION['profile'] = $data['profile'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['fullname'] = $data['fullname'];
			$_SESSION['islogin'] = true;
			if ($data['permission'] == 'admin' && $data['verify'] == true) {
				// REDIRECT TO HOME PAGE
				$_SESSION['role'] = 'admin';
				header("location: admin/index.php");
			} else if ($data['permission'] == 'user' && $data['verify'] == true) {
				// REDIRECT TO HOME PAGE
				$_SESSION['role'] = 'user';
				header("location: user/index.php");
			} else if ($data['verify'] == true) {
				$_SESSION['role'] = 'controler';
				header("location: controler/index.php");
			}
			var_dump($_SESSION);
		} else {
			echo "<script> alert('ไม่พบผู้ใช้งาน หรือ บัญชียังไม่อนุญาตตากผู้ดูแลระบบ'); </script>";
		}
	}

	?>


	<!-- ENDED FORM INCOMING -->

	<!-- FORM MODEL -->
	<div class="background">
		<div class="shape"></div>
		<div class="shape"></div>
	</div>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h3>ล๊อกอิน</h3>

		<label for="username">อีเมล์</label>
		<input type="text" placeholder="Email" id="email" name="email">

		<label for="password">รหัสผ่าน</label>
		<input type="password" placeholder="Password" id="password" name="password">

		<button style="margin-top:5%;">เข้าสู่ระบบ</button>
		<div class="social">
			<div class="go" onclick="window.location.href = 'forgotPassword.php';"><i class="fab fa-logout"></i>ลืมรหัสผ่าน</div>
			<div class="fb" onclick="window.location.href = 'register.php';"><i class="fab fa-logout"></i> สมัครสมาชิก</div>
		</div>
	</form>

	<!-- FORGOT PASSWORD -->
	<!-- <div style="margin-top:1% ;display: flex;width: 100%;align-items: center;justify-content: center;">
	<a href="forgotPassword.php">ลืมรหัสผ่านใช่หรือไม่</a>
</div> -->
	<!-- END FORGOT PASSWORD -->

	<!-- ENDED FORM MODEL -->

</body>

</html>