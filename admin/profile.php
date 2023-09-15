<?php 
session_start();
include "../db.php";


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
  fullname="'.$fullname.'",
  email="'.$email.'",
  password="'.$password.'",
  gender="'.$gender.'",
  stu_id="'.$stu_id.'",
  class="'.$class.'",
  year="'.$year.'",
  university="'.$university.'",
  term="'.$term.'",
  marjor="'.$marjor.'",
  number_phone="'.$nphone.'" WHERE id="'.$_SESSION['id'].'";');

  if ($file != "false") {
    $file = base64_decode($file);
    $name = rand().'.jpg';
    file_put_contents('../assets/profile/'.$name,$file);
    new db('UPDATE stu_info SET profile = "'.$name.'" WHERE id="'.$_SESSION['id'].'";');
    $_SESSION['profile'] = $name;
  }
  $_SESSION['email'] = $email;
  echo "<script>window.location.href = '?update=true'</script>";
  

}

$me = new db('SELECT * FROM stu_info WHERE id='.$_SESSION['id'].';');
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
<body>
<div id="app" style="background-color:#cccccc;">
  <?php include "header.php";
  if (isset($_GET['update'])) {
    echo "<script>Swal.fire({icon:'success'})</script>";
  }
  ?>
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
                          <span class="icon"><i class="mdi mdi-upload default"></i></span>
                          <span><p style="color:#fff !important;">เลือกไฟล์</p></span>
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
                      <input type="text" name="fullname" value="<?php echo $me['fullname']; ?>" class="input" required>
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
                      <input type="password" name="password" value="<?php echo $me["password"]; ?>" class="input" required>
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
                      <input class="input" name="stu_id" value="<?php echo $me["stu_id"]; ?>" type="text" placeholder="Student id">
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
                      <input class="input" name="marjor" value="<?php echo $me["marjor"]; ?>" type="text" placeholder="Marjor">
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
                      <input class="input" name="class" value="<?php echo $me["class"]; ?>" type="text" placeholder="class">
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
                      <input class="input" name="year" value="<?php echo $me["year"]; ?>" maxlength="4" type="text" placeholder="year">
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
                      <input class="input" name="university" value="<?php echo $me["university"]; ?>" type="text" placeholder="university">
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
                      <input type="text" class="input" value="<?php echo $me['number_phone']; ?>" name="nphone" maxlength="10" placeholder="Phone number" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"/>
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
              <img style="border-radius:5px;" id="preview" src="../assets/profile/<?php echo $me['profile']; ?>" alt="Profile">
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

function base64(file) {
  return new Promise((resolve,reject)=> {
    const reader = new FileReader();
    reader.readAsDataURL(file)
    reader.onload = ()=> resolve(reader.result)
  })
}

async function preview() {
  const data = await base64(event.target.files[0])
  document.getElementById("preview").src = data;
  document.getElementById("file").setAttribute("value",data.split(';base64,').pop())
}

</script>
</html>
