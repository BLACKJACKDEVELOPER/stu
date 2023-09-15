<?php session_start();
!$_SESSION['islogin'] ? header('location: login.php') : '';
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Work</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/icon.ico">
</head>

<body>
    <div id="app">
        <?php include 'header.php'; ?>

        <!-- PULLING DATA -->
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $typedeline = $_POST['typedeline'];
            $dateStart = $_POST['dateStart'];
            $dateEnd = $_POST['dateEnd'];
            $descript = $_POST['descript'];
            $id = $_GET['id'];

            // UPDATE ACTIVITY
            $qr = new db('UPDATE workinfo SET
    typedeline="' . $typedeline . '",
    dateStart="' . $dateStart . '",
    dateEnd="' . $dateEnd . '",
    descript="' . $descript . '"
    WHERE id=' . $id . ';');
            //echo boolval(true);
            echo "<script>window.location.href = 'index.php#ลา';</script>";
        }


        $data = new db('SELECT * FROM workinfo WHERE id=' . $_GET['id'] . ';');
        $data = $data->fetch_assoc();

        ?>


        <div class="modal is-active">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">แก้ไขการลา</p>
                </header>
                <section class="modal-card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="date">ประเภท</label>
                            <select class="input" name="typedeline" id="">
                                <?php echo "<option selected value='".$data['typedeline']."'>".$data['typedeline']."</option>"; ?>
                                <option value="ขาดงาน">ขาดงาน</option>
                                <option value="ลากิจธุร">ลากิจธุร</option>
                                <option value="ลาป่วย">ลาป่วย</option>
                                <option value="มาสาย">มาสาย</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <div style="display:flex;justify-content:center;">
                                <div style="width:100%;">
                                    <label for="date">วันที่เริ่มลา</label>
                                    <input value="<?php echo $data['dateStart']; ?>" type="date" name="dateStart" class="input">
                                </div>
                                <div style="width:100%;">
                                    <label for="date">วันที่หยุดลา</label>
                                    <input value="<?php echo $data['dateEnd']; ?>" type="date" name="dateEnd" class="input">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="date">รายละเอียด</label>
                            <textarea placeholder="Description" class="input" type="text" name="descript"><?php echo $data['descript']; ?></textarea>
                        </div>
                        <input type="text" hidden value="ลา" name="type">
                        <button id="updateDeline" hidden type="submit"></button>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <button onclick="document.getElementById('updateDeline').click()"
                        class="button is-success">บันทึก</button>
                    <a href="index.php#ลา" class="button is-danger">กลับ</a>
                </footer>
            </div>
        </div>
    </div>

</body>

</html>