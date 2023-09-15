<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>REGISTER</title>
	<link rel="icon" type="image/x-icon" href="../assets/images/icon.ico">
</head>
<body>

	<?php include "header.php"; ?>
<!-- FORM INCOMING... -->

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// requriement data (email,password,gender,fullname,stu_id,major,class,year,university,term,place_no,road,group_place,local,district,province,letter_no,number_phone)

	$email = $_POST['email'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$fullname = $_POST['fullname'];
	$stu_id = $_POST['stu_id'];
	$marjor = $_POST['marjor'];
	$class = $_POST['class'];
	$year = $_POST['year'];
	$university = $_POST['university'];
	$term = $_POST['term'];
	$number_phone = $_POST['number_phone'];

	// INSERT NEW DATA
	db('INSERT INTO stu_info(
		email,
		password,
		gender,
		fullname,
		stu_id,
		marjor,
		class,
		year,
		university,
		term,
		number_phone,
		permission
	) VALUES (
	"'.$email.'",
	"'.$password.'",
	"'.$gender.'",
	"'.$fullname.'",
	"'.$stu_id.'",
	"'.$marjor.'",
	"'.$class.'",
	"'.$year.'",
	"'.$university.'",
	"'.$term.'",
	"'.$number_phone.'",
	"user"
	);');

	// ALERT REGISTER SUCCESS
	echo "<script>alert('สมัครสำเร็จ!!');</script>";

	// REDIRECT TO LOGIN NOW!
	header("location: ../index.php");

}

 ?>

<!-- ENDING FORM -->



<!-- FORM MODEL -->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="has-background-dark login mt-6 p-5">
	
<h1 class="has-text-white is-size-2">
	สมัครสมาชิกอิอิ
</h1>


<div class="main_register">
	<div class="con1">
		<div>
			<p class="has-text-white">อีเมลล์ *</p>
			<input required name="email" type="text" class="input mt-3" placeholder="Email">
		</div>	
		<div>
			<p class="has-text-white">รหัสผ่าน *</p>
			<input required name="password" type="password" class="input mt-3" placeholder="Password">
		</div>
		<div>
			<p class="has-text-white mt-3">เพศ *</p>
			<div style="width: 100% !important;" class="select">
				<select required name="gender" style="width: 100% !important;">
					<option selected>--ระบุ--</option>
					<option>ชาย</option>
					<option>หญิง</option>
				</select>
			</div>
		</div>
		<div>
			<p class="has-text-white">ชื่อ/นามสกุล *</p>
			<input required type="text" name="fullname" class="input mt-3" placeholder="fullname">
		</div>
		<div>
			<p class="has-text-white">รหัสนักศึกษา *</p>
			<input required type="text" name="stu_id" class="input mt-3" placeholder="Student Id">
		</div>
		<div>
			<p class="has-text-white">สาขาวิชา *</p>
			<input required type="text" name="marjor" class="input mt-3" placeholder="Major subject">
		</div>
		<div>
			<p class="has-text-white">ระดับชั้น *</p>
			<input required type="text" name="class" class="input mt-3" placeholder="Class">
		</div>
		<div>
			<p class="has-text-white">ปีการศึกษา *</p>
			<input required type="text" name="year" class="input mt-3" placeholder="year">
		</div>
		<div>
			<p class="has-text-white">ชื่อสถานศึกษา *</p>
			<input required type="text" name="university" class="input mt-3" placeholder="University">
		</div>
	</div>
	<div class="con2">
		<div>
			<p class="has-text-white mt-3">ภาคเรียน *</p>
			<div style="width: 100% !important;" class="select">
				<select required name="term" style="width: 100% !important;">
					<option selected>--ระบุ--</option>
					<option>1</option>
					<option>2</option>
				</select>
			</div>
		</div>
		<div>
			<p class="has-text-white">หมายเลขโทรศัพท์ *</p>
			<input required type="text" name="number_phone" class="input mt-3" placeholder="Number Phone">
		</div>
		
	</div>
</div>

<div class="column">
	<button type="submit" class="mt-3 button is-primary">REGISTER</button>
	<a href="login.php" class="mt-3 button is-black">LOGIN</a>
</div>

</form>

<!-- ENDING FORM -->
<?php include 'footer.php'; ?>
	
</body>
</html>