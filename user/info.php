<?php session_start();
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INFO</title>
  <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
</head>
<body>

<div id="app">
	<?php include 'header.php'; ?>

<!-- REQ DATA -->

<?php 

$data = new db('SELECT * FROM report_activities WHERE activity_id = '.$_GET['id'].';');
$data = $data->fetch_assoc();

?>

<!-- END REQ -->

<article style="border-radius:10px;width: 70%; margin: auto;margin-top: 5%;border:2px solid black;" class="message is-dark border border-dark">
  <div class="message-header">
    <p>ข้อมูลเพิ่มเติม</p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
    <h2>วันที่ <?php echo $data['dater']; ?></h2>
    <h2>เข้าเวลา <?php echo $data['getin']; ?></h2>
    <h2>ออกเวลา <?php echo $data['getout']; ?></h2>
    <h2>กิจกรรม <?php echo $data['descript']; ?></h2>
    <h2>ชื่อนักศึกษา <?php echo $data['fullname']; ?></h2>
    <h2>ชื่อผู้ควบคุม <?php echo $data['name_control']; ?></h2>

    <div style='margin-top: 2%;'>
    	<h2><b>ลายเซ็น</b></h2>
    	<img alt="ไม่พบลายเซ็น" style="width: 100%;border-radius: 10px;" src="../assets/images/<?php echo $data['signature']; ?>" alt="">
    </div>
  </div>

  <center>
  <a href="index.php" class="button is-dark mb-5" style="width:96%;">กลับ</a>
  </center>

</article>
<?php include("footer.php"); ?>
</div>


</body>
</html>