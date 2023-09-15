<?php 
session_start();
include "../connect.php";
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

    <?php include("header.php"); ?>

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
                   <?php 
                   $query = "SELECT  count(*) AS tt FROM report_activities";
                    //echo $query;
                   $result = mysqli_query($conn, $query);
                   $row = mysqli_fetch_assoc($result);
                   echo $row["tt"];

                   ?>
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
                ผู้ใช้งานทั้งหมด (คน)
              </h3>
              <h1 class="title" style="color:#fff;">

                <?php 
                $query2 = "SELECT count(*) AS VALUE1  FROM stu_info";
                    //echo $query;
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                echo $row2["VALUE1"];

                ?>

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
              นักศึกษาทั้งหมด (คน)
            </h3>
            <h1 class="title" style="color:#000;display:flex;justify-content:space-between;align-items:center;">

              <?php 
              $query3 = "SELECT  count(*) AS VALUE2 FROM controler";
                    //echo $query;
              $result3 = mysqli_query($conn, $query3);
              $row3 = mysqli_fetch_assoc($result3);
              echo $row3["VALUE2"];

              ?>
              <span class="icon has-text-black is-large" style="text-shadow:0px 0px 5px 5px #a6a6a6  !important;"><i
                class="mdi mdi-account-tie mdi-48px"></i></span>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tile is-parent">
    <div class="card tile is-child" style="background-color:#dc3545;color:#fff !important;border-radius:12px !important;box-shadow:10px 10px 5px #a6a6a6  !important;">
      <div class="card-content" style="cursor:pointer;" onclick="window.location.href = 'tables.php#ลา';">
        <div class="level is-mobile">
          <div class="level-item">
            <div class="is-widget-label"><h3 class="subtitle is-spaced" style="color:#fff;">
              ลาทั้งหมด (ครั้ง)
            </h3>
            <h1 class="title" style="color:#fff;">
             <?php 
             $query4 = "SELECT  count(*) AS VALUE3 FROM workinfo";
                    //echo $query;
             $result4 = mysqli_query($conn, $query4);
             $row4 = mysqli_fetch_assoc($result4);
             echo $row4["VALUE3"];

             ?>
           </h1>
         </div>
       </div>
       <div class="level-item has-widget-icon">
        <div class="is-widget-icon"><span class="icon has-text-white  is-large"><i
          class="mdi mdi-account-cancel mdi-48px"></i></span>
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
      BarChart
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
        <canvas id="infoChart" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-finance"></i></span>
      LineChart
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
        <canvas id="infoChart2" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-finance"></i></span>
      PolarAreaChart
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
        <canvas id="infoChart3" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-finance"></i></span>
      RadarChart
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
        <canvas id="infoChart4" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-finance"></i></span>
      DoughnutChart
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
        <canvas id="infoChart5" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
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

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
<script>

  const dataset = [

    <?php 
                $query2 = "SELECT count(*) AS VALUE1  FROM report_activities";
                    //echo $query;
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                echo $row2["VALUE1"];

                ?>
                ,
                <?php 
                $query2 = "SELECT count(*) AS VALUE1  FROM stu_info";
                    //echo $query;
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                echo $row2["VALUE1"];

                ?>
                ,
                <?php 
                $query2 = "SELECT count(*) AS VALUE1  FROM controler";
                    //echo $query;
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                echo $row2["VALUE1"];

                ?>
                ,
                <?php 
                $query2 = "SELECT count(*) AS VALUE1  FROM workinfo";
                    //echo $query;
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                echo $row2["VALUE1"];

                ?>

  ]


  const ctxMain = document.getElementById('infoChart')
  new Chart(ctxMain,{
    type: 'bar',
    data: {
      labels: ['กิจกรรมทั้งหมด', 'ผู้ควบคุมทั้งหมด', 'ลาทั้งหมด', 'ผู้ใช้งานทั้งหมด'],
      datasets: [{
        label: 'กราฟรายงาน',
        data: dataset,
        borderWidth: 1,
        backgroundColor: ['#17a2b8','#28a745','#ffc107','#dc3545']
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  })




  const ctxMain2 = document.getElementById('infoChart2')
  new Chart(ctxMain2,{
    type: 'line',
    backgroundColor:'#fff',
    borderColor:'#fff',
    data: {
      labels: ['กิจกรรมทั้งหมด', 'ผู้ควบคุมทั้งหมด', 'ลาทั้งหมด', 'ผู้ใช้งานทั้งหมด'],
      datasets: [{
        label: 'กราฟรายงาน',
        data: dataset,
        borderWidth: 1,
        backgroundColor: ['#17a2b8','#28a745','#ffc107','#dc3545'],
        borderJoinStyle:'round'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  })

  const ctxMain3 = document.getElementById('infoChart3')
  new Chart(ctxMain3,{
    type: 'polarArea',
    backgroundColor:'#fff',
    borderColor:'#fff',
    data: {
      labels: ['กิจกรรมทั้งหมด', 'ผู้ควบคุมทั้งหมด', 'ลาทั้งหมด', 'ผู้ใช้งานทั้งหมด'],
      datasets: [{
        label: 'กราฟรายงาน',
        data: dataset,
        borderWidth: 1,
        backgroundColor: ['#17a2b8','#28a745','#ffc107','#dc3545'],
      }]
    }
  })

  const ctxMain4 = document.getElementById('infoChart4')
  new Chart(ctxMain4,{
    type: 'radar',
    backgroundColor:'#fff',
    borderColor:'#fff',
    data: {
      labels: ['กิจกรรมทั้งหมด', 'ผู้ควบคุมทั้งหมด', 'ลาทั้งหมด', 'ผู้ใช้งานทั้งหมด'],
      datasets: [{
        label: 'กราฟรายงาน',
        data: dataset,
        borderWidth: 1,
        backgroundColor: ['#17a2b8','#28a745','#ffc107','#dc3545'],
      }]
    }
  })

  const ctxMain5 = document.getElementById('infoChart5')
  new Chart(ctxMain5,{
    type: 'doughnut',
    backgroundColor:'#fff',
    borderColor:'#fff',
    data: {
      labels: ['กิจกรรมทั้งหมด', 'ผู้ควบคุมทั้งหมด', 'ลาทั้งหมด', 'ผู้ใช้งานทั้งหมด'],
      datasets: [{
        label: 'กราฟรายงาน',
        data: dataset,
        borderWidth: 1,
        backgroundColor: ['#17a2b8','#28a745','#ffc107','#dc3545'],
      }]
    }
  })

</script>
</html>
