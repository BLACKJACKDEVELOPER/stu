<?php
session_start();
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forms</title>

  <!-- Bulma is included -->
  <link rel="stylesheet" href="css/main.min.css">
  <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>

<body>
  <div id="app">

    <?php include "header.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if ($_POST['type'] == 'กิจกรรม') {
        $dater = date("Y-m-d");
        $descript = $_POST['descript'];
        $control = $_POST['control'];

        echo $dater.$descript.$control;

        new db("INSERT INTO activities(dater,descript,name_stu,name_control) VALUES 
        ('".$dater."','".$descript."','".$_SESSION['id']."','" .$control."')");
        echo "<script>window.location.href = 'index.php';</script>";
      } else if ($_POST['type'] == 'ลา') {
        $typedeline = $_POST['typedeline'];
        $dateStart = date("Y-m-d");
        $dateEnd = date("Y-m-d");
        $descript = $_POST['descript'];
        // save into database
        new db('INSERT INTO workinfo(typedeline,dateStart,dateEnd,descript,stu_id) VALUES 
        ("'.$typedeline.'","'.$dateStart.'","'.$dateEnd.'","'.$descript.'","'.$_SESSION['id'].'");');
        echo "<script>window.location.href = 'index.php#ลา';</script>";

      }

    }
    $emp = new db('SELECT * FROM controler;');

    ?>

    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>
                <?php echo $_SESSION["role"]; ?>
              </li>
              <li id="กิจกรรม">แบบฟอร์ม</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <h1 class="title" >
                เพิ่มกิจกรรม
              </h1>
            </div>
          </div>
          <div class="level-right" style="display: none;">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="card">
        <header class="card-header">
          <a href="index.php#Table_filter" class="button m-3">
          ดูกิจกรรมทั้งหมด
          <span class="icon mx-1"><i class="mdi mdi-eye"></i></span>
        </a>
        </header>
        <div class="card-content">

          <!-- ADD ACTIVITY -->
          <form method="POST">
            <div class="mb-3">
              <input id="date1" style="display:none;"  type="date" name="dater" class="input">
            </div>
            <div class="mb-3">
              <label for="date">รายละเอียด</label>
              <textarea placeholder="Description" class="input" type="text" name="descript"></textarea>
            </div>
            <div class="mb-3">
              <label for="date">ผู้ควบคุม</label>
              <select class="input" name="control">
                <?php
                while ($row = $emp->fetch_assoc()) { ?>

                  <option value="<?php echo $row['fullname']; ?>"><?php echo $row['fullname']; ?></option>

                <?php }
                ?>
              </select>
            </div>
            <input type="text" hidden value="กิจกรรม" name="type">
            <button style="width:100%;" type="submit" class="button is-primary">เพิ่มกิจกรรม</button>
          </form>

        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <h1 class="title">
                เพิ่ม (ขาดงาน,ลากิจธุร,มาสาย,ลาป่วย)
              </h1>
            </div>
          </div>
          <div class="level-right" style="display: none;">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Form -->
    <section class="section is-main-section">
      <div class="card">
        <header class="card-header">
        <a href="index.php#Table_next" class="button m-3">
          ดูการลาทั้งหมด
          <span class="icon mx-1"><i class="mdi mdi-eye"></i></span>
        </a>
        </header>
        <div class="card-content">

          <!-- ADD ACTIVITY -->
          <form method="POST">
            <div class="mb-3">
              <label for="date">ประเภท</label>
              <select class="input" name="typedeline" id="">
                <option value="ขาดงาน">ขาดงาน</option>
                <option value="ลากิจธุร">ลากิจธุร</option>
                <option value="ลาป่วย">ลาป่วย</option>
                <option value="มาสาย">มาสาย</option>
              </select>
            </div>
            <input id="date2" style="display:none;" type="date" name="dateStart" class="input">
            <div class="mb-3">
              <label for="date">รายละเอียด</label>
              <textarea placeholder="Description" class="input" type="text" name="descript"></textarea>
            </div>
            <input type="text" hidden value="ลา" name="type">
            <button id="ลา" style="width:100%;" type="submit" class="button is-primary">เพิ่มการลา</button>
          </form>

        </div>
      </div>
    </section>
    <!-- Workthread infomation -->
    <!-- END Insert -->
    <?php include("footer.php"); ?>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="js/main.min.js"></script>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
<script>
  document.body.onload = ()=> {
    let dex = new Date();
    dex = `${(dex.getFullYear())}-${(dex.getMonth() + 1)}-${dex.getDate()}`
    document.getElementById('date1').setAttribute('value',dex)
    document.getElementById('date2').setAttribute('value',dex)
  }
</script>
</html>