<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="../assets/images/icon.ico">
</head>
<body>
	<?php include "header.php"; ?>
<!-- FORM INCOMING... -->
<?php 
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// CHECK LOGIN MATCHING EMAIL AND PASSWORD
	$login = db('SELECT * FROM stu_info WHERE email="'.$email.'" AND password="'.$password.'";');
	$admin = db('SELECT * FROM admins WHERE email="'.$email.'" AND password="'.$password.'";');
	if ($login->num_rows > 0) {
		$data = $login->fetch_assoc();
		// SAVE NECCESSARY DATA INTO SESSION
		$_SESSION['id'] = $data['id'];
		$_SESSION['profile'] = $data['profile'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['fullname'] = $data['fullname'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['islogin'] = true;
		$_SESSION['role'] = 'user';
		
		// REDIRECT TO HOME PAGE
		header("location: index.php");
		
	}else if ($admin->num_rows > 0) {
		$data = $admin->fetch_assoc();
		$_SESSION['id'] = $data['id'];
		$_SESSION['profile'] = $data['profile'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['islogin'] = true;
		
		// REDIRECT TO HOME PAGE
		header("location: ../admin/index.php");
	}else{
		echo "<script> alert('ไม่พบผู้ใช้งาน'); </script>";
	}


}

 ?>


<!-- ENDED FORM INCOMING -->

<!-- FORM MODEL -->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="has-background-dark login mt-6 p-5">
	
<center>
	<h1 class="has-text-white is-size-2">
	เข้าสู่ระบบ
</h1>
</center>

<div>
	<input required name="email" type="text" class="input mt-3" placeholder="Email">
</div>	
<div>
	<input required name="password" type="password" class="input mt-3" placeholder="Password">
</div>
<button type="submit" class="mt-3 button is-primary">LOGIN</button>
<a href="register.php" class="mt-3 button is-black">REGISTER</a>

</form>
<!-- ENDED FORM MODEL -->

<?php include 'footer.php'; ?>

</body>
</html>