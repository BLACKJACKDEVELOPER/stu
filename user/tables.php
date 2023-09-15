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
  <title>Tables</title>
  <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
</head>
<style>
  .pagination-link {
    background: #fff;
    color: #000 !important;
  }

  .is-current {
    background: #0110 !important;
    border-color: #000 !important;
  }

  th,
  td {
    border: 1px solid #0101 !important;
    text-align: center !important;
    padding: 0px;
    margin: 0px;
    font-size: 1.0rem;
  }

  #Table {
    margin-top: 2%;
  }

  .is-half {
    margin-top: 2% !important;
  }

  .hover-btn:hover {
    transition: 0.2s;
  }

  .hover-btn:hover {
    background: #3e8ed0 !important;
    color: #fff !important;
  }

  input[type="search"] {
    width: 200px !important;
    height: 40px !important;
    float: right !important;
  }

  #Table_filter {
    float: right;
  }
  .zoom {
    	width: 100px;
    	height: 100px;

    	cursor: pointer;
    	-webkit-transition-property: all;
    	-webkit-transition-duration: 0.3s;
    	-webkit-transition-timing-function: ease;
	}
	.zoom:hover {
    	transform: scale(2);
    	border-radius: 50%;


	}
</style>

<body>
  <div id="app">

    <?php include("header.php");

    // DELETE ACTIVITY
    if (isset($_GET['del'])) {
      db("DELETE FROM activities WHERE id=" . (intval($_GET['del'])) . ";");
      echo "<script>window.location.reload;</script>";
    } else if (isset($_GET['delwork'])) {
      db("DELETE FROM workinfo WHERE id=" . (intval($_GET['delwork'])) . ";");
      echo "<script>window.location.href = 'tables.php#ลา';</script>";
    }

    ?>
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>
                <?php echo $_SESSION["role"]; ?>
              </li>
              <li>ตาราง</li>
            </ul>
          </div>
        </div>
        <div class="level-right">
          <div class="level-item">
            <div class="buttons is-right">
              <a href="https://github.com/BLACKJACKDEVELOPER" target="_blank" class="button is-primary">
                <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                <span>GitHub</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <center>
          <h1 class="title">ตารางกิจกรรม</h1>
        </center>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            <a href="forms.php#กิจกรรม" class="button hover-btn">เพิ่มกิจกรรม</a>
          </p>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards p-5">
              <table id="Table" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th>วัน/เดือน/ปี</th>
                    <th>ชื่อ</th>
                    <th>รายละเอียด</th>
                    <th>ผู้ควบคุม</th>
                    <th>จัดการ</th>
                  </tr>
                <tbody>

                  <?php $data = db("SELECT * FROM report_activities WHERE id='" . $_SESSION['id'] . "';");

                  foreach ($data as $key) { ?>

                    <tr>
                      <td>
                        <?php


                        $date = $key["dater"];
                        $date_day = substr($date, 8, 2);
                        $date_d = $date_day[0] == '0' ? $date_day[1] : $date_day;


                        // Sub Month
                        $date_mon = substr($date, 5, 2);
                        if ($date_mon == "01") {
                          $date_m = "มกราคม";
                        } else if ($date_mon == "02") {
                          $date_m = "กุมภาพันธ์";
                        } else if ($date_mon == "03") {
                          $date_m = "มีนาคม";
                        } else if ($date_mon == "04") {
                          $date_m = "เมษายน";
                        } else if ($date_mon == "05") {
                          $date_m = "พฤษภาคม";
                        } else if ($date_mon == "06") {
                          $date_m = "มิถุนายน";
                        } else if ($date_mon == "07") {
                          $date_m = "กรกฎาคม";
                        } else if ($date_mon == "08") {
                          $date_m = "สิงหาคม";
                        } else if ($date_mon == "09") {
                          $date_m = "กันยายน";
                        } else if ($date_mon == "10") {
                          $date_m = "ตุลาคม";
                        } else if ($date_mon == "11") {
                          $date_m = "พฤศจิกายน";
                        } else if ($date_mon == "12") {
                          $date_m = "ธันวาคม";
                        } else {
                          $date_m = "Nothing";
                        }

                        $date_y = intval(substr($date, 0, 4));

                        $showDate = $date_d . " " . $date_m . " " . $date_y;
                        echo $showDate;

                        ?>
                      </td>
                      <td>
                        <?php echo $key["fullname"]; ?>
                      </td>
                      <td style="width:50px !important;">
                        <?php echo $key["descript"]; ?>
                      </td>
                      <td>
                        <?php echo $key["name_control"]; ?>
                      </td>
                      <td style="display:flex;justify-content:center;align-items:center;">
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="info.php?id=<?php echo $key['activity_id']; ?>" class="button is-primary"><span
                            class="mdi mdi-eye"></span></a>
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="editer.php?id=<?php echo $key['activity_id']; ?>" class="button is-dark"><span
                            class="mdi mdi-pencil"></span></a>
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="?del=<?php echo $key['activity_id']; ?>" class="button is-danger"><span
                            class="mdi mdi-delete"></span></a>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- WorkinfoTable -->
          <hr>
          <section class="hero is-hero-bar">
            <div class="hero-body">
              <center>
                <h1 class="title">ตารางการลา</h1>
              </center>
            </div>
          </section>
          <header class="card-header">
            <p class="card-header-title">
              <a href="forms.php#ลา" class="button hover-btn">เพิ่มการลา</a>
            </p>
          </header>
          <div class="card-content">
            <div class="b-table has-pagination">
              <div class="table-wrapper has-mobile-cards p-5">
                <table id="Work" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                  <thead>
                    <tr>
                      <th>ประเภท</th>
                      <th>วันที่เริ่มลา</th>
                      <th>รายละเอียด</th>
                      <th>จัดการ</th>
                    </tr>
                  <tbody>

                    <?php $deline = db('SELECT * FROM workinfo WHERE stu_id=' . $_SESSION['id'] . ' ORDER BY id DESC;');

                    foreach ($deline as $key) { ?>

                      <tr>
                        <td>
                          <?php echo $key["typedeline"]; ?>
                        </td>
                        <td>
                          <?php


                          $date = $key["dateStart"];
                          $date_day = substr($date, 8, 2);
                          $date_d = $date_day[0] == '0' ? $date_day[1] : $date_day;


                          // Sub Month
                          $date_mon = substr($date, 5, 2);
                          if ($date_mon == "01") {
                            $date_m = "มกราคม";
                          } else if ($date_mon == "02") {
                            $date_m = "กุมภาพันธ์";
                          } else if ($date_mon == "03") {
                            $date_m = "มีนาคม";
                          } else if ($date_mon == "04") {
                            $date_m = "เมษายน";
                          } else if ($date_mon == "05") {
                            $date_m = "พฤษภาคม";
                          } else if ($date_mon == "06") {
                            $date_m = "มิถุนายน";
                          } else if ($date_mon == "07") {
                            $date_m = "กรกฎาคม";
                          } else if ($date_mon == "08") {
                            $date_m = "สิงหาคม";
                          } else if ($date_mon == "09") {
                            $date_m = "กันยายน";
                          } else if ($date_mon == "10") {
                            $date_m = "ตุลาคม";
                          } else if ($date_mon == "11") {
                            $date_m = "พฤศจิกายน";
                          } else if ($date_mon == "12") {
                            $date_m = "ธันวาคม";
                          } else {
                            $date_m = "Nothing";
                          }

                          $date_y = intval(substr($date, 0, 4));

                          $showDate = $date_d . " " . $date_m . " " . $date_y;
                          echo $showDate;

                          ?>
                        </td>
                        <td>
                          <?php echo $key["descript"]; ?>
                        </td>
                        <td style="display:flex;justify-content:center;align-items:center;">
                          <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                            href="editwork.php?id=<?php echo $key['id']; ?>" class="button is-dark"><span
                              class="mdi mdi-pencil"></span></a>
                          <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                            href="?delwork=<?php echo $key['id']; ?>" class="button is-danger"><span
                              class="mdi mdi-delete"></span></a>
                        </td>
                      </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php include("footer.php"); ?>

  <div id="sample-modal" class="modal">
    <div class="modal-background jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Confirm action</p>
        <button class="delete jb-modal-close" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <p>This will permanently delete <b>Some Object</b></p>
        <p>This is sample modal</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button jb-modal-close">Cancel</button>
        <button class="button is-danger jb-modal-close">Delete</button>
      </footer>
    </div>
    <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
  </div>
  </div>

  <!-- Scripts below are for demo only -->
  <script type="text/javascript" src="js/main.min.js"></script>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
<script>
  new DataTable("#Table");
  new DataTable("#Work");
</script>

</html>