<?php
session_start();
include "../db.php";
?>

<?php
if (isset($_GET['check']) && $_GET['check'] == "true") {
  $dex = date("Y-m-d");
  $houre = intval(date("H")) + 7;
  $minute = date("i");
  $time = $houre . ":" . $minute;
  if (isset($_GET['getin'])) {
    $check = new db('SELECT * FROM outin WHERE date = "' . $dex . '" AND stu_id="' . $_SESSION['id'] . '";');
    $check = $check->fetch_assoc();
    if ($check == null) {
      new db('INSERT INTO outin(date,getin,stu_id) VALUES ("' . $dex . '","' . $time . '","' . $_SESSION['id'] . '") ;');
    } else {
      echo "<script>alert('คุณลงเวลาเข้าไปแล้ววันนี้!!');</script>";
    }
    echo "<script>window.location.href = 'index.php';</script>";
  } else if (isset($_GET['getout'])) {
    $check = new db('SELECT * FROM outin WHERE date = "' . $dex . '" AND stu_id="' . $_SESSION['id'] . '";');
    $check = $check->fetch_assoc();
    if ($check == null) {
      echo "<script>alert('กรุณาลงเวลาเข้างานก่อน!!');</script>";
    } else if ($check['getout'] != '') {
      echo "<script>alert('คุณลงเวลาออกงานแล้ววันนี้!!');</script>";
    } else {
      new db('UPDATE outin SET getout="' . $time . '" WHERE date="' . $check['date'] . '";');
    }
    echo "<script>window.location.href = 'index.php';</script>";
  }

}
?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
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
    white-space: nowrap;
  }

  .coller {
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
  }

  .coller2 {
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
  }

  tr.shown td:first-child {
    background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
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

  .has-pagination {
    margin: 2% !important;
  }
</style>

<body>
  <div id="app" style="background-color:#cccccc;">
    <?php include("header.php"); ?>
    <?php
    if (isset($_GET['deloutin'])) {
      new db("DELETE FROM outin WHERE id=" . $_GET["deloutin"] . ";");
      echo "<script>window.location.href = 'index.php'</script>";
    } else if (isset($_GET['del'])) {
      new db("DELETE FROM activities WHERE id=" . $_GET["del"] . ";");
      echo "<script>window.location.href = 'index.php'</script>";
    }
    ?>

    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item">
              <h1 class="title">
                Dashboard
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
      <div class="tile is-ancestor">
        <div class="tile is-parent">
          <div class="card tile is-child" style="background-color:#cccccc;border:none !important;">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child" style="background-color: #00b89c !important;">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced" style="color:#fff !important;">
                      กิจกรรมของคุณ
                    </h3>
                    <h1 class="title" style="color:#fff !important;">
                      <?php $result = new db('SELECT count(id) AS VALUE FROM report_activities WHERE id=' . $_SESSION["id"] . ';');
                      $result = $result->fetch_assoc();
                      echo $result['VALUE'] ?>
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-light is-large"><i
                        class="mdi mdi-apps-box mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child" style="background-color:#ef2e55 !important;">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label">
                    <h3 class="subtitle is-spaced" style="color:#fff !important;">
                      ลาทั้งหมด
                    </h3>
                    <h1 class="title" style="color:#fff !important;">
                      <?php $result = new db('SELECT count(*) AS VALUE FROM workinfo WHERE stu_id=' . $_SESSION['id'] . ';');
                      $result = $result->fetch_assoc();
                      echo $result['VALUE']; ?>
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-light  is-large"><i
                        class="mdi mdi-account-cancel mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child" style="background-color:#cccccc;border:none !important;">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card has-table">
        <section class="hero is-hero-bar" style="border:none !important;">
          <div class="hero-body">
            <center>
              <h1 class="title">ตารางเข้างาน / ออกงาน</h1>
            </center>
          </div>
        </section>
        <header>
          <center>
            <p style="text-align:center !important;">
              <a href="?check=true&getin=true" class="button is-primary">ลงบันทึกเข้างาน</a>
              <a href="?check=true&getout=true" class="button is-danger">ลงบันทึกออกงาน</a>
            </p>
          </center>
        </header>
        <br>
        <div class="card-content">
          <div class="b-table has-pagination">
            <table id="table1" class="table is-striped is-hoverable mt-5" style="width:100%;">
              <thead>
                <th>ลำดับ</th>
                <th>วัน/เดือน/ปี</th>
                <th>เวลาเข้า</th>
                <th>เวลาออก</th>
                <th>จัดการ</th>
                </tr>
              <tbody>

                <?php $deline = new db('SELECT * FROM outin WHERE stu_id=' . $_SESSION['id'] . ';');
                $index = 1;
                while ($row = $deline->fetch_assoc()) { ?>

                  <tr>
                    <td>
                      <?php echo $index;
                      $index++; ?>
                    </td>
                    <td>
                      <?php


                      $date = $row["date"];
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
                      <?php echo $row["getin"]; ?> น.
                    </td>
                    <td>
                      <?php echo strlen(strval($row["getout"])) == 0 ? '<font color="red">ยังไม่ลงเวลาออก</font>' : $row["getout"] . ' น.'; ?>
                    </td>
                    <td style="display:flex;justify-content:center;align-items:center;">
                      <a style="height:30px;width:50px;margin:0px 2px 0px 2px;" href="?deloutin=<?php echo $row['id']; ?>"
                        class="button is-danger"><span class="mdi mdi-delete"></span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      
        <div class="card-content">
          <div class="b-table has-pagination">
            <table id="table3" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
              <thead>
                <tr>
                  <th></th>
                  <th>ลำดับ</th>
                  <th>วัน/เดือน/ปี</th>
                  <th>ชื่อ</th>
                  <th>รายละเอียด</th>
                  <th>ผู้ควบคุม</th>
                  <th>จัดการ</th>
                </tr>
              <tbody>
                <?php $result = new db("SELECT * FROM report_activities WHERE id='" . $_SESSION['id'] . "';");
                $index = 1;
                while ($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <td class="coller" id="ac<?php echo $value['activity_id']; ?>"></td>
                    <td>
                      <?php echo $index;
                      $index++; ?>
                    </td>
                    <td>
                      <?php
                      $date = $row["dater"];
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
                      <?php echo $row["fullname"]; ?>
                    </td>
                    <td style="width:50px !important;">
                      <?php echo $row["descript"]; ?>
                    </td>
                    <td>
                      <?php echo $row["name_control"]; ?>
                    </td>
                    <td style="display:flex;justify-content:center;align-items:center;">
                      <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                        href="info.php?id=<?php echo $row['activity_id']; ?>" class="button is-primary"><span
                          class="mdi mdi-eye"></span></a>
                      <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                        href="editer.php?id=<?php echo $row['activity_id']; ?>" class="button is-dark"><span
                          class="mdi mdi-pencil"></span></a>
                      <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                        href="?del=<?php echo $row['activity_id']; ?>" class="button is-danger"><span
                          class="mdi mdi-delete"></span></a>
                    </td>
                  </tr>

                <?php } ?>
              </tbody>
            </table>
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
              <table id="table3" class="table is-striped is-hoverable" style="width:100%;">
                <thead>
                  <tr>
                    <td></td>
                    <th>ลำดับ</th>
                    <th>ประเภท</th>
                    <th>วันที่เริ่มลา</th>
                    <th>รายละเอียด</th>
                    <th>จัดการ</th>
                  </tr>
                <tbody>

                  <?php $result = new db('SELECT * FROM workinfo WHERE stu_id=' . $_SESSION['id'] . ' ORDER BY id DESC;');
                  $index = 1;
                  while ($row = $result->fetch_assoc()) { ?>

                    <tr>
                      <td class="coller2" id="deline<?php echo $row['id']; ?>"></td>
                      <td>
                        <?php echo $index;
                        $index++; ?>
                      </td>
                      <td id="type_deline<?php echo $row['id']; ?>">
                        <?php echo $row["typedeline"]; ?>
                      </td>
                      <td id="date_deline<?php echo $row['id']; ?>">
                        <?php


                        $date = $row["dateStart"];
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
                      <td id="des_deline<?php echo $row['id']; ?>">
                        <?php echo $row["descript"]; ?>
                      </td>
                      <td style="display:flex;justify-content:center;align-items:center;">
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="editwork.php?id=<?php echo $row['id']; ?>" class="button is-dark"><span
                            class="mdi mdi-pencil"></span></a>
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="?delwork=<?php echo $row['id']; ?>" class="button is-danger"><span
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
    </section>

    <section class="section is-main-section" style="background-color:#cccccc !important;">
      <div class="card">
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
              <section class="hero is-hero-bar" style="border:none !important;">
                <div class="hero-body">
                  <center>
                    <h1 class="title" style="font-size:25px !important;">ตารางกิจกรรม</h1>
                  </center>
                </div>
              </section>
              <div class="card-content" style="border:none !important;">
                <div class="b-table has-pagination" style="padding:2%;">
                  <table id="table4" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                    <thead>
                      <tr>
                        <th></th>
                        <th>ลำดับ</th>
                        <th>วัน/เดือน/ปี</th>
                        <th>ชื่อ</th>
                        <th>รายละเอียด</th>
                        <th>ผู้ควบคุม</th>
                        <th>จัดการ</th>
                      </tr>
                    <tbody>
                      <?php $result = new db("SELECT * FROM report_activities WHERE id='" . $_SESSION['id'] . "';");
                      $index = 1;
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td class="coller" id="ac<?php echo $value['activity_id']; ?>"></td>
                          <td>
                            <?php echo $index;
                            $index++; ?>
                          </td>
                          <td>
                            <?php
                            $date = $row["dater"];
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
                            <?php echo $row["fullname"]; ?>
                          </td>
                          <td style="width:50px !important;">
                            <?php echo $row["descript"]; ?>
                          </td>
                          <td>
                            <?php echo $row["name_control"]; ?>
                          </td>
                          <td style="display:flex;justify-content:center;align-items:center;">
                            <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                              href="info.php?id=<?php echo $row['activity_id']; ?>" class="button is-primary"><span
                                class="mdi mdi-eye"></span></a>
                            <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                              href="editer.php?id=<?php echo $row['activity_id']; ?>" class="button is-dark"><span
                                class="mdi mdi-pencil"></span></a>
                            <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                              href="?del=<?php echo $row['activity_id']; ?>" class="button is-danger"><span
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

    <section class="section is-main-section" style="background-color:#cccccc !important;">
      <div class="card">
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
              <section class="hero is-hero-bar" style="border:none !important;">
                <div class="hero-body">
                  <center>
                    <h1 class="title" style="font-size:25px !important;">ตารางลา</h1>
                  </center>
                </div>
              </section>
              <div class="card-content" style="border:none !important;">
                <div class="b-table has-pagination" style="padding:2%;">
                  <table id="table4" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                    <thead>
                      <tr>
                        <th></th>
                        <th>ลำดับ</th>
                        <th>วัน/เดือน/ปี</th>
                        <th>ชื่อ</th>
                        <th>รายละเอียด</th>
                        <th>ผู้ควบคุม</th>
                        <th>จัดการ</th>
                      </tr>
                    <tbody>
                      <?php $result = new db("SELECT * FROM report_activities WHERE id='" . $_SESSION['id'] . "';");
                      $index = 1;
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td class="coller" id="ac<?php echo $value['activity_id']; ?>"></td>
                          <td>
                            <?php echo $index;
                            $index++; ?>
                          </td>
                          <td>
                            <?php
                            $date = $row["dater"];
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
                            <?php echo $row["fullname"]; ?>
                          </td>
                          <td style="width:50px !important;">
                            <?php echo $row["descript"]; ?>
                          </td>
                          <td>
                            <?php echo $row["name_control"]; ?>
                          </td>
                          <td style="display:flex;justify-content:center;align-items:center;">
                            <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                              href="info.php?id=<?php echo $row['activity_id']; ?>" class="button is-primary"><span
                                class="mdi mdi-eye"></span></a>
                            <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                              href="editer.php?id=<?php echo $row['activity_id']; ?>" class="button is-dark"><span
                                class="mdi mdi-pencil"></span></a>
                            <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                              href="?del=<?php echo $row['activity_id']; ?>" class="button is-danger"><span
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
  </div>

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

  <!-- Scripts below are for demo only -->
  <!-- <script type="text/javascript" src="js/main.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
  <script type="text/javascript" src="js/chart.sample.min.js"></script>

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
<script>
  const exporter = [{
    extend: 'pdf',
    "pageSize": 'A4',
    text: '<span class="mdi mdi-file-pdf-box" style="color:#fff !important;font-size:20px;"></span>',
    customize: function (doc) {
      pdfMake.fonts = {
        THSarabun: {
          normal: 'THSarabun.ttf',
          bold: 'THSarabun-Bold.ttf',
          italics: 'THSarabun-Italic.ttf',
          bolditalics: 'THSarabun-BoldItalic.ttf'
        }
      };
      // modify the PDF to use a different default font:
      doc.defaultStyle.font = "THSarabun";
      doc.defaultStyle.fontSize = 16
    }
  },
  {
    extend: "copy",
    text: '<span class="mdi mdi-content-copy" style="color:#fff !important;font-size:20px;"></span>'
  },
  {
    extend: "csv",
    text: '<span class="mdi mdi-file-delimited" style="color:#fff !important;font-size:20px;"></span>'
  },
  {
    extend: "excel",
    text: '<span class="mdi mdi-file-excel" style="color:#fff !important;font-size:20px;"></span>'
  },
  {
    extend: "print",
    text: '<span class="mdi mdi-printer" style="color:#fff !important;font-size:20px;"></span>'
  }
  ]
  const table = new DataTable("#table1", {
    dom: 'Bfrtip',
    buttons: exporter
  });
  const table3 = new DataTable("#table4", {
    dom: 'Bfrtip',
    buttons: exporter
  });
  new $('#table1 tbody').on('click', 'td:first-child', function () {
    const tr = $(this).closest('tr');
    const row = table.row(tr);
    const id = (event.target.id).split('ac').pop();

    if (row.child.isShown()) {
      // This row is already open - close it.
      row.child.hide();
      tr.removeClass('shown');
    } else {
      // Open row.
      row.child(id).show();
      tr.addClass('shown');
    }
  });
  const table2 = new DataTable("#table3", {
    dom: "Bfrtip",
    buttons: exporter
  });
  new $('#table3 tbody').on('click', 'td:first-child', function () {
    const tr = $(this).closest('tr');
    const row = table2.row(tr);
    const id = (event.target.id).split('deline').pop();

    const type = document.getElementById('type_deline' + id).innerHTML
    const date = document.getElementById('date_deline' + id).innerHTML
    const des = document.getElementById('des_deline' + id).innerHTML

    if (row.child.isShown()) {
      // This row is already open - close it.
      row.child.hide();
      tr.removeClass('shown');
    } else {
      // Open row.
      row.child(`<p style="text-align:left;font-weight:bolder;">
      ประเภท : ${type} <br>
      วัน/เดือน/ปี : ${date} <br>
      รายละเอียด : ${des} <br>
      </p>`).show();
      tr.addClass('shown');
    }
  });

  new DataTable("#table2", {
    dom: "Bfritip",
    buttons: exporter
  })
</script>

</html>