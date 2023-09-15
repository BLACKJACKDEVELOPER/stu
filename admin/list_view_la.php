 <?php 
 session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" language="javascript" src="js/dataTables.responsive.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>    
        $(document).ready(function() {
            $('#example2').DataTable( {

                "oLanguage": {

                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",

                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",

                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",

                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",

                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",

                    "sSearch": "ค้นหา :"},
                    responsive: true
                } );
        } );
    </script>
    <?php
    $id_view  = $_REQUEST['id_view'];
    $query4 = "SELECT * FROM workinfo WHERE stu_id = $id_view ORDER BY id DESC;"; 
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 

    $result4 = new db($query4);

    ?>
    <div align="center">
        <div  class="alert alert-info">
            <h1 style="font-size: 24px;"><font color="#000">ประวัติการลาทั้งหมดของ <?php echo $_GET['name']; ?></font></h1> 
        </div>
    </div>

    <table id="example2" class="table" style="width:100%">
        <thead>
        <!--<colgroup>
             <col span="3" width="5%">
             <col width="25%">
             <col span="4" width="10%">
        </colgroup>
    -->
    <tr>
        <th>ลำดับ</th>
        <th>วันที่เริ่มลา</th>
        <th>วันที่สิ้นสุดลา</th>
        <th>ชื่อเรื่อง</th>
    </tr>
</thead>

<tbody>
    <?php

    $n11 = 1;
    while($row4 = $result4->fetch_assoc()) { 

    ?>

    <tr>
        <td>
          <?php echo $n11;?>
      </td>
      
      <td align="left">
        <p align="left">
            <?php
            $date = $row4["dateStart"];
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

$showDate = $date_d . " " . $date_m . " " . ($date_y + 543);
echo $showDate;
?>
</p>
</td>
<td>

<p align="left">
            <?php
            $date = $row4["dateEnd"];
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

$showDate = $date_d . " " . $date_m . " " . ($date_y + 543);
echo $showDate;
?>
</p>
</td>
<td>
    <p align="left"><?php echo $row4['descript'];?></p>
</td>
</tr>

<?php

$n11++;
} ?>
</tbody>
</table>
<center>
    <button class="button is-primary m-auto" onclick="window.location.href = 'tables.php';">BACK</button>
</center>
</head>
</html>