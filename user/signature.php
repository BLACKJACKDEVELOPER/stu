<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>signature</title>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.6.0/addons/p5.sound.min.js"></script>
</head>
<style>
	#defaultCanvas0 {
		border: 2px solid whitesmoke;
		margin: auto;
		display: flex;
		flex-direction: row;
		justify-content: center;
	}
	canvas {
		border-radius:10px;
	}
</style>
<body>
<?php include 'header.php'; ?>


<!-- SIGNATURE INCOMING -->

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = $_POST['id'];
	$base64 = base64_decode($_POST['signature_data']);
	file_put_contents('../assets/images/'.$id.'.png' , $base64);
	$qr = db('UPDATE activities SET signature = "'.$id.'.png" WHERE id='.$id.';');
	var_dump($qr);
	echo "<script>window.location.href = 'info.php?id=".$id."';</script>";
}

 ?>

<!-- END DATA REQ -->
	<div style="max-width: 73%;display: flex;justify-content: space-between;margin: auto;align-items: center;margin-top: 5%;">
		<h2><b>กรุณาเซ็นรับรอง</b></h2>
			<form method="POST">
			<button class="button is-danger" onclick="clearCanvas()">ล้าง</button>
		    	<input name="signature_data" type="text" hidden="" id="signature_data">
		    	<input value="<?php echo $_GET['id']; ?>" type="text" name="id" id="id" hidden>
		    	<button id="submit" class="button is-primary" type='submit'>ตกลง</button>
				<a style="border:2px solid #0101;" class="button is-light border" href="info.php?id=<?php echo $_GET['id']; ?>">กลับ</a>
		    </form>
	</div>
	

</body>
<script>

const submit = document.getElementById('submit')
submit.disabled = true

function setup() {
  createCanvas(1000, 500);
  strokeWeight(2);
  stroke('#fff');
  cursor(CROSS);
  background('#222222');
}

function touchMoved() {
  	line(mouseX, mouseY, pmouseX, pmouseY);
	let jpg = document.getElementById('defaultCanvas0')
	jpg = jpg.toDataURL()
	const container = document.getElementById('signature_data')
	container.setAttribute('value',jpg.split(';base64,').pop())
	submit.disabled = false
  	return false;
}

function clearCanvas() {
	event.preventDefault();
	clear()
	strokeWeight(2);
  	stroke('#fff');
  	cursor(CROSS);
  	background('#222222');
	submit.disabled = true
}

</script>
</html>