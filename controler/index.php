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
  <title>ระบบสหกิจศึกษา KRPH v.1</title>
  <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
</head>
<body>
<div id="app" style="background-color:#cccccc;">
  
<?php include("header.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $canvas = $_POST['canvas'];
  $id = $_POST['id'];
  $img_base = base64_decode($canvas);
  $filename = (rand() * 100000).".png";
  file_put_contents("../assets/images/".$filename,$img_base);
  db('UPDATE activities SET signature="'.$filename.'" WHERE id="'.$id.'";');

}
?>

  <section class="hero is-hero-bar" style="background-color:#cccccc;">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item"><h1 class="title">
            Dashboard
          </h1></div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section is-main-section">
    <div class="tile is-ancestor">
      
      <div class="tile is-parent">
        <div class="card tile is-child" style="background-color:#17a2b8;color:#fff !important;border-radius:12px !important;box-shadow:10px 10px 5px #a6a6a6  !important;">
          <div class="card-content" style="cursor:pointer;" onclick="window.location.href = 'tables.php';">
            <div class="level is-mobile">
              <div class="level-item">
                <div class="is-widget-label"><h3 class="subtitle is-spaced" style="color:#fff;">
                  กิจกรรมทั้งหมด (ครั้ง)
                </h3>
                  <h1 class="title " style="color:#fff;">
                    <?php echo db('SELECT count(*) AS VALUE FROM report_activities WHERE name_control = "'.$_SESSION['fullname'].'";')->fetch_assoc()['VALUE']; ?>
                  </h1>
                </div>
              </div>
              <div class="level-item has-widget-icon">
                <div class="is-widget-icon"><span class="icon has-text-white is-large"><i
                    class="mdi mdi-apps-box mdi-48px"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- *************************************** Users ***************************************** -->
      <div class="tile is-parent" >
        <div class="card tile is-child"   style="background-color:#28a745;color:#fff !important;border-radius:12px !important;box-shadow:10px 10px 5px #a6a6a6  !important;">
          <div class="card-content">
            <div class="level is-mobile">
              <div class="level-item">
                <div class="is-widget-label"><h3 class="subtitle is-spaced" style="color:#fff;">
                  เซ็นแล้ว
                </h3>
                  <h1 class="title" style="color:#fff;">
                  <?php echo db('SELECT count(*) AS VALUE FROM report_activities WHERE name_control = "'.$_SESSION['fullname'].'" AND signature != "";')->fetch_assoc()['VALUE']; ?>
                  </h1>
                </div>
              </div>
              <div class="level-item has-widget-icon">
                <div class="is-widget-icon"><span class="icon has-text-white  is-large"><i
                    class="mdi mdi-account-group mdi-48px"></i></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- *************************************** End Users ***************************************** -->
      <!--  -->
      <div class="tile is-parent">
        <div class="card tile is-child"  style="background-color:#ffc107;color:#fff !important;border-radius:12px !important;box-shadow:10px 10px 5px #a6a6a6  !important;">
          <div class="card-content">
            <div class="level is-mobile">
              <div class="level-item">
                <div class="is-widget-label"><h3 class="subtitle is-spaced" style="color:#000;">
                  ยังไม่เซ็น
                </h3>
                  <h1 class="title" style="color:#000;display:flex;justify-content:space-between;align-items:center;">
                  <?php echo db('SELECT count(*) AS VALUE FROM report_activities WHERE name_control = "'.$_SESSION['fullname'].'" AND signature = "";')->fetch_assoc()['VALUE']; ?>
                    <span class="icon has-text-black is-large" style="text-shadow:0px 0px 5px 5px #a6a6a6  !important;"><i
                    class="mdi mdi-account-tie mdi-48px"></i></span>
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    

    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-finance"></i></span>
          เซ้นรับรองกิจกรรม
        </p>
        <a onclick="event.preventDefault();window.location.href = '?reload=true';" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <div class="chart-area">
          <div style="height: 100%;">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div></div>
              </div>
            </div>
            
            <?php include "lit_index.php"; ?>

          </div>
        </div>
      </div>
    </div>

  </section>
  <?php include "footer.php"; ?>
</div>


<!-- Scripts below are for demo only -->
<!-- <script type="text/javascript" src="js/main.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>
<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
<script>


</script>
</html>
