<?php

session_start();
require_once "../db.php";

// Update Profile From Form {method == POST}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $gender = $_POST["gender"];
  $stu_id = $_POST["stu_id"];
  $marjor = $_POST["marjor"];
  $class = $_POST["class"];
  $year = $_POST["year"];
  $university = $_POST["university"];
  $term = $_POST["term"];
  $nphone = $_POST["nphone"];
  //profile data
  $file = $_POST['file'];
  // save
  new db('UPDATE stu_info SET
  fullname="' . $fullname . '",
  email="' . $email . '",
  password="' . $password . '",
  gender="' . $gender . '",
  stu_id="' . $stu_id . '",
  class="' . $class . '",
  year="' . $year . '",
  university="' . $university . '",
  term="' . $term . '",
  number_phone="' . $nphone . '" WHERE id="' . $_SESSION['id'] . '";');

  if ($file != "false") {
    $file = base64_decode($file);
    $name = rand() . '.jpg';
    file_put_contents('../assets/profile/' . $name, $file);
    new db('UPDATE stu_info SET profile = "' . $name . '" WHERE id="' . $_GET['id'] . '";');
  }

}

$me = new db('SELECT * FROM stu_info WHERE id=' . $_GET['id'] . ';');
$me = $me->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
</head>
<style>
  td,th {
    border:2px solid #0101 !important;
  }
