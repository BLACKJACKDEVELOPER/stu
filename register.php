<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกการเรียนรู้สหกิจศึกษา ( STU_KRPH )</title>
    <link rel="icon" type="image/x-icon" href="assets/images/icon.ico">

</head>

<style>
    .termix {
        margin: 1%;
    }

    .column {
        display: flex;
        justify-content: space-between;
    }

    @media screen and (max-width: 992px) {
        .column {
            flex-wrap: wrap;
        }
    }
</style>

<body>
    <?php include "header.php"; ?>
    <!-- FORM INCOMING... -->
    <?php
    include "db.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $fullname = $_POST['fullname'];
        $stu_id = $_POST['stu_id'];
        $marjor = $_POST['marjor'];
        $class = $_POST['class'];
        $year = $_POST['year'];
        $university = $_POST['university'];
        $term = $_POST['term'];
        $number_phone = $_POST['number_phone'];

        // INSERT NEW DATA
        db('INSERT INTO stu_info(
            email,
            password,
            gender,
            fullname,
            stu_id,
            marjor,
            class,
            year,
            university,
            term,
            number_phone,
            permission
        ) VALUES (
        "' . $email . '",
        "' . $password . '",
        "' . $gender . '",
        "' . $fullname . '",
        "' . $stu_id . '",
        "' . $marjor . '",
        "' . $class . '",
        "' . $year . '",
        "' . $university . '",
        "' . $term . '",
        "' . $number_phone . '",
        "user"
        );');

        // ALERT REGISTER SUCCESS
        echo "<script>alert('สมัครสำเร็จ!!');</script>";

        // REDIRECT TO LOGIN NOW!
        header("location: index.php");
    }

    ?>


    <!-- ENDED FORM INCOMING -->

    <!-- FORM MODEL -->
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="width:60%;">
        <h3>สมัครสมาชิก</h3>

        <div class="column">
            <div style="width:100%;" class="termix">
                <label for="username">อีเมล์</label>
                <input type="text" placeholder="Email" id="email" name="email">

                <label for="password">รหัสผ่าน</label>
                <input type="password" placeholder="Password" id="password" name="password">

                <label class="has-text-white mt-3">เพศ *</label>
                <div style="width: 100% !imortant;" class="select">
                    <select required name="gender" style="width: 100% !important;">
                        <option selected>--ระบุ--</option>
                        <option>ชาย</option>
                        <option>หญิง</option>
                    </select>
                </div>

                <label class="has-text-white">ชื่อ/นามสกุล *</label>
                <input required type="text" name="fullname" class="input mt-3" placeholder="fullname">
            </div>

            <div style="width:100%;" class="termix">
                <label class="has-text-white">รหัสนักศึกษา *</label>
                <input required type="text" name="stu_id" class="input mt-3" placeholder="Student Id">

                <label class="has-text-white">สาขาวิชา *</label>
                <input required type="text" name="marjor" class="input mt-3" placeholder="Major subject">

                <label class="has-text-white">ระดับชั้น *</label>
                <input required type="text" name="class" class="input mt-3" placeholder="Class">

                <label class="has-text-white">ปีการศึกษา *</label>
                <input required type="text" name="year" class="input mt-3" placeholder="year">
            </div>
        </div>

        <div class="termix">
            <label class="has-text-white">ชื่อสถานศึกษา *</label>
            <input required type="text" name="university" class="input mt-3" placeholder="University">
        </div>

        <button style="margin-top:5%;">ส่งแบบฟอร์ม</button>
        <div class="social">
            <div class="go" style="width:100%;" onclick="window.location.href = 'index.php';"><i
                    class="fab fa-logout"></i>กลับ</div>
        </div>
    </form>

    <!-- FORGOT PASSWORD -->
    <!-- <div style="margin-top:1% ;display: flex;width: 100%;align-items: center;justify-content: center;">
    <a href="forgotPassword.php">ลืมรหัสผ่านใช่หรือไม่</a>
</div> -->
    <!-- END FORGOT PASSWORD -->

    <!-- ENDED FORM MODEL -->

</body>

</html>