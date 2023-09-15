<?php session_start();
!$_SESSION['islogin'] ? header('location: login.php') : '';
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EDITER</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/icon.ico">
</head>
<body>
  <div id="app">
	<?php include 'header.php'; ?>

<!-- PULLING DATA -->
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $currentDate = $_POST['day'];
  $descript = $_POST['descript'];
  $name_control = $_POST['name_control'];
  $id = $_POST['id'];

  // UPDATE ACTIVITY
  new db('UPDATE activities SET
    dater="'.$currentDate.'",
    descript="'.$descript.'",
    name_control="'.$name_control.'"
    WHERE id='.$id.';');
    //echo boolval(true);
}


$data = new db('SELECT * FROM activities WHERE id='.$_GET['id'].';'); 
$data = $data->fetch_assoc();

 ?>


<div class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">แก้ไขกิจกรรม</p>
    </header>
    <section class="modal-card-body">
      <form method="POST">
      	<div>
      	วัน/เดือน/ปี
      	<input value="<?php echo $data['dater']; ?>" required name="day" class="input" type="date" placeholder="วัน/เดือน/ปี">
      </div>
      <div>
      	รายละเอียด
      	<textarea required class="input" name="descript" id="" placeholder="รายละเอียด"><?php echo $data['descript']; ?></textarea>
      </div>
      <div>
      	ชื่อผู้กำกับ
     <div style="width: 100%;" class="field">
      <div class="control" style="width: 100%;">
        <div class="select" style="width: 100%;">
          <select name="name_control" style="width: 100%;">
            <?php
              $result = new db('SELECT * FROM controler;');
              while ($row = $result->fetch_assoc()) { ?>
                <?php if ($row['fullname'] == $data['name_control']) { ?>
                  <option selected value="<?php echo $row['fullname']; ?>"><?php echo $row['fullname']; ?></option>
                <?php }else{ ?>
                  <option value="<?php echo $row['fullname']; ?>"><?php echo $row['fullname']; ?></option>
               <?php } ?>
              <?php }
             ?>

          </select>
        </div>
      </div>
    </div>
        <input type="text" hidden name="id" value="<?php echo $_GET['id']; ?>">
      </div>
      <button type='submit' hidden id="addActivity"></button>
      </form>
    </section>
    <footer class="modal-card-foot">
      <button onclick="document.getElementById('addActivity').click()" class="button is-success">บันทึก</button>
      <a href="index.php" class="button is-danger">กลับ</a>
    </footer>
  </div>
</div>	
</div>

</body>
</html>