</style>
<body>
  <div id="app">
    <?php include "header.php"; ?>

    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>
                <?php echo $me['email']; ?>
              </li>
              <li>Profile</li>
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
              <h1 class="title">
                Profile
              </h1>
            </div>

          </div>
          <div class="level-right">
            <div class="level-item">
              <a href="users.php" class="button">ผู้ใช้งานทั้งหมด</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="tile is-ancestor">
        <div class="tile is-parent">
          <div class="card tile is-child">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-circle default"></i></span>
                Edit Profile
              </p>
            </header>
            <div class="card-content">
              <!-- FORM -->
              <form method="POST">
                <div class="field is-horizontal">
                  <div class="field-label is-normal"><label class="label">อัปโหลดโปรไฟล์</label></div>
                  <div class="field-body">
                    <div class="field">
                      <div class="field file">
                        <label class="upload control">
                          <a class="button is-primary">
                            <span class="icon"><i class="mdi mdi-upload default" style="color:#fff;"></i></span>
                            <span><h5 style="color:#fff;">Pick a file</h5></span>
                          </a>
                          <input accept=".jpg,.jpeg" onchange="preview()" type="file">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">ชื่อ</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input type="text" name="fullname" value="<?php echo $me['fullname']; ?>" class="input"
                          required>
                      </div>
                      <p class="help">Required. Your name</p>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">E-mail</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input type="email" name="email" value="<?php echo $me["email"]; ?>" class="input" required>
                      </div>
                      <p class="help">Required. Your e-mail</p>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">Password</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input type="password" name="password" value="<?php echo $me["password"]; ?>" class="input"
                          required>
                      </div>
                      <p class="help">Required. Your e-mail</p>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">เพศ</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <select class="input" name="gender" id="">
                          <option value="ชาย">ชาย</option>
                          <option value="หญิง">หญิง</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">รหัสนักศึกษา</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input class="input" name="stu_id" value="<?php echo $me["stu_id"]; ?>" type="text"
                          placeholder="Student id">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">สาขาวิชา</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input class="input" name="marjor" value="<?php echo $me["marjor"]; ?>" type="text"
                          placeholder="Marjor">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">ระดับชั้น</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input class="input" name="class" value="<?php echo $me["class"]; ?>" type="text"
                          placeholder="class">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">ปีการศึกษา</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input class="input" name="year" value="<?php echo $me["year"]; ?>" type="text"
                          placeholder="year">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">สถานศึกษา</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input class="input" name="university" value="<?php echo $me["university"]; ?>" type="text"
                          placeholder="university">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">ภาคเรียน</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <select class="input" name="term">
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">เบอร์โทร</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input name="nphone" class="input" value="<?php echo $me['number_phone']; ?>" type="text"
                          placeholder="Phone number">
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="field is-horizontal">
                  <div class="field-label is-normal"></div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <input value="false" type="text" id="file" name="file" hidden>
                        <button type="submit" class="button is-primary" style="width:100%;">
                          Update Profile
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account default"></i></span>
                Profile
              </p>
            </header>
            <div class="card-content">
              <div class="image has-max-width is-aligned-center">
                <img style="border-radius:5px;" id="preview" src="../assets/profile/<?php echo $me['profile']; ?>"
                  alt="Profile">
              </div>
              <hr>
              <div class="field">
                <label class="label">Name</label>
                <div class="control is-clearfix">
                  <input type="text" readonly value="<?php echo $me['fullname']; ?>" class="input is-static">
                </div>
              </div>
              <div class="field">
                <label class="label">E-mail</label>
                <div class="control is-clearfix">
                  <input type="text" readonly value="<?php echo $me['email']; ?>" class="input is-static">
                </div>
              </div>
              <div class="field">
                <label class="label">password</label>
                <div class="control is-clearfix">
                  <input type="password" readonly value="<?php echo $me['password']; ?>" class="input is-static">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Deep Infomation -->
      <div class="card has-table">
      <hr>
        <section class="hero is-hero-bar">
          <div class="hero-body">
            <center>
              <h1 class="title">ตารางเข้างาน/ออกงาน <?php echo $me['fullname']; ?></h1>
            </center>
          </div>
        </section>
        <header class="card-header">
        </header>
        <div class="card-content ">
          <div class="has-pagination" style="margin:auto;">
            <div class="table-wrapper has-mobile-cards p-5">
              <table id="deline" class="table table-striped table-bordered display nowrap dataTable dtr-inline collapsed" style="width:100%;">
                <thead>
                  <tr>
                    <th>วัน/เดือน/ปี</th>
                    <th>เข้าเวลา</th>
                    <th>ออกเวลา</th>
                  </tr>
                <tbody>

                  <?php $result = new db("SELECT * FROM outin WHERE stu_id='" . $_GET['id'] . "';");

                  while ($row = $result->fetch_assoc()) { ?>

                    <tr>
                      <td style="text-align:left !important;">
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
                        <?php echo $row["getin"]; ?>
                      </td>
                      <td>
                        <?php echo strlen(strval($row["getout"])) == 0 ? '<font color="red">ยังไม่ลงเวลาออก</font>' : $row["getout"].' น.'; ?>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        <hr>
        <section class="hero is-hero-bar">
          <div class="hero-body">
            <center>
              <h1 class="title">ตารางกิจกรรม <?php echo $me['fullname']; ?></h1>
            </center>
          </div>
        </section>
        <header class="card-header">
        </header>
        <div class="card-content ">
          <div class="has-pagination" style="margin:auto;">
            <div class="table-wrapper has-mobile-cards p-5">
              <table id="Table" class="table table-striped table-bordered display nowrap dataTable dtr-inline collapsed" style="width:100%;">
                <thead>
                  <tr>
                    <th>วัน/เดือน/ปี</th>
                    <th>ชื่อ</th>
                    <th>รายละเอียด</th>
                    <th>ผู้ควบคุม</th>
                    <th>จัดการ</th>
                  </tr>
                <tbody>

                  <?php $result = new db("SELECT * FROM report_activities WHERE id='" . $_GET['id'] . "';");

                  while ($row = $result->fetch_assoc()) { ?>

                    <tr>
                      <td style="text-align:left !important;">
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
                      <td style="width:50px !important;text-align:left !important;">
                        <?php echo $row["descript"]; ?>
                      </td>
                      <td style="text-align:left !important;">
                        <?php echo $row["name_control"]; ?>
                      </td>
                      <td style="display:flex;justify-content:center;align-items:center;">
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="info.php?id=<?php echo $row['activity_id']; ?>" class="button is-primary"><span
                            class="mdi mdi-eye" style="color:#fff !important;"></span></a>
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
                <h1 class="title">ตารางการลา <?php echo $me['fullname']; ?></h1>
              </center>
            </div>
          </section>
          <header class="card-header">
          </header>
          <div class="card-content">
            <div class="b-table has-pagination">
              <div class="table-wrapper has-mobile-cards p-5">
                <table id="Work" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                  <thead>
                    <tr>
                      <th>ลำดับที่</th>
                      <th>วันที่ลา</th>
                      <th>ชื่อ</th>
                      <th>รายละเอียด</th>
                      <th>ประเภท</th>
                    </tr>
                  <tbody>

                    <?php $result = new db('SELECT * FROM workinfo WHERE stu_id="' . $_GET['id'] . '";');
                    $index = 1;
                    while ($row = $result->fetch_assoc()) { ?>

                      <tr>
                        <td>
                          <?php echo $index;$index++; ?>
                        </td>

                        <td>
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
                        <td>
                          <?php $me = new db("SELECT fullname FROM stu_info WHERE id=" . $row['stu_id'] . ";");
                                $me = $me->fetch_assoc();
                                echo $me[0]; ?>
                        </td>
                        <td style="text-align:left !important;">
                          <?php echo $row["descript"]; ?>
                        </td>
                        <td>
                          <?php echo $row["typedeline"]; ?>
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
    </section>

    <?php include "footer.php"; ?>

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
  const table = new DataTable("#Table", {
    responsive:true,
    dom: 'Bfrtip',
    buttons:exporter
  });
  new DataTable("#Work", {
    responsive:true,
    dom: 'Bfrtip',
    buttons:exporter
  });
  new DataTable("#deline", {
    responsive:true,
    dom: 'Bfrtip',
    buttons:exporter
  });

  function base64(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.readAsDataURL(file)
      reader.onload = () => resolve(reader.result)
    })
  }

  async function preview() {
    const data = await base64(event.target.files[0])
    document.getElementById("preview").src = data;
    document.getElementById("file").setAttribute("value", data.split(';base64,').pop())
  }

</script>

</html>