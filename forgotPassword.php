<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FORGOT PASSWORD</title>
	<link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
</head>

<body>

	<?php include 'header.php'; ?>


	<?php if ($_GET['status'] == 'success') { ?>

		<center>
			<h1 style="font-size:50px;">
				เราใด้ส่งหน้าเว็บเปลี่ยนรหัสผ่านไปที่อีเมล์
				<?php $_GET['email']; ?> แล้ว
			</h1>
		</center>

	<?php } else { ?>
		<div class="background">
			<div class="shape"></div>
			<div class="shape"></div>
		</div>
		<!-- FORM -->
		<form onsubmit="forgot()" style="max-height:50%;">
			<div>
				<h1 class="has-text-white" style="font-size: 20px;margin-bottom: 1%;">ใส่อีเมล์ที่ท่านใด้ลงทะเบียนไว้</h1>
				<input required id="reset" class="input" type="text" placeholder="อีเมล์">
			</div>
			<div><button class="button is-primary" style="margin-top:5%;" type="submit">ยืนยันอีเมล์</button></div>
			<div><button class="button is-primary" style="margin-top:5%;" onclick="event.preventDefault();window.location.href = 'index.php';">กลับ</button></div>
		</form>
		<!-- END FORM -->
	<?php } ?>

</body>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script>

	async function forgot() {
		event.preventDefault()

		const email = document.getElementById('reset').value
		const token = Math.floor(Math.random() * 100000000);

		(function () {
			emailjs.init("Lw5OZwVRvjKm-EjEG");
		})();

		emailjs.send("service_7fl16kr", "template_tul2bmd", {
			from_name: "เว็บสหกิจศึกษา",
			to_name: email,
			url: `http://localhost/stu/reset.php?auth=${token}`,
			client: "s64209010013@kktech.ac.th",
			reply_to: "เว็บสหกิจศึกษา"
		}).then(function (response) {
			if (response.status == 200) {
				const FORM = new FormData()
				FORM.append('token', token)
				FORM.append('email', email)
				fetch('apiResetPassword.php', {
					method: "POST",
					body: FORM
				}).then(res => res.json()).then(res => {
					if (res.status == true) {
						if (confirm('เราใด้ส่งหน้าเว็บเปลี่ยนรหัสผ่านไปที่อีเมล์ของคุณแล้ว') == true) {
							window.location.href = 'https://mail.google.com/mail/u/0/'
						} else {
							window.location.href = 'https://mail.google.com/mail/u/0/'
						}
						return
					}
				})
			}
		}, function (error) {
			console.log(error)
			alert('การเชื่อมต่อล้มเหลว');
		});

	}


</script>

</html